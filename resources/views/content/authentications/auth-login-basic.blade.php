@extends('layouts.blankLayout')

@section('title', 'Login - Pages')

@section('page-style')
<!-- Page -->
<link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-auth.css') }}">
@endsection

@section('content')
<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner">
      <!-- Register -->
      <div class="card">
        <div class="card-body">
          <div class="app-brand-logo demo d-flex justify-content-center">
            <img src="{{ asset('assets/img/mlpLogo.png') }}" alt="MLP Logo" style="width: 100px; height: auto; margin-bottom: 10px;">
          </div>
          <div class="app-brand justify-content-center">
            <a href="{{ url('') }}" class="app-brand-link gap-2">
              <span class="app-brand-text demo text-body fw-bold">Recruitment MLP</span>
            </a>
          </div>
          <!-- /Logo -->
          <h4 class="mb-2">Welcome 👋</h4>
          <p class="mb-4">Please sign-in to your account</p>

          @if ($errors->any())
          <div class="alert alert-danger" role="alert">
            {{ $errors->first('email') }}
          </div>
          @endif

          <form id="formAuthentication" class="mb-3" action="{{ route('login-process') }}" method="POST">
            @csrf <!-- Tambahkan CSRF token untuk keamanan -->
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" autofocus required>
            </div>
            <div class="mb-3 form-password-toggle">
              <div class="d-flex justify-content-between">
                <label class="form-label" for="password">Password</label>
              </div>
              <div class="input-group input-group-merge">
                <input type="password" id="password" class="form-control" name="password" placeholder="Enter password" aria-describedby="password" required>
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
              </div>
            </div>
            <div class="mb-3">
              <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
            </div>
          </form>
        </div>
      </div>
      <!-- /Register -->
    </div>
  </div>
</div>
@endsection