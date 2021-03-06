@extends('admin.layouts.master', ['breadcrumb' => 'update admin user', 'breadcrumbModel' => $admin])


@section('content')
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">

            </h3>
            <div class="box-tools">

            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <form action="{{ route('admin.admin_users.update', $admin->id) }}" method="post" enctype="multipart/form-data"> @csrf @method('PUT')

                <div class="form-group row">
                  <label for="name" class="col-md-2">{{ __('الاسم') }}</label>
                  <div class="col-md-10">
                        <input type="text" name="name" id="name" class="form-control" placeholder="{{ __('الاسم') }}" value="{{ old('name') ? old('name') : $admin->name }}">
                  </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-md-2">{{ __('Email') }}</label>
                    <div class="col-md-10">
                          <input type="text" name="email" id="email" class="form-control" placeholder="{{ __('الاسم') }}" value="{{ old('email') ? old('email') : $admin->email }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-md-2">{{ __('الرقم السري') }}</label>
                    <div class="col-md-10">

                          <div class="input-group">
                            <div class="input-group-btn">
                                <button class="btn btn-default show-password" type="button">
                                    <i class="fa fa-eye"></i>
                                </button>
                            </div>

                            <input type="password" name="password" id="password" class="form-control password" placeholder="{{ __('الرقم السري') }}" autocomplete="off" rel="gp" data-size="8" data-character-set="a-z,A-Z,0-9,#">

                            <div class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-refresh generate-password"></i>
                                </button>
                            </div>
                          </div>
                    </div>
                </div>


                    <div class="form-group row">
                        <label for="name" class="col-md-2">{{ __('سوبر ادمن') }}</label>
                        <div class="col-md-10">
                            {!! Form::checkbox('super_admin',null,$admin->super_admin) !!}
                        </div>
                      </div>

                <div class="form-group row">
                    <div class="col-md-2"></div>
                    <div class="col-md-10">
                        <button type="submit" class="btn btn-success">{{ __('Save') }} <span class="fa fa-save"></span></button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
@endsection


