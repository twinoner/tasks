<!-- resources/views/tasks/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Task List</h2>
        <a href="{{ route('tasks.create') }}" class="btn btn-success">Create Task</a>

        <div class="row">
            <div class="col-md-6">
                <label for="project_id">Project</label>
                <select class="form-control" id="project-id">
                    <option value="" disabled selected>Select a Project</option>
                    @foreach($projects as $project)
                        <option value="{{ $project->id }}">{{ $project->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        @if(count($tasks) > 0)
            <table class="table" id="myTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Task Name</th>
                        <th>Priority</th>
                        <th>Project</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="sort">
                    @foreach($tasks as $task)
                        <tr data-task-id="{{ $task->id }}" 
                            data-priority="{{ $task->priority }}" 
                            data-task-name="{{ $task->task_name }}" 
                            data-project-id="{{ $task->project_id }}"
                            {{-- style="display: none" --}}
                            class="d-none" id="task_{{ $task->id }}">
                            <td>{{ $task->id }}</td>
                            <td>{{ $task->task_name }}</td>
                            <td id="priority_{{ $task->id }}">{{ $task->priority }}</td>
                            <td>
                                <a href="{{ route('projects.show', $task->project_id) }}" class="href">
                                    {{ $task->project->name}}
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-info">View</a>
                                <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary">Edit</a>
                                <form method="POST" action="{{ route('tasks.destroy', $task->id) }}" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No tasks found.</p>
        @endif
    </div>

    <script src="{{ asset('js/task_filter.js') }}"></script>
@endsection
