<template lang="pug">
.container
  h1.text-center.my-5 Register
  .card.my-5
    .card-body
      form(
        @submit.prevent="submitRegistrationForm"
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
          label(for="name") Name
          input(
            name="name"
            required
            v-model="form_data.name"
          )#name.form-control
        .form-group
          label(for="password") Password
          input(
            type="password"
            name="password"
            required
            v-model="form_data.password"
          )#password.form-control
        .form-group
          label(for="password-confirmation") Confirm Password
          input(
            type="password"
            name="password_confirmation"
            required
            v-model="form_data.password_confirmation"
          )#password-confirmation.form-control
        button(type="submit").btn.btn-primary Submit

</template>
<script>
export default {
  data() {
    return {
      form_data: {
        email: '',
        name: '',
        password: '',
        password_confirmation: '',
      }
    }
  },
  methods: {
    submitRegistrationForm: function() {
      axios.post('/api/register', this.form_data)
    }
  }
}
</script>
