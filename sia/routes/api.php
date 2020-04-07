<?php

use Illuminate\Http\Request;
use App\Major;
use App\Student;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('/majors', function (Request $req) {
    $majors = Major::where('code', '!=', null)
    ->orderBy('code', 'asc')
    ->get();


    return $majors;
});

Route::get('/majors/{id}', function ($id) {
    $major = Major::find($id);
    if ($major == null) {
        return response()->json([
            'error' => 'Resource not found'
        ], 404);
    }

    $students = Student::where('major_id','=',$id)->get();

    return response()->json([
      'major'=>$major,
      'students'=>$students
    ], 200);
});

Route::post('/majors', function (Request $req) {
    $validator = Validator::make($req->all(), [
        'name' => 'required|max:255',
        'code' => 'required|max:4',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'error' => [
                'messages' => $validator->messages()
            ]
        ], 400);
    }

    $major = new Major;
    $major->code = $req->code;
    $major->name = $req->name;
    $major->save();

    return response()->json($major, 201);
});

Route::put('/majors/{id}', function (Request $req, $id) {
    $major = Major::find($id);
    $major->code = $req->code;
    $major->name = $req->name;
    $major->save();

    return response()->noContent();
});

Route::delete('/majors/{id}', function ($id) {
    $major = Major::find($id);
    if ($major==null) {
        return response()->json([
            'error' => [
                'message' =>'Major is not found'
            ]
        ], 404);
    }

    //$defMajor = Major::where('code', '=', null)
        //->first();
    Student::where('major_id', '=', $id)
        ->update(array('major_id' => null));

    $major->delete();
    return response() -> json([
      'message' =>  'Major is deleted'

    ]);
});

Route::get('/students', function () {
    $students = Student::with('major')->get();
    return response()->json($students, 200);
});

Route::get('/students/{id}', function ($id) {
    $student = Student::with('major')->find($id);
    return response()->json($student, 200);
});



Route::post('/students', function (Request $req) {
    $validator = Validator::make($req->all(), [
        'id' => 'required',
        'name' => 'required|max:255',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'error' => [
                'messages' => $validator->messages()
            ]
        ], 400);
    }

    $major=Major::find($req->input('major_id'));
    if ($major==null) {
        return response()->json([
            'error'=> [
                'message' => 'Major with id'.$req->input('major_id'). 'is not found'
            ]
        ], 400);
    }

    $student = new Student;
    $student->id = $req->input('id');
    $student->name = $req->input('name');
    $major->students()->save($student);

    return response()->json($student, 201);
});

Route::put('/students/{id}', function (Request $req, $id) {
    $validator = Validator::make($req->all(), [
        'id' => 'required',
        'name'=> 'required|max:255',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'error' => [
                'messages'=>$validator->messages()
            ]
        ], 400);
    }


    $major = Major::find($req->input('major_id'));


    if ($major==null) {
        return response()->json([
            'error' => [
                'message'=> 'Major with id'.$req->input('major_id'). 'is not found'
            ]
        ], 400);
    }

    $student = Student::find($id);
    $student->name = $req->input('name');
    $major->students()->save($student);
    //aslinya 204, tapi kalo 204 no content jadi coba pake 201
    return response()->json($student, 201);
});

Route::delete('/students/{id}', function ($id) {
    $student = Student::find($id);
    if ($student == null) {
        return response()->json([
            'error'=>[
                'message' => 'Student is not found'
            ]
        ], 404);
    }

    $student->delete();
    return response()->noContent();
});



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
