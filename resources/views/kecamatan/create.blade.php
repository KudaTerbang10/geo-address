@extends('kecamatan.layout')
@section('content')
    <div class="container">
        @if (session()->has('flash_message'))
            <div class="alert alert-danger mb-2" role="alert">
                {{ session('flash_message') }}
            </div>
        @endif
    </div>
    <div class="card" style="margin:20px;">
        <div class="card-header">Create New Kecamatan</div>
        <div class="card-body">

            <form action="{{ url('kecamatan') }}" method="post">
                {!! csrf_field() !!}
                <label>Nama Kecamatan</label></br>
                <input type="text" name="nama_kecamatan" id="nama_kecamatan"
                    class="form-control @error('nama_kecamatan') is-invalid @enderror" autofocus></br>

                @error('nama_kecamatan')
                    <div class="invalid-feedback mb-4">
                        {{ $message }}
                    </div>
                @enderror

                <select name="id_kabupaten" id="id_kabupaten">
                    @foreach ($kabupaten as $key => $item)
                        <option value="{{ $key }}">{{ $item }}</option>
                    @endforeach
                </select>
                <input type="submit" value="Save" class="btn btn-success"></br>
            </form>

        </div>
    </div>

@stop
