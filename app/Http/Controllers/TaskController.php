<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function __construct(){
    $this->middleware('auth');
    }
    public function index(){

      // $tasks =  DB::table('tasks')->get();
        $tasks = Task::where('user_id',Auth::id())->orderBy('created_at','desc')->paginate(5);
         return view('task',compact('tasks'));
     }

    public function store(Request $REQUEST){


      /*  DB::table('tasks')->insert([
            'name'=>$REQUEST->name,
            //'created_at'=>now(),
            'created_at'=>now()
        ]);*/
        $task = new Task;
        $task->name = $REQUEST->name;
        $task -> user_id = Auth::id();
        $task->save();
        return redirect()->back();
    }
    public function delete($id){
        DB::table('tasks')->where('id','=', $id)->delete();
        return redirect()->back();
    }
     public function edit($id)
     {
       $task = DB::table('tasks')->where('id','=', $id)->first();
         return view('edit',compact('task'));
     }
    public function update(Request $request, $id){
      DB::table('tasks')->where('id','=', $id)->update([
           'name' => $request->name
        ]);

        return redirect()->back();
    }



}

