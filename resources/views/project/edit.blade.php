@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Project Info</div>
                    <div class="card-body">
                        <form method="POST" action="{{route('project.update',[$project])}}">
                            @csrf
                            <label for="project_title">Title: </label>
                            <input type="text" name="project_title" id="project_title" value="{{old('project_title', $project->title)}}">
                            <label for="groups_number">Number of groups: </label>
                            <input type="text" name="groups_number" id="groups_number" value="{{old('groups_number', $project->total_groups)}}">
                            <label for="students_number">Maximum number of students per group: </label>
                            <input type="text" name="students_number" id="students_number" value="{{old('students_number', $project->max_students)}}">
                            {{-- foreach groups tables and students --}}
                            <button type="submit">Edit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection