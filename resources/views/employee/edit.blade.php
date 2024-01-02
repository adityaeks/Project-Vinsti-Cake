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
    <title>Edit</title>
    @vite('resources/sass/app.scss')
</head>


<body class="bg-image" style="background-image: url({{ Vite::asset('resources/images/herofeedback.png') }});">
    <nav class="navbar navbar-expand-sm navbar-dark" style="background-color: #fe7ef2;">
        <div class="container-fluid ">
            <span class="navbar-text text-dark" style=" font-family: 'Pacifico', cursive; font-size: 20px;">Vinsti
                Cake</span>
            <ul class="navbar-nav flex-row flex-wrap">
                <li class="nav-item col-6 col-md-auto "><a href="{{ route('home') }}"
                        class="nav-link text-dark">Home</a></li>
                <li class="nav-item col-6 col-md-auto"><a href="{{ route('home') }}#profil"
                        class="nav-link text-dark">Profil</a></li>
                <li class="nav-item col-6 col-md-auto"><a href="{{ route('home') }}#gallery"
                        class="nav-link text-dark">Gallery</a></li>
                <li class="nav-item col-6 col-md-auto"><a href="#gallery" class="nav-link text-dark">Feedback</a></li>
                <li class="nav-item col-6 col-md-auto"><a href="#about" class="nav-link text-dark">About</a></li>
                @guest
                    <li class="nav-item col-6 col-md-auto"><a href="{{ route('login') }}"
                            class="nav-link text-dark">Login</a></li>
                @else
                    <li class="nav-item col-6 col-md-auto">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        <button class="btn btn-outline-success me-2" type="button"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log
                            Out</button>
                    </li>
                @endguest
            </ul>
        </div>
    </nav>
    <div class="container-sm mt-lg-5 ">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('employees.update', ['employee' => $employee->id]) }}" method="POST">
            @csrf
            @method('put')
            <div class="row justify-content-center">
                <div class="p-5 bg-light rounded-3 border col-xl-6">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                value="{{ $errors->any() ? old('name') : $employee->name }}" id="name"
                                name="name" placeholder="Name">
                            @error('name')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="age" class="form-label">Age</label>
                            <input type="number" placeholder="Age"
                                class="form-control @error('age') is-invalid @enderror "
                                value="{{ $errors->any() ? old('age') : $employee->age }}" id="age"
                                name="age">
                            @error('age')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror "
                                value="{{ $errors->any() ? old('email') : $employee->email }}" id="email"
                                name="email" placeholder="@mail.com">
                            @error('email')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control @error('alamat') is-invalid @enderror "
                                value="{{ $errors->any() ? old('alamat') : $employee->alamat }}" id="alamat"
                                name="alamat" placeholder="Alamat">
                            @error('alamat')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="masukan" class="form-label">Masukan Kritik dan Saran</label>
                            <textarea type="text" class="form-control @error('masukan') is-invalid @enderror " id="masukan" name="masukan">{{ $errors->any() ? old('masukan') : $employee->masukan }}</textarea>
                            @error('masukan')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <button style="background-color: #fe7ef2;" type="submit"
                                class="btn mt-3">Submit</button>
                        </div>
                    </div>
                </div>

            </div>
        </form>

    </div>
    @vite('resources/js/app.js')

</body>

</html>
