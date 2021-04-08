<template lang="pug">
.d-flex.flex-column.p-5
  .card.border-0.main-card
    .card-body.d-flex.flex-column
      .card-title
        h4 Invite someone to chat
      div.d-inline-block.align-self-end
        input(
          placeholder="Search"
        )
        button Search
      .d-flex.flex-wrap.justify-content-around.p-5
        user-card(
          v-for="i in 12"
          :key="i"
        )
</template>
<script>
import userCard from '../../components/user-card'
export default {
  components: {
    'user-card': userCard,
  }
}
</script>
<style>
.main-card {
  min-height: 20rem;
}
.user-card>img {
  width: 7rem;
}
</style>
