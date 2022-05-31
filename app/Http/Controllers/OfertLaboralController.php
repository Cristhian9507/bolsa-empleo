<?php

namespace App\Http\Controllers;

use App\Models\OfertLaboral;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OfertLaboralController extends Controller
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
  public function create(Request $request)
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
    $validador = Validator::make($request->all(), [
      'nombre' => 'required|string|max:255|unique:ofert_laborals',
      'users_ids' => 'required',
      'activo' => 'required|boolean',
    ]);
    
    if($validador->fails()){
      return response()->json($validador->errors()->toJson(), 400);
    }
    $users_ids = explode(",", $request->get('users_ids'));
    $ofertaLaboral = OfertLaboral::create([
      'nombre' => $request->get('nombre'),
      'activo' => $request->get('activo')
    ]);
    if(is_array($users_ids) && count($users_ids) > 0) {
      $ofertaLaboral->users()->attach($users_ids);
    }
    return response()->json(compact('ofertaLaboral'), 201);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
      //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
      //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
      //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    //
  }
}
