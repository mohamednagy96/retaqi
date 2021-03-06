@extends('admin.layouts.login')

@section('content')
<div class="login-box">

    <div class="login-logo">
        <p>  لوحة تحكم ارتقى و رتل  </p>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
    @include('admin.partials.alerts')

      {{-- <p class="login-box-msg">Sign in to start your session</p> --}}

        <form action="{{ route('admin.login') }}" method="post" class="required">
            @csrf
        <div class="form-group has-feedback">
            <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="{{ __('E-mail') }}" required>
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password" placeholder="{{ __('Password') }}" required>
          <span class="fa fa-lock form-control-feedback"></span>
        </div>
        <div class="row">
          <div class="col-xs-6">
            <div class="checkbox icheck">
              <label>
                {{-- <input type="checkbox"> Remeber Me --}}
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-xs-6">
            <button type="submit" class="btn btn-primary btn-block btn-flat">{{ __('Login') }}</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

    </div>
    <!-- /.login-box-body -->
  </div>
@endsection
