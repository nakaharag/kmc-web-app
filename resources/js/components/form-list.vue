<template>
    <div>
        <div v-if="infos">
        <table class="table">
            <tr>
                <th scope="col">Nome</th>
            </tr>
            <!-- <tr v-for="info in infos" v-bind:key="info.Id" style="margin-bottom: 5px;">
                <router-link :to="{ name: 'survey', params: { formId: info.Id, companyId: companyId, surveyName: info.Name, PostId:info.PostId, formName:info.Name}}">
                    <th scope="row">{{ info.Name }}</th>
                </router-link>
            </tr> -->
            <tr style="margin-bottom: 5px;">
                <router-link :to="{ name: 'survey', params: { formId: '855599f0-145b-425a-9f42-98824b055da4', companyId: companyId, surveyName: 'Triagem de Lead', PostId: '6ea03c04-5c0e-42a8-8c86-722a5be80182', formName: 'Triagem de Lead'}}">
                    <th scope="row">Triagem</th>
                </router-link>
            </tr>
            <tr style="margin-bottom: 5px;">
                <router-link :to="{ name: 'survey', params: { formId: '2844a4bc-9b2f-4698-beed-33a8ac8c5c5e', companyId: companyId, surveyName: 'CAMPANHA DE MARKETING E VENDAS DIAGNÓSTICO INICIAL', PostId: '337d3d70-db3d-436d-8248-51825bb66306', formName: 'CAMPANHA DE MARKETING E VENDAS DIAGNÓSTICO INICIAL'}}">
                    <th scope="row">Diagnóstico inicial</th>
                </router-link>
            </tr>
            <tr style="margin-bottom: 5px;">
                <router-link :to="{ name: 'survey', params: { formId: 'd8db4296-0934-4ff0-a250-ca8ed1c03957', companyId: companyId, surveyName: 'CAMPANHA DE MARKETING E VENDAS DIAGNÓSTICO COMPLETO', PostId: '21b2c8f9-e64e-40ac-bb43-1d53746c3a1e', formName: 'CAMPANHA DE MARKETING E VENDAS DIAGNÓSTICO COMPLETO'}}">
                    <th scope="row">Diagnóstico completo</th>
                </router-link>
            </tr>
            <tr style="margin-bottom: 5px;">
                <router-link :to="{ name: 'survey', params: { formId: '9b542da9-2743-4d87-b7b7-1f8cbce2dea9', companyId: companyId, surveyName: 'Briefing | Mídias', PostId:'138dff87-b58b-4e57-93af-7f08fbb4a740', formName: 'Briefing | Mídias'}}">
                    <th scope="row">Briefing</th>
                </router-link>
            </tr>
        </table>
        </div>
        <div v-else>Carregando...</div>
    </div>
</template>
<script>
export default {
  props: {
    companyId: Number
  },
  data () {
    return {
      infos: null,
    }
  },
  mounted () {
    axios
      .get('https://dxsurvey.com/api/MySurveys/getActive?accessKey=3cf61e0528554c948f6fb4d6864d4c69')
      .then(response => {
          this.infos = response.data
      })
  }
}
</script>
<style scoped>
    a {
        display: contents;
    }
</style>