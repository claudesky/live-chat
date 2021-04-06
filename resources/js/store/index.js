import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

import self from './self'

const store = new Vuex.Store({
  modules: {
    self,
  }
})

export default store
