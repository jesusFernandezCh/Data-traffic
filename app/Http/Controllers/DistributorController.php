<?php

namespace App\Http\Controllers;

use App\Distributor;
use Illuminate\Http\Request;
use App\Http\Requests\RequestDistributor;

class DistributorController extends Controller
{
    private $distributor;

    /**
     * [Construct class]
     * @param Distributor $stmt [description]
     */
    public function __construct(Distributor $stmt)
    {
        $this->distributor = $stmt;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $distribuidores = $this->distributor->all();
        return response()->json(['distribuidores' => $distribuidores]);
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestDistributor $request)
    {
        try {
            $this->distributor->create($request->all());
            return response()->json(['create' => true]);
        } catch (Exception $e) {
            return Response()->json(['created' => false], 500);
        }
    }
        
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Distributor  $distributor
     * @return \Illuminate\Http\Response
     */
    public function update(RequestDistributor $request, Distributor $distributor)
    {
        $distribuidor->update($request->all());
        $distribuidor->save();
        return response()->json(['update' => true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Distributor  $distributor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Distributor $distributor)
    {
        $distributor->delete();
        return response()->json(['delete' => true]);
    }
}
