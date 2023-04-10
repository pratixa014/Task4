<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return view('user', compact('user'));
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
        $request->validate(
            [
                'name' => 'required',
                'lastname' => 'required',
                'radiobtn' => 'required',
                'age' => 'required',
                'phone' => 'required',
                'is_admin' => 'required',
                'password' => 'required'
            ]
        );
        User::insert([
            'name' => $request->name,
            'last_name' => $request->lastname,
            'gender' => $request->radiobtn,
            'age' => $request->age,
            'phone' => $request->phone,
            'is_admin' => $request->is_admin,
            'password' => Hash::make($request->password),

        ]);

        return redirect()->route('user.index');
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

        $user = User::where('id', $id)->first();
        return view('edit-user', compact('user'));
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

        $user = User::where('id', $id)->first();
        $user->name = $request->get('name');
        $user->last_name = $request->get('lastname');
        $user->gender = $request->get('radiobtn');
        $user->age = $request->get('age');
        $user->save();

        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id', $id)->delete();
        return redirect()->route('user.index');
    }

    public function Search(Request $data)
    {


        $title = $data->title;

        $age = $data->age;
        $username = $data->username;
        $gender = $data->radiobtn;


        $srch = DB::table('todos')->leftJoin('users', 'todos.uid', '=', 'users.id');
        if ($title != null) {
            $srch = $srch->where('todos.title', 'LIKE', "%$title%");
        }

        if ($age != null) {
            $srch = $srch->where('age', '>=', $age);
        }
        if ($username != null) {
            $srch = $srch->Where('users.name', 'LIKE', "%$username%");
        }
        if ($gender != null) {
            $srch = $srch->Where('users.gender', '=', $gender);
        }



        $srch = $srch->select('todos.title', 'todos.id', 'todos.uid', 'users.name', 'users.age', 'users.gender')
            ->get();


        return view('searchpage', compact('srch'));
    }
}
