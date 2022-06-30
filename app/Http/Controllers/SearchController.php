<?php

namespace App\Http\Controllers;

use App\Models\Kata;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {

        if ($request->ajax()) {

            $output = "";
            $products = DB::table('katas')->where('kata', 'LIKE', '%' . $request->search . "%")->get();

            if (count($products)>0) {
                foreach ($products as $key => $product){
                    $output .= '<tr style="background-color: black;">' .
                        '<td style="color: white;">' . $product->kata . '</td>' .
                        '<td style="color: white;">' . $product->terminology . '</td>' .
                        '<td style="color: white;"><a class="btn btn-success" href="/detail/' . $product->id . '"> Click Here </a></td>' .
                        '</tr>';
                }
            }else {
                $output .= '<tr style="background-color: black;">' .
                '<td style="color: white;">' .'No Data Found' . '</td>' .
                '<td style="color: white;">' .'No Data Found' . '</td>' .
                '<td style="color: white;">' .'No Data Found' . '</td>' .
                '</tr>';
            }

            return Response($output);
        }
    }

    public function read(){
        $output = "";
        return Response($output);
    }

    public function detail($id){
        $detail = DB::table('katas')->where('id', $id)->get();
        foreach ($detail as $key => $dt){
            $jml_sekarang = $dt->count;
            $jml_baru = $jml_sekarang + 1;
                $id = $id;
                $data = [
                    'count' => $jml_baru,
                ];
    
            Kata::where('id', $id)->update($data);
        }
        return view('detail', compact('detail'));
    }

    public function word(){
        $random = DB::table('katas')->get()->random(10);
        return view('wordtoday', compact('random'));
    }

    public function populer(){
        $populer = DB::table('katas')->orderBy('count', 'DESC')->limit(3)->get();
        return view('populer', compact('populer'));
    }
}
