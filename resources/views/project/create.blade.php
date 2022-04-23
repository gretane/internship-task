@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add New Project</div>
                    <div class="card-body">
                        <form method="POST" action="{{route('project.store')}}" >
                            @csrf
                            <label for="project_title">Title:</label>
                            <input type="text" id="project_title" name="project_title" value="{{old('project_title')}}">
                            <label for="groups_number">Number of groups:</label>
                            <input type="number" id="groups_number" name="groups_number" value="{{old('groups_number')}}">
                            <label for="students_number">Maximum number of students per group:</label>
                            <input type="number" id="students_number" name="students_number" value="{{old('students_number')}}">
                            <button type="submit" class="btn btn-outline-dark">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
