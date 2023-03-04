import API from '.';
export default {
    getTaskList: (params) => {
        return API.get('/tasks/list', {
            params
        });
    },
    create: (params) => {
        return API.post(`/tasks/create`, params)
    },
    complite: (id) => {
        return API.put(`/tasks/${id}/complite`)
    },
    deleteTask: (id) => {
        return API.delete(`/tasks/${id}/delete`)
    },
}