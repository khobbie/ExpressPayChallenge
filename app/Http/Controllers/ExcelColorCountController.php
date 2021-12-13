<?php

namespace App\Http\Controllers;

use App\Imports\ExcelColorCountImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;

class ExcelColorCountController extends Controller
{
    public function importExcelColorSheet(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'color_sheet' => 'required|mimes:xls,xlsx,csv',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 200);
        }

        $file = $request->file('color_sheet');


        Excel::import(new ExcelColorCountImport, $file);

        return redirect('/')->with('success', 'All good!');
    }
}
