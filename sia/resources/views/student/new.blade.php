@extends('layouts.app')

@section('content')

<div class="row">

    <div class="col-sm-12 py">
        <h2>Tambah Jurusan</h2>
    </div>

    <div class="col-sm-12 py-2">
        @include('common.errors')

        <form action="/students" method="POST">
            {{csrf_field()}}

            <div class="form-group">
                <label for="id">NIM</label>

                <input type="text" class="form-control" id="nim" name="id" placeholder="NIM">

            </div>

            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Nama">
            </div>

            <div class="form-group">
                <label for="major">Jurusan</label>
                <select name="major_id" id="major" class="form-control">
                    @foreach($majors as $major)
                    <option value="{{$major->id}}">
                        {{$major->code}} - {{$major->name}}
                    </option>

                    @endforeach

                </select>

            </div>

            <button class="btn btn-primary" type="submit"> Simpan</button>

        </form>


    </div>

</div>

@endsection