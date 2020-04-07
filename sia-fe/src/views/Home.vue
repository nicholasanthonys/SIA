<template>
  <div class="row">
    <div class="col-md-4 d-flex align-items-stretch">
      <div class="card w-100">
        <div class="card-body">
          <h5 class="card-title">Majors</h5>
          <p>Data jurusan yang ada di kampus kita tercinta</p>
          <p>
            <router-link class="btn btn-secondary" to="/majors">Selengkapnya...</router-link>
          </p>
        </div>
      </div>
    </div>
    <div class="col-md-4 d-flex align-items-stretch">
      <div class="card w-100">
        <div class="card-body">
          <h5 class="card-title">Students</h5>
          <p>Data mahasiswa</p>
          <p>
            <router-link class="btn btn-secondary" to="/students">Selengkapnya...</router-link>
          </p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Home"
};
</script>