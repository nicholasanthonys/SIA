<?php

use App\Major;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/locale/{locale}', function ($locale) {
    Session::put('app_locale', $locale);
    
    return redirect()->back();
});

Route::get('/', function () {
    return view('home');
});


//Majors


Route::get('/majors', function () {
    $majors = Major::where('code', '!=', null)
        ->orderBy('code', 'asc')
        -> get();

    return view('major/index', [
        'majors' => $majors,
    ]);
});


Route::post('/majors', function (Request $req) {
    $validator = Validator::make($req->all(), [
        'name' => 'required|max:255',
        'code' =>'required|max: 4',
    ]);
    
    if ($validator ->fails()) {
        return redirect('/majors/new')
            ->withInput()
            ->withErrors($validator);
    }

    $major = new Major;
    $major->code = $req->code;
    $major->name = $req->name;
    $major->save();

    return redirect('/majors');
});


Route::get('/majors/new', function () {
    return view('major/new');
});


Route::delete('/majors/{id}', function ($id) {
    $major = Major::findOrFail($id);

    $defMajor = Major :: where('code', '=', null)
-> first();
    Student :: where('major_id', '=', $id)
-> update(array( 'major_id' => $defMajor -> id));

    $major->delete();

    return redirect('/majors');
});


//Students


Route::get('/students', function () {
    $students = Student::get();
    //dd($students);
    return view('student/index', [
        'students' => $students,
    ]);
});



Route::post('/students', function (Request $req) {
    $validator = Validator::make($req->all(), [
        'id'=>'required',
        'name' => 'required|max:255',
    ]);

    if ($validator->fails()) {
        return redirect('/students/new')
            ->withInput()
            ->withErrors($validator);
    }
    
    $major = Major::find($req->major_id);

    $student = new Student;
    $student->id = $req->id;
    $student->name = $req->name;
    $major->students()->save($student);

    return redirect('/students');
});


Route::get('/students/new', function () {
    $majors = Major::where('code', '!=', '') -> orderBy('code', 'asc')->get();
    return view('student/new', [
        'majors' => $majors,
    ]);
});


Route::delete('/students/{id}', function ($id) {
    Student::findOrFail($id)->delete();

    return redirect('/students');
});
