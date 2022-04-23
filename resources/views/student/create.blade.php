@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add New Student</div>
                    <div class="card-body">
                        <form method="POST" action="{{route('student.store')}}" >
                            <label for="student_name">Full Name:</label>
                            <input type="text" id="student_name" name="student_name" value="{{old('student_name')}}">
                            @csrf
                            <button type="submit">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

