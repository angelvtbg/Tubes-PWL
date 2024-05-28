@extends('app')

@section('title', 'Home Page')

@include('partials.navbar')

@include('partials.home')
@include('partials.about')
@include('partials.services')
@include('menu.index')

<center>
    @include('menu.thumbnail')
</center>
@include('partials.contact')

