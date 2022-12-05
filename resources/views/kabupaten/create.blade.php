@extends('kabupaten.layout')
@section('content')

    <div class="card" style="margin:20px;">
        <div class="card-header">Create New Kabupaten</div>
        <div class="card-body">

            <form action="{{ url('kabupaten') }}" method="post">
                {!! csrf_field() !!}
                <label for="nama_kabupaten">Nama Kabupaten</label></br>
                <input type="text" name="nama_kabupaten" id="nama_kabupaten"
                    class="form-control @error('nama_kabupaten') is-invalid @enderror" autofocus></br>
                @error('nama_kabupaten')
                    <div class="invalid-feedback mb-4">
                        {{ $message }}
                    </div>
                @enderror
                <input type="submit" value="Save" class="btn btn-success"></br>
            </form>

        </div>
    </div>

@stop
