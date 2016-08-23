@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
        <ul class="breadcrumb">
            <li><a href="{{ url('/home') }} "> Dashboard</a></li>
            <li><a href="{{ url('/admin/todolists') }} ">List</a></li>
            <li class="active">Tambah List</li>
        </ul>
        <div class="panel panel-default">
        <div class="panel-heading" >
        <h2 class="panel-title">Tambah List</h2>
        </div>
        <div class="panel-body">
            {!! Form:: open([ 'url' => route('admin.todolists.store'), 'method' => 'post' , 'class' => 'form-horizontal']) !!}
            @include('todolists._form')
            {!! Form:: close() !!}
        </div>
        </div>
        </div>
    </div>
</div>
@endsection