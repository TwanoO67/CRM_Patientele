@extends('layouts.default')

@section('content')
<div class="container">
        <h1>FORM</h1>
        
        {{ Form::open(['route' => 'users.store']) }}
            {{ Form::label('nom', 'Nom:') }}
            {{ Form::text('nom')}}
            {{ $errors->first('nom' ,'<span class="wrapper">:message</span>') }}
            <br/>
            {{ Form::label('prenom', 'Prenom:') }}
            {{ Form::text('prenom')}}
            {{ $errors->first('prenom' ,'<span class="wrapper">:message</span>') }}
            <br/>
            {{ Form::label('password', 'Password:') }}
            {{ Form::input('password','password') }}
            {{ $errors->first('password') }}
             <br/>
            {{ Form::submit('Valider') }}
        {{ Form::close() }}
</div>
<br/>
@stop