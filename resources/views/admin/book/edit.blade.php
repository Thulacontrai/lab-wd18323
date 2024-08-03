@extends('admin.layout.main')
@section('content')
    <main class="container w-50">
        <div class="w-75 m-5">
            <form action="{{route('admin.book.update',['book'=>$book->id ])}}" method="POST" >
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="exampleInputName" class="form-label">title</label>
                            <input type="text" class="form-control" id="" name="title" value="{{ $book->title}}">
                        </div>

                        <div class="mb-3">
                            <label for=" " class="form-label">thumbnail</label>
                            <input type="text" class="form-control" id=" " name="thumbnail"  value="{{ $book->thumbnail}}">
                        </div>
                        <div class="mb-3">
                            <label for=" " class="form-label">author</label>
                            <input type="text" class="form-control" id=" " name="author" value="{{ $book->author}}">
                        </div>
                        <div class="mb-3">
                            <label for=" " class="form-label">publisher</label>
                            <input type="text" class="form-control" id=" " name="publisher" value="{{ $book->publisher}}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for=" " class="form-label">publication</label>
                            <input type="datetime-local" class="form-control" id=" " name="publication" value="{{$book->publication}}">
                        </div>
                        <div class="mb-3">price
                            <label for=" " class="form-label">price</label>
                            <input type="number" class="form-control" id=" " name="price" value="{{ $book->price}}">
                        </div>
                        <div class="mb-3">
                            <label for=" " class="form-label">quantity</label>
                            <input type="number" class="form-control" id=" " name="quantity" value="{{ $book->quantity}}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputCate" class="form-label">Category</label>

                            <select name="category_id" id="exampleInputCate" class="form-select" >
                                @foreach($cate as $cat)
                                    <option value="{{$cat->id}}"   @if($book->category_id==$cat->id) selected @else ''@endif>{{$cat->name}}</option>

                                @endforeach
                            </select>

                        </div>

                    </div>

                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </main>
@endsection
