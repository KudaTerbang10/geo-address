@extends('kabupaten.layout')
@section('content')

<div class="card" style="margin:20px;">
<div class="card-header">Kabupaten Page</div>
<div class="card-body">
<div class="card-body">
<h5 class="card-title">Kabupaten : {{ $kabupaten->nama_kabupaten }}</h5>
<p class="card-text">ID : {{ $kabupaten->id_kabupaten }}</p>
</div>
</hr>
</div>
</div>