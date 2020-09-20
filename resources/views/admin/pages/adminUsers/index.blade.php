@extends('admin.layouts.master', ['breadcrumb' => 'admin users'])

@section('content')
{{--
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">
            </h3>
            <div class="box-tools">
                {{-- @can('users-create') --}}
                    {{-- <a href="{{ route('admin.admin_users.create') }}" class="btn btn-primary btn-sm">
                        <span class="fa fa-plus"></span>
                    </a> --}}
                {{-- @endcan --}}
      {{--      </div>
        </div>
        <!-- /.box-header -->
    --}}
@component('admin.components.box', ['title'=>'المٌديرين', 'create' => route('admin.admin_users.create')])

            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>{{ __('الاسم') }}</th>
                        <th>{{ __('الايميل') }}</th>
                        <th>{{ __('سوبر ادمن') }}</th>
                        <th>{{ __(' تم التسجيل') }}</th>
                        <th>{{ __('الاجراءات') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($admins as $admin)
                        <tr>
                            <td>{{ $admin->id }}</td>
                            <td>{{ $admin->name }}</td>
                            <td>{{ $admin->email }}</td>
                            <td>{{ $admin->super_admin ? "نعم" : "لا" }}</td>
                            <td>{{ $admin->created_at ? $admin->created_at->diffForHumans():null}}</td>
                            <td>
                                    <a href="{{ route('admin.admin_users.edit', $admin->id) }}" class="btn btn-primary btn-xs">
                                        <span class="fa fa-pencil"></span>
                                    </a>
                                    
                                    @if(auth()->user()->super_admin == 1)
                                    <a href="javascript:;" class="btn btn-danger btn-xs delete-modal-btn" data-url="{{ route('admin.admin_users.destroy', $admin->id) }}" >
                                        <span class="fa fa-trash"></span>
                                    </a>
                                    @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">
                                <div class="alert alert-warning text-center" role="alert">
                                    <strong>{{ __('لا يوجد بيانات') }}</strong>
                                </div>
                            </td>
                        </tr>
                    @endforelse

                </tbody>
            </table>

@endcomponent
    @include('admin.partials.delete-modal')
@endsection
