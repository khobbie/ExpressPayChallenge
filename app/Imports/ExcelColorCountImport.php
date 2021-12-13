<?php

namespace App\Imports;

use App\Models\ExcelColorCountModel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ExcelColorCountImport implements WithHeadingRow, ToCollection
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    // public function model(array $row)
    // {
    //     return new ExcelColorCountModel([
    //         'name' => $row[0],
    //     ]);
    // }


    public function headingRow(): int
    {
        return 1;
    }


    public function collection(Collection $rows)
    {
        header('Content-type: application/json');
        $blue_count = 0;
        $red_count = 0;
        $yellow_count = 0;
        $green_count = 0;

        foreach ($rows as $row)
        {




          



            switch (trim($row['color'])) {
                case 'Blue':

                    // exit(json_encode($row['color']));

                    if(is_numeric($row['count'])){
                        // exit(json_encode($row['count']));
                        $blue_count = $blue_count + floatval($row['count']);
                    }
                    // else{
                    //     exit(json_encode($row['color']));
                    // }

                    break;
                case 'Red':

                    if(is_numeric($row['count'])){
                        $red_count = $red_count + floatval($row['count']);
                    }

                    break;
                case 'Yellow':

                    if(is_numeric($row['count'])){
                        $yellow_count = $yellow_count + floatval($row['count']);
                    }
                    break;
                case 'Green':

                    if(is_numeric($row['count'])){
                        $green_count = $green_count + floatval($row['count']);
                    }

                    break;
                default:
                    # code...
                    break;
            }


        }



        exit(json_encode([
            'code' => '200',
            'message' => "File Loaded successfully",
            'data' => [
                'Blue' => $blue_count,
                'Red' => $red_count,
                'Yellow' => $yellow_count,
                'Green' => $green_count,
            ]
        ]));

    }


}
