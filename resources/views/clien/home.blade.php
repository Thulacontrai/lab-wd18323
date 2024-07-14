@section('title')
Trang chủ
@endsection
@extends('clien.layout.main')

@section('content')

    <div class="container text-center">
        <h1>Trang chủ</h1>
        <p>Chào mừng bạn đến với trang chủ của website của chúng tôi!</p>
    </div>

    <div class="container-fluid ">
        <div class="row m-4">
            <h2 class="text-center mb-5">Sản phẩm có giá cao nhất </h2>
            @foreach ( $sp_price_max as $sp_max )

            <div class="col-sm-3 mb-3">
                <div class="card">
                    <img class="card-img-top" src="{{$sp_max->thumbnail}}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{$sp_max->title}}</h5>
                        <p class="card-text">Price:{{$sp_max->price}}</p>
                        <p class="card-text">author:{{$sp_max->author}}</p>
                        <a href="{{route('detail',['id'=>$sp_max->id ])}}" class="btn btn-primary">Xem chi tiết</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        

        {{-- sản phẩm bán có giá min --}}
        <div class="row m-4">
            <h2 class="text-center mb-5">Sản phẩm có giá Thấp nhất </h2>
                @foreach ( $sp_price_min as $sp_min )
                <div class="col-sm-3 mb-3">
                    <div class="card">
                        <img class="card-img-top" src="{{$sp_min->thumbnail}}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{$sp_min->title}}</h5>
                            <p class="card-text">Price:{{$sp_min->price}}</p>
                            <p class="card-text">author:{{$sp_min->author}}</p>
                            <a href="{{route('detail',['id'=>$sp_min->id ])}}" class="btn btn-primary">Xem chi tiết</a>
                        </div>
                    </div>
                </div>
                @endforeach
            
         
        </div>
        
    </div>

@endsection
