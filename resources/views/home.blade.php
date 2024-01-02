@extends('layouts.app')

<body>
    <nav class="navbar navbar-expand-sm navbar-dark" style="background-color: #fe7ef2;">
        <div class="container-fluid">
            <span class="navbar-text text-dark" style="font-family: 'Pacifico', cursive; font-size: 20px;">Vinsti
                Cake</span>
            <ul class="navbar-nav flex-row flex-wrap">
                <li class="nav-item col-6 col-md-auto"><a href="#" class="nav-link text-dark">Home</a></li>
                <li class="nav-item col-6 col-md-auto"><a href="{{ route('home') }}#profil"
                        class="nav-link text-dark">Profil</a></li>
                <li class="nav-item col-6 col-md-auto"><a href="{{ route('home') }}#gallery"
                        class="nav-link text-dark">Gallery</a></li>
                <li class="nav-item col-6 col-md-auto"><a href="{{ route('employees.create') }}"
                        class="nav-link text-dark">Feedback</a></li>
                <li class="nav-item col-6 col-md-auto"><a href="{{ route('employees.index') }}"
                        class="nav-link text-dark">Admin</a></li>
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
    {{-- @if (session('message'))
        <script>
            alert("{{ session('message') }}");
            window.location = "{{ route('home') }}";
        </script>
    @endif --}}
    @if (session('success'))
        <div id="popup" class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif


    <!-- banner -->
    <div class="bg-image d-flex justify-content-center align-items-center"
        style="background-image: url({{ Vite::asset('resources/images/hero2.jpg') }});">
        <div class="d-flex justify-content-center align-items-center vh-100" style="color: white;">
            <p style="font-family: 'Pacifico', cursive; font-size: 100px;">Vinsti Cake</p>
            <!-- <p style="margin-top: 300px;">Salah satu tempat nongkrong di Gresik. Di sini kamu akan merasakan cafe yang minimalis dan
                keren, dan juga taman hiburan yang sangat intagramable</p> -->
        </div>
    </div>
    <!-- Section 3 -->
    <div class="container text-center" id="profil">
        <div class="row justify-content-around mt-lg-5">
            <div class="col-4">
                <img src="{{ Vite::asset('resources/images/sec3-2.png') }}" class="img-fluid mb-4" alt="">
            </div>
            <div class="col-4 d-flex flex-column align-items-end">
                <div class="fs-3 fw-bold text-end">
                    Riwayat Perusahaan
                </div>
                <p class="paragraph text-end mt-4">Vinski Cake adalah perusahaan toko kue yang didirikan pada tahun
                    2020. Dengan kualitas kue yang lezat dan variasi produk yang beragam, Vinski Cake telah membangun
                    reputasi yang kuat. Pada tahun 2023, mereka merayakan jubileum 3 tahun sebagai toko kue yang sukses.
                    Saat ini, Vinski Cake terus mengalami pertumbuhan yang lebih lanjut dalam industri toko kue.</p>
            </div>
        </div>

        <div class="row justify-content-around mt-lg-5">
            <div class="col-4 d-flex flex-column align-items-start">
                <div class="fs-3 fw-bold">
                    Usaha Yang Dikelola
                </div>
                <p class="paragraph text-start mt-4">Vinski Cake adalah perusahaan toko kue yang didirikan pada tahun
                    1995. Dengan kualitas kue yang lezat dan variasi produk yang beragam, Vinski Cake telah membangun
                    reputasi yang kuat. Pada tahun 2020, mereka merayakan jubileum 25 tahun sebagai toko kue yang
                    sukses. Saat ini, Vinski Cake terus berinovasi dan mengalami pertumbuhan yang lebih lanjut dalam
                    industri toko kue.</p>
            </div>
            <div class="col-4">
                <img src="{{ Vite::asset('resources/images/sec3-1.jpg') }}" class="img-fluid mb-4" alt="">
            </div>
        </div>
    </div>
    <hr size="3px" color="grey">
    <!-- Gallery -->
    <h2 class="text-center mt-3" id="gallery">GALLERY</h2>
    <div class="container text-center">
        <div class="row mb-4">
            <div class="col-8">
                <img src="{{ Vite::asset('resources/images/cafe12.jpeg') }}" class="img-fluid mb-4"
                    style="height: 100%;" alt="">
            </div>
            <div class="col-4">
                <img src="{{ Vite::asset('resources/images/cake (2).jpeg') }}" class="img-fluid crop mb-4"
                    style="height: 100%;" alt="">
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-4">
                <img src="{{ Vite::asset('resources/images/cake (3).jpeg') }}" class="img-fluid crop mb-4"
                    style="height: 100%;" alt="">
            </div>
            <div class="col-8">
                <img src="{{ Vite::asset('resources/images/cafe21.jpeg') }}" class="img-fluid mb-4"
                    style="height: 100%;" alt="">
            </div>
        </div>
    </div>
    <hr size="3px" color="grey">
    {{-- map --}}
    <!--Google map-->
    <div id="map"class="d-flex justify-content-center mb-3">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.3789039754292!2d112.72630957339643!3d-7.311260871881984!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fbd1cb925a1d%3A0x1dbecb0b2e9b059f!2sInstitut%20Teknologi%20Telkom%20Surabaya!5e0!3m2!1sid!2sid!4v1685709235419!5m2!1sid!2sid"
            width="1250" height="300" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

    <!--Google Maps-->
    {{-- end map --}}
    <!-- Footer -->
    <footer class=" text-center text-white"
        style="background-color: #c357b8;>
        <!-- Grid container -->
        <div class="container p-4 pb-3">
        <!-- Section: Social media -->
        <section class=" mb-3">
            <!-- Facebook -->
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
                    class="fab fa-facebook-f"></i></a>

            <!-- Twitter -->
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
                    class="fab fa-twitter"></i></a>

            <!-- Google -->
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
                    class="fab fa-google"></i></a>

            <!-- Instagram -->
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
                    class="fab fa-instagram"></i></a>

            <!-- Linkedin -->
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
                    class="fab fa-linkedin-in"></i></a>

            <!-- Github -->
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
                    class="fab fa-github"></i></a>
        </section>
        <!-- Section: Social media -->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: #fe7ef2;">
            UTS Framework:
            <a class="text-white">PUTRI PRAMESTI REGITA CAHYANI</a>
        </div>
        <!-- Copyright -->
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Mencari elemen dengan ID 'popup'
            var popup = $('#popup');

            // Menampilkan pesan pop-up
            popup.fadeIn();

            // Menghilangkan pesan pop-up setelah 3 detik
            setTimeout(function() {
                popup.fadeOut();
            }, 3000);
        });
    </script>



    @vite('resources/js/app.js')
</body>

</html>
