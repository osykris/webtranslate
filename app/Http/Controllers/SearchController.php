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
                        '<td style="color: white;">' . $product->deskripsi . '</td>' .
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
}
