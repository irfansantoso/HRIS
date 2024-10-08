@extends('app')
@section('content')
<div class="authentication-wrapper authentication-basic container-p-y">
  <div class="authentication-inner py-4">
    <!-- Login -->
    <div class="card">
      <div class="card-body">
        <!-- Logo -->
        <div class="app-brand justify-content-center mb-4 mt-2">
          <a href="index.html" class="app-brand-link gap-2">
            <span class="app-brand-logo">
              <img
                width="62"
                height="32"
                src="{{asset('admin/assets/img/branding/logo-hr.png')}}"
                class=""
              />              
            </span>
          </a>
        </div>
        <!-- /Logo -->
        <h4 class="mb-1 pt-2">Welcome to HRIS! 🌳</h4>
        <p class="mb-4">Please sign-in to your account and start the adventure</p>
        @if(session('success'))
        <p class="alert alert-success">{{ session('success') }}</p>
        @endif
        @if($errors->any())
        @foreach($errors->all() as $err)
        <p class="alert alert-danger">{{ $err }}</p>
        @endforeach
        @endif

        <form id="formAuthentication" class="mb-3" action="{{ route('login.action') }}" method="POST">
          @csrf
          <div class="mb-3">
            <label for="email" class="form-label">Username</label>
            <input
              type="username"
              class="form-control"
              id=""
              name="username"
              placeholder="Enter your username"
              autofocus
            />
          </div>
          <div class="mb-3 form-password-toggle">
            <div class="d-flex justify-content-between">
              <label class="form-label" for="password">Password</label>
            </div>
            <div class="input-group input-group-merge">
              <input
                type="password"
                id="password"
                class="form-control"
                name="password"
                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                aria-describedby="password"
              />
              <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
            </div>
          </div>
          <div class="mb-3">
            <button class="btn btn-success d-grid w-100" type="submit">Sign in</button>
          </div>
        </form>

        
      </div>
    </div>
    <!-- /Register -->
  </div>
</div>
@endsection