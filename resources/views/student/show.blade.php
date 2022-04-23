@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"> 
                        <h5><b>{{$student->full_name}}</b></h5>
                    </div>
                    <div class="card-body">
                        <article>
                            <table>
                                <tr>
                                    <th> Assigned projects </th>
                                    <th> Group number </th>
                                </tr>
                                <tr> 
                                    <td> Assigned project title</td>
                                    <td> #Group number </td>
                                </tr>
                            </table>
                        </article>
                        <a href="{{route('student.edit', [$student])}}" class="btn btn-outline-dark"> Edit </a>
                        <form method="POST" action="{{route('student.destroy', $student)}}">
                            @csrf
                            <button type="submit" class="btn btn-outline-dark">Delete</button>
                            {{-- Cannot delete because (if) there are still projects --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection