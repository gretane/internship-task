@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5><b>{{$project->title}}</b></h5>
                    </div>
                    <div class="card-body">
                        <article>
                            {{-- foreach with group tables --}}
                            @for($i=1; $i < $project->total_groups+1; $i++)
                                <table> 
                                    <thead>
                                        <tr>
                                            <th> Group #{{$i}}</th>
                                        </tr>
                                    </thead>
                                    @for($j=1; $j < $project->max_students+1; $j++)
                                        <tr>
                                            <td> Student {{$j}}</td>
                                        </tr>
                                    @endfor
                                </table>
                            @endfor
                        </article>
                        <a href="{{route('project.edit',[$project])}}" class="btn btn-outline-dark"> Edit </a>
                        <form method="POST" action="{{route('project.destroy', $project)}}">
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