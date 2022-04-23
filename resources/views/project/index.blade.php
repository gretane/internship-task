@extends('layouts.app')
@section('content')
   <section>
        <h4>Įrenginiai</h4>
        <article>
            <form action="{{route('product.index')}}" method="GET">
                <fieldset>
                <legend><h5>Paieška:</h5></legend>
                @csrf
                    <input type="text" name="srch" placeholder="Ieškoti įrenginio" value="{{$srch}}">
                    <button type="submit" name="search" class="btn btn-outline-dark" value="all">Ieškoti</button>
                </fieldset>
            </form>
            <a href="{{route('product.index')}}" class="btn btn-outline-dark">Anuliuoti</a>
        </article>
        <article>    
            <table style="border-collapse: collapse; border: 2px solid; width: 40%;">
                @foreach($products as $product) 
                    <tr style="border: 1px solid;">
                        <td> <a href="{{route('product.show', ['product' => $product->id])}}" style="color: black; text-decoration: none;"> 
                            <b> {{$product->product_name}}</b> <i> Apie...</i> </a></td>  
                    </tr>
                @endforeach
            </table>
            <div> {{$products->links()}} </div>
        </article>
    </section>                 
@endsection

