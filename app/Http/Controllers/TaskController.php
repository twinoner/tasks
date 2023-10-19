<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Project;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    // Display a list of tasks
    public function index()
    {
        $projects = Project::has('tasks')->get();
        $tasks = Task::orderBy('priority')->orderBy('task_name')->get();
        return view('tasks.index', compact('tasks', 'projects'));
    }

    // Show the details of a specific task
    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    // Show the form for creating a new task
    public function create()
    {
        $projects = Project::all();
        return view('tasks.create', compact('projects'));
    }

    // Store a newly created task in the database
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'task_name' => 'required|string|max:255',
            'priority' => 'required|integer',
            'project_id' => 'required|exists:projects,id'
        ]);

        // Create a new task with the validated data
        $task = Task::create($validatedData);

        // Redirect to the task index page with a success message
        return redirect()->route('tasks.index')
            ->with('success', 'Task "' . $task->task_name . '" created successfully.');
    }

    public function sortTaskPriority(Request $request, $taskId)
    {
        // Get the JSON data from the request
        $requestData = $request->json()->all();

        // Define the validation rules
        $rules = [
            // 'task_name' => 'required|string|max:255',
            'priority' => 'required|integer',
            // 'project_id' => 'required|exists:projects,id'
        ];

        // Create a validator instance
        $validator = Validator::make($requestData, $rules);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400); // Bad request
        }

        // Update the Task model
        $task = Task::find($taskId);
        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404); // Not found
        }

        // $task->task_name = $requestData['task_name'];
        // $task->project_id = $requestData['project_id'];
        $task->priority = $requestData['priority'];
        // Update other fields as needed

        $task->save();

        // Return a success response
        return response()->json(['message' => 'Task updated successfully']);
    }


    // Show the form for editing an existing task
    public function edit(Task $task)
    {
        $projects = Project::all();
        return view('tasks.edit', compact('task', 'projects'));
    }

    // Update the specified task in the database
    public function update(Request $request, Task $task)
    {
        $validatedData = $request->validate([
            'task_name' => 'required|string|max:255',
            'priority' => 'required|integer',
            'project_id' => 'required|exists:projects,id', // Validate project_id exists
        ]);

        $task->update($validatedData);

        return redirect()->route('tasks.index')
            ->with('success', 'Task updated successfully.');
    }

    // Remove the specified task from the database
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')
            ->with('success', 'Task deleted successfully.');
    }
}
