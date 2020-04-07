<template>
  <div class="row">
    <div class="col-sm-12 py-2">
      <h2>Jurusan Baru</h2>
    </div>
    <div class="col-sm-12 py-2">
      <form @submit="submit">
        <div class="form-group">
          <label for="code">Kode</label>
          <input
            type="text"
            class="form-control"
            id="code"
            name="code"
            placeholder="Kode"
            v-model="major.code"
          />
        </div>
        <div class="form-group">
          <label for="name">Nama</label>
          <input
            type="text"
            class="form-control"
            id="name"
            name="name"
            placeholder="Nama"
            v-model="major.name"
          />
        </div>
        <button class="btn btn-primary" type="submit">Simpan</button>
      </form>
    </div>
  </div>
</template>

<script>
import {createMajor} from "@/services";
export default {
  name: "NewMajor",
  data: () => {
    return {
      major: {
        name: '',
        code: ''
      }
    };
  },
  methods: {
    submit: async function(e) {
        e.preventDefault()
        try {
          let resp =   await createMajor(this.major)
          if(resp.status >= 200 && resp.status < 300){
              alert('jurusan telah disimpan')
              this.$router.push('/majors')
          }else{
              console.log('insert gagal')
          }
        }catch(err){
            console.log(err)
        }
        
    }
  }
};
</script>