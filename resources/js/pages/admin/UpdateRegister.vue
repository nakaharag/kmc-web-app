<template>
    <div class="container">
        <div class="card card-default">
            <div class="card-header">Atualizar usuário</div>
            <div class="card-body">
                <div class="alert alert-danger" v-if="has_error && !success">
                    <p v-if="error == 'registration_validation_error'">Confira novamente por favor</p>
                    <p v-else>Não foi possível cadastrar. Tente novamente ou contate o suporte</p>
                </div>
                <form @submit.prevent="save" v-if="!success" method="post">
                    <div class="row">
                      <div class="col-6">
                        <div class="form-group" v-bind:class="{ 'has-error': has_error && errors.nome }">
                          <label for="nome">Nome</label>
                          <input type="text" id="nome" class="form-control" placeholder="Ex: João da Silva" v-model="nome">
                          <span class="help-block" v-if="has_error && errors.nome">{{ errors.nome }}</span>
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group" v-bind:class="{ 'has-error': has_error && errors.email }">
                            <label for="email">E-mail</label>
                            <input type="email" id="email" class="form-control" placeholder="user@example.com" v-model="email">
                            <span class="help-block" v-if="has_error && errors.email">{{ errors.email }}</span>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-2">
                        <div class="form-group" v-bind:class="{ 'has-error': has_error && errors.role }">
                            <label for="role">Perfil</label>
                            <select class="form-control" name="role" id="role" v-model="role">
                              <option value=2>Admin</option>
                              <!--<option value=1>Usuario</option>-->
                              <option value=3>Cliente</option>
                            </select>
                            <span class="help-block" v-if="has_error && errors.role">{{ errors.role }}</span>
                        </div>
                      </div>
                      <div class="col-4">
                        <div class="form-group" v-bind:class="{ 'has-error': has_error && errors.whats }">
                            <label for="whats">Whatsapp</label>
                            <the-mask :mask="['(##) ####-####', '(##) #####-####']" id="whats" class="form-control" placeholder="(99) 99999-9999" v-model="whats"/>
                            <span class="help-block" v-if="has_error && errors.whats">{{ errors.whats }}</span>
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group" v-bind:class="{ 'has-error': has_error && errors.whats }">
                            <label for="empresa">Empresa</label>
                            <select class="form-control" name="empresa" id="empresa" v-model="empresa">
                              <option :key="company.id" v-bind:value="company.id" v-for="company in companies">
                                {{ company.empresa }}
                              </option>
                            </select>
                            <span class="help-block" v-if="has_error && errors.empresa">{{ errors.empresa }}</span>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-6">
                        <div class="form-group" v-bind:class="{ 'has-error': has_error && errors.password }">
                            <label for="password">Senha</label>
                            <input type="password" id="password" class="form-control" placeholder="Mínimo de 5 caracteres" v-model="password">
                            <span class="help-block" v-if="has_error && errors.password">{{ errors.password }}</span>
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group" v-bind:class="{ 'has-error': has_error && errors.password }">
                            <label for="password_confirmation">Confirmação de senha</label>
                            <input type="password" id="password_confirmation" class="form-control" placeholder="Confirme a senha digitada" v-model="password_confirmation">
                        </div>
                      </div>
                    </div>
                    <router-link :to="{ name: 'admin-dashboard'}">Voltar</router-link>
                    <button type="submit" class="btn btn-dark float-right">Enviar</button>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
import {TheMask} from 'vue-the-mask'
  export default {
    data() {
      return {
        nome: '',
        email: '',
        whats: '',
        role: '',
        password: '',
        password_confirmation: '',
        has_error: false,
        error: '',
        errors: {},
        success: false,
        companies: '',
        empresa: ''
      }
    },
    components: {
      TheMask
    },
    methods: {
      save() {
        var app = this
        var data = {
            id: this.$route.params.userId,
            nome: app.nome,
            role: app.role,
            email: app.email,
            password: app.password,
            whats: app.whats,
            id_company: app.empresa,
            password_confirmation: app.password_confirmation

          }
          axios.post('updateUser/', data
          ).then(function (response) {
            if(response.status == 200) {
              alert('Usuario editado com sucesso')
            } else {
              alert('Ocorreu um erro. Verifique novamente')
            }
        })
        .catch(function (error) {
            alert('Ocorreu um erro. Verifique os campos obrigatórios')
            console.log(error)
            app.has_error = true
            app.error = error.response.data.error
            app.errors = error.response.data.errors || {}
        });
    },
    getUser() {
        axios
            .get(`/users/${this.$route.params.userId}`)
            .then(response => {
              console.log(response.data)
              this.nome=response.data.user.nome,
              this.role=response.data.user.role,
              this.email=response.data.user.email,
              this.whats=response.data.user.whats,
              this.empresa=response.data.user.id_company
            });
      }
    },
      mounted () {
        this.$http({
          url: `companies`,
          method: 'GET'
        })
        .then((res) => {
          this.companies = res.data.companies
        }, () => {
          this.has_error = true
        }),

      this.getUser()
    
      }
  }
</script>
<style scoped>
  a { 
    border: 1px solid #73738c;
    padding: 8px;
    margin: 10px;
    background-color: #73738c;
    color: #FFF;
    border-radius: 5px;
    float: left;
  }
  a:hover{
    background-color: #565658;
    text-decoration: none;
    color: #FFF;
  }
  .has-error{
    background-color: #fff5f5;
  }
  .help-block {
    color: red;
    font-size: 15px;
  }
</style>