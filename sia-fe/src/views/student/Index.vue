<template>
  <div class="row">
    <div class="col-sm-12 py-2">
      <h2>Daftar Mahasiswa</h2>
    </div>
    <div class="col-sm-12 py-2">
      <router-link to="/students/new" class="btn btn-primary">Tambah Mahasiswa</router-link>
    </div>
    <div class="col-sm-12 py-2">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Jurusan</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <tr v-if="students.length === 0">
            <td colspan="5" style="text-align: center">
              Tidak ada data untuk
              ditampilkan
            </td>
          </tr>
          <tr v-for="(student) in students" :key="student.id">
            <td>{{ student.id }}</td>
            <td>{{ student.name }}</td>
            <td>{{ student.major ? student.major.name : 'Tidak ada jurusan' }}</td>
            <td>
              <router-link
                class="btn btn-sm btn-primary"
                :to="{ path: '/students/' + student.id + '/edit' }"
              >Ubah</router-link>&nbsp;
              <button class="btn btn-sm btn-danger" @click=" delStudent(student.id)">Hapus</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
import { getStudents, deleteStudent } from "@/services";
export default {
  name: "IndexStudent",
  data: function() {
    return {
      students: []
    };
  },
  methods: {
    loadStudents: async function() {
      try {
        let resp = await getStudents();
        this.students = resp.data;
      } catch (err) {
        console.log(err);
      }
    },
    delStudent: async function(id) {
      try {
        let resp = await deleteStudent(id);
        if (resp.status >= 200 && resp.status < 300) {
          alert("student telah dihapus");
          this.loadStudents();
        }
      } catch (err) {
        console.log(err);
      }
    }
  },
  mounted: async function() {
    this.loadStudents();
  }
};
</script>