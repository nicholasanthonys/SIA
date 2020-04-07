<template>
  <div class="row">
    <div class="col-sm-12 py-2">
      <h2>Edit Jurusan</h2>
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
import { getMajor, updateMajor } from "@/services";
export default {
  name: "EditMajor",
  data: function() {
    return {
      major: {
        id: "",
        name: "",
        code: ""
      }
    };
  },
  mounted: async function() {
    try {
      let id = this.$route.params.id;
      let resp = await getMajor(id);
      this.major = resp.data;
      this.major.id = id;
    } catch (err) {
      console.log(err);
    }
  },
  methods: {
    submit: async function(e) {
      e.preventDefault();
      let major = Object.assign({},this.major)
      try{
        let resp = await updateMajor(major)
        if(resp.status >= 200 && resp.status < 300){
          alert('jurusan telah diubah')
          this.$router.push('/majors')
        }
      }catch(err){
        console.log(err)
      }
    }
  }
};
</script>