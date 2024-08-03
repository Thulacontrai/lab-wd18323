@extends('admin.layout.main')
@section('content')
    <div class="container" >
        @if (session('msg'))
            <div class="alert alert-success">
                <p>{{ session('msg') }}</p>
            </div>
        @else
        <div> </div>
        @endif
    <h1>
        List Movies
    </h1>
        <div class=""><a href="{{route('movie.create')}}" class="btn btn-success">Add</a></div>
    <table  class="table">
            <thead>
            <th>ID</th>
            <th>title</th>
            <th>poster</th>
            <th>intro</th>
            <th>release_date</th>
            <th>genre_id</th>
            <th>Action</th>
            </thead>
        <tbody>
        @foreach($movies as $movie)
            <tr>
                <td>{{$movie->id}}</td>
                <td>{{$movie->title}}</td>
                <td><img src="{{asset('/storage/'.$movie->poster)}}"  width="100px" height="100px"> </td>

                <td>{{$movie->intro}}</td>
                <td>{{$movie->release_date}}</td>
                <td>{{$movie->genre->name }}</td>
                <td class="d-flex gap-2">
                    <form action="{{route('movie.destroy',$movie)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type=submit class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa không?')">Delete</button>
                    </form>
                    <a href="{{route('movie.edit',$movie)}}" class="btn btn-warning" >Edit</a>
                    <a href="{{route('movie.show',$movie)}}" class="btn btn-primary " >Detail</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{$movies->links()}}
    </div>
@endsection
