@extends('layouts.master')
@section('title', $order->title)
@section('content')
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-8">
                <h2>ID:</h2>
                <h2>{{ $order->id }}</h2>
            </div>
            <div class="col-md-4">
                <div class="float-right">
                    <a href="{{ route('item.edit', $Item->id) }}" class="btn btn-primary ml-3">Edit</a>
                        <form action="{{ route('order.destroy', $order->id) }}" method="POST">
                            <button type="submit" class="btn btn-danger ml-3">Delete</button>
                            @method('DELETE')

                            @csrf
                        </form>
                    </div>
                </div>
            </div>
            <h2>Status:</h2>
            <h5>

                <i class="fa fa-star fa-fw"></i>
                {{ $order->status }}

        </div>
        </h5>
        <p>
        <ul class="list-inline">
            <li class="list-inline-order">
                <i class="fa fa-th-large fa-fw"></i>
                <em>{{ $order->harga }}</em>
            </li>
            <li class="list-inline-order">
                <i class="fa fa-calendar fa-fw"></i>
                {{ $order->stok }}
            </li>
        </ul>
        </p>
        <hr>

    </div>
@endsection
