<template lang="pug">
.d-flex-flex-column.user-card.card.p-3.m-3(
  @click="startMessageRequest"
)
  img.rounded-circle(
    src="/image/test-user.png"
  )
  h5.text-center.m-3 User
</template>
<script>
export default {
  methods: {
    startMessageRequest() {
      this.$router.push({name: 'new-request', params: {respondent_id: '123'}})
    }
  }
}
</script>
