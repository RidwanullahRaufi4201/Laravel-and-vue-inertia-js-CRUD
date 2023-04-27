<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\TodoModel;

class TestController extends Controller
{
    public function index()
    {
        return Inertia::render('crud',['todos'=>TodoModel::all()]);
    }

    public function create()
    {
        return Inertia::render('create');
    }
    public function store(Request $request)
    {
               $request->validate([
                    'name'=>'required',
                     'age'=>'required',
                     'email'=>'required'
               ]);
            TodoModel::create(['name'=>$request->name,'age'=>$request->age,'email'=>$request->email]);
            
            return redirect()->route('crud');
    }


    public function delete($id)
    {
             TodoModel::find($id)->delete();
             return redirect()->route('crud');
    }


    public function viewTodo($id)
    {
           $todo=TodoModel::find($id);
           return Inertia::render('viewTodo',['todo'=>$todo]);
    }


    public function editTodo($id)
    {
        $todo=TodoModel::find($id);
        return Inertia::render('editCrud',['todo'=>$todo]);
    }

    public function update(Request $request)
    {



        return redirect()->route('crud');
    }
}
