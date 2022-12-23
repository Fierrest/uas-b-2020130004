<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = order::all();

        return view ('order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = Item::all();
        return view('order',compact('items'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [


            'Status' => 'required|not_in:none',


        ];

        $validated = $request->validate($rules);
        order::create($validated);
        $itemcount = Item::all()->count();
        dump($itemcount);
        $orderId = Order::all()->last()->id;
        $itemStoks = DB::select('SELECT stok FROM items');
        // $i = 1;
        for($i = 1; $i<=$itemcount; $i++){
            $itemNow = $itemStoks[$i-1]->stok-$request['quantity'.$i];
            $itemId = $request['id'.$i];
            if($request['quantity'.$i]>0){
                $x = $request['quantity'.$i];
                $y = (int)$x;
                if($y<=$itemStoks[$i-1]->stok){
                    DB::table('order_item')->insert([
                        'order_id' => $orderId,
                        'item_id' => $request['id'.$i],
                        'quantity' => $request['quantity'.$i],
                    ]);
                    DB::update('update items SET stok =  ? where id = ?', [$itemNow,$itemId]);
                }else{
                    $request->session()->flash('success',"ERRORR : STOK lebih SEDIKIT dari ORDER !");
                    return redirect(route('order.index'));
                }
            }
        }
        // return redirect(route('order.index'));
        dump($itemcount);
        dump($request->status);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(order $order)
    {
        return view('order.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(order $order)
    {
        return view('order.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, order $order)
    {
        // dump($request);
        // dump($order);
        $rules = [
            'Nama' => 'required|max:100',
            'Jumlah' => 'required|max:100',

        ];

        // dump($request->validate($rules));

        $validated = $request->validate($rules);
        $order->update($validated);
        $request->session()->flash('success', "Berhasil memperbarui data order {$validated['nama']}.");
        return redirect()->route('order.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(order $order)
    {
        $order->delete();
        return redirect()->route('order.index')->with('success', "Data order{$order['judul']} sudah dihapus.");
    }
}
