<template>
  <div class="row">
    <div class="col-sm-12 py-2">
      <h2>Daftar Jurusan</h2>
    </div>
    <div class="col-sm-12 py-2">
      <router-link to="/majors/new" class="btn btn-primary">Tambah Jurusan</router-link>
    </div>
    <div class="col-sm-12 py-2">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>id</th>
            <th>Nama</th>
            <th>Kode</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr v-if="majors.length === 0">
            <td colspan="3" style="text-align: center">
              Tidak ada data untuk
              ditampilkan
            </td>
          </tr>
          <tr v-for="(major) in majors" :key="major.id">
            <td>{{major.id}}</td>
            <td>{{ major.name }}</td>
            <td>{{ major.code }}</td>
            <td>
              <router-link
                :to="{path:'/majors/' + major.id + '/detail'}"
                class="btn btn-sm btn-success"
              >Detail</router-link>&nbsp;
              <router-link
                :to="{path: '/majors/' + major.id + '/edit' }"
                class="btn btn-sm btn-primary"
              >Ubah</router-link>&nbsp;
              <button class="btn btn-sm btn-danger" @click="deleteMajor(major.id)">Hapus</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
import { deleteMajor, getMajors } from "@/services";

export default {
  name: "IndexMajor",
  data: () => ({
    majors: []
  }),
  methods: {
    loadMajor: async function() {
      try {
        let resp = await getMajors();
      
        let majors = resp.data;
        this.majors = majors;
      } catch (err) {
        console.error(err);
      }
    },

    deleteMajor: async function(id) {
      try {
        let resp = await deleteMajor(id);
        console.log(resp)
        if (resp.status >= 200 && resp.status < 300) {
          alert("jurusan telah dihapus");
          this.loadMajor();
        }
      } catch (err) {
        console.log(err);
      }
    }
  },
  mounted: function() {
    this.loadMajor();
  }
};
</script>