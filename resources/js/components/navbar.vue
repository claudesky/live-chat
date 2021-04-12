<template lang="pug">
nav.navbar.navbar-expand-lg.navbar-light.bg-white
  a.navbar-brand(href='#') {{ title }}
  .collapse.navbar-collapse.justify-content-end
    .navbar-nav
      router-link(
        v-for="link in links"
        :key="link.text"
        :to="link.route"
      ).nav-item.nav-link.mx-1.text-capitalize
        | {{ link.text }}

</template>
<script>
export default {
  props: {
    title: {
      type: String,
      default: ''
    }
  },
  data() {
    return {
    }
  },
  computed: {
    'is_logged_in': function() {
      return this.$store.getters['self/isLoggedIn']
    },
    'links': function() {
      let common_links = [
      ]

      let guest_links = [
        {
          'text': 'home',
          'route': {name: 'home'},
        },
        {
          'text': 'login',
          'route': {name: 'login'},
        },
        {
          'text': 'register',
          'route': {name: 'register'},
        },
      ]

      let authorized_links = [
        {
          'text': 'logout',
          'route': {name: 'logout'},
        },
      ]

      if (this.is_logged_in) {
        return [
          ...common_links,
          ...authorized_links,
        ]
      } else {
        return [
          ...common_links,
          ...guest_links,
        ]
      }
    }
  }
}
</script>
<style scoped>
</style>
