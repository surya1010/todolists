@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row" >
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href=" {{ url('/home') }} ">Dashboard</a></li >
                <li class="active">List</li >
            </ul>
        <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="panel-title">List</h2>
            
            
        </div>
        <div class="panel-body">

        <?php 
            date_default_timezone_set("Asia/Jakarta");;
            $tanggalsekarang2 = date('Y-m-d');
            ?>
        @foreach ($todolists2 as $tdl)
            <?php 

            $tanggalstart = $tdl->start_date;
            $completed = $tdl->completed;

            ?>

                @if ($tanggalstart == $tanggalsekarang2)
                    @if($completed=="T")
                        @include ('layouts._flashnotif')
                    @endif
                @endif
        @endforeach
            
            <p style="float:left"> <a class=" btn btn-primary" href=" {{ url('/admin/todolists/create') }} " > Tambah</a></p>

            {!! Form::open(['url'=> route('admin.todolists.index'), 'class'=>'form-inline', 'id'=>'formSearch']) !!}
            <div class="col-md-8 form-inline">
                    <div class="form-group">
                        <label>Start Date:</label>

                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" name="start_date" class="form-control pull-right isidatepicker1" id="datepicker">
                        </div>
                        <!-- /.input group -->
                      </div>

                      <div class="form-group">
                        <label>End Date:</label>

                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" name="end_date" class="form-control pull-right isidatepicker2" id="datepicker2">
                        </div>
                        <!-- /.input group -->
                      </div>
                      <div class="form-group">
                          <div class="col-md-4 col-md-offset-2">
                            {!! Form::submit('Search', ['class'=>'btn btn-primary cariDate']) !!}
                          </div>
                        </div>
                </div>
            {!! Form::close() !!}
            <div class="clearfix"></div> 
            {!! $html->table(['class' => 'table table-bordered table-striped']) !!}
        </div>
        </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    {!! $html -> scripts() !!}
@endsection
