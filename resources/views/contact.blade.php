
@extends('layouts.app')

@section('title', 'Qualipro - Home')

@section('content')
	<div class="bg-secondery color-white" id="scroll" style="display: inline;"><i class="fa fa-angle-up"></i></div>

    @include('partials.header')
    @include('partials.Contact')
    

    
    @include('partials.footer')

@endsection
