@extends('layouts.app')
@section('content') 
<div class="container" >
    <div class="row" >
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href=" {{ url('/home') }} " > Dashboard</a></li >
                <li><a href=" {{ url('/admin/books') }} " > List</a></li >
                <li class="active"> Ubah List</li >
            </ul >
            <div class="panel panel-default" >
            <div class="panel-heading" >
            <h2 class="panel-title" > Ubah List</h2>
            </div>
            <div class=" panel-body" >
                {!! Form::model($todolist, ['url' => route('admin.todolists.update' , $todolist->id),
                'method' => 'put' ,  'class' => 'form-horizontal' ]) !!}
                @include('todolists._form')
                {!! Form:: close() !!}
            </div>
            </div>
        </div>
    </div>
</div>
@endsection