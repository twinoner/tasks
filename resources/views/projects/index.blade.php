<!-- resources/views/projects/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        <h2>Project List</h2>
        <a href="{{ route('projects.create') }}" class="btn btn-success">Create Project</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($projects as $project)
                <tr>
                    <td>{{ $project->id }}</td>
                    <td>{{ $project->name }}</td>
                    <td>
                        <a href="{{ route('projects.show', $project->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-primary">Edit</a>
                        <form method="POST" action="{{ route('projects.destroy', $project->id) }}" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
