@extends('admin.layouts.master',['breadcrumb'=>'create contact'])
@section('content')
    @component('admin.components.box',['title'=>'Create Contact'])
    {!! Form::open(['route' => 'admin.students.store','method' => 'POST']) !!}
    @include('admin.pages.students.form')
    {!! Form::close() !!}
    @endcomponent
@endsection