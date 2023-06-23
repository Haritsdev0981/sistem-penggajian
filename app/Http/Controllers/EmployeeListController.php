<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Division;
use App\Models\EmployeeList;

use Validator;

class EmployeeListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        $divisi = Division::where("id_user", $id)->get()->all();
        $employee = EmployeeList::where("id_user", $id)->get()->all();
        return view('employee.detail', compact('user', 'divisi', 'employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $divisi = Division::all();
        return view('employee.edit', compact('user', 'divisi'));
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
        $data = $request->all();
        $datauser = [
            'name' => $data['name'],
            'no_hp' => $data['no_hp'],
            'email' => $data['email'],
            'status' => $data['status'],
            'level' => $data['level'],
        ];

        $dataemployee = [
            'id_user' => $data['id_user'],
            'id_division' => $data['id_division'],
            'photo' => $data['photo'],
            'alamat' => $data['alamat'],
        ];

        $validator = Validator::make($datauser, $dataemployee, [
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if($request->hasFile('photo'))
        {
            $destination_path = 'public/img/profile'; //path tempat penyimpanan (storage/public/images/profile)
            $image = $request -> file('photo'); //mengambil request column photo
            $image_name = $image->getClientOriginalName(); //memberikan nama gambar yang akan disimpan di foto
            $path = $request->file('photo')->storeAs($destination_path, $image_name); //mengirimkan foto ke folder store
            $dataBio['photo'] = $image_name; //mengirimkan ke database
        }

        User::find($id)->update($datauser);
        EmployeeList::create($dataemployee);
        
        return redirect('/employee-list');
        
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
