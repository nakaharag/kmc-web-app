<template>
    <div class="container">
        <div class="card card-default w-50 clearfix p-1 mt-5 mx-auto">
            <div class="card-header">Login</div>
            <div class="card-body">
                <div class="alert alert-danger" v-if="has_error">
                    <p>Ocorreu um erro. Verifique o login e tente novamente</p>
                </div>
                <form autocomplete="off" @submit.prevent="login" method="post">
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" id="email" class="form-control" placeholder="user@example.com" v-model="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Senha</label>
                        <input type="password" id="password" class="form-control" v-model="password" required>
                    </div>
                    <button type="submit" class="btn btn-dark">Entrar</button>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
  export default {
    data() {
      return {
        email: null,
        password: null,
        has_error: false
      }
    },
    mounted() {
      //
    },
    methods: {
      login() {
        // get the redirect object
        //var redirect = this.$auth.redirect()
        var app = this
        this.$auth.login({
          params: {
            email: app.email,
            password: app.password
          },
          success: function() {
            // handle redirection
            // old wordking = const redirectTo = redirect ? redirect.from.name : this.$auth.user().role === 2 ? 'admin-dashboard' : 'dashboard'
            const redirectTo = '';
            
            if(app.$auth.user().role === 2){
              redirectTo = redirect ? redirect.from.name : 'admin-dashboard'
            } else if(app.$auth.user().role === 1){
              redirectTo = redirect ? redirect.from.name : 'admin-dashboard' 
            } else if(app.$auth.user().role === 3){
              redirectTo = redirect ? redirect.from.name : 'client-dashboard'
            }

            app.$router.push({name: redirectTo})
          },
          error: function() {
            app.has_error = true
          },
          rememberMe: true,
          fetchUser: true
        })
      }
    }
  }
</script>