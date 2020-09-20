@extends('admin.layouts.master')
@section('content')

@component('admin.components.box', ['title'=>'تعديل '. $teacher->name])

{!! Form::model($teacher, ['route' => ['admin.teachers.update', $teacher->id], 'method' => 'put']) !!}

@include('admin.pages.teachers.form')

{!! Form::close() !!}
@endcomponent

@endsection

