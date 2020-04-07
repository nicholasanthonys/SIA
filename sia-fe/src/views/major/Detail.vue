<template>
  <div class="detail">
    <h2>Major Code : {{major.code ? major.code : 'tidak ada code'}}</h2>
    <h2>Major Name : {{major.name}}</h2>
    <h4>Students</h4>
    <table class="table table-dark">
      <thead>
        <tr>
          <th scope="col">id</th>
          <th scope="col">name</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="student in students" v-bind:key="student.id">
          <td>{{student.id}}</td>
          <td>{{student.name}}</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import { getMajor } from "@/services";
export default {
  name: "DetailMajor",
  data: function() {
    return {
      major: Object,
      students: []
    };
  },
  methods: {
    loadMajorDetail: async function(id) {
      let resp = await getMajor(id);
      this.major = resp.data.major;
      this.students = resp.data.students;
      console.log(resp.data.major);
    }
  },
  mounted: function() {
    let id = this.$route.params.id;
    this.loadMajorDetail(id);
  }
};
</script>
