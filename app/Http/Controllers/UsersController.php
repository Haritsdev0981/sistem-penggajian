<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Division;

use Hash;
class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('level', "!=", 'admin')->get()->all();
        return view('employee.index', compact('user'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        $this->validate(
            $request,
            [
                'email' => 'required|email|unique:users,email' .$user->id
            ],
            [
                'email.unique' => 'Email already used',
            ]
        );
         $data = [
            'name' => $request['name'],
            'no_hp' => $request['no_hp'],
            'email' => $request['email'],
            'status' => $request['status'],
            'level' => $request['level'],
            'password' => Hash::make($request['password']),
         ];
        User::create($data);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = EmployeList::all();
        return view('employee.index', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         // Cari pengguna berdasarkan ID
        $user = User::find($id);

        // Reset password menjadi "password123" (Anda dapat mengubahnya sesuai kebutuhan)
        $user->password = Hash::make('password123');
        $user->save();

    // Redirect atau tampilkan pesan sukses
    return redirect()->back()->with('success', 'Password reset successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
