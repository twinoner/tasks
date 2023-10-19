<!-- resources/views/tasks/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Task</h2>
        <form method="POST" action="{{ route('tasks.update', $task->id) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="task_name">Task Name</label>
                <input type="text" class="form-control" id="task_name" name="task_name" value="{{ $task->task_name }}" required>
            </div>
            
            <div class="form-group">
                <label for="priority">Priority</label>
                <input type="number" class="form-control" id="priority" name="priority" value="{{ $task->priority }}" required>
            </div>

            <div class="form-group">
                <label for="project_id">Project</label>
                <select class="form-control" id="project_id" name="project_id" required>
                    @foreach($projects as $project)
                        <option value="{{ $project->id }}" {{ $project->id === $task->project_id ? 'selected' : '' }}>
                            {{ $project->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
