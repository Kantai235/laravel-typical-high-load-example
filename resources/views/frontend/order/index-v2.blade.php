@extends('frontend.layouts.app')

@section('title', __('My Orders / Tracking'))

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <order-info-v2 :number="'{{ $number }}'"></order-info-v2>
            </div><!--col-md-10-->
        </div><!--row-->
    </div><!--container-->
@endsection
