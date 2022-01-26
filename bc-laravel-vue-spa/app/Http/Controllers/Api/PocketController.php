<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Services\PocketService;
use App\Http\Requests\PocketRequest;
use Throwable;

class PocketController extends Controller
{
    private PocketService $pocketService;

    public function __construct(PocketService $pocketService)
    {
        $this->pocketService = $pocketService;
    }

    public function massUpdatePockets(PocketRequest $request)
    {
        try{
            $this->pocketService->massUpdatePockets($request);
        } catch(Throwable $throwable){
            return response()->json(['message' => $throwable->getMessage()], 500);
        }

        return response()->json(['message' => 'OK'], 200);
    }

    public function downloadCsv(){
        return $this->pocketService->downloadCsv();
    }
}
