<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PocketResource;
use App\Models\Pocket;
use Illuminate\Http\Request;
use App\Http\Services\PocketService;

class PocketResourceController extends Controller
{

    private PocketService $pocketService;

    public function __construct(PocketService $pocketService)
    {
        $this->pocketService = $pocketService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PocketResource::collection($this->pocketService->getPockets());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pocket  $pocket
     * @return \Illuminate\Http\Response
     */
    public function show(Pocket $pocket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pocket  $pocket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pocket $pocket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pocket  $pocket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pocket $pocket)
    {
        //
    }
}
