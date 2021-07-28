@extends('frontend.layouts.app')

@section('title', __('My Orders / Tracking'))

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <article class="card">
                    <header class="card-header"> My Orders / Tracking </header>
                    <div class="card-body">
                        <h1 class="text-center py-5">Thank you for your order!</h1>
                        <h6>Order ID: {{ $order->uuid }}</h6>
                        <article class="card">
                            <div class="card-body row">
                                <div class="col"> <strong>Estimated Delivery time:</strong> <br>-</div>
                                <div class="col"> <strong>Shipping BY:</strong> <br>-</div>
                                <div class="col"> <strong>Status:</strong> <br>{{ $order->type }}</div>
                                <div class="col"> <strong>Tracking:</strong> <br>-</div>
                            </div>
                        </article>
                        <hr>

                        <article class="card">
                            <header class="card-header"> Payment Summary </header>
                            @foreach ($order->items as $item)
                                <div class="row row-main p-2 mt-2">
                                    <div class="col-2 text-center">
                                        <img class="img-fluid" style="height: 128px;" src="/img/product/default.png">
                                    </div>
                                    <div class="col-8">
                                        <div class="row d-flex">
                                            <p class="w-100"><b>{{ substr($item->product->name, 0, 24) }} ...</b></p>
                                        </div>
                                        <div class="row d-flex">
                                            <p class="w-100 text-muted">{{ substr($item->product->description, 0, 128) }} ...</p>
                                        </div>
                                    </div>
                                    <div class="col-2 d-flex justify-content-end">
                                        <p class="text-center">
                                            <b>{{ $item->count }}</b> × <b>$ {{ number_format($item->price) }}.00</b>
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                            <hr class="mx-3">
                            <div class="total p-2">
                                <div class="row">
                                    <div class="col"><b>Total:</b></div>
                                    <div class="col d-flex justify-content-end"><b>$ {{ number_format($order->price) }}.00</b></div>
                                </div>
                            </div>
                        </div>
                        </article>
                        <hr>
                        <a href="/" class="btn btn-warning" data-abc="true">
                            <i class="fa fa-chevron-left"></i> Back to Dashborad
                        </a>
                    </div>
                </article>
            </div><!--col-md-10-->
        </div><!--row-->
    </div><!--container-->
@endsection
