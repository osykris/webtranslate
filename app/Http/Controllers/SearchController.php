<?php

namespace App\Http\Controllers;
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
        return view('detail', compact('detail'));
    }

    public function word(){
        $random = DB::table('katas')->get()->random(10);
        return view('wordtoday', compact('random'));
    }
}
