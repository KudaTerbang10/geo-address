{{-- @extends('layouts/app')
@section('content')
    <div class="container">
        <table border="1">
            <tr>
                <th bgcolor="purple">No</th>
                <th bgcolor="purple">Kecamatan</th>
                <th bgcolor="purple">Kabupaten</th>
                <th bgcolor="purple">Opsi</th>
            </tr>
            @foreach ($kecamatan as $row)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$row->nama_kecamatan}}</td>
                    <td>{{$row->nama_kabupaten}}</td>
                    <td>
                        <button>Edit</button>
                        <button>Delete</button>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection --}}

@extends('kecamatan.layout')
@section('content')
    <div class="container">
        <div class="row" style="margin:20px;">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Data Kecamatan</h2>
                    </div>
                    <div class="card-body">
                      

                            <a href="{{ url('/kecamatan/create') }}" class="btn btn-success btn-sm" title="Add New Kecamatan">
                                Add New
                            </a>
                            <a href="{{ url('/kecamatan/cetak_pdf') }}" class="btn btn-secondary btn-sm" target="_blank"
                            title="Cetak PDF">
                            Cetak PDF
                        </a>
                        <div class="row g-2 align-items-center mt-2">
                            <div class="col-auto">
                                <form action="/kecamatan" method="GET" class="d-flex">
                                    <input type="search" class="form-control mr-2" id="search" name="search">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </form>
                            </div>
                        </div>
                    
                        <br />
                        <br />
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kecamatan</th>
                                        <th>Kabupaten</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kecamatan as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->nama_kecamatan }}</td>
                                            <td>{{ $item->nama_kabupaten }}</td>

                                            <td>
                                                <a href="{{ url('/kecamatan/' . $item->id_kecamatan) }}"
                                                    title="Edit Kecamatan"><button class="btn btn-primary btn-sm"><i
                                                            class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                        Edit</button></a>

                                                <form method="POST"
                                                    action="{{ url('/kecamatan' . '/' . $item->id_kecamatan) }}"
                                                    accept-charset="UTF-8" style="display:inline">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        title="Delete Kecamatan" onclick="return confirm("Confirm
                                                        delete?")"><i class="fa fa-trash-o" aria-hidden="true"></i>
                                                        Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center mt-2">
                                {!! $kecamatan->links() !!}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
