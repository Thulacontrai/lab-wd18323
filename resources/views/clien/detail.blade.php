@section('title')
Chi tiết sản phẩm
@endsection
@extends('clien.layout.main')



@section('content')
   @isset($book)
   <div class="container mb-3">
    <div class="row">
        <div class="col-md-6">
            <img class="card-img-top" src="{{$book->thumbnail}}" alt="Card image cap" class="img-fluid">
        </div>
        <div class="col-md-6 align-content-center p-5">
            <h2>{{$book->title}}</h2>
            <h4>Author: {{$book->author}}</h4>
            <h4>Publisher: {{$book->publisher}}</h4>
            <h4>Publication Date: {{$book->publication}}</h4>
            <h4>Price: {{$book->price}}</h4>
            <form action="/add-to-cart" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="123"> <!-- Replace with actual product ID -->
                <button type="submit" class="btn btn-primary">Add to Cart</button>
            </form>
        </div>
    </div>
</div>
@else
    <h1>Không tồn tại</h1>
   @endisset



@endsection
