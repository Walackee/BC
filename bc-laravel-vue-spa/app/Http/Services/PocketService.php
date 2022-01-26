<?php

namespace App\Http\Services;

use App\Exports\PocketsExport;
use App\Models\Pocket;
use App\Http\Requests\PocketRequest;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class PocketService
{
    public function getPockets()
    {
        return Pocket::all();
    }

    public function massUpdatePockets(PocketRequest $request)
    {
        $pocketList = $request->all();

        DB::transaction(function () use ($pocketList) {
            foreach($pocketList as $pocket){
                Pocket::where('id', $pocket['common']['id'])
                        ->update($pocket['months']);
            }
        });
    }

    public function downloadCsv(){
        return Excel::download(new PocketsExport, 'cafeteria.csv', 'Csv', ['Content-Type' => 'text/csv']);
    }
}