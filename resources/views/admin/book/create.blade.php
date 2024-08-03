@extends('admin.layout.main')
@section('content')
<main class="container w-50">
    <div class="w-75 m-5">
    <form action="{{route('admin.book.store')}}" method="POST" >
        @csrf

        <div class="row">
            <div class="col-6">
                <div class="mb-3">
                    <label for="exampleInputName" class="form-label">title</label>
                    <input type="text" class="form-control" id="exampleInputName" name="title">
                </div>

                <div class="mb-3">
                    <label for=" " class="form-label">thumbnail</label>
                    <input type="text" class="form-control" id=" " name="thumbnail">
                </div>
                <div class="mb-3">
                    <label for=" " class="form-label">author</label>
                    <input type="text" class="form-control" id=" " name="author">
                </div>
                <div class="mb-3">
                    <label for=" " class="form-label">publisher</label>
                    <input type="text" class="form-control" id=" " name="publisher">
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label for=" " class="form-label">publication</label>
                    <input type="date" class="form-control" id=" " name="publication">
                </div>
                <div class="mb-3">price
                    <label for=" " class="form-label">price</label>
                    <input type="number" class="form-control" id=" " name="price">
                </div>
                <div class="mb-3">
                    <label for=" " class="form-label">quantity</label>
                    <input type="number" class="form-control" id=" " name="quantity">
                </div>
                <div class="mb-3">
                    <label for="exampleInputCate" class="form-label">Category</label>

                    <select name="category_id" id="exampleInputCate" class="form-select" >
                        @foreach($cate as $cat)
                        <option value="{{$cat->id}}" >{{$cat->name}}</option>

                        @endforeach
                    </select>

                </div>

            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
</main>
@endsection
