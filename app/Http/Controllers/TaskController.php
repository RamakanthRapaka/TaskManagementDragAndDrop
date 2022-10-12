<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Http\Requests\TaskRequest as MainRequest;
use App\Http\Resources\TaskResource as Resource;
use App\Models\Task as Model;
use Illuminate\Validation\Rule;
use Log;

class TaskController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Model $task) {
        return Resource::collection($task->all_orderd_tasks());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
                    'project_id' => 'required|exists:projects,id',
                    'name' => 'required|string|between:2,100|unique:tasks',
                    'order' => 'required|numeric',
                    'priority' => [
                        'required',
                        Rule::in(['high', 'medium', 'low']),
                    ],
        ]);

        $result = Model::latest()->first();
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $task = Model::create([
                    'project_id' => $request->project_id,
                    'name' => $request->name,
                    'priority' => $request->priority,
                    'order' => $result->id + 1
        ]);

        return response()->json([
                    'message' => 'Task successfully created',
                    'task' => $task
                        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Model $task) {
        return new Resource($task);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatetaskorder(Request $request) {
        $order = str_replace("#task", "", $request->order);
        Log::info('------------');
        Log::info($order);
        Log::info($order);
        Log::info('------------');
        Model::where('id', '=', $order)->update(array('order' => $request->number));
        return response()->json('successful action.', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Model $task) {
        $task->delete();
        return response()->json('successful action.', 204);
    }

}
