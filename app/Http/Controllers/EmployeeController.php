<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if(auth()->user()->email !== 'admin@gmail.com'){
            return redirect()->route('home')->with('message', 'Anda bukan admin');
        }
        $pageTitle = 'Admin';

        // RAW SQL QUERY
        $employees = DB::select('
            select *
            from employees
        ');

        return view('employee.index', [
            // 'pageTitle' => $pageTitle,
            'employees' => $employees
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $pageTitle = 'Create Employee';
    // RAW SQL Query
    return view('employee.create', compact('pageTitle'));
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $messages = [
        'required' => ':Attribute harus diisi.',
        'email' => 'Isi :attribute dengan format yang benar',
        'numeric' => 'Isi :attribute dengan angka'
    ];

    $validator = Validator::make($request->all(), [
        'name' => 'required',
        'alamat' => 'required',
        'masukan' => 'required',
        'email' => 'required|email',
        'age' => 'required|numeric',
    ], $messages);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // INSERT QUERY
    DB::table('employees')->insert([
        'name' => $request->name,
        'alamat' => $request->alamat,
        'email' => $request->email,
        'age' => $request->age,
        'masukan' => $request->masukan,

    ]);

    return redirect('/home')->with('success', 'Feedback telah dikirim.');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
{
    $pageTitle = 'Employee Detail';

    // RAW SQL QUERY
    $employee = collect(DB::select('
        select *
        from employees
        where id = ?
    ', [$id]))->first();

    return view('employee.show', compact('pageTitle', 'employee'));
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
{
    $employee = DB::table('employees')->where('id', $id)->first();
    $masukan = $employee->masukan;

    // ...
    return view('employee.edit', compact('employee', 'masukan'));
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $messages = [
        'required' => ':Attribute harus diisi.',
        'email' => 'Isi :attribute dengan format yang benar',
        'numeric' => 'Isi :attribute dengan angka'
    ];

    $validator = Validator::make($request->all(), [
        'name' => 'required',
        'alamat' => 'required',
        'masukan' => 'required',
        'email' => 'required|email',
        'age' => 'required|numeric',
    ], $messages);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput($request->all());
    }

    DB::table('employees')
        ->where('id', $id)
        ->update([
            'name' => $request->name,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'age' => $request->age,
            'masukan' => $request->masukan,
        ]);

    return redirect()->route('employees.index');
}



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    // QUERY BUILDER
    DB::table('employees')
        ->where('id', $id)
        ->delete();

    return redirect()->route('employees.index');
}
}
