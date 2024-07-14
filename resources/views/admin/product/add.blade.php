<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('product.create')}}">Add</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('product.edit',['product'=>1])}}">Edit</a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <h1>{{$title}}</h1>
    <main class="container w-75">
        <form action="{{route('product.store')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="exampleInputName" class="form-label">Name</label>
                <input type="text" class="form-control" id="exampleInputName" name="name">
            </div>
            <div class="mb-3">
                <label for="exampleInputPrice" class="form-label">Price</label>
                <input type="number" class="form-control" id="exampleInputPrice" name="price">
            </div>
            <div class="mb-3">
                <label for="exampleInputCate" class="form-label">Danh mục</label>
                <select name="id_dm" id="exampleInputCate" class="form-select" >
                    
                    <option value="1" >Apple</option>
                    <option value="2" >Samsung</option>
                    <option value="3">Oppo</option>
                </select>

            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </main>
</body>

</html>