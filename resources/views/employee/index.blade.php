<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@1,300&family=Pacifico&display=swap"
        rel="stylesheet">
    <title>tes</title>
    @vite('resources/sass/app.scss')
</head>

<body>
    <nav class="navbar navbar-expand-sm navbar-dark" style="background-color: #fe7ef2;">
        <div class="container-fluid">
            <span class="navbar-text text-dark" style="font-family: 'Pacifico', cursive; font-size: 20px;">Selamat Datang Admin</span>
            <ul class="navbar-nav flex-row flex-wrap">
                <li class="nav-item col-6 col-md-auto"><a href="{{ route('home') }}" class="nav-link text-dark">Home</a></li>
                <li class="nav-item col-6 col-md-auto"><a href="#" class="nav-link text-dark">Produk</a></li>
                <li class="nav-item col-6 col-md-auto"><a href="{{ route('home') }}#profil" class="nav-link text-dark">Profil</a></li>
                <li class="nav-item col-6 col-md-auto"><a href="{{ route('home') }}#gallery" class="nav-link text-dark">Gallery</a></li>
                <li class="nav-item col-6 col-md-auto"><a href="{{ route('employees.create') }}" class="nav-link text-dark">Feedback</a></li>
                <li class="nav-item col-6 col-md-auto"><a href="{{ route('employees.index') }}" class="nav-link text-dark">Admin</a></li>
                @guest
                    <li class="nav-item col-6 col-md-auto"><a href="{{ route('login') }}" class="nav-link text-dark">Login</a></li>
                @else
                    <li class="nav-item col-6 col-md-auto">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        <button class="btn btn-outline-success me-2" type="button" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Out</button>
                    </li>
                @endguest
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="row mb-0">
            <div class="col-lg-9 col-xl-10">
                <h4 class="mb-3">Admin</h4>
            </div>
            {{-- <div class="col-lg-3 col-xl-2">
                <div class="d-grid gap-2">
                    <a href="{{ route('employees.create') }}" class="btn btn-primary">Create Employee</a>
                </div>
            </div> --}}
        </div>
        <hr>
        <div class="table-responsive border p-3 rounded-3">
            <table class="table table-bordered table-hover table-striped mb-0 bg-white">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Alamat</th>
                        <th>Email</th>
                        <th>Age</th>
                        <th>Masukan</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $employee)
                        <tr>
                            <td>{{ $employee->name }}</td>
                            <td>{{ $employee->alamat }}</td>
                            <td>{{ $employee->email }}</td>
                            <td>{{ $employee->age }}</td>
                            <td>{{ $employee->masukan }}</td>
                            <td>
                                <div class="d-flex">
                                    {{-- <a href="{{ route('employees.show', ['employee' => 1]) }}"
                                        class="btn btn-outline-dark btn-sm me-2"><i
                                            class="bi-person-lines-fill"></i></a> --}}
                                            <a href="{{ route('employees.edit', ['employee' => $employee->id]) }}" class="btn btn-outline-dark btn-sm me-2"><i class="bi-pencil-square"></i></a>


                                    <div>
                                        <form action="{{ route('employees.destroy', ['employee' => $employee->id]) }}"
                                            method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-outline-dark btn-sm me-2"><i
                                                    class="bi-trash"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @vite('resources/js/app.js')
</body>

</html>
