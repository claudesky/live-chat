<template lang="pug">
nav.navbar.navbar-expand-lg.navbar-light.bg-white
  a.navbar-brand(href='#') Navbar
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
  data() {
    return {
      links: [
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
    }
  }
}
</script>
<style scoped>
</style>
