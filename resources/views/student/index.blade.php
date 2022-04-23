@extends('layouts.app')
@section('content')
   <section>
        <h4>Students</h4>
        <article>
            <form action="{{route('student.index')}}" method="GET">
                <fieldset>
                <legend><h5>Search:</h5></legend>
                @csrf
                    <input type="text" name="srch" placeholder="Search students" value="{{$srch}}">
                    <button type="submit" name="search" class="btn btn-outline-dark" value="all">Ieškoti</button>
                </fieldset>
            </form>
            <a href="{{route('student.index')}}" class="btn btn-outline-dark">Reset</a>
        </article>
        <article>    
            <table style="border-collapse: collapse; border: 2px solid; width: 40%;">
                @foreach($students as $student) 
                    <tr style="border: 1px solid;">
                        <td> 
                            <a href="{{route('student.show', ['student' => $student->id])}}" style="color: black; text-decoration: none;"> 
                            <b> {{$student->full_name}}</b> <i> About...</i> </a>
                        </td> 
                    </tr>
                @endforeach
            </table>
            <div> {{$students->links()}} </div>
        </article>
    </section>                 
@endsection


