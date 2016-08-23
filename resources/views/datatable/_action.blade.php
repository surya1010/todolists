

{!! Form::model($model, ['url'=> $form_url, 'method'=>'delete','class'=>'form-inline']) !!}
<a class="btn btn-info" href="{{ $edit_url }}">Ubah</a> 
{!! Form::submit('Hapus', ['class'=>'btn btn-danger']) !!}
@if(  $field_completed  =="Y")
<a class="btn btn-success" href='#' disabled>Selesai</a>
@else
<a class="btn btn-success" href='{{ $completed_url }}'>Selesai</a>
@endif

{!! Form::close() !!}
