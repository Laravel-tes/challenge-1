<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use DateTime;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;


class TasksController extends Controller
{
    public function index()
    {
        return auth()->user()->tasks;
    }

    public function store(Request $request)
    {

        try {
            
            $isvalidate = Validator::make($request->all(), [
                'title' => 'required | string | max:150',
                'description' => 'nullable',
                'user_id' => 'required | integer',
            ]);

            if($isvalidate->fails()){
                $data = [
                    'message' => 'validation require, check the data',
                    'error' => $isvalidate->errors(),
                    'status' => 400,
                ];

                return response()->json($data, 400);

            }

            Tasks::create([
                'title' => $request->title,
                'description' => $request->description,
                'user_id' => $request->user_id,
            ]);

         
            if(!$request){
                $data = [
                    'message' => 'not is possible create task ',
                    'error' => $isvalidate->errors(),
                    'status' => 400,
                ];

                return response()->json($data, 400);
            }

            return response()->json(null, 201);

        } catch (\Throwable $th) {    
            return response()->json($th, 400);
        }

    }

    public function updateStatus(Request $request, $id){
        try {

            $isValidate = Validator::make($request->all(), [
                'status' => 'required|in:pending,in_progress,completed',
            ]);

            if($isValidate->fails()){

                $data = ['message' => 'Validation error', 'error' => $isValidate->errors(), 'status' => 400];

                return response()->json($data, 400);
            }

            $aTask = auth()->user()->tasks()->find($id);

            if(!$aTask) return response(['message'=> 'Task not found'], 404);

            $task = Tasks::where('id', $id)->where('user_id', $aTask->user_id)->first();

            if(!$task){
                $data = ['message' => 'task not found', 'status'=> 404];
                return response()->json($data, 404);
            }

            $task->status = $request->status;
            $task->save();

            $data = ['message'=> 'status changed', 'status'=> 200];

            return response()->json($data, 200);

        } catch (\Throwable $th) {
            return response()->json($th, 400);
        }
    }


    public function findOne($id)
    {
        $aTask = auth()->user()->tasks()->find($id);
     
        if(!$aTask) return response(['message' => 'Task not found'], 404);

        return response()->json($aTask, 200);
    }

    public function filterByStatus($status)
    {

        if($status == 'pending') {
            $aTask = auth()->user()->tasks->where('status', 'pending');
         
            if(!$aTask) return response(['message' => 'Task not found'], 404);
    
            return response()->json($aTask, 200);
        }

        if($status == 'progress') {
            $aTask = auth()->user()->tasks->where('status', 'in_progress');
         
            if(!$aTask) return response(['message' => 'Task not found'], 404);
    
            return response()->json($aTask, 200);
        }

        if($status == 'completed') {
            $aTask = auth()->user()->tasks->where('status', 'completed');
         
            if(!$aTask) return response(['message' => 'Task not found'], 404);
    
            return response()->json($aTask, 200);
        }

        $data = [
            'message' => "$status, is not defined.  Try this { pending | progress | completed}",
            'status' => 404
        ];

        return response()->json($data, 200);

    }


    public function update(Request $request, $id)
    {

        $aTask = auth()->user()->tasks()->find($id);
        if(!$aTask) return response(['message'=> 'Task Not found'], 404);

        $isvalidate = Validator::make($request->all(), [
            'title' => 'required | string | max:150',
            'description' => 'nullable'
        ]);

        if($isvalidate->fails()){

            $data = ['message' => 'validation is require, check the data', 'error' => $isvalidate->errors(), 'status' => 400];

            return response()->json($data, 400);
        }

        $aTask->title = $request->title;
        $aTask->description = $request->description;

        $aTask->save();

        return response()->json(null, 204);
    }

  
    public function delete($id)
    {
        $aTask = auth()->user()->tasks()->find($id);

        if(!$aTask) return response(['message'=> 'Task not found'], 404);

        Tasks::where('id', $id)->delete();

        return response()->json($aTask->user_id, 200);
        
    }
}
