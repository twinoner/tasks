<!-- resources/views/projects/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Project Details</h2>
        <table class="table">
            <tbody>
                <tr>
                    <th>ID</th>
                    <td>{{ $project->id }}</td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td>{{ $project->name }}</td>
                </tr>
                <!-- Add more rows for other project attributes -->
            </tbody>
        </table>
        <a href="{{ route('projects.index') }}" class="btn btn-primary">Back to Projects</a>
    </div>
@endsection
