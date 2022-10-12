<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Http\Requests\ProjectRequest as MainRequest;
use App\Http\Resources\ProjectResource as Resource;
use App\Models\Project as Model;
use Log;

class ProjectController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Model $project) {
        return Resource::collection($project->all());
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
        Log::info($request);
        $validator = Validator::make($request->all(), [
                    'name' => 'required|string|between:2,100|unique:projects',
                    'description' => 'required|string|between:2,100',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $project = Model::create(['name' => $request->name,
                    'description' => $request->description]);

        return response()->json([
                    'message' => 'Project successfully created',
                    'project' => $project
                        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Model $project) {
        return new Resource($project);
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
    public function update(MainRequest $request, Model $project) {
        $project->update([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return response()->json('successful action.', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Model $project) {
        $project->delete();
        return response()->json('successful action.', 204);
    }

}
