@extends('admin.layouts.master',['breadcrumb' => 'الطلاب'])
@section('content')

{{-- @box(['title' => __('الطلاب'), 'create' => route('admin.students.create')]) --}}
@component('admin.components.box', ['title'=>'الطلاب', 'create' => route('admin.students.create')])
<table class="table">
    <thead>
        <tr>
            <th>{{ __('الرقم') }}</th>
            <th>{{ __('الاسم') }}</th>
            <th>{{ __('الايميل') }}</th>
            <th>{{ __(' رقم الموبايل') }}</th>
            <th>{{ __(' تاريخ الميلاد') }}</th>
            <th>{{ __('الجنس') }}</th>
            <th>{{ __('الوقت المتاح يبدء من ') }}</th>
            <th>{{ __('الوقت المتاح ينتهي  عند ') }}</th>
            <th>{{ __('الجروب') }}</th>
            <th>{{ __('اليوم') }}</th>
           <th>{{ __('المعلم') }}</th>
            <th>{{ __('المحافظة') }}</th>
            <th>{{ __('تاريخ الانشاء') }}</th>
            <th>{{ __('الاجرائات ') }}</th>
        </tr>
    </thead>
    <tbody >
        @forelse ($students as $student)
            <tr>
                <td>{{ $student->id }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->mobile }}</td>
                <td>{{ $student->date_of_birth }}</td>
                <td>{{ $student->gender == "M" ? 'ذكر' : 'انثي' }}</td>
                <td>{{ $student->avaliable_time_from }}</td>
                <td>{{ $student->avaliable_time_to}}</td>
                <td>{{ $student->group->name }}</td>
                <td>{{ $student->day->name }}</td>
                <td>{{ $student->teacher->name }}</td>
                <td>{{ $student->governorate->name }}</td>
                <td>{{$student->created_at ?  $student->created_at->diffForHumans() : null}}</td>
                <td>
                        <a href="{{ route('admin.students.edit', $student->id) }}" class="btn btn-primary btn-xs">
                            <span class="fa fa-pencil"></span>
                        </a>
                    <a href="javascript:;" class="btn btn-danger btn-xs delete-modal-btn" data-url="{{ route('admin.students.destroy', $student->id) }}" >
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

{{ $students->links() }}
@endcomponent
@include('admin.partials.delete-modal')

@endsection
