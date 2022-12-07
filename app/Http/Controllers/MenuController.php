<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // menampilan data menu
        $data = Menu::all();
        return view('menu.tampil', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // tampilan tambah data menu
        $kategori = Kategori::all();
        return view('menu.tambah', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // menambah data menu
        $data = $request->all();
        $data['foto'] = Storage::put('artikel/foto', $request->file('foto')); // menyimpan foto ke dalam folder public/artikel/foto
        Menu::create($data);
        return redirect('menu');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        // tampilan edit data menu
        $kategori = Kategori::all();
        return view('menu.edit', compact('menu', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        // mengedit data menu
        $data = $request->all();
        try {
            // jika ada perubahan pada foto
            $data['foto'] = Storage::put('artikel/foto', $request->foto); // menyimpan foto ke dalam folder public/artikel/foto
            $menu->update($data);
        } catch (\Throwable $th) {
            // jika tidak ada perubahan pada foto
            $data['foto'] = $menu->foto;
            $menu->update($data);
        }
        return redirect('menu');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        // menghapus data menu
        $menu->delete();
        return redirect('menu');
    }

    public function tampil()
    {
        // menampilkan data menu pada halaman beranda
        $data = Menu::all();
        $kategori = Kategori::all();
        return view('beranda', compact('data', 'kategori'));
    }
}
