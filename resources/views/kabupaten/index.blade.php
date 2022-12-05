@extends('kabupaten.layout')
@section('content')
    <div class="container">
        @if (session()->has('flash_message'))
            <div class="alert alert-success mb-2" role="alert">
                {{ session('flash_message') }}
            </div>
        @elseif (session()->has('constraint'))
            <div class="alert alert-danger mb-2" role="alert">
                {{ session('constraint') }}
            </div>
        @endif
        
        <div class="row" style="margin:20px;">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Data Kabupaten</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{ url('/kabupaten/create') }}" class="btn btn-success btn-sm" title="Add New Kabupaten">
                            Add New
                        </a>
                        <a href="{{ url('/kabupaten/cetak_pdf') }}" class="btn btn-secondary btn-sm" target="_blank" title="Cetak PDF">
                            Cetak PDF
                        </a>
                        <br />
                        <br />
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kabupaten</th>
                                        <th>ID</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kabupaten as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->nama_kabupaten }}</td>
                                            <td>{{ $item->id_kabupaten }}</td>

                                            <td>
                                                <a href="{{ url('/kabupaten/' . $item->id_kabupaten) }}"
                                                    title="Edit Kabupaten"><button class="btn btn-primary btn-sm"><i
                                                            class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                        Edit</button></a>

                                                <form method="POST"
                                                    action="{{ url('/kabupaten' . '/' . $item->id_kabupaten) }}"
                                                    accept-charset="UTF-8" style="display:inline">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        title="Delete Kabupaten" onclick="return confirm("Confirm
                                                        delete?")"><i class="fa fa-trash-o" aria-hidden="true"></i>
                                                        Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center mt-2">
                                {!! $kabupaten->links() !!}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
