<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class AppController extends Controller
{

        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            // $Apps = App::all();
            return view('index');
            // return view('welcome');
        }

        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
            return view('Apps.create');
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
                'judul' => 'required|max:100',
                'halaman' => 'required|integer|max:1000',
                'kategori' => 'required|max:255',
                'penerbit' => 'required|max:255'
            ];

            $validated = $request->validate($rules);
            App::create($validated);

            $request->session()->flash('success', "Buku yang berjudul {$validated['judul']} sudah berhasil ditambahkan.");
            return redirect()->route('Apps.index');
        }

        /**
         * Display the specified resource.
         *
         * @param  \App\Models\App  $App
         * @return \Illuminate\Http\Response
         */
        public function show(App $App)
        {
            return view('Apps.show', compact('App'));
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param  \App\Models\App  $App
         * @return \Illuminate\Http\Response
         */
        public function edit(App $App)
        {
            return view('Apps.edit', compact('App'));
        }

        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  \App\Models\App  $App
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request, App $App)
        {
            $rules = [
                'id' => 'required|max:13',
                'judul' => 'required|max:100',
                'halaman' => 'required|integer|max:5',
                'kategori' => 'required|max:255',
                'penerbit' => 'required|max:255'
            ];

            $validated = $request->validate($rules);
            $App->update($validated);
            $request->session()->flash('success', "Berhasil memperbarui data buku {$validated['judul']}.");
            return redirect()->route('Apps.index');
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  \App\Models\App  $App
         * @return \Illuminate\Http\Response
         */
        public function destroy(App $App)
        {
            $App->delete();
            return redirect()->route('Apps.index')->with('success', "Data buku {$App['judul']} sudah dihapus.");
        }


}
