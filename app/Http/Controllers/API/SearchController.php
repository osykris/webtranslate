<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Kata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tampil = Kata::get()->toJson(JSON_PRETTY_PRINT);
        return response($tampil, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    function search($name)
    {
        $result = Kata::where('kata', 'LIKE', '%' . $name . '%')->get()->toJson(JSON_PRETTY_PRINT);
        if ($result == null) {
            return response()->json([
                "message" => "Data not found"
            ], 404);
        } else {
            return $result;
        }
    }

    public function word()
    {
        $random = DB::table('katas')->get()->random(10)->toJson(JSON_PRETTY_PRINT);
        return response($random, 200);
    }

    public function populer()
    {
        $populer = DB::table('katas')->orderBy('count', 'DESC')->limit(3)->get()->toJson(JSON_PRETTY_PRINT);
        return response($populer, 200);
    }
}
