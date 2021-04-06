<template lang="pug">
.container
  h1.text-center.my-5 Login
  .card.my-5
    .card-body
      form(
        @submit.prevent="submitLoginForm"
      )
        .form-group
          label(for="email") Email address
          input(
            type="email"
            name="email"
            required
            v-model="form_data.email"
          )#email.form-control
        .form-group
          label(for="password") Password
          input(
            type="password"
            name="password"
            required
            v-model="form_data.password"
          )#password.form-control
        button(type="submit").btn.btn-primary Login
</template>
<script>
export default {
  data() {
    return {
      form_data: {
        email: '',
        password: '',
      }
    }
  },
  methods: {
    submitLoginForm: function() {
      this.$store
        .dispatch('self/login', this.form_data)
        .then(response => {
          console.log(response)
        })
    }
  }
}
</script>
