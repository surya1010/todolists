<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
  {!! Form::label('name', 'Nama List', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-4">
    {!! Form::text('name', null, ['class'=>'form-control']) !!}
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
  {!! Form::label('description', 'Deskripsi', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-4">
    {!! Form::textarea('description', null, ['class'=>'form-control']) !!}
    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group">
       {{ Form::label('start_date', 'Tanggal Mulai',['class' => 'col-md-2 control-label']) }}
       <div class="col-md-4">
        {{ Form::date('start_date', \Carbon\Carbon::now(), ['class' => 'form-control']) }}

        @if($errors->has('create_at'))
         <small> {{ $errors->first('create_at') }} </small>
        @endif
       </div>
</div>

<div class="form-group">
       {{ Form::label('end_date', 'Tanggal Akhir',['class' => 'col-md-2 control-label']) }}
       <div class="col-md-4">
        {{ Form::date('end_date', \Carbon\Carbon::now(), ['class' => 'form-control']) }}

        @if($errors->has('end_date'))
         <small> {{ $errors->first('end_date') }} </small>
        @endif
       </div>
</div>

<input type="hidden" name="userID" value="{{ Auth::user()->id }}">

<div class="form-group">
  <div class="col-md-4 col-md-offset-2">
    {!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
  </div>
</div>
