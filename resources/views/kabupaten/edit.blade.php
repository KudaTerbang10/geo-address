@extends('kabupaten.layout')
@section('content')

    <div class="card" style="margin:20px;">
        <div class="card-header">Edit Kabupaten</div>
        <div class="card-body">

            <form action="{{ url('kabupaten/' . $kabupaten->id_kabupaten) }}" method="post">
                {!! csrf_field() !!}
                @method('PATCH')
                <input type="hidden" name="id_kabupaten" id="id_kabupaten" value="{{ $kabupaten->id_kabupaten }}"
                    id="id_kabupaten" />
                <label>Nama Kabupaten</label></br>
                <input type="text" name="nama_kabupaten" id="nama_kabupaten" value="{{ $kabupaten->nama_kabupaten }}"
                    class="form-control @error('nama_kabupaten') is-invalid @enderror"></br>
                    @error('nama_kabupaten')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                <input type="submit" value="Update" class="btn btn-success"></br>
            </form>

        </div>
    </div>

@stop
