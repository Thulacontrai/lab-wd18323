@section('title')
Sản phẩm theo danh mục
@endsection
@extends('clien.layout.main')

@section('content')

    <div class="container">
        <h1>Trang chủ</h1>
        <p>Chào mừng bạn đến với trang chủ của website của chúng tôi!</p>
    </div>

    <div class="container-fluid ">
        <div class="row m-4">
            <h2 class="text-center mb-5">Sản phẩm  với danh mục {{$cate->name}}</h2>
            @foreach ($books as $sp_cate )

            <div class="col-sm-3 mb-3">
                <div class="card">
                    <img class="card-img-top" src="{{$sp_cate->thumbnail}}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{$sp_cate->title}}</h5>
                        <p class="card-text">Price:{{$sp_cate->price}}</p>
                        <p class="card-text">author:{{$sp_cate->author}}</p>
                        <a href="{{route('detail',['id'=>$sp_cate->id])}}" class="btn btn-primary">Xem chi tiết</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        

        
     
    </div>

@endsection
