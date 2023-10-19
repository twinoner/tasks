<!-- resources/views/projects/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Project</h2>
        <form method="POST" action="{{ route('projects.update', $project->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Project Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $project->name }}" required>
            </div>
            <!-- Add more form fields for other project attributes -->
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
