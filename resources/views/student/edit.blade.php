@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Student Info</div>
                    <div class="card-body">
                        <form method="POST" action="{{route('student.update', $student)}}">
                            Name: <input type="text" name="student_name" value="{{old('student_name', $student->full_name)}}">
                            @csrf
                            <button type="submit" class="btn btn-outline-dark">Edit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection