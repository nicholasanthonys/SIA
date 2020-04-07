@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-12 py-2">
        <h2>Daftar Jurusan</h2>
    </div>
</div>

<div class="col-sm-12 py-2">
    <a href="/majors/new" class="btn btn-primary"> Tambahjurusan </a>
</div>

<div class="col-sm-12 py-2">
    <table class="table table-striped book-table">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Kode</th>
                <th></th>
            </tr>
        </thead>

        <tbody>
            @if (count($majors) == 0)
            <tr>
                <td colspan="5" style="text-align: center">Tidak ada data</td>
            </tr>

            @endif

            @foreach ($majors as $major)
            <tr>
                <td>
                    {{$major->name}}
                </td>

                <td>
                    {{$major->code}}
                </td>

                <td>
                    <form action="/majors/{{$major->id}}" method="POST">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}

                        <button class="btn btn-danger"> Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach

        </tbody>

    </table>

</div>

@endsection