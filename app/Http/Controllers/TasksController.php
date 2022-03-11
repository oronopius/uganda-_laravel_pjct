<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Exception;
use Illuminate\Http\Request;


class TasksController extends Controller
{
    public function saveTask(Request $request){
        $task = new Task();

        $task->title = $request->title;
        $task->description = $request->description;

        // Call save to write to database table
        if(!$task->save()){
            return response('Failed to save', 400);
        }
    
        return response('Task saved successfully', 201);
    }

    public function getTasks()
    {
        $tasks = Task::all();
        return $tasks;
    }

    public function updateTask(Request $request){
        $taskToUpdate = $this->getTask($request->id);
        if($taskToUpdate == null){
            return response('Task with id not found', 400);
        }
        $taskToUpdate->title =  $request->title;
        $taskToUpdate->description =  $request->description;
        
        if(!$taskToUpdate->save()){
            return response('Failed to save', 400);
        }

        return response('Saved successfully', 201);

    }

    public function deleteTask($id){
        $taskToDelete = $this->getTask($id);
        if($taskToDelete == null){
            return response('Task with id not found', 400);
        }

        $taskToDelete->delete();
        return response('Deleted successfully', 200);
    }

    private function getTask($id){
        try{
            return Task::find($id);
        }catch(Exception $e){
            return null;
        }
    }
}
