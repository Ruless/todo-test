<template>
  <div class="tasks-item">
    <div class="tasks-item__checkbox" @click="compliteTask(item)">
      <el-icon v-if="item.complite">
        <component :is="'SuccessFilled'" />
      </el-icon>
    </div>
    <div class="tasks-item-info">
      <p class="tasks-item__name">{{ item.name }}</p>
    </div>
    <div class="tasks-item-controll">
      <el-popconfirm
        title="Are you sure to delete this?"
        @confirm="deleteTask(item)"
      >
        <template #reference>
          <el-button type="danger" plain> Delete </el-button>
        </template>
      </el-popconfirm>
    </div>
  </div>
</template>

<script>
import ApiTask from "@/api/task";
import bus from "vue3-eventbus";
import _ from "lodash";

export default {
  props: {
    item: {
      default: () => {},
      type: Object,
    },
  },
  data() {
    return {};
  },
  methods: {
    compliteTask(elem) {
      ApiTask.complite(elem.id);
      bus.emit("compliteTask", Number(elem.id));
    },
    deleteTask(elem) {
      ApiTask.deleteTask(elem.id);
      bus.emit("compliteTask", Number(elem.id));
    },
  },
};
</script>