@extends("layouts.navbar-header")
@section('content')
    <div class="container-fluid">

        <video autoplay muted loop id="myVideo">
            <source src="{{ asset('videos/profil.mp4') }}" type="video/mp4">
            Browser anda tidak kompatibel dengan HTML5 video.
        </video>

        <div class="d-flex justify-content-end me-3">
            <div class="card mt-4 mb-4" style="height: 70vh; width: 60vh">
                <div class="card-body">
                    <h5 class="card-title text-center">LOGIN</h5>
                    <form class="text-center" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3 mt-5">
                            <input id="user_id" type="number"
                                   class="form-control @error('user_id') is-invalid @enderror" name="user_id"
                                   value="{{ old('user_id') }}" required autocomplete="email" placeholder="User ID" autofocus>
                        </div>
                        <div class="mb-3">
                            <input id="password" type="password"
                                   class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password"
                                   required autocomplete="current-password">
                        </div>
                        <button type="submit" class="btn btn-primary">Masuk</button>
                    </form>
                    <hr class="mt-5">
                    <p class="text-muted">Hubungi kami apabila menemui kendala teknis melalui kontak berikut
                    </p>
                    <p class="text-muted"> <center> AKNPacitan@gmail.com
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
