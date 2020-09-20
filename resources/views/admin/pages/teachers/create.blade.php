@extends('admin.layouts.master')

@section('content')

@component('admin.components.box', ['title'=>__('انشاء جديد')])

{!! Form::open(['route' => 'admin.teachers.store']) !!}
@include('admin.pages.teachers.form')
{!!Form::close()!!}
@endcomponent



@endsection

