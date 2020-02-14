<template>
   <div class="container" :v-if="this.$attrs.empresaId">
         <div class="container p-2">
            <form @submit.prevent="gravar" method="post">
               <h5>Mídias Sociais:</h5>
                  <div class="row">
                      <div class="col-2">
                        <p>Facebook</p>
                      </div>
                      <div class="col-6">
                        <div class="form-group">
                          <label for="fans_face">Quantidade de Fans</label>
                          <input type="text" name="fans_face" id="fans_face" v-model="fans_face"  class="form-control">
                        </div>
                      </div>
                      <div class="col-4">
                        <div class="form-group">
                           <label for="date-picker" class="control-label d-block">Data</label>
                           <template>
                              <date-picker v-model="data_face" :format="momentForamt"></date-picker>
                           </template>
                        </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-2">
                        <p>Instagram</p>
                      </div>
                      <div class="col-6">
                        <div class="form-group">
                          <label for="seguidores_insta">Quantidade de seguidores</label>
                          <input type="text" name="seguidores_insta" id="seguidores_insta" v-model="seguidores_insta"  class="form-control">
                        </div>
                      </div>
                      <div class="col-4">
                        <div class="form-group">
                           <label for="date-picker" class="control-label d-block">Data</label>
                           <template>
                              <date-picker v-model="data_insta" :format="momentForamt"></date-picker>
                           </template>
                        </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-2">
                        <p>Linkedin</p>
                      </div>
                      <div class="col-6">
                        <div class="form-group">
                          <label for="contatos_linkedin">Quantidade de contatos</label>
                          <input type="text" name="contatos_linkedin" id="contatos_linkedin" v-model="contatos_linkedin"  class="form-control">
                        </div>
                      </div>
                      <div class="col-4">
                        <div class="form-group">
                           <label for="date-picker" class="control-label d-block">Data</label>
                           <template>
                              <date-picker v-model="data_contatos_linkedin" :format="momentForamt"></date-picker>
                           </template>
                        </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-2">
                        <p>Youtube</p>
                      </div>
                      <div class="col-6">
                        <div class="form-group">
                          <label for="inscritos">Quantidade de inscritos</label>
                          <input type="text" name="inscritos" id="inscritos" v-model="inscritos"  class="form-control">
                        </div>
                      </div>
                      <div class="col-4">
                        <div class="form-group">
                           <label for="date-picker" class="control-label d-block">Data</label>
                           <template>
                              <date-picker v-model="data_youtube" :format="momentForamt"></date-picker>
                           </template>
                        </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-2">
                        <p>Twitter</p>
                      </div>
                      <div class="col-6">
                        <div class="form-group">
                          <label for="seguidores_twitter">Quantidade de seguidores</label>
                          <input type="text" name="seguidores_twitter" id="seguidores_twitter" v-model="seguidores_twitter"  class="form-control">
                        </div>
                      </div>
                      <div class="col-4">
                        <div class="form-group">
                           <label for="date-picker" class="control-label d-block">Data</label>
                           <template>
                              <date-picker v-model="data_seguidores" :format="momentForamt"></date-picker>
                           </template>
                        </div>
                      </div>
                  </div>
               <button type="submit" class="btn btn-light float-right">Gravar</button>
            </form>
         </div>
   </div>
</template>
<script>
import "vue2-datepicker/index.css";
import "vue2-datepicker/locale/pt-br";

export default {
  data() {
    return {
        data_face: null,
        data_insta: null,
        data_contatos_linkedin: null,
        data_youtube: null,
        data_seguidores: null,
        fans_face: null,
      seguidores_insta: null,
      contatos_linkedin: null,
      inscritos: null,
      seguidores_twitter: null,
        momentForamt: {
         // Date to String
         stringify: date => {
            return date ? moment(date).format("DD/MM/YYYY") : "";
         },
         // String to Date
         parse: value => {
            return value ? moment(value, "DD").toDate() : null;
         }
      }
    };
    components: {
        VueNumericInput
    }
  },
    methods: {
      gravar() {
        var app = this
        var date_face = moment(app.date_face).format("YYYY-MM-DD HH:mm:ss");
        var date_insta = moment(app.date_insta).format("YYYY-MM-DD HH:mm:ss");
        var date_contatos_linkedin = moment(app.date_contatos_linkedin).format("YYYY-MM-DD HH:mm:ss");
        var date_youtube = moment(app.date_youtube).format("YYYY-MM-DD HH:mm:ss");
        var date_seguidores = moment(app.date_seguidores).format("YYYY-MM-DD HH:mm:ss");
        var data = {
            data_face: date_face,
            data_insta: date_insta,
            data_contatos_linkedin: date_contatos_linkedin,
            data_youtube: date_youtube,
            data_seguidores: date_seguidores,
            fans_face: app.fans_face,
            seguidores_insta: app.seguidores_insta,
            contatos_linkedin: app.contatos_linkedin,
            inscritos: app.inscritos,
            seguidores_twitter: app.seguidores_twitter,
            company_id: this.$attrs.empresaId
          }
          axios.post('seguidores', data
      ).catch(function (error) {
        console.log(error);
      }).then(
        //this.$router.go(-1)
        alert('Cadastro realizado com sucesso'),
        app.tempo = 0,
        app.date = null,
        app.fans_face = null,
        app.seguidores_insta = null,
        app.contatos_linkedin = null,
        app.inscritos = null,
        app.seguidores_twitter = null,
      );
      }
    },
};
</script>