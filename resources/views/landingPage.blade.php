@extends('layouts.base')

@section('title','Bienvenido')

@section('content')

    <a href="{{ route('login') }}" >Inicia sesion</a> o <a href="{{ route('register') }}">registrate!</a>

 @endsection