<template lang="html">
  <div class="">

    <div class="container-fluid well well-sm">
      <form @submit.prevent="addData" class="form-inline" method="post">
        <div class="col-md-3 form-group">
          <label for="name">Nama Layanan</label>
          <input v-model="add.name" type="text" class="form-control" id="" placeholder="">
        </div>
        <div class="col-md-3 form-group">
          <label for="description">Keterangan</label>
          <input v-model="add.description" type="text" class="form-control" id="" placeholder="">
        </div>
        <div class="col-md-2">
          <button  class="btn btn-primary" type="submit" name="button">Tambah</button>
        </div>
      </form>
    </div>

    <div class="container-fluid">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Nama Layanan</th>
            <th>Keterangan</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="service in services">
            <td v-show="showForm(service.id)">{{service.name}}</td>
            <td v-show="!showForm(service.id)">
              <input type="text" name="service" v-model='dataEdit.name'>
            </td>
            <td v-show="showForm(service.id)">{{service.description}}</td>
            <td v-show="!showForm(service.id)">
              <input type="text" name="service" v-model='dataEdit.description'>
            </td>
            <td>
              <button v-show="showForm(service.id)" @click="editData(service.id)" class="bs3-button" type="button" name="button">
                <i class="fa fa-pencil"></i>
              </button>
              <button v-show="showForm(service.id)" @click="deleteData(service.id)" class="bs3-button" type="button" name="button">
                <i class="fa fa-times"></i>
              </button>

              <button @click="updateData(service.id)" class="btn-success" type="submit" v-show="!showForm(service.id)">
                <i class="fa fa-check"></i>
              </button>
              <button @click.prevent="editForm=false" v-show="!showForm(service.id)" class="btn-danger" type="button" name="button">
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

      add:{
        name:"",
        description:""
      },

      editForm:"",
      dataEdit:{
        name:"",
        description:""
      }

    }
  },
  methods:{
    indexData(){
      axios.get('/service-api')
      .then(response=>{
        this.services=response.data;
        console.log(response);
      })
    },

    addData(){
      axios.post('/service-api',this.add)
      .then(response=>{
        console.log(response);
        this.indexData();
      })
    },

    showForm(id){
      if(this.editForm==id){
        return false;
      }
      return true;
    },

    editData(id){
      this.services.forEach((service,i)=>{
        if(service.id==id){
          this.dataEdit=service;
        }
      });
      return this.editForm=id;
    },

    updateData(id){
      axios.put('/service-api/'+id,this.dataEdit)
      .then(response=>{
        console.log(response);
        this.editForm=false;
        this.editData="";
        this.indexData();
      })
      .catch(error=>{
        console.log(error.response);
      })
    },

    deleteData(id){
      axios.delete('/service-api/'+id)
      .then(response=>{
        console.log(response);
        this.indexData();
      })
    }
  },
  mounted(){
    this.indexData();
  }
}
</script>

<style lang="css">
</style>
