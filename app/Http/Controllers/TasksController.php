<?php

namespace App\Http\Controllers;

use App\TodoLog;
use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Session;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $tasks = Task::with('logs')->orderBy('priority', 'asc')->paginate(3);

        return view('tasks.index')->with('tasks', $tasks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validating database
        $this->validate($request , [
          'name' => 'required|string|max:255|min:3',
          'description' => 'required|string|max:10000|min:10',
        ]);
        // Create a New Task
        $task = new Task;
        // Assign
        $task->name = $request->name;
        $task->description = $request->description;
        $task->priority = $request->priority;
        $task->progress = $request->progress;

        $task->save();
        // FLASH
        Session::flash('success', 'Created Task Succesfully');
        // Return A Redirect LoL XD
        return redirect()->route('task.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(\App\Models\Task $task)
    {
        $task->load('logs');
        return view('tasks.show', compact('task'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::find($id);
        return view('tasks.edit')->withTask($task);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      // Validating database
      $this->validate($request , [
        'name' => 'required|string|max:255|min:3',
        'description' => 'required|string|max:10000|min:10',
      ]);
      // Find the related task
      $task = Task::find($id);
        $log = new TodoLog();
        $log->old_name = $task->name;
        $log->new_name = $request->name;
        $log->old_description = $task->description;
        $log->new_description = $request->description;
        $log->old_priority = $task->priority;
        $log->new_priority = $request->priority;
        $log->old_progress = $task->progress;
        $log->new_progress = $request->progress;
        $log->task_id = $task->id;
      // Assign
      $task->name = $request->name;
      $task->description = $request->description;
      $task->priority = $request->priority;
      $task->progress = $request->progress;

      $task->save();
        $log->save();
      // FLASH
      Session::flash('success', 'Saved The Task Succesfully');
      // Return A Redirect LoL XD
      return redirect()->route('task.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    $task = Task::find($id);

    $task->delete();

    Session::flash('success', 'Deleted The Task Succesfully');

    return redirect()->route('task.index');
    }

    public function clear($id)
    {
    $task = Task::find($id);

    $task->logs()->delete();

    Session::flash('success', 'Cleared log Succesfully!');
        return redirect()->route('task.index');
    }


}
