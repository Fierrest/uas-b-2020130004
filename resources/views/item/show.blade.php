@extends('layouts.master')
@section('title', $Item->title)
@section('content')
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-8">
                <h2>{{ $Item->id }}</h2>
            </div>
            <div class="col-md-4">
                <div class="float-right">
                    <div class="btn-group" role="group">
                        <a href="{{ route('item.edit', $Item->id) }}" class="btn btn-primary ml-3">Edit</a>
                        <form action="{{ route('item.destroy', $Item->id) }}" method="POST">
                            <button type="submit" class="btn btn-danger ml-3">Delete</button>
                            @method('DELETE')


                            @csrf
                        </form>
                    </div>
                </div>
            </div>
            <h5>

                <i class="fa fa-star fa-fw"></i>
                {{ $Item->nama }}

        </div>
        </h5>
        <p>
        <ul class="list-inline">
            <li class="list-inline-item">
                <i class="fa fa-th-large fa-fw"></i>
                <em>{{ $Item->harga }}</em>
            </li>
            <li class="list-inline-item">
                <i class="fa fa-calendar fa-fw"></i>
                {{ $Item->stok }}
            </li>
        </ul>
        </p>
        <hr>

    </div>
@endsection
