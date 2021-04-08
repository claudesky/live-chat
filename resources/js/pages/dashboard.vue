<template lang="pug">
.h-100.d-flex
  sidebar.sidebar
  router-view.flex-grow-1
</template>
<script>
import sidebar from '../components/sidebar'
export default {
  components: {
    'sidebar': sidebar,
  },
  data() {
    return {
    }
  }
}
</script>
<style scoped>
.sidebar {
  max-width: 24rem;
  min-width: 24rem;
}
</style>
