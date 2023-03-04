<template>
  <el-container>
    <el-header>
      <el-form
        :model="form"
        :rules="rules"
        ref="ruleForm"
        @submit.prevent="addTask('ruleForm')"
      >
        <el-row justify="center" gutter="20">
          <el-col :span="20">
            <el-form-item prop="name">
              <el-input v-model="form.name" placeholder="Type the task" />
            </el-form-item>
          </el-col>
          <el-col :span="4">
            <el-button
              type="primary"
              class="w-100"
              plain
              @click="addTask('ruleForm')"
            >
              add
            </el-button>
          </el-col>
        </el-row>
      </el-form>
    </el-header>

    <el-main>
      <div class="tasks">
        <span v-for="(item, key) in taskList.process" :key="key">
          <TaskItem :item="item" />
        </span>

        <div class="tasks-complite">
          <div class="tasks-complite__title">Complited</div>
          <span v-for="(item, key) in taskList.complite" :key="key">
            <TaskItem :item="item" />
          </span>
        </div>
      </div>
    </el-main>
  </el-container>
</template>

<script>
import ApiTask from "@/api/task";
import TaskItem from "@/components/Task/Item";
import bus from "vue3-eventbus";
export default {
  data() {
    return {
      form: {
        name: "",
      },
      taskList: {
        complite: [],
        process: [],
      },
      rules: {
        name: [
          {
            required: true,
            message: "Please input task",
            trigger: "blur",
          },
          { max: 255, message: "Length should max is 255", trigger: "blur" },
        ],
      },
      loading: false,
    };
  },
  components: {
    TaskItem,
  },
  methods: {
    addTask(formName = "") {
      this.$refs[formName].validate((valid) => {
        if (valid) {
          try {
            ApiTask.create(this.form).then((responce) => {
              this.getList();
              this.$refs[formName].resetFields();
            });
          } catch (err) {
            this.$message({
              showClose: true,
              message: "Oops, something wrong.",
              type: "error",
            });
          }
        } else {
          return false;
        }
      });
    },
    getList() {
      try {
        ApiTask.getTaskList().then((responce) => {
          this.taskList.process = responce.process;
          this.taskList.complite = responce.complite;
        });
      } catch (err) {
        console.log(err);
      }
    },
  },
  mounted() {
    this.getList();
    bus.on("compliteTask", (e) => this.getList());
    setInterval(() => {
      this.getList();
    }, 300000);
  },
};
</script>
