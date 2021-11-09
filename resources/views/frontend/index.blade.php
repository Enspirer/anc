@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')
    
    <div class="row">
        <div class="col">
            <example-component></example-component>
        </div><!--col-->
    </div><!--row-->

@endsection
