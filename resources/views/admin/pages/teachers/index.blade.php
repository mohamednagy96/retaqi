@extends('admin.layouts.master',['breadcrumb' => 'titles'])
@section('content')

{{-- @box(['title' => __('الشيوخ'), 'create' => route('admin.teachers.create')]) --}}
@component('admin.components.box', ['title'=>'الشيوخ', 'create' => route('admin.teachers.create'),'Side_address'=> 'انشاء جديد '])
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>{{ __('الاسم') }}</th>
            <th>{{ __('الايميل') }}</th>
            <th>{{ __(' رقم الموبايل') }}</th>
            <th>{{ __(' تاريخ الميلاد') }}</th>
            <th>{{ __('الجنس') }}</th>
            <th>{{ __('المحافظة') }}</th>
            <th>{{ __('تاريخ الانشاء') }}</th>
            <th>{{ __('الاجرائات ') }}</th>
        </tr>
    </thead>
    <tbody >
        @forelse ($teachers as $teacher)
            <tr>
                <td>{{ $teacher->id }}</td>
                <td>{{ $teacher->name }}</td>
                <td>{{ $teacher->email }}</td>
                <td>{{ $teacher->mobile }}</td>
                <td>{{ $teacher->date_of_birth }}</td>
                <td>{{ $teacher->gender == "M" ? 'ذكر' : 'انثي' }}</td>
                <td>{{ $teacher->governorate->name }}</td>
                <td>{{$teacher->created_at ?  $teacher->created_at->diffForHumans() : null}}</td>
                <td>
                        <a href="{{ route('admin.teachers.edit', $teacher->id) }}" class="btn btn-primary btn-xs">
                            <span class="fa fa-pencil"></span>
                        </a>
                    <a href="javascript:;" class="btn btn-danger btn-xs delete-modal-btn" data-url="{{ route('admin.teachers.destroy', $teacher->id) }}" >
                        <span class="fa fa-trash"></span>
                    </a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="9">
                    <div class="alert alert-warning text-center" role="alert">
                        <strong>{{ __('لا يوجد بيانات') }}</strong>
                    </div>
                </td>
            </tr>
        @endforelse

    </tbody>
</table>
{{-- @endtable --}}

{{ $teachers->links() }}
@endcomponent
@include('admin.partials.delete-modal')

@endsection
