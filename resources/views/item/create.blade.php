@extends('layouts.master')
@section('title', 'Add New Item')
@section('content')
<h2>Add New Item</h2>
<form action="{{ route('item.store') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="id">id</label>
            <input type="text" class="form-control @error('id') is-invalid @enderror" name="id" id="id" value="{{ old('id') }}">
            @error('id')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-6 mb-3">
            <label for="Nama">Nama</label>
            <input type="text" class="form-control @error('Nama') is-invalid @enderror" name="Nama" id="Nama" value="{{ old('Nama') }}">
            @error('Nama')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="form-group">
        <label for="harga">harga</label>
        <textarea class="form-control @error('harga') is-invalid @enderror" name="harga" id="harga" rows="3">{{ old('harga') }}</textarea>
        @error('harga')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="stok">Stok</label>
        <textarea class="form-control @error('stok') is-invalid @enderror" name="stok" id="stok" rows="3">{{ old('stok') }}</textarea>
        @error('stok')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    </div>
    <button class="btn btn-primary btn-lg btn-block" type="submit">Add</button>
</form>
@endsection
