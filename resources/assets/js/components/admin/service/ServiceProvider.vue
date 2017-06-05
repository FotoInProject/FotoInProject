<template lang="html">
  <div class="container-fluid">
    <button class="btn btn-primary" type="button" name="button" data-toggle="modal" data-target="#addServiceProvider">Tambah Penyedia Layanan</button>
    <div class="modal fade" id="addServiceProvider" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="">Tambah Penyedia Layanan</h4>
          </div>
          <div class="modal-body">
            <div class="container-fluid">
              <label for="service_name">Nama Layanan</label>
              <select  class="form-control" name="service_id" v-model="add.service_id">
                <option  v-for="service in services" v-bind:value="service.id">
                  {{service.name}}
                </option>
              </select>

              <div class="well">
                <label for="service_provider_name">Nama Penyedia</label>
                <input @keyup="indexUser()" v-model="searchUser.name" class="form-control" type="text" name="search" placeholder="Cari pengguna">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th></th>
                      <th>Nama</th>
                      <th>Email</th>
                      <th>Avatar</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for='user in users'>
                      <td><input type="radio" name="user_id" v-model='add.user_id' v-bind:value="user.id"></td>
                      <td>{{user.name}}</td>
                      <td>{{user.email}}</td>
                      <td>{{user.avatar}}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            <button @click="addData()" type="button" class="btn btn-primary">Tambah</button>
          </div>
        </div>
      </div>
    </div>

    <div class="well">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Nama</th>
            <th>Email</th>
            <th>Layanan</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="serviceProvider in serviceProviders">
            <td>{{serviceProvider.user.name}}</td>
            <td>{{serviceProvider.user.email}}</td>
            <td v-show="showForm(serviceProvider.id)">{{serviceProvider.service.name}}</td>
            <td v-show="!showForm(serviceProvider.id)">
              <select  class="form-control" name="service_id" v-model="edit.service_id">
                <option  v-for="service in services" v-bind:value="service.id">
                  {{service.name}}
                </option>
              </select>
            </td>

            <td>
                <button v-show="showForm(serviceProvider.id)" @click="editData(serviceProvider.id)" class="bs3-button" type="button" name="button">
                  <i class="fa fa-pencil"></i>
                </button>
                <button v-show="showForm(serviceProvider.id)" @click="deleteData(serviceProvider.id)" class="bs3-button" type="button" name="button">
                  <i class="fa fa-times"></i>
                </button>

                <button @click="updateData(serviceProvider.id)" class="btn-success" type="submit" v-show="!showForm(serviceProvider.id)">
                  <i class="fa fa-check"></i>
                </button>
                <button @click.prevent="editForm=false" v-show="!showForm(serviceProvider.id)" class="btn-danger" type="button" name="button">
                  <i class="fa fa-times"></i>
                </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
export default {
  data(){
    return{
      services:[],
      users:[],
      serviceProviders:[],

      searchUser:{
        name:""
      },

      add:{
        service_id:"",
        user_id:""
      },

      edit:{
        service_id:"",
      },

      editForm:"",

    }
  },
  methods:{
      indexService(){
        axios.get('/service-api')
        .then(response=>{
          this.services=response.data;
          console.log(response);
        });
      },

      indexUser(){
        axios.get(`${/user-api/}?name=${this.searchUser.name}`)
        .then(response=>{
          this.users=response.data;
          console.log(response);
        });
      },

      addData(){
        axios.post('/serviceprovider-api',this.add)
        .then(response=>{
          console.log(response);
          this.indexServiceProvider();
        })
      },

      indexServiceProvider(){
        axios.get('/serviceprovider-api')
        .then(response=>{
          this.serviceProviders=response.data;
          console.log(response);
        });
      },

      showForm(id){
        if(this.editForm==id){
          return false;
        }
        return true;
      },

      editData(id){
        this.serviceProviders.forEach((serviceProvider,i)=>{
          if(serviceProvider.id==id){
            this.edit=serviceProvider;
          }
        });
        return this.editForm=id;
      },

      updateData(id){
        axios.put('/serviceprovider-api/'+id,this.edit)
        .then(response=>{
          console.log(response);
          this.editForm=false;
          this.indexServiceProvider();
        })
        .catch(error=>{
          console.log(error.response);
        })
      },

      deleteData(id){
        axios.delete('/serviceprovider-api/'+id)
        .then(response=>{
          console.log(response);
          this.indexServiceProvider();
        })
      }

  },
  mounted(){
    this.indexService();
    this.indexUser();
    this.indexServiceProvider();
  }
}
</script>

<style lang="css">
</style>
