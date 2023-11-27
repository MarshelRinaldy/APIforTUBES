<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $courses = Course::all();
            return response()->json([
                "status"=> true,
                "message"=> 'Berhasil ambil data',
                'data'=> $courses
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status'=> false,
                'message'=> $e->getMessage(),
                'data'=> []
            ],400);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $courses = Course::create($request->all());
            return response()->json([
                'status'=> true,
                'message'=> 'Berhasil insert data',
                'data'=> $courses
            ],200);
        } catch (\Exception $e) {
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
        try {
            $courses = Course::find($id);

            if (! $courses) throw new \Exception('Barang tidka ditemukan');

            return response()->json([
                'status'=> true,
                'message'=> 'Berhasil ambil data',
                'data'=> $courses
            ],200);
        } catch (\Exception $e) {
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
        try {
            $courses = Course::find($id);

            if (! $courses) throw new \Exception('Kursus tidak ditemukan');

            $courses->update($request->all());

            return response()->json([
                'status'=> true,
                'message'=> 'Berhasil update data',
                'data'=> $courses
            ],200);
        } catch (\Exception $e) {
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
        try {
            $courses = Course::find($id);

            if (! $courses) throw new \Exception('Barang tidak ditemukan');

            $courses->delete();

            return response()->json([
                'status'=> true,
                'message'=> 'Berhasil delete data',
                'data'=> $courses
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
