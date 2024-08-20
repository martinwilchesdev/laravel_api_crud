<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentsController extends Controller
{
    //
    public function index(): JsonResponse {
        $students = Student::all();
        if ($students->isNotEmpty()) {
            return response()->json($students, 200);
        }

        return response()->json([
            'message' => 'No se encontraron estudiantes',
            'status' => 404
        ], 404);
    }

    public function store(Request $request): JsonResponse {
        $validated = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'phone' => 'required|digits:10',
            'email' => 'required|email|unique:students',
            'language' => 'required|in:Spanish,English'
        ]);

        if ($validated->fails()) {
            return response()->json([
                'message' => 'Error en la validacion de los datos',
                'errors' => $validated->errors(),
                'status' => 400
            ], 400);
        }

        $student = Student::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'language' => $request->language
        ]);

        if (!$student) {
            return response()->json([
                'message' => 'Error al crear el estudiante',
                'status' => '500'
            ], 500);
        }

        return response()->json($student, 201);
    }

    public function show($id) {
        $student = Student::find($id);

        if (!$student) {
            return response()->json([
                'message' => 'El estudiante no existe',
                'status' => 404
            ], 404);
        }

        return response()->json($student, 200);
    }

    public function destroy($id) {
        $student = Student::find($id);

        if (!$student) {
            return response()->json([
                'message' => 'El estudiante no existe',
                'status' => 404
            ], 404);
        }

        $student->delete();

        return response()->json($student, 204);
    }
}
