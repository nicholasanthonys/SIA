@if (count($errors) > 0)
<div class="alert alert-danger">
    <strong> Maff, ada kesalahan pada masukan yang diberikan</strong>

    <br> <br>

    <ul>
        @foreach($errors->all() as $err)
        <li>{{$err}}</li>
        @endforeach
    </ul>

</div>
@endif