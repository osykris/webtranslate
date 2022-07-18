<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kata;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class KataController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $this->validate($request, [
				'gambar' => 'required|file|image|mimes:jpeg,png,jpg|max:2048'
			]);

			//upload image
			$gambar = $request->file('gambar');
			$nama_gambar = $gambar->getClientOriginalName();
			$path = "img";
			$gambar->move($path, $nama_gambar);

            $store = Kata::create([
                'kata' => $request->input('kata'),
                'terminology' => $request->input('terminology'),
                'gambar' => $nama_gambar,
                'deskripsi' => $request->input('deskripsi'),
                'deskripsi_indo' => $request->input('deskripsi_indo'),
                'link' => $request->input('link'),
            ]);

            DB::commit();

            return response()->json([
                'data' => $store,
                'message' => 'Berhasil Disimpan',
            ], 200);
        } catch (\Throwable $th) {
            DB::rollBack();
            return $th;
        }
    }

    public function edit(Request $request)
    {
        try {
            $id_kata = $request->input('id');
            $kata = Kata::where('id', $id_kata)->first();

            return response()->json([
                'data' => $kata,
                'message' => 'Berhasil',
            ], 200);
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function update(Request $request)
    {
        try {
            $id = $request->input('id_edit');
            if ($request->file('gambar_edit')) {
                	//upload new image
				$gambar = $request->file('gambar_edit');
				$nama_gambar = $gambar->getClientOriginalName();
				$path = "img";
				$gambar->move($path, $nama_gambar);

            $data = [
                'kata' => $request->input('kata_edit'),
                'terminology' => $request->input('terminology_edit'),
                'gambar' => $nama_gambar,
                'deskripsi' => $request->input('deskripsi_edit'),
                'deskripsi_indo' => $request->input('deskripsi_indo_edit'),
                'link' => $request->input('link_edit'),
            ];

            Kata::where('id', $id)->update($data);
        } else {
            $data = [
                'kata' => $request->input('kata_edit'),
                'terminology' => $request->input('terminology_edit'),
                'deskripsi' => $request->input('deskripsi_edit'),
                'deskripsi_indo' => $request->input('deskripsi_indo_edit'),
                'link' => $request->input('link_edit'),
            ];

            Kata::where('id', $id)->update($data);
        }

            return response()->json([
                'data' => $data,
                'message' => 'Berhasil Diedit',
            ], 200);
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function delete(Request $request)
    {
        try {
            $id = $request->input('id');

            return response()->json([
                'data' => $id,
                'message' => 'Berhasil Dihapus',
            ], 200);
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function destroy(Request $request)
    {
        try {
            $id = $request->input('id');
            Kata::where('id', $id)->delete();

            return response()->json([
                'data' => $id,
                'message' => 'Berhasil Dihapus',
            ], 200);
        } catch (\Throwable $th) {
            return $th;
        }
    }

}
