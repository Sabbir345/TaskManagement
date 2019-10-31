<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    
	public $request = null;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    public function adminIndex(){
    	return view('Admin.dashboard');
    }
    public function allTaskList(){

    	$searchkey       = $this->request->search;
        $perPage         = $this->request->per_page;

        if($searchkey){
        	$tasks = Task::where('task_name', 'like', "%$searchkey%")
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
            ]);
        }
    }
    public function taskAdd(){

        $datas = $this->request->all();

        $task  = new Task();

        $task->task_name        = $this->request->task_name;
        $task->description      = $this->request->description;
        $task->permission       = auth()->guard('admin')->user()->permission;
        $task->user_id          = auth()->guard('admin')->user()->id;

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
    public function AdminLogout(Request $request)
    {
        Auth::guard('admin')->logout();

        
        return redirect()->guest(route( 'admin.auth.login' ));
    }
}
