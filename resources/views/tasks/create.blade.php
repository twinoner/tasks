<!-- resources/views/tasks/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Create Task</h2>
        <form method="POST" action="{{ route('tasks.store') }}">
            @csrf
            <div class="form-group">
                <label for="task_name">Task Name</label>
                <input type="text" class="form-control" id="task_name" name="task_name" required>
            </div>
            <div class="form-group">
                <label for="priority">Priority</label>
                <input type="number" class="form-control" id="priority" name="priority" required min="0" value="0">
            </div>
            <div class="form-group">
                <label for="project_id">Project</label>
                <select class="form-control" id="project_id" name="project_id" required>
                    <option value="" disabled selected>Select a Project</option>
                    @foreach($projects as $project)
                        <option value="{{ $project->id }}">{{ $project->name }}</option>
                    @endforeach
                </select>
            </div>
            <!-- Add more form fields as needed -->
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
