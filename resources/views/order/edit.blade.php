@extends('layouts.master')
@section('title', 'Edit item')
@section('content')
    <h2>Update item</h2>
    <form action="{{ route('item.update', ['item' => $Item->id]) }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="row">
            <select name="cars" id="cars">
                <option value="volvo">Volvo</option>
                <option value="saab">Saab</option>
            <div class="col-md-6 mb-3">
                <label for="id">id</label>
                <input type="text" class="form-control @error('id') is-invalid @enderror" name="id" id="id"
                    value="{{ old('id') }}">
                @error('id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            </div>
        </div>
        <button class="btn btn-primary btn-lg btn-block" type="submit">Update</button>
    </form>
@endsection
