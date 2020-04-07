<template>
  <div class="row">
    <div class="col-sm-12 py-2">
      <h2>Ubah Mahasiswa</h2>
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
            readonly
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
          <select id="major" name="major_id" class="form-control" v-model="student.major">
            <option :value="null" disabled selected>Pilih jurusan</option>
            <option
              v-for="(major) in majors"
              :key="major.id"
              v-bind:value="major"
            >{{major.id}}.{{ major.code }} - {{ major.name }}</option>
          </select>
        </div>
        <span>{{student.major}}</span>
        <button class="btn btn-primary" type="submit">Simpan</button>
      </form>
    </div>
  </div>
</template>
<script>
import { getStudent,updateStudent, getMajors } from "@/services";
export default {
  name: "EditStudent",
  data: function() {
    return {
      student: {
        id: "",
        name: "",
        major: null
      },
      majors: []
    };
  },
  methods: {
    loadStudent: async function(id) {
      try {
        let resp = await getStudent(id);
        let student = resp.data;
        if (student.major && !student.major.code) {
          student.major = null;
        }
        this.student = student;
        console.log("student");
        console.log(this.student.id);
        console.log("majornya student");
        console.log(this.student.major);
      } catch (err) {
        console.log(err);
      }
    },
    loadMajors: async function() {
      try {
        let resp = await getMajors();
        this.majors = resp.data;
      } catch (err) {
        console.log(err);
      }
    },
    submit: async function(e) {
      e.preventDefault();

      let student = Object.assign({}, this.student);
      student.major_id = this.student.major.id;

      console.log("student yang akan di update");
      console.log(student);
      try {
        let resp = await updateStudent(student);
        if (resp.status >= 200 && resp.status < 300) {
          alert("Mahasiswa telah tersimpan");
          this.$router.push("/students");
        }
      } catch (err) {
        console.error(err);
      }
    }
  },
  mounted: async function() {
    let id = this.$route.params.id;
    await this.loadStudent(id);
    await this.loadMajors();
  }
};
</script>