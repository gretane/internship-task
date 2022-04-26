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

                                @for($i = 1; $i < $project->total_groups + 1; $i++)
                                    <table> 
                                        <thead>
                                            <tr>
                                                <th> Group #{{$i}}</th>
                                            </tr>
                                        </thead>
                                        @for($j = 1; $j < $project->max_students + 1; $j++)
                                            <tr>
                                                <td> <select name="student_id">
                                                        <option value="0" disabled selected> Assign student </option>
                                                        <option disabled>-----</option>
                                                    @foreach ($students as $student)
                                                        <option value="{{$student->id}}" > {{--@if(old('student_id', $project->student_id) == $project->student_id) selected @endif--}}
                                                            {{$student->full_name}}
                                                        </option>
                                                    @endforeach
                                                    </select> 
                                                </td>
                                            </tr>
                                        @endfor
                                    </table>
                                @endfor
                          
                            <button type="submit" class="btn btn-outline-dark">Edit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection