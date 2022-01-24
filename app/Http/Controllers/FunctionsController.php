<?php

namespace App\Http\Controllers;

use App\Models\Functions;
use Illuminate\Http\Request;

class FunctionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/functions/index',['functions'=>Functions::paginate(3)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin/functions/create');
    }

    /** Store a newly created resource in storage. */
    public function store(Request $request)
    {
        //validate information
        //The field under validation must be a valid URL.
        $validateFile = $request->validate([
            'function_code' =>'required|unique:functions,Func_Code',
            'function_url'  => 'required|url',
            'function_name' => 'required',
            'description'   => 'required',
            'show_menu' => 'required',
            'status' => 'required',
        ]);
        //create instance function
        $function = new Functions();
        $function->Func_Code    = $request->function_code;
        $function->Func_Url     = $request->function_url;
        $function->Func_Name    = $request->function_name;
        $function->Description  = $request->description;
        $function->status       = $request->status;
        $function->show_menu    = $request->show_menu;
        //save into database
        $function->save();
        return redirect()->route('functions.index')->with("create",'Create function successful');
    }

    /** Display the specified resource. */
    public function show(Functions $functions)
    {
        //
    }

    /** Show the form for editing the specified resource. */
    public function edit($id)
    {
        return view('admin/functions/edit',['function'=>Functions::findOrFail($id)]);
    }

    /** Update the specified resource in storage. */
    public function update(Request $request,$id)
    {
        $validate = $request->validate([
//            'function_code' =>'required|unique:functions,Func_Code',
            'function_code' =>'required',
            'function_url'  => 'required|url',
            'function_name' => 'required',
            'description'   => 'required',
            'show_menu' => 'required',
            'status' => 'required',
        ]);
        //Find function
        $functionFind = Functions::findOrFail($id);
        $functionFind->Func_Code   = $request->function_code;
        $functionFind->Func_Url    = $request->function_url;
        $functionFind->Func_Name   = $request->function_name;
        $functionFind->Description = $request->description;
        $functionFind->Show_Menu   = $request->show_menu;
        $functionFind->status      = $request->status;

        //save
        $functionFind->save();
        //redirect to list function
        return redirect()->route('functions.index')->with('update', 'Update Function Successful');
    }

    /** Remove the specified resource from storage. */
    public function destroy($id)
    {
        $res = Functions::destroy($id);
        return "Delete Successfully";
        //
    }
}
