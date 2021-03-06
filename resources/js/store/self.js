import axios from "axios";

export default {
  namespaced: true,
  state: () => ({
    first_load: true,
    logged_in: false,
    id: null,
    email: '',
    name: '',
  }),
  mutations: {
    done_first_load(state) {
      state.first_load = false
    },
    login(state, user_data) {
      state.logged_in = true;
      state.id = user_data.id;
      state.email = user_data.email;
      state.name = user_data.name;
    },
    logout(state) {
      state.logged_in = false;
      state.id = null;
      state.email = '';
      state.name = '';
    },
  },
  actions: {
    async check({commit}) {
      return axios
        .get('/api/self')
        .then(response => {
          commit('login', response.data)
          return true
        })
        .catch(error => {
          commit('logout')
          return false
        })
        .finally(() => {
          commit('done_first_load')
        })
    },
    async login({commit}, form_data) {
      return axios
        .post(
          '/api/login',
          form_data
        )
        .then(response => {
          commit('login', response.data)
          return response
        })
    },
    logout({commit}) {
      return axios
        .post(
          '/api/logout',
          {}
        )
        .then((response) => {
          commit('logout')
          return true
        })
    }
  },
  getters: {
    isLoggedIn: state => {
      return state.logged_in
    },
    isFirstLoad: state => {
      return state.first_load
    },
  }
}
