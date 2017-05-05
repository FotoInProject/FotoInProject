<template lang="html">
  <form class="form-horizontal" method="post">
    <div class="form-group">
        <label for="name" class="col-md-2 control-label">Nama</label>
        <div class="col-md-4">
          <input v-show="!showEdit(profiles.id)" v-model="profiles.name" name="name" type="text" class="form-control" disabled />
          <input v-show="showEdit(profiles.id)" v-model="editData.name" name="name" type="text" class="form-control" required/>
        </div>
    </div>
    <div class="form-group">
        <label for="name" class="col-md-2 control-label">Tanggal lahir</label>
        <div class="col-md-4">
          <input v-show="!showEdit(profiles.id)" v-model="profiles.birthdate" name="birthdate" type="date" class="form-control" disabled/>
          <input v-show="showEdit(profiles.id)" v-model="editData.birthdate" name="birthdate" type="date" class="form-control" required/>
        </div>
    </div>
    <div class="form-group">
        <label for="name" class="col-md-2 control-label">Jenis Kelamin</label>
        <div class="col-md-4">
          <select v-show="!showEdit(profiles.id)" class="form-control" name="gender" disabled>
            <option>{{profiles.gender}}</option>
          </select>
          <select v-show="showEdit(profiles.id)" v-model="editData.gender" class="form-control" name="gender" required>
            <option>{{profiles.gender}}</option>
            <option>Laki-Laki</option>
            <option>Perempuan</option>
          </select>
        </div>
    </div>
    <div class="form-group">
        <div v-show="!showEdit(profiles.id)" class="col-md-offset-2 col-md-4">
            <button  @click="editIt(profiles.id)" type="button" class="btn btn-primary btn-block" >
                Edit
            </button>
        </div>
        <div v-show="showEdit(profiles.id)" class="col-md-offset-2 col-md-2">
          <button @click.prevent="editForm=false" type="submit" class="btn btn-danger btn-block">
              Batal
          </button>
        </div>
        <div v-show="showEdit(profiles.id)" class="col-md-2">
          <button @click="updateIt(profiles.id)" type="button" class="btn btn-primary btn-block">
              Simpan
          </button>
        </div>

    </div>
  </form>
</template>

<script>
export default {
  data(){
    return{
      profiles:[],

      editForm:"",

      editData:{
        nama:'',
        birthdate:'',
        gender:'',
      }
    }
  },
  methods:{
    getProfile(){
      // this.loading=true;
      axios.get('/profile-api')
      .then((response)=>{
        this.profiles=response.data;
        // this.loading=false;
        console.log(response);
      })
    },

    editIt(id){
      this.editData=this.profiles;
      return this.editForm=id;
    },

    showEdit(id){
      if(this.editForm==id){
        return true;
      }
      return false;
    },

    updateIt(id){
      axios.put('/profile-api/'+id,this.editData)
      .then(response=>{
        this.editForm=false;
        // this.editData=this.profiles;
        // this.push('/indexstokperdana');
        console.log(response);
      })
      .catch(error=>{
        console.log(error.response);
      })
      this.getProfile();
    },

  },
  mounted(){
    this.getProfile();
  }
}
</script>

<style lang="css">
</style>
