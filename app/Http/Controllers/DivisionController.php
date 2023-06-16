<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Models\Division;
use App\Models\User;
use Illuminate\Http\Request;

class DivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $division = Division::paginate(5);
        return view('division.division', compact('division'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $devisi = Division::get('id_user');
        $user = User::WhereNotIn('id', $devisi)->where('level', 'pic')->get()->all();
        return view('division.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name_division' => 'required|unique:division|max:20',
            'gaji_pokok' => 'required|numeric',
        ]);

        if($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        if($request->gaji_pokok < '4000000' || $request->gaji_pokok > '10000000') {
            return redirect()->back()->with(['failed' => 'Gaji yang ditetapkan tidak masuk min dan max']);
        }

        $data = [
            'name_division' => $request->name_division,
            'gaji_pokok' => $request->gaji_pokok,
            'id_user' => $request->id_user,
        ];

        Division::create($data);

            return redirect()->route('division.index')->with(['success' => 'User Berhasil Dibuat!!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $division = Division::find($id);
        return view('division.edit', compact('division'));
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
        $division = Division::findOrFail($id);
        $data = $request->all();
        $division->update($data);
        return redirect('/division');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Division::findOrFail($id);
        $data->delete();
        return back();
    }
}
