<?php

namespace App\Imports;

use App\Models\Ateco;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;

class AtecosImport implements ToCollection, WithStartRow
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $rows)
    {
        try {
            DB::beginTransaction();
            foreach ($rows as $row) {

                $atecoparent = Ateco::where('code', $row[1])->first();

                //dd($atecoparent);

                if (empty($atecoparent)) {
                    Ateco::create([
                        'code' => $row[0],
                        'description' => $row[6]
                    ],null);
                } else {
                    $ateco = Ateco::find($atecoparent->id);
                    Ateco::create([
                        'code' => $row[0],
                        'description' => $row[6],
                    ], $ateco);
                }

            }
            DB::commit();
        } catch (\Exception $exc) {
            DB::rollback();
            throw new \Exception($exc->getMessage());
        }
    }

    /**
     * @return int
     */
    public function startRow(): int
    {
        return 2;
    }

}
