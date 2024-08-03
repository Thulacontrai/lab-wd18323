@extends('admin.layout.main')
@section('content')
<main class="container w-75">
    <h1>Edit Movie</h1>
    @if (session('msg'))
        <div class="alert alert-success">
            <p>{{ session('msg') }}</p>
        </div>
    @else
        <div> </div>
    @endif
    <div class="w-100 m-5">
    <form action="{{route('movie.update',$movie)}}" method="POST" enctype="multipart/form-data" >
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-8">
                <div class="mb-3">
                    <label for="exampleInputName" class="form-label">title</label>
                    <input type="text" class="form-control" id="exampleInputName" name="title" value="{{$movie->title}}">
                </div>

                <div class="mb-3">
                    <label for=" " class="form-label">poster</label>
                    <input type="file" class="form-control" id="file_img" name="poster" >
                    <img src="{{asset('/storage/'.$movie->poster)}}" id="img" alt="" class="mt-3" srcset="" width="100px" height="100px">
                </div>
                <div class="mb-3">
                    <label for=" " class="form-label">intro</label>
                    <textarea type="text" class="form-control" id=" " name="intro">{{$movie->intro}}</textarea>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">release_date</label>
                    <input type="date" class="form-control" id=" " name="release_date" value="{{$movie->release_date}}">
                </div>
            <div class="mb-3">
                    <label for="exampleInputCate" class="form-label">genre</label>
                    <select name="genre_id" id="exampleInputCate" class="form-select" >
                        {{-- <option value="1">1</option> --}}
                        @foreach($genres as $genre)
                        <option value="{{$genre->id}}"
                            @if($movie->genre_id == $genre->id)
                            selected
                            @endif
                            >{{$genre->name}}</option>

                        @endforeach
                    </select>

                </div>

            </div>
        </div>
        <button type="submit" class="btn btn-primary">SAVE</button>
    </form>
    </div>
</main>

<script>
    var fileimg=document.querySelector('#file_img');
    var img=document.querySelector('#img');

    fileimg.addEventListener('change',function(e){
        e.preventDefault()
        img.src=URL.createObjectURL(this.files[0])
    })
    </script>

    @endsection
