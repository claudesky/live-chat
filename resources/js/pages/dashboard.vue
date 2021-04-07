<template lang="pug">
.d-flex
  sidebar.flex-grow-1
  message-view.flex-grow-11
</template>
<script>
import sidebar from '../components/sidebar'
import messageView from '../components/message-view'
export default {
  components: {
    'sidebar': sidebar,
    'message-view' : messageView,
  },
  data() {
    return {
    }
  }
}
</script>
