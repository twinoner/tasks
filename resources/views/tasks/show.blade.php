<!-- resources/views/tasks/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Task Details</h2>
        <table class="table">
            <tbody>
                <tr>
                    <th>ID</th>
                    <td>{{ $task->id }}</td>
                </tr>
                <tr>
                    <th>Task Name</th>
                    <td>{{ $task->task_name }}</td>
                </tr>
                <tr>
                    <th>Priority</th>
                    <td>{{ $task->priority }}</td>
                </tr>
                <tr>
                    <th>Project</th>
                    <td>
                        <a href="{{ route('projects.show', $task->project_id) }}" class="href">
                            {{ $task->project->name}}
                        </a>
                    </td>
                </tr>
                <!-- Add more rows for other task attributes -->
            </tbody>
        </table>
        <a href="{{ route('tasks.index') }}" class="btn btn-primary">Back to Tasks</a>
    </div>
@endsection
