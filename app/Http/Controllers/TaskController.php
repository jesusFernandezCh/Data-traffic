<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use App\Http\Requests\RequestTask;

class TaskController extends Controller
{
    private $task;

    /**
     * Constuct class
     * @param Task $stmt [description]
     */
    public function __construct(Task $stmt)
    {
        $this->task = $stmt;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = $this->task->all();
        return response()->json('tasks',$tasks);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestTask $request)
    {
        try {
            $this->task->create($request->all());
            return response()->json(['created'=> true]);
        } catch (Exception $e) {
            return Response()->json(['created' => false], 500);
        }
    }

   
     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(RequestTask $request, Task $task)
    {
        $task->update($request->all());
        $task->save();
        return response()->json(['update' => true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return response()->json(['delete' => true]);
    }

    /**
     * Display a listing of the resource.
     * @param [type] $id   [id distributor]
     * @param [type] $date [$date of $tasks]
     */
    public function tasksToday($id, $date)
    {
        $task = $this->task->find($id);
        if (isste($task->id)) {
            $tasks = $task->get()->where('distribuidor',$id)->where('fecha',$date);
            \Cache::put('tasksToday', $tasks, 5);//guarda la lista en caché durante 5 min.
            return response()->json(['tasksToday'=>$tasks]);
        }else{
            return response()->json(['El distribudor no esta registrado',500]);
        }
    }
}
