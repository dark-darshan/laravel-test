<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Yajra\DataTables\DataTables;
use App\Http\Requests\User\CreateRequest;
use App\Http\Requests\User\EditRequest;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if(request()->ajax()) {
            return datatables()->of(User::select('*'))
            ->addColumn('action', 'users.action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
            }
            return view('users.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        $data = $request->all();
        $user = User::createUpdate(new User, $request);
        $message = 'User added successfully!';
        return redirect('/users')->with('info', $message);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditRequest $request, User $user)
    {
        $user = User::createUpdate($user, $request);
        $message = 'User updated successfully!';
        return redirect('/users')->with('info', $message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        // 
    }

    public function removeMulti(Request $request)
    {
        $ids = $request->ids;
        if(explode(",",$ids)){
            User::whereIn('id',explode(",",$ids))->delete();
        }else{
            User::whereIn('id',$ids)->delete();
        }
        return response()->json(['status'=>true,'message'=>"Student successfully removed."]);         
    }
}
