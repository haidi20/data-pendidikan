<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;

class DataController extends Controller
{
    public function index()
    {
        $array = [];
        $file = public_path('file/sd.xlsx');
        $data = Excel::selectSheetsByIndex(0)->load($file, function($rows){
            $rows->each(function($row) {

                // Example: dump the firstname
                // dd($row);
        
            });
        })->noHeading()->toObject();

        // $data = Excel::load($file)->noHeading()->get();

        

        return $data;

    }
}
