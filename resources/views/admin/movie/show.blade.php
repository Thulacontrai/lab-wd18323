@extends('admin.layout.main')
@section('content')
    <main class="container w-50">
        <h1>Detail Movie</h1>
        <div class="w-75 m-5">
            <form action="" method="POST" >

                <div class="row">
                    <div class="col-8">
                        <div class="mb-3">
                            <label for="exampleInputName" class="form-label">title</label>
                            <input  type="text" class="form-control" id="exampleInputName" name="title" readonly value="{{$movie->title}}">
                        </div>

                        <div class="mb-3">
                            <label for=" " class="form-label">poster</label>
                            <input  type="file" class="form-control" id="file_img" readonly name="poster" >
                            <img src="{{asset('/storage/'.$movie->poster)}}" id="img" alt="" class="mt-3" srcset="" width="100px" height="100px">
                        </div>
                        <div class="mb-3">
                            <label for=" " class="form-label">intro</label>
                            <textarea type="text" class="form-control" id=" " readonly name="intro">{{$movie->intro}}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">release_date</label>
                            <input  type="date" class="form-control" id=" "  readonly name="release_date" value="{{$movie->release_date}}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputCate" class="form-label">genre</label>
                            <input type="text" class="form-control" readonly value="{{$movie->genre->name}}">
{{--                            <select  name="genre_id"  id="exampleInputCate"  class="form-select" >--}}
{{--                                --}}{{-- <option value="1">1</option> --}}
{{--                                @foreach($genres as $genre)--}}
{{--                                    <option value="{{$genre->id}}"--}}
{{--                                            @if($movie->genre_id == $genre->id)--}}
{{--                                                selected--}}
{{--                                        @endif--}}
{{--                                    >{{$genre->name}}</option>--}}

{{--                                @endforeach--}}
{{--                            </select>--}}

                        </div>

                    </div>
                </div>
                <a href="{{route('movie.edit',$movie)}}" class="btn btn-warning" >Edit</a>
            </form>
        </div>
    </main>
@endsection
