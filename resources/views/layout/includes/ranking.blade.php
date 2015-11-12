@extends('layout/template')

@section('content')

<div class="row">
<div class="col-lg-12">
<h1 class="page-header">Ranking</h1>
</div>
</div>

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


<ul class="nav nav-tabs">
  <li role="presentation"><a href="/pantera/public/ranking/reset">Resets</a></li>
  <li role="presentation"><a href="/pantera/public/ranking/pk">Pk</a></li>
</ul>

    
</br>
    @if(isset($ranking))
    @include('layout/includes/ranking/'.$ranking)
    @else
     <div class="alert alert-info">
           Escolha o ranking que deseja exibir.
    </div>
    @endif


@endsection



