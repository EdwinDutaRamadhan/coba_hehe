@extends('layout.auth')

@section('content')
    <section class="vh-100" >
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 33px;background: linear-gradient(145deg, #e2d7d7, #ffffff);box-shadow:  24px 24px 48px #646060,-24px -24px 48px #ffffff;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-5 d-none d-md-block">
                                <img src="{{ asset('img/login-image.png') }}"
                                    alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">


                                    <div class="d-flex align-items-center mb-3 pb-1">
                                        {{-- <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                        <span class="h1 fw-bold mb-0">Logo</span> --}}
                                        <img src="{{ asset('img/logo.png') }}" alt="not found" class="img-fluid py-3">
                                    </div>

                                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account
                                    </h5>

                                    <form action="{{ route('login.post') }}" method="post">
                                        @csrf
                                        <div class="form-outline mb-3">
                                            <label class="form-label" for="email">Email address</label>
                                            <input type="email" id="email" autofocus required
                                                value="{{ old('email') }}"
                                                class="form-control form-control-lg @error('email') is-invalid @enderror"
                                                {{-- class="form-control form-control-lg @error('email') is-invalid @enderror" --}} name="email" />
                                            {{-- @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror --}}
                                        </div>

                                        <div class="form-outline mb-3">
                                            <label class="form-label" for="password">Password</label>
                                            <input type="password" id="password" required value="{{ old('email') }}"
                                                {{-- class="form-control form-control-lg @error('password') is-invalid @enderror" --}}
                                                class="form-control form-control-lg @error('password') is-invalid @enderror"
                                                name="password" />
                                            {{-- @error('password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror --}}
                                        </div>

                                        <div class="pt-1 mb-4">
                                            <button class="btn btn-outline-primary w-100" type="submit">Login</button>
                                        </div>
                                    </form>
                                    <a href="#!" class="small text-muted">Terms of use.</a>
                                    <a href="#!" class="small text-muted">Privacy policy</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
