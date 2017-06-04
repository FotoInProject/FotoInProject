<template lang="html">
  <div class="">
    <div class="side-tab">
      <button @click="clickTab(1)" type="button" class="btn btn-primary" name="button">Biodata Diri</button>
      <button @click="clickTab(2)" type="button" class="btn btn-primary" name="button">Alamat</button>
      <button @click="clickTab(3)" type="button" class="btn btn-primary" name="button">Akun</button>
      <button @click="clickTab(4)" type="button" class="btn btn-primary" name="button">Rekening Bank</button>
    </div>
    <div class="content-profile">
        <personaldata v-show="showContentProfile(1)"></personaldata>
        <addressdata v-show="showContentProfile(2)"></addressdata>
        <addressdata v-show="showContentProfile(3)"></addressdata>
        <addressdata v-show="showContentProfile(4)"></addressdata>
    </div>
  </div>
</template>

<script>
export default {
  data(){
    return{
      tab:"",
    }
  },
  methods:{
    clickTab(n){
      return this.tab=n;
    },

    showContentProfile(n){
      if(this.tab==n){
        return true;
      }
      return false;
    },
  },
  mounted(){
    this.tab=1;
    this.showContentProfile(1);
  }
}
</script>

<style lang="css">
</style>
