@extends('layout/template')

@section('content')


     
	

<div class="row">
<div class="col-lg-12">

<h1 class="page-header">Painel de Usuário</h1> 

</div>
</div>

<fieldset>



<div class="form-group">
    <a href="logout">{!! Form::submit('Deslogar', array('class' => 'btn btn-primary')) !!}</a>
       
</div>

<div class="form-group">
    {!! Form::label('login','Login:', array('class' => 'col-md-4 control-label')) !!}
        <div class="col-md-6"> 
           {!! $loggedd['login'] !!}
        </div>
</div>

<div class="form-group">
    {!! Form::label('email','Email:', array('class' => 'col-md-4 control-label')) !!}
        <div class="col-md-6"> 
            {!! $loggedd['email'] !!}
        </div>
</div>

<div class="form-group">
    {!! Form::label('senha','Senha:', array('class' => 'col-md-4 control-label')) !!}
        <div class="col-md-6"> 
            <a data-toggle="modal" data-target="#myModal" href="">Alterar</a>
        </div>
</div>


</fieldset>




<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Alterar senha</h4>
      </div>
      
       {!! Form::open(array('url' => 'painel')) !!}
       <div class="modal-body">
         
        <div class="form-group">
    {!! Form::label('senha','Senha atual:', array('class' => 'col-md-4 control-label')) !!}
        <div class="col-md-6"> 
            {!! Form::password('password', array('class' => 'form-control input-sm',  'placeholder' => 'Senha')) !!}
        </div>
        </div>

          <div class="form-group">
         {!! Form::label('senha','Nova Senha:', array('class' => 'col-md-4 control-label')) !!}
        <div class="col-md-6"> 
            {!! Form::password('passwordNovo', array('class' => 'form-control input-sm',  'placeholder' => 'Senha')) !!}
        </div>
        </div>

        <div class="form-group">
          {!! Form::label('senha','Repita a nova Senha:', array('class' => 'col-md-4 control-label')) !!}
        <div class="col-md-6"> 
            {!! Form::password('passwordNovo_confirmation', array('class' => 'form-control input-sm',  'placeholder' => 'Senha')) !!}
        </div>
        </div>
      </div>
 <div class="modal-footer">
    <div class="form-group">
      <div class="">
        <button type="submit" class="btn btn-primary"> Alterar </button>
      
      </div>
    </div>
</div>
{!! Form::close() !!}

    </div>
  </div>
 </div>

@if (count($errors) > 0)
<p>
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
<p>
@endif

@if(Session::has('message-true'))
<p>
    <div class="alert alert-success">
        <ul>
            <li>{{Session::get('message-true')}} </li>
        </ul>
    </div>
</p> 
@endif


@if(Session::has('message-false'))
<p>
<div class="alert alert-danger">
        <ul>
    <li>{{Session::get('message-false')}} </li>
 </ul>
    </div>
</p>
@endif

@if(Session::has('message-info'))
<p>
<div class="alert alert-info">
        <ul>
    <li>{{Session::get('message-info')}} </li>
 </ul>
    </div>
</p>
@endif
   
<script src="/pantera/public/js/bootstrap-modal.js"></script>

@endsection