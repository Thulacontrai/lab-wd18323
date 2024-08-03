@extends('admin.layout.main')
@section('content')
    <div class="container" >
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @else
        <div> </div>
        @endif
    <h1>
        List Books
    </h1>
        <div class=""><a href="{{route('admin.book.create')}}" class="btn btn-success">Add</a></div>
    <table  class="table">
            <thead>
            <th>ID</th>
            <th>title</th>
            <th>thumbnail</th>
            <th>author</th>
            <th>publisher</th>
            <th>publication</th>
            <th>price</th>
            <th>quantity</th>
            <th>category</th>
            <th>Action</th>
            </thead>
        <tbody>
        @foreach($books as $sp)
            <tr>
                <td>{{$sp->id}}</td>
                <td>{{$sp->title}}</td>
                <td><img src="{{$sp->thumbnail}}" alt="" srcset="" width="100px"></td>
                <td>{{$sp->author}}</td>
                <td>{{$sp->publisher}}</td>
                <td>{{$sp->publication}}</td>
                <td>{{$sp->price}}</td>
                <td>{{$sp->quantity}}</td>
                <td>{{$sp->name}}</td>
                <td>
                    <form action="{{route('admin.book.destroy',['book'=>$sp->id])}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type=submit class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa không?')">Delete</button>
                    </form>
                    <a href="{{route('admin.book.edit',['book'=>$sp->id])}}" class="btn btn-warning" >Edit</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
@endsection
