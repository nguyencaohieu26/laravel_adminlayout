<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\roles;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/accounts/index',['accounts'=>Account::all(),'roles'=>roles::all()]);
    }

    /** Show the form for creating a new resource.*/
    public function create()
    {
        return view('admin/accounts/create');
    }

    /* Store a newly created resource in storage.*/
    public function store(Request $request)
    {
        //Validate information
        //The file under validation must be an image (jpg, jpeg, png, bmp, gif, svg, or webp).
       $validate =  $request->validate([
            'full_name' => 'required',
            'username' => 'required|unique:accounts,username',
            'email'    => 'required|email',
            'address'  => 'required',
            'password' => 'required',
            'phone'    => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'image' =>'required|mimes:jpg,png,jpeg|max:5048'
        ]);

            //Change image image
            $newImageName = time() .'-'.$request->username . '.' .$request->image->extension();
            //Move image to public folder
            $request->image->move(public_path('images'),$newImageName);
            //Create new Account
            $account = new Account();
            $account->fullname  =$request->input('full_name');
            $account->email     =$request->input('email');
            $account->username  = $request->input('username');
            $account->address   = $request->input('address');
            $account->phone     = $request->input('phone');
            $account->image     = $newImageName;
            $account->status    = $request->input('status');
            $account->password  = md5($request->input('password'));
            $account->save();

            return redirect()->route('accounts.index')->with('create', 'Create User Successful');
    }

    /* Display the specified resource. */
    public function show(Account $account){}

    /** Show the form for editing the specified resource.*/
    public function edit($id)
    {
       return view('admin/accounts/edit',['account'=>Account::findOrFail($id)]);
    }

    /** Update the specified resource in storage. **/
    public function update(Request $request, $id)
    {
        //Change image image
        $newImageName = time() .'-'.$request->username . '.' .$request->image->extension();
        //Move image to public folder
        $request->image->move(public_path('images'),$newImageName);
        //Find account
        $account = Account::findOrFail($id);
        $account->username = $request->username;
        $account->fullname = $request->full_name;
        $account->email    = $request->email;
        $account->password = md5($request->password);
        $account->phone    = $request->phone;
        $account->address  = $request->address;
        $account->status   = $request->status;
        $account->image    = $$newImageName;
        //update
        $account->save();
        return redirect()->route('accounts.index')->with('update', 'Update User Successful');

    }

    /** Remove the specified resource from storage.*/
    public function destroy($id)
    {
        $res = Account::destroy($id);
        return "Remove successfully";
        //
    }
}
