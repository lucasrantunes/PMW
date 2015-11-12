@extends('layout/template')

@section('content')

<div class="row">
<div class="col-lg-12">
<h1 class="page-header">Cadastrar</h1>
</div>
</div>

{!! Form::open(array('url' => 'cadastro')) !!}



<fieldset>

<div class="form-group">
    {!! Form::label('login','Login:', array('class' => 'col-md-4 control-label')) !!}
        <div class="col-md-6"> 
            {!! Form::text('login','', array('class' => 'form-control input-sm', 'placeholder' => 'Login')) !!}
        </div>
</div>



<div class="form-group">
    {!! Form::label('senha','Senha:', array('class' => 'col-md-4 control-label')) !!}
        <div class="col-md-6"> 
            {!! Form::password('password', array('class' => 'form-control input-sm',  'placeholder' => 'Senha')) !!}
        </div>
</div>



<div class="form-group">
   {!! Form::label('senha2','Confirmar senha:', array('class' => 'col-md-4 control-label')) !!}
        <div class="col-md-6"> 
            {!! Form::password('password_confirmation', array('class' => 'form-control input-sm',  'placeholder' => 'Senha')) !!}
        </div>
</div>


<div class="form-group">
   {!! Form::label('email','Email:', array('class' => 'col-md-4 control-label')) !!}
        <div class="col-md-6"> 
            {!! Form::email('email','', array('class' => 'form-control input-sm',  'placeholder' => 'Email')) !!}
        </div>
</div>



<div class="form-group">
      {!! Form::label('pId','Id Pessoal:', array('class' => 'col-md-4 control-label')) !!}
        <div class="col-md-6"> 
            {!! Form::input('number', 'ID', '', array('class' => 'form-control input-sm',  'placeholder' => '7 números que serão utilizados no game.') ) !!}
        </div>
</div>

<div class="form-group">
      {!! Form::label('captcha','Captcha:', array('class' => 'col-md-4 control-label')) !!}
<div class="col-md-6"> 
    <div class="g-recaptcha" data-sitekey="6LeG5Q8TAAAAAPjnrgm2Kz9rv8xei4wjavq_r5Z7"></div>

</div>

<div class="form-group">
    <div class="col-md-6"> 
        <input id="submit" name="submit" type="submit" class="btn btn-success" value="Cadastrar">
    </div>
</div>


</fieldset>

{!! Form::close() !!}

</br>


@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif




@if(Session::has('message-true'))
<div class="alert alert-success">
        <ul>
    <li>{{Session::get('message-true')}} </li>
 </ul>
    </div>
@endif

@if(Session::has('message-false'))
<div class="alert alert-danger">
        <ul>
    <li>{{Session::get('message-false')}} </li>
 </ul>
    </div>
@endif

@endsection



