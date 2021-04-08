<template lang="pug">
.d-flex.flex-column
  div
    form
      input(
        placeholder="search"
      )
      button(
        type="submit"
      ) Search
  room-card(
    v-for="i in 12"
    :key="i"
  )
  div.mt-auto
    router-link(
      tag="button"
      :to="{name: 'discover'}"
    ) Discover
</template>
<script>
import roomCard from '../components/room-card'
export default {
  components: {
    'room-card': roomCard,
  }
}
</script>
