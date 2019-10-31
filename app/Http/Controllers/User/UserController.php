<?php

namespace App\Http\Controllers\User;

use Auth;
use Carbon;
use App\Models\Task;
use App\Events\TaskEvent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    
	public $request = null;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    public function index(){

    	return view('User.dashboard');
    }
    public function allTaskList(){

    	$searchkey       = $this->request->search;
        $perPage         = $this->request->per_page;

        $authorId = Auth::user()->id;

        if($searchkey){
        	$tasks = Task::where('task_name', 'like', "%$searchkey%")
        				   // ->where('user_id', $authorId)
        				   // ->where('permission', 0)
						   ->orderBy('id', 'DESC')
						   ->paginate($perPage);
        }else{
   			$tasks = Task::orderBy('id', 'DESC')
						   ->paginate($perPage);
        }

        if($this->request->wantsJson()) {
            return response()->json([
                'status' => true,
                'tasks'  => $tasks,
                'authId' => $authorId
            ]);
        }
    }
    public function taskAdd(){

        $datas = $this->request->all();

        $task  = new Task();

        $task->task_name        = $this->request->task_name;
        $task->description      = $this->request->description;
        $task->permission       = Auth::user()->permission;
        $task->user_id          = Auth::user()->id;

        $task->save();

        if($this->request->wantsJson()) {
            return response()->json([
                'status' => true,
            ]);
        }
    }
    public function editData(){
        $task = Task::find($this->request->id);
        if($this->request->wantsJson()) {
            return response()->json([
                'status' => true,
                'task'   => $task
            ]);
        }
    }
    public function taskUpdate(){

        $task = Task::find($this->request->id);

        $task->task_name        = $this->request->task_name;
        $task->description      = $this->request->description;
        if($this->request->is_complete == 1){
            event(new TaskEvent($this->request->id));
        }else{
            $task->is_complete = 0;
        }

        $task->save();

        if($this->request->wantsJson()) {
            return response()->json([
                'status' => true,
            ]);
        }
    }
    public function taskDelete(){

        $task = Task::find($this->request->id);

        $task->delete();

        if($this->request->wantsJson()) {
            return response()->json([
                'status' => true,
            ]);
        }
    }
    public function logout(Request $request) {
      Auth::logout();
      return redirect('/');
    }
}
