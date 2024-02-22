<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\todo;

class todosController extends Controller
{
    //
    public function index() {
        return todo::All();
    }
    public function store(Request $request){

        $this->validate($request, [
            'title' => 'required',
        ]);

        $todo = new todo();
        $todo->title = $request->title;
        $todo->save();

        return $todo;
    }
    public function show(todo $todo) {
        return $todo;
    }
    public function update(Request $request,todo $todo) {
        $this->validate($request, ['title'=>'required']);
        $todo->title = $request->title;
        $todo->save();
        return $todo;
    }
    public function destroy($id) {
        $todo = todo::find($id);
        if(is_null($todo)){
            return response()->json("El usuario no existe",404);
        }

        $todo->delete();
        return response()->json(['message'=> 'Todo has been deleted']);
    }
}
