<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Items = Item::all();
        return view ('Item.index', compact('Items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Item.create');
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
            'id' => 'required|max:13',
            'Nama' => 'required|max:100',
            'harga' => 'required|max:13',
            'stok' => 'required|max:100',


        ];

        $validated = $request->validate($rules);
        Item::create($validated);

        $request->session()->flash('success', "item berhasil ditambahkan.");
        return redirect()->route('item.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $Item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $Item)
    {
        return view('Item.show', compact('Item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $Item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $Item)
    {
        return view('Item.edit', compact('Item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $Item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $Item)
    {
        // dump($request);
        // dump($Item);
        $rules = [
            'id' => 'required|max:13',
            'nama' => 'required|max:100',
            'harga' => 'required|integer|max:999999',
            'stok' => 'required|max:255',

        ];

        // dump($request->validate($rules));

        $validated = $request->validate($rules);
        $Item->update($validated);
        $request->session()->flash('success', "Berhasil memperbarui data Item {$validated['nama']}.");
        return redirect()->route('item.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $Item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $Item)
    {
        $Item->delete();
        return redirect()->route('item.index')->with('success', "Data Item{$Item['judul']} sudah dihapus.");
    }
}
