<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeModel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index()
    {
        $item = HomeModel::all();
        $data = [
            'item' => $item,
        ];
        return view('home', $data);
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_barang' => 'required|string|max:255',
            'harga_barang' => 'required|numeric',
        ], [
            'nama_barang.required' => 'Nama barang harus diisi',
            'harga_barang.required' => 'Harga barang harus diisi',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $items = new HomeModel([
            'nama_barang' => $request->input('nama_barang'),
            'harga_barang' => $request->input('harga_barang'),
        ]);

        $items->save();

        return redirect()->back()->with('success', 'Barang berhasil ditambahkan');
    }

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
        return redirect('/')->with('failed', 'Barang tidak ditemukan!');
    }

    public function destroy($id)
    {
        $item = HomeModel::find($id);

        if (!$item) {
            return redirect('/')->with('error', 'Item tidak ditemukan!');
        }

        $item->delete();

        return redirect('/')->with('success', 'Barang berhasil dihapus');
    }
}
