<template>
<div>
    <div class="alert alert-danger" v-if="has_error">
        <p>Ocorreu um erro ao ler os detalhes de empresa</p>
    </div>
    <div v-if="company">
      <div class="row">
        <div class="col-3">
          <p><strong>Empresa:</strong></p>
          <p><strong>Responsável:</strong></p>
          <p><strong>Setor:</strong></p>
          <p><strong>E-mail:</strong></p>
          <p><strong>Whats:</strong></p>
        </div>
        <div class="col-3">
          <p>{{ company.empresa }}</p>
          <p>{{ company.responsavel }}</p>
          <p>{{ company.setor }}</p>
          <p>{{ company.email }}</p>
          <p>{{ company.whats }}</p>
        </div>
        <div class="col-3">
          <p><strong>Horas contratadas:</strong></p>
          <p><strong>Quantidade de clientes:</strong></p>
          <p><strong>Faturamento:</strong></p>
          <p><strong>Média de margem de lucro:</strong></p>
          <button class="btn btn-danger" @click.prevent="deleteCompany">Apagar</button>
          <router-link :to="{ name: 'edit-company', params: { companyId: company.id }}">
            <button class="btn btn-secondary">Editar</button>
          </router-link>
        </div>
        <div class="col-3">
          <p>{{ company.horas }}</p>
          <p>{{ company.clientes }}</p>
          <p>{{ company.faturamento }}</p>
          <p>{{ company.margem }}</p>
        </div>
      </div>
    </div>
    <div v-else>Carregando...</div>
</div>
</template>
<script>
  export default {
    data() {
      return {
        has_error: false,
        company: null
      }
    },
    mounted() {
      this.getCompany()
    },
    methods: {
      getCompany() {
        axios
            .get(`/companies/${this.$route.params.companyId}`)
            .then(response => {
                this.company = response.data.company
            });
      },
      deleteCompany(){
        axios
            .delete(`/companies/${this.$route.params.companyId}`)
            .then(response => {
                if(response.statusText == 'OK') {
                  this.$router.go(-1)
                }
            });
      }
    }

  }
</script>
<style scoped>
    a {
        display: contents;
    }
</style>