@extends('admin.layout.main')
@section('content')
<main class="container w-75">
    <h1>Create Movie</h1>
    <div class="w-100 m-5">
    <form action="{{route('movie.store')}}" method="POST" enctype="multipart/form-data" >
        @csrf

        <div class="row">
            <div class="col-8">
                <div class="mb-3">
                    <label for="exampleInputName" class="form-label">title</label>
                    <input type="text" class="form-control" id="exampleInputName" name="title">
                </div>

                <div class="mb-3">
                    <label for=" " class="form-label">poster</label>
                    <input type="file" class="form-control" id="file_img" name="poster">
                    <img src="" id="img" alt="" srcset="" width="100px" height="100px">
                </div>
                <div class="mb-3">
                    <label for=" " class="form-label">intro</label>
                    <textarea type="text" class="form-control" id=" " name="intro"></textarea>
                </div>
                <div class="mb-3">
                    <label for=" " class="form-label">release_date</label>
                    <input type="date" class="form-control" id=" " name="release_date">
                </div>
            <div class="mb-3">
                    <label for="exampleInputCate" class="form-label">genre</label>

                    <select name="genre_id" id="exampleInputCate" class="form-select"  >
                        {{-- <option value="1">1</option> --}}
                        @foreach($genres as $genre)
                        <option value="{{$genre->id}}" >{{$genre->name}}</option>

                        @endforeach
                    </select>

                </div>

            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
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
