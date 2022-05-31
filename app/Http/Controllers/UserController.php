<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class UserController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $users = User::all();
    return response()->json(compact('users'));
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
      'nombre' => 'required|string|max:255',
      'email' => 'required|string|email|max:255|unique:users',
      'tipo_documento' => 'required|string|min:2',
      'numero_documento' => 'required|string|min:6',
      'password' => 'required|string|min:6|confirmed',
    ]);

    if($validador->fails()){
      return response()->json($validador->errors()->toJson(), 400);
    }

    $user = User::create([
      'nombre' => $request->get('nombre'),
      'email' => $request->get('email'),
      'tipo_documento' => $request->get('tipo_documento'),
      'numero_documento' => $request->get('numero_documento'),
      'password' => Hash::make($request->get('password')),
    ]);

    $token = JWTAuth::fromUser($user);

    return response()->json(compact('user','token'), 201);
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

  public function authenticate(Request $request) {
    $credenciales = $request->only('email', 'password');
    try {
      if (! $token = JWTAuth::attempt($credenciales)) {
        return response()->json(['error' => 'Credenciales inválidas'], 400);
      }
    } catch (JWTException $e) {
      return response()->json(['error' => 'No se pudo crear el token'], 500);
    }
    return response()->json(compact('token'));
  }

  public function getAuthenticatedUser() {
    try {
      if (!$user = JWTAuth::parseToken()->authenticate()) {
        return response()->json(['Usuario no encontrado'], 404);
      }
    } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
      return response()->json(['El token ha expirado'], $e->getStatusCode());
    } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
      return response()->json(['El token es inválido'], $e->getStatusCode());
    } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {
      return response()->json(['El token no está disponible'], $e->getStatusCode());
    }
    return response()->json(compact('user'));
  }
}
