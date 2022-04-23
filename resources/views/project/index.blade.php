@extends('layouts.app')
@section('content')
   <section>
        <h4>Įrenginiai</h4>
        <article>
            <form action="{{route('project.index')}}" method="GET">
                <fieldset>
                <legend><h5>Search:</h5></legend>
                @csrf
                    <input type="text" name="srch" placeholder="Search projects" value="{{$srch}}">
                    <button type="submit" name="search" class="btn btn-outline-dark" value="all">Search</button>
                </fieldset>
            </form>
            <a href="{{route('project.index')}}" class="btn btn-outline-dark">Reset</a>
        </article>
        <article>    
            <table style="border-collapse: collapse; border: 2px solid; width: 40%;">
                @foreach($projects as $project) 
                    <tr style="border: 1px solid;">
                        <td> <a href="{{route('project.show', ['project' => $project->id])}}" style="color: black; text-decoration: none;"> 
                            <b> {{$project->title}}</b> <i> About...</i> </a></td>  
                    </tr>
                @endforeach
            </table>
            <div> {{$projects->links()}} </div>
        </article>
    </section>                 
@endsection

