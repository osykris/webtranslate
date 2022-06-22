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
	
    public function index(Request $request)
    {
        $katas = DB::table('katas')->get();
        return view('admin.index', compact('katas'));
    }

    public function store(Request $request)
	{
		DB::beginTransaction();
		try {
			$store = Kata::create([
                'kata' => $request->input('kata'),
				'terminology' => $request->input('terminology'),
				'deskripsi' => $request->input('deskripsi'),
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
			$data = [
				'kata' => $request->input('kata_edit'),
				'terminology' => $request->input('terminology_edit'),
				'deskripsi' => $request->input('deskripsi_edit'),
			];

			Kata::where('id', $id)->update($data);

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
