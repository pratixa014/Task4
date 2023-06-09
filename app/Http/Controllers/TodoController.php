<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $todos = Todo::all();
        $user_data = User::all();
        return view('todo', compact('todos', 'user_data'));
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
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'des' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->route('todos.index')->withErrors($validator);
        }
        // dd($request->dropdown);
        Todo::create([
            'title' => $request->title,
            'des' => $request->des,
            'uid' => $request->dropdown,
        ]);

        return redirect()->route('todos.index')->with('success', 'Inserted');
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
        //
        $todo = Todo::where('id', $id)->first();
        return view('edit-todo', compact('todo'));
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
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'des' => 'required'

        ]);

        if ($validator->fails()) {
            return redirect()->route('todos.edit', ['todo' => $id])->withErrors($validator);
        }
        $todo = Todo::where('id', $id)->first();
        $todo->title = $request->get('title');
        $todo->des = $request->get('des');
        $todo->is_completed = $request->get('is_completed');
        $todo->save();

        return redirect()->route('todos.index')->with('success', 'Updated Todo');

        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
    }
    public function destroy($id)
    {
        Todo::where('id', $id)->delete();
        return redirect()->route('todos.index')->with('success', 'Deleted Todo');
    }
    public function tododata(Request $request)
    {
        $todos = Todo::all();
        return view('todolist', compact('todos'));
    }
}
