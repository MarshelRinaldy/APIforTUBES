<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function login(Request $request) {
        try {
            $dataUsername = $request->input('username');
            $dataPassword = $request->input('password');

            if (!$dataUsername) {
                throw new \Exception('Username and password are required');
            }

            $userLogin = User::where('username', $dataUsername)->first();

            if(!$userLogin) {
                throw new \Exception('User not found');
            }

            if (!password_verify($dataPassword, $userLogin->password)) {
                throw new \Exception('Incorrect password');
            }

            return response()->json([
                'status'=> true,
                'message'=> 'Berhasil ambil data',
                'data'=> $userLogin
            ],200);
        } catch (\Exception $e) {
            return response()->json([
                'status'=> false,
                'message'=> $e->getMessage(),
                'data'=> []
            ],400);
        }
    }
}
