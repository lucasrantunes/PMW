@extends('layout/template')

@section('content')

<div class="row">
<div class="col-lg-12">
<h1 class="page-header">Login</h1>
</div>
</div>

{!! Form::open(array('url' => 'login')) !!}

<fieldset>

{!! csrf_field() !!}

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
      {!! Form::label('captcha','Captcha:', array('class' => 'col-md-4 control-label')) !!}
<div class="col-md-6"> 
    <div class="g-recaptcha" data-sitekey="6LeG5Q8TAAAAAPjnrgm2Kz9rv8xei4wjavq_r5Z7"></div>

</div>

<div class="form-group">
    <div class="col-md-6"> 
        <input id="submit" name="submit" type="submit" class="btn btn-primary" value="Login">
    </div>
</div>


</fieldset>

{!! Form::close() !!}



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

@endsection





