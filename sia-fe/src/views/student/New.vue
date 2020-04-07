<template>
  <div class="row">
    <div class="col-sm-12 py-2">
      <h2>Tambah Mahasiswa</h2>
    </div>
    <div class="col-sm-12 py-2">
      <form @submit="submit">
        <div class="form-group">
          <label for="id">NIM</label>
          <input
            type="text"
            class="form-control"
            id="nim"
            name="id"
            placeholder="NIM"
            v-model="student.id"
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
            v-model="student.name"
          />
        </div>
        <div class="form-group">
          <label for="major">Jurusan</label>
          <select id="major" name="major_id" class="form-control" v-model="student.major_id">
            <option :value="null" disabled selected>Pilih jurusan</option>
            <option
              v-for="(major) in majors"
              :key="major.id"
              :value="major.id"
            >{{ major.code }} - {{ major.name }}</option>
          </select>
        </div>
        
        <button class="btn btn-primary" type="submit">Simpan</button>
      </form>
    </div>
  </div>
</template>


<script>
import { createStudent, getMajors } from "@/services";
export default {
  name: "NewStudent",
  data: function() {
    return {
      student: {
        id: "",
        name: "",
        major_id: ""
      },
      majors: []
    };
  },
  methods: {
    loadMajor: async function() {
      try {
        let resp = await getMajors();
        this.majors = resp.data;
        console.log(resp.data);
      } catch (err) {
        console.error(err);
      }
    },
    submit: async function(e) {
      e.preventDefault();
      let student =  this.student;
      try {
        let resp = await createStudent(student);
        if (resp.status >= 200 && resp.status < 300) {
          alert("Student baru telah dibuat");
          this.$router.push("/students");
        }
      } catch (err) {
        console.error(err);
      }
    }
  },
  mounted: async function() {
    console.log("mounted");
    this.loadMajor();
  }
};
</script>