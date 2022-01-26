<?php

namespace App\Exports;

use App\Models\Pocket;
use Maatwebsite\Excel\Concerns\FromCollection;

class PocketsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pocket::all();
    }
}
