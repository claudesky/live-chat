<template lang="pug">
div.d-grid.basic-grid.main-container
  navbar(
    :title="title"
  )
  main.container-fluid.bg-light
    router-view
  end-footer
</template>
<script>
import navbar from './components/navbar'
import endFooter from './components/end-footer'
export default {
  components: {
    navbar,
    'end-footer': endFooter,
  },
  data() {
    return {
      title: 'Live-Chat',
      emojis: [
        '🤷‍♀️',
        '🙌',
        '🤞',
        '🥺️',
        '🍔',
        '🌮',
        '🍕',
        '🌱',
      ]
    }
  },
  methods: {
    change_emoji() {
    let random_emoji = this.emojis[Math.floor(Math.random() * this.emojis.length)];
    this.title = 'Live-Chat ' + random_emoji
    }
  },
};
</script>
<style scoped>
.d-grid {
  display: grid;
}
.basic-grid {
  grid-template-columns: 100%;
  grid-template-rows: 3rem auto 2.5rem;
  grid-template-areas: 
    "navbar"
    "content"
    "footer";
}
.main-container {
  height: 100vh;
}
</style>
