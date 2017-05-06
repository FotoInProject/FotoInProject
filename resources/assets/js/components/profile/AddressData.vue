<template lang="html">
  <form class="form-horizontal" method="post">
    <div class="form-group">
        <label for="name" class="col-md-2 control-label">Provinsi</label>
        <div class="col-md-4">
          <select v-show="!showEdit(profiles.id)" class="form-control" name="province" disabled>
            <option>{{profiles.province}}</option>
          </select>
          <select v-show="showEdit(profiles.id)" v-model="editData.province" class="form-control" name="province" required>
            <option>{{profiles.province}}</option>
            <option>Kalimantan Timur</option>
          </select>
        </div>
    </div>
    <div class="form-group">
        <label for="name" class="col-md-2 control-label">Kota/Kabupaten</label>
        <div class="col-md-4">
          <select v-show="!showEdit(profiles.id)" class="form-control" name="city" disabled>
            <option>{{profiles.city}}</option>
          </select>
          <select v-show="showEdit(profiles.id)" v-model="editData.city" class="form-control" name="city" required>
            <option>{{profiles.city}}</option>
            <option>Balikpapan</option>
          </select>
        </div>
    </div>
    <div class="form-group">
        <label for="name" class="col-md-2 control-label">Kecamatan</label>
        <div class="col-md-4">
          <select v-show="!showEdit(profiles.id)" class="form-control" name="districts" disabled>
            <option>{{profiles.districts}}</option>
          </select>
          <select v-show="showEdit(profiles.id)" v-model="editData.districts" class="form-control" name="districts" required>
            <option>{{profiles.districts}}</option>
            <option>Balikpapan Utara</option>
            <option>Balikpapan Timur</option>
            <option>Balikpapan Selatan</option>
            <option>Balikpapan Barat</option>
          </select>
        </div>
    </div>
    <div class="form-group">
        <label for="name" class="col-md-2 control-label">Alamat</label>
        <div class="col-md-4">
          <textarea v-show="!showEdit(profiles.id)" v-model="profiles.address" name="address" rows="3" cols="80" class="form-control" disabled></textarea>
          <textarea v-show="showEdit(profiles.id)" v-model="editData.address" name="address" rows="3" cols="80" class="form-control" required></textarea>
        </div>
    </div>
    <div class="form-group">
        <label for="name" class="col-md-2 control-label">Kode Post</label>
        <div class="col-md-4">
          <input v-show="!showEdit(profiles.id)" v-model="profiles.postcode" name="postcode" type="number" class="form-control" disabled />
          <input v-show="showEdit(profiles.id)" v-model="editData.postcode" name="postcode" type="number" class="form-control" required/>
        </div>
    </div>
    <div class="form-group">
        <label for="name" class="col-md-2 control-label">No. Handphone</label>
        <div class="col-md-4">
          <input v-show="!showEdit(profiles.id)" v-model="profiles.phone" name="phone" type="number" class="form-control" disabled />
          <input v-show="showEdit(profiles.id)" v-model="editData.phone" name="phone" type="number" class="form-control" required/>
        </div>
    </div>
    <div class="form-group">
        <div v-show="!showEdit(profiles.id)" class="col-md-offset-2 col-md-4">
            <button  @click="editIt(profiles.id)" type="button" class="btn btn-primary btn-block" >
                Ubah
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
        province:'',
        city:'',
        districts:'',
        address:'',
        postcode:'',
        phone:'',
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
