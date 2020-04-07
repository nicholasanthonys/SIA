@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-12 py-2">
        <h2>Tambah Jurusan</h2>
    </div>

    <div class="col-sm-12 py-2">
        @include('common.errors')

        <form action="/majors" method="POST">
            {{csrf_field()}}

            <div class="form-group">
                <label for="code"> Kode Jurusan</label>
                <input type="text" class="form-control" id="code" name="code" placeholder="Kode Jurusan">
            </div>

            <div class="form-group">
                <label for="name"> Nama Jurusan</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Nama Jurusan">
            </div>
            <button class="btn btn-primary" type="submit"> Simpan</button>

        </form>
    </div>
</div>

@endsection