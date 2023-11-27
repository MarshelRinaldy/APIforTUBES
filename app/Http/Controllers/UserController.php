<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        try{
            $user = User::all();
            return response()->json([
                "status"=> true,
                "message" => 'Berhasil ambil data',
                "data"=> $user
            ], 200);
        }
        catch(\Exception $e){
            return response()->json([
                "status"=> false,
                "message"=> $e->getMessage(),
                "data"=> []
                ],400);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $user = User::create($request->all());
            return response()->json([
                "status"=> true,
                "message"=> 'Berhasil Insert Data',
                'data'=> $user
                ],200);
        }
        catch(\Exception $e){
            return response()->json([
                'status'=> false,
                'message'=> $e->getMessage(),
                'data'=> []
                ],400);
    }
}

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try{
            $user = User::find($id);
            if(!$user) throw new \Exception("Barang Tidak ditemukan");

            return response()->json([
                "status"=> true,
                "message"=> 'Berhasil ambil data',
                "data"=> $user
                ], 200);
        }
        catch(\Exception $e){
            return response()->json([
                'status'=> false,
                'message'=> $e->getMessage(),
                'data'=> []
                ],400);
    }
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try{
            $user = User::find($id);

            if(!$user) throw new \Exception('Barang tidak ditemukan');

            $user->update($request->all());

            return response()->json([
                'status'=> true,
                'message'=> 'Berhasil Update data',
                'data'=> $user
                ],200);
        }
        catch(\Exception $e){
            return response()->json([
                'status'=> false,
                'message'=> $e->getMessage(),
                'data'=> []
                ],400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try{
            $user = User::find($id);
            if(!$user) throw new \Exception('Barang tidak ditemukan');

            $user->delete();

            return response()->json([
                'status'=> true,
                'message'=> 'Berhasil Delete Data',
                'data'=> $user
                ],200);

        }
        catch(\Exception $e){
            return response()->json([
                'status'=> false,
                'message'=> $e->getMessage(),
                'data'=> []
                ],400);
        }
    }
}
