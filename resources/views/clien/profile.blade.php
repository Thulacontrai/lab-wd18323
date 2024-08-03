<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>

<body>
<div class="container w-50">
    @if ($errors->any())
        <div class="text-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <h1 class="h1">Profile</h1>
    <form action="{{route('subProflie')}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Email:</label>
            <input type="email" name="email" class="form-control"  value="{{$user->email}}"  readonly disabled>
            @error('email')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label>Fullname:</label>
            <input type="text" name="fullname" class="form-control"  value="{{$user->fullname}}" readonly disabled>
            @error('fullname')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label>Username:</label>
            <input type="text" name="username" class="form-control"  value="{{$user->username}}"  readonly disabled>
            @error('username')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        {{-- <div class="mb-3">
            <label>Password:</label>
            <input type="password" name="password" class="form-control" >
            @error('password')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div> --}}
        <div class="mb-3">
            <label>Avatar:</label>
{{--            <input type="file" name="avatar" class="form-control"  id="file_img" readonly disabled>--}}

            <img src="{{asset('/storage/'.$user->avatar)}}" id="img"  width="100px" height="100px" >
            @error('password')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>

        <div class="mb-3">

            <a href="{{route('editProfile',$user)}}" class="btn btn-primary">Edit profile</a>
            <a href="{{ url('/logout') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">logout</a>

        </div>

    </form>
</div>
<script>
    var fileimg=document.querySelector('#file_img');
    var img=document.querySelector('#img');

    fileimg.addEventListener('change',function(e){
        e.preventDefault()
        img.src=URL.createObjectURL(this.files[0])
    })
</script>
</body>

</html>
