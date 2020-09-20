@extends('admin.layouts.master')
@section('content')

@component('admin.components.box', ['title'=>'تعديل '. $student->name])

{!! Form::model($student, ['route' => ['admin.students.update', $student->id], 'method' => 'put']) !!}

@include('admin.pages.students.form')

{!! Form::close() !!}
@endcomponent

@endsection
