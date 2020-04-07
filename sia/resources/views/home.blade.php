@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-4">
        <h2>Jurusan</h2>
        <p>Data Jurusan</p>
        <p>
            <a href="/majors" class="btn btn-secondary">Selengkapnya</a>
        </p>
    </div>

    <div class="col-md-4">
        <h2>Mahasiswa</h2>
        <p>Data Mahasiswa</p>
        <a href="/students" class="btn btn-secondary">Selengkapnya</a>

    </div>

</div>

@endsection