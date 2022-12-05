@extends('kecamatan.layout')
@section('content')

    <div class="card" style="margin:20px;">
        <div class="card-header">Edit Kecamatan</div>
        <div class="card-body">

            <form action="{{ url('kecamatan/' . $kecamatan->id_kecamatan) }}" method="post">
                {!! csrf_field() !!}
                @method('PATCH')
                <input type="hidden" name="id_kecamatan" id="id_kecamatan" value="{{ $kecamatan->id_kecamatan }}"
                    id="id_kabupaten" />
                <label>Nama Kecamatan</label></br>
                <input type="text" name="nama_kecamatan" id="nama_kecamatan" value="{{ $kecamatan->nama_kecamatan }}"
                    class="form-control @error('nama_kecamatan') is-invalid @enderror" autofocus></br>

                    @error('nama_kecamatan')
                    <div class="invalid-feedback mb-4">
                        {{ $message }}
                    </div>
                @enderror

                    <label for="id_kabupaten">Nama Kabupaten</label></br>
                    <select name="id_kabupaten" id="id_kabupaten" class="form-control">
                        <option value="{{ $kecamatan->id_kabupaten }}">{{ $nama_kabupaten->nama_kabupaten }}</option>
                        @foreach ($kabupaten as $key => $item)
                        <option value="{{ $key }}">{{ $item }}</option>
                        @endforeach
                    </select>
                    
                <input type="submit" value="Update" class="btn btn-success"></br>
            </form>

        </div>
    </div>

@stop
