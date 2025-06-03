<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;


class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return auth()->user()->tasks;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //try {

            $isvalidate = Validator::make($request->all(), [
                'title' => 'required',
                'description' => 'nullable',
                'user_id' => 'required',
            ]);

            if($isvalidate->fails()){
                $data = [
                    'message' => 'validation require, check the data',
                    'error' => $isvalidate->errors(),
                    'status' => 400,
                ];

                return response()->json($data, 400);

            }

            $task = Tasks::create([
                'title' => $request->title,
                'description' => $request->description,
                'user_id' => $request->user_id,
            ]);

         
            if(!$request){
                $data = [
                    'message' => 'not is possible create task ',
                    'error' => $isValidate->errors(),
                    'status' => 400,
                ];

                return response()->json($data, 400);
            }

            response()->json(201);

            #$task = auth()->user()->tasks()->create($validated);

            #return response()->json($task, 201);

        //} catch (\Throwable $th) {
          //  return response()->json();
        //}
    }

    /**
     * Display the specified resource.
     */
    public function findOne($id)
    {
        $aTask = auth()->user()->tasks()->find($id);
     
        if(!$aTask) return response(['message' => 'Task not found'], 404);

        return response()->json($aTask, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tasks $tasks)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tasks $tasks)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tasks $tasks)
    {
        //
    }
}
