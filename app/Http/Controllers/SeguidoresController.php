<?php

namespace App\Http\Controllers;

use App\Seguidores;
use Illuminate\Http\Request;

class SeguidoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $seguidores =  Seguidores::create([
            'id_company' => $request['company_id'],
            'fans_face' => $request['fans_face'],
            'data_face' => $request['data_face'],
            'seguidores_insta' => $request['seguidores_insta'],
            'data_insta' => $request['data_insta'],
            'contatos_linkedin' => $request['contatos_linkedin'],
            'data_contatos_linkedin' => $request['data_contatos_linkedin'],
            'inscritos' => $request['inscritos'],
            'data_youtube' => $request['data_youtube'],
            'seguidores_twitter' => $request['seguidores_twitter'],
            'data_seguidores' => $request['data_seguidores']
        ]);

        $seguidores->save();

        return response()->json($seguidores, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Seguidores  $seguidores
     * @return \Illuminate\Http\Response
     */
    public function show(Seguidores $seguidores)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Seguidores  $seguidores
     * @return \Illuminate\Http\Response
     */
    public function edit(Seguidores $seguidores)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Seguidores  $seguidores
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Seguidores $seguidores)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Seguidores  $seguidores
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seguidores $seguidores)
    {
        //
    }
}
