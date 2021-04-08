<template lang="pug">
  .room-card(
    @click="openRoom"
  ) I am a room
</template>
<script>
export default {
  methods: {
    openRoom() {
      this.$router.push({name: 'messages', params: {room_id: '123'}})
    }
  }
}
</script>
<style scoped>
.room-card {
  cursor: pointer;
}
</style>
