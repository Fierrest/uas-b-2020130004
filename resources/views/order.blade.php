@extends('layouts.master')
@section('title', 'Add New Order')
@section('content')
    <h2>Add New Order</h2>
    <form action="{{ route('order.store') }}" method="POST">
        @csrf
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>

                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Quantity</th>


                </tr>
            </thead>
            <tbody>
                @forelse ($items as $items)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>

                        <td>{{ $items->nama }}</td>
                        <td>{{ $items->harga }}</td>
                        <td>{{ $items->stok }}</td>
                        <td>
                            <input type="hidden" name="id{{ $loop->iteration }}" id="id{{ $loop->iteration }}"
                                value="{{ $items->id }}">
                            <input type="number" class="form-control @error('quantity') is-invalid @enderror"
                                name="quantity{{ $loop->iteration }}" id="quantity" value="{{ old('quantity') }}"
                                min="0">
                        </td>

                    </tr>
                @empty
                    <tr>
                        <td align="center" colspan="6">No data yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="col-md-4 mb-3">
            <label for="status">Order Status</label>
            <select class="form-control @error('status') is-invalid @enderror" name="status" id="status">
                <option value="none" disabled selected>Status</option>
                <option value="selesai" {{ old('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
                <option value="pembayaran" {{ old('status') == 'pembayaran' ? 'selected' : '' }}>Menunggu Pembayaran
                </option>
            </select>
            @error('status')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        {{-- <div class="form-group">
        <label for="Status">Status</label>
        <input type="text" class="form-control @error('status') is-invalid @enderror" name="status" id="status" value="{{ old('status') }}">
        @error('Status')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div> --}}

        </div>
        <div class="row">
            <div class="col-md-8 mb-3 text-right">
                <h4>
                    Total Harga Sebelum PPN:
                </h4>
            </div>
            <div class="col-md-4 mb-3 text-right">
                <h4 id="total">
                    0
                </h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 mb-3 text-right">
                <h4>
                    Net Total Harga:
                </h4>
            </div>
            <div class="col-md-4 mb-3 text-right">
                <h4 id="ntotal">
                    0
                </h4>
            </div>
        </div>
        <button class="btn btn-primary btn-lg btn-block" type="submit">Add</button>
    </form>
    <button class="btn btn-success btn-lg btn-block" onclick="myFunction()">Hitung Harga</button>
    <script>
        function myFunction() {
            console.log("aaaaaaa");
            let total = 0;
            let price = 0;
            const quantityList = document.querySelectorAll("#quantity");
            const priceList = document.querySelectorAll("#price");
            let quantityCount = quantityList.length;
            console.log(quantityList);
            for (var i = 0; i < quantityCount; i++) {
                total += (+quantityList[i].value) * (+priceList[i].innerHTML);
            }
            document.getElementById("total").innerHTML = Math.round(total * 100) / 100;
            total = Math.round((total * 1.11) * 100) / 100;
            document.getElementById("ntotal").innerHTML = total;
        }
        $(document).ready(function() {
            $("input").change(function() {
                myFunction();
            });
        });
    </script>
@endsection
