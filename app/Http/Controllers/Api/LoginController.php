<?php
namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController as BaseController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Http\JsonResponse;
use Laravel\Sanctum\PersonalAccessToken;


class LoginController extends BaseController
{

    public function login(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Form tidak valid',['error' => $validator->errors()]);
        }

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 
            $user = Auth::user(); 
            $success['token'] =  $user->createToken('MyApp')->plainTextToken; 
            $success['name'] =  $user->name;
            $success['userId'] = $user->id;
            return $this->sendResponse($success, 'User login successfully.');
        } 
        else{ 

            return $this->sendError('email dan password tidak di temukan', ['error'=>'Username dan password salahss']);
        } 
    }

    public function logout(Request $request): JsonResponse
    {
        auth()->user()->currentAccessToken()->delete();
        return $this->sendResponse([], 'User logged out successfully.');
    }
}