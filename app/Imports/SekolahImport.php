<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class SekolahImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        $file = public_path('file/sd');

        Excel::load($file, function ($reader) {
            $reader = $reader->takeColumns(10);
            return response()->json($reader);
        });
    }
}
