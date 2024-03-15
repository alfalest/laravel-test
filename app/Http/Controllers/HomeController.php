<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeModel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $item = HomeModel::all();
        $data = [
            'item' => $item,
        ];
        return view('home', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_barang' => 'required|string|max:255',
            'harga_barang' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect('tambah-menu')
                ->withErrors($validator)
                ->withInput();
        }

        $items = new HomeModel([
            'nama_barang' => $request->input('nama_barang'),
            'harga_barang' => $request->input('harga_barang'),
        ]);

        $items->save();

        return redirect('/tambah-data')->with('success', 'Barang berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = HomeModel::find($id);

        $data = [
            'item' => $item,
        ];
        // dd($data);
        return view('edit', $data);
    }

    public function update(Request $request, string $id)
    {
        $item = HomeModel::find($id);
        if ($item) {
            $validator = Validator::make($request->all(), [
                'nama_barang' => 'required|string|max:255',
                'harga_barang' => 'required|numeric',
            ]);

            if ($validator->fails()) {
                return redirect()
                    ->route('updateData', $item)
                    ->withErrors($validator)
                    ->withInput();
            }

            // Update data
            $item->nama_barang = $request->input('nama_barang');
            $item->harga_barang = $request->input('harga_barang');
            $item->save();

            return redirect('/')->with('success', 'Barang sudah di update');
        }
        return redirect('/')->with('failed', 'Item not found!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $item = HomeModel::find($id);

        if (!$item) {
            return redirect('/')->with('error', 'Item tidak ditemukan');
        }

        // Hapus item dari database
        $item->delete();

        return redirect('/');
    }
}
