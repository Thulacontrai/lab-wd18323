<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>

<body>
<header class="bg-danger-subtle">
    <div class="container">
        <nav class="navbar">
            <div class="container">


                <nav class="navbar navbar-expand-lg">
                    <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse pt-2" id="navbarSupportedContent">
                            <a href="{{ url('/logout') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">logout</a>


                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </nav>

    </div>
</header>


    {{-- @auth
        <div class="">
            <p class="text-info">
                Username: {{ Auth::user()->username }}
            </p>
            <p class="text-info">
                Email: {{ Auth::user()->email }}
            </p>
            <p class="text-danger">
                Logout: <a class="btn btn-danger" href="{{ route('lab6.logout') }}">{{ Auth::user()->username }}</a>
            </p>
        </div>
    @endauth --}}
    <table class="table">
        <thead>
        <tr>
            <th style="width: 1%" scope="col">#</th>
            <th style="width: 15%" scope="col">fullname</th>
            <th style="width: 10%" scope="col">username</th>
            <th style="width: 20%" scope="col">email</th>
            <th style="width: 10%" scope="col">avatar</th>
            <th style="width: 10%" scope="col">role</th>
            <th style="width: 20%" scope="col">active</th>
            <th style="width: 20%" scope="col">action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($users as $user)
            <tr>
                <th scope="row">{{ $user->id }}</th>
                <td>{{ $user->fullname }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->email }}</td>
                <td><img src="{{ asset('storage/' . $user->avatar) }}" alt="" width="50px"  style="object-fit: cover; object-position: center;"></td>
                <td>{{ $user->role }}</td>
                <td>
                    @if ($user->active == 1)
                        <span class="badge badge-success bg-success">Hoạt động</span>
                    @else
                        <span class="badge badge-danger bg-danger">Ngừng hoạt động</span>
                    @endif
                </td>
                <td>
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-secondary dropdown-toggle"
                                data-bs-toggle="dropdown" aria-expanded="false">
                            Action
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('admin.onAccount', $user) }}"
                                   onclick="return confirm('Hoạt động tài khoản')">Hoạt
                                    động</a></li>
                            <li><a class="dropdown-item" href="{{ route('admin.offAccount', $user) }}"
                                   onclick="return confirm('Ngừng hoạt động tài khoản')">Ngừng
                                    hoạt động</a></li>
                        </ul>
                    </div>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>

</html>
