<!-- resources/views/projects/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Create Project</h2>
        <form method="POST" action="{{ route('projects.store') }}">
            @csrf
            <div class="form-group">
                <label for="name">Project Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <!-- Add more form fields for other project attributes -->
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
