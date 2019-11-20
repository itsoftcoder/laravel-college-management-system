<?php

namespace App\Http\Controllers;

use App\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accounts = Account::orderBy('id','DESC')->get();
        return view('backend/accounts.index',compact('accounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend/accounts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'         => 'required | min:3',
            'manager_name'     => 'required',
            'location'     => 'required',
            'description'  => 'required | max:200',
            'image'        => 'required | image'
        ]);

        $account = new Account();
        $account->name = $request->name;
        $account->manager_name = $request->manager_name;
        $account->location = $request->location;
        $account->description = $request->description;

        if ($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = sha1(time()).'.'.$extension;
            $file->move('storage/accounts_photos/',$filename);
            $account->image = $filename;
        }

        $account->save();
        return redirect()->route('backend_account_manage')->with('status','your account create succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(Account $account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $account = Account::findOrFail($id);
        return view('backend/accounts.edit',compact('account'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'         => 'required | min:3',
            'manager_name'     => 'required | min :2',
            'location'     => 'required | min:2',
            'description'  => 'required | max:200',
            'image'        => 'required | image'
        ]);

        $account = Account::findOrFail($id);

        if ($request->hasFile('image')){
            if (Storage::delete('public/accounts_photos/'.$account->image)) {
                $account->name = $request->name;
                $account->manager_name = $request->manager_name;
                $account->location = $request->location;
                $account->description = $request->description;

                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = sha1(time()) . '.' . $extension;
                $file->move('storage/accounts_photos/', $filename);
                $account->image = $filename;
                $account->update();
                return redirect()->route('backend_account_manage')->with('status','Your account update succesfully');
            }else{
                return "your folder is no file here";
            }
        }else{
            $account->name = $request->name;
            $account->manager_name = $request->manager_name;
            $account->location = $request->location;
            $account->description = $request->description;
            $account->update();
            return redirect()->route('backend_account_manage')->with('status','Your account update succesfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $account = Account::findOrFail($id);

        if (Storage::delete('public/accounts_photos/'.$account->image)){
            $account->delete();
            return redirect()->route('backend_account_manage')->with('status','Your account is deleted');
        }else{
            return "folder is no file here";
        }
    }
}
