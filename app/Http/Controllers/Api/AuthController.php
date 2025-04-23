<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Client;


use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
class AuthController extends Controller
{
    public function normal_register(Request $request)
    {
        $validator = validator()->make($request->all(),[
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'birth_date' => 'required',
            'blood_type_id' => 'required',
            'last_donation' => 'required',
            'city_id' => 'required',
            'phone' => 'required',
            'password' => 'required | confirmed',
        ]);

        if($validator->fails())
        {
            return responseJson(0, $validator->errors()->first() , $validator->errors());
        }

        $request->merge(['password'=> bcrypt($request->password)]);
        $client = Client::create($request->all());
        $client->api_token = random_bytes(60);
        $client->save();

        return responseJson(1, 'success', [
            'api_token' => $client->api_token,
            'client' => $client,
        ]);

    }




    //>>>>>> using Laravel Sanctum <<<<<<<<<<<<<<<
    // Register a new user
    public function register(Request $request): JsonResponse
    {
        $validator = validator()->make($request->all(),[
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'birth_date' => 'required',
            'blood_type_id' => 'required',
            'last_donation' => 'required',
            'city_id' => 'required',
            'phone' => 'required',
            'password' => 'required | min:8 | confirmed',
        ]);

        if($validator->fails())
        {
            return responseJson(0, $validator->errors()->first() , $validator->errors());
        }


        $client = Client::create([
            'name' => $request->name,
            'email' => $request->email,
            'birth_date' => $request->birth_date,
            'blood_type_id' => $request->blood_type_id,
            'last_donation' => $request->last_donation,
            'city_id' => $request->city_id,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        //return responseJson(1, 'success', $client);
        return response()->json(['token' => $client->createToken('register_token')->plainTextToken], 201);
    }
    // Login user
    public function login(Request $request):JsonResponse
    {
        $request->validate([
            'phone' => 'required',
            'password' => 'required',
        ]);

        $client = Client::where('phone', $request->phone)->first();

        if (!$client || !Hash::check($request->password, $client->password)) {
            throw ValidationException::withMessages([
                'phone' => ['The provided credentials are incorrect.'],
            ]);
        }

        return response()->json(['token' => $client->createToken('login_token')->plainTextToken]);
    }

    // Logout user (revoke token)
    public function logout(Request $request):JsonResponse
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Logged out successfully']);
    }

}
