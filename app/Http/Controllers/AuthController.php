<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
   * @OA\Post(
   *      path="/login",
   *      tags={"Login"},
   *      summary="Authentifier un utilisateur",
   *      description="Authentifier un utilisateur renvoi un token",
   *      @OA\RequestBody(
   *          @OA\JsonContent(),
   *          @OA\MediaType(
   *              mediaType="multipart/form-data",
   *              @OA\Schema(
   *                  @OA\Property(
   *                      type="object",
   *                      required={"email", "password", "device_name"},
   *                      @OA\Property(property="email", type="email"),
   *                      @OA\Property(property="password", type="password"),
   *                      @OA\Property(property="device_name", type="string"),
   *                  ),
   *                  example={
   *                      "email":"admin@admin.com",
   *                      "password":"12345678",
   *                      "device_name":"Orange device"
   *                  },
   *              ),
   *          ),
   *      ),
   *      @OA\Response(response=200, description="Login Successfully", @OA\JsonContent()),
   *      @OA\Response(response=401, description="Unauthenticated"),
   *      @OA\Response(response=403, description="Forbidden"),
   *      @OA\Response(response=400, description="Bad Request"),
   *      @OA\Response(response=422, description="Unprocessable Entity", @OA\JsonContent()),
   *      @OA\Response(response=419, description="session expired"),
   *  )
   */
    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();
 
    if (! $user || ! Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }
 
     $token = $user->createToken($request->email)->plainTextToken;

     $response = [
        'user' => $user,
        'token' => $token
     ];
     return response($response, 200);
    }
}
