<template lang="pug">
.container.p-5.align-center
  h1.text-center Welcome to Live Chat
  p.text-center
    | An app where anyone can register and start chatting with friends
    br
    | There are also rooms for you to join to hang out with your fam
    br
    br
    router-link(
      tag="a"
      :to="{name: 'register'}"
    ) Sign-up
    |  now or 
    router-link(
      tag="a"
      :to="{name: 'login'}"
    ) login
    |  if you already have an account
  div.d-flex.justify-content-center
    img.p-5.home-image(
      src="/image/home_image.svg"
    )
</template>
<script>
export default {
  data() {
    return {
    }
  }
}
</script>
<style scoped>
.home-image {
  height: 640px;
}
</style>
