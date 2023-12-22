@extends('layouts.backend')
@section('title', 'All Orders')
@section('content')
    <div class="row">
        <div class="col-lg-12">

            <div class="payment-invoice global-shadow radius-xl w-100 mb-30 mt-20">
                <div class="payment-invoice__body">
                    {{-- <div class="payment-invoice-address d-flex justify-content-sm-between">

                        <div class="payment-invoice-logo">
                            <a href="index.html">
                                <img class="dark" src="img/logo-dark.png" alt="logo">
                                <img class="light" src="img/logo-white.png" alt="logo">
                            </a>
                        </div>
                        <div class="payment-invoice-address__area">
                            <address>Admin Company<br> 795 Folsom Ave, Suite 600<br> San Francisco, CA 94107, USA<br>
                                Reg.
                                number : 245000003513</address>
                        </div>
                    </div><!-- End: .payment-invoice-address --> --}}

                    <div class="payment-invoice-qr d-flex justify-content-between mb-40 px-xl-50 px-30 py-sm-30 py-20 ">
                        <div class="d-flex justify-content-center mb-lg-0 mb-25">
                            <div class="payment-invoice-qr__number">
                                <div class="display-3">
                                    Order
                                </div>
                                <p>No : <span>#{{ $order->id }}</span></p>
                                <p>Date : <span>{{ $order->created_at->format('h:i A, d M Y') }}</span></p>
                            </div>
                        </div><!-- End: .d-flex -->
                        {{-- <div class="d-flex justify-content-center mb-lg-0 mb-25">
                            <div class="payment-invoice-qr__code bg-white radius-xl p-20">
                                <img src="img/qr.png" alt="qr">
                                <p>8364297359912267</p>
                            </div>
                        </div><!-- End: .d-flex --> --}}
                        <div class="d-flex justify-content-center">
                            <div class="payment-invoice-qr__address">
                                <p>Customer:</p>
                                <span>{{ $order->customer_name }}</span><br>
                                <span>{{ $order->customer_phone }}</span><br>
                                <span>{{ $order->customer_address }}</span>
                            </div>
                        </div><!-- End: .d-flex -->
                    </div><!-- End: .payment-invoice-qr -->
                    <div class="payment-invoice-table">
                        <div class="table-responsive">
                            <table id="cart" class="table table-borderless">
                                <thead>
                                    <tr class="product-cart__header">
                                        <th scope="col">Image</th>
                                        <th scope="col">Product Name</th>
                                        <th scope="col" class="text-end">Price Per Unit</th>
                                        <th scope="col" class="text-end">Quantity</th>
                                        <th scope="col" class="text-end">Order Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- <tr>
                                        <td>
                                            <img src="{{ asset($order->order_details['product_thumbnail']) }}" alt="Picture of {{ $order->order_details['product_name'] }}" class="img-fluid">
                                        </td>
                                        <td class="Product-cart-title">
                                            <div class="media  align-items-center">
                                                <div class="media-body">
                                                    <h5 class="mt-0 text-wrap">{{ $order->order_details['product_name'] }}</h5>
                                                    <div class="d-flex">
                                                        <p>Size:<span>large</span></p>
                                                        <p>color:<span>brown</span></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="unit text-end">৳ {{ $order->order_details['price'] }}</td>
                                        <td class="invoice-quantity text-end">{{ $order->order_details['quantity'] }}</td>
                                        <td class="text-end order">৳ {{ $order->order_details['total'] }}</td>
                                    </tr> --}}
                                    @foreach($order->order_details as $product)
                                    <tr>
                                        <td>
                                            <img src="{{ asset($product['product_thumbnail']) }}" alt="Picture of {{ $product['product_name'] }}" class="img-fluid">
                                        </td>
                                        <td class="Product-cart-title">
                                            <div class="media  align-items-center">
                                                <div class="media-body">
                                                    <h5 class="mt-0 text-wrap">{{ $product['product_name'] }}</h5>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="unit text-end">৳ {{ $product['price'] }}</td>
                                        <td class="invoice-quantity text-end">{{ $product['quantity'] }}</td>
                                        <td class="text-end order">৳ {{ $product['total'] }}</td>
                                    </tr>
                                @endforeach
                                
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="3"></td>
                                        <td class="order-summery float-right border-0   ">
                                            {{-- <div class="total">
                                                <div class="subtotalTotal mb-0 text-end">
                                                    Subtotal :
                                                </div>
                                                <div class="taxes mb-0 text-end">
                                                    discount :
                                                </div>
                                                <div class="shipping mb-0 text-end">
                                                    Shipping charge :
                                                </div>
                                            </div> --}}
                                            <div class="total-money mt-2 text-end">
                                                <h6>Total :</h6>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="total-order float-right text-end fs-14 fw-500">
                                                {{-- <p>$1,690.26</p>
                                                <p>-$126.30</p>
                                                <p>$46.30</p> --}}
                                                <h5 class="text-primary">৳ {{ $order->subtotal }}</h5>
                                            </div>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        @if($order->status != 2)
                        <div class="payment-invoice__btn mt-xxl-50 pt-xxl-30">
                            @if ($order->status == 0)
                                <a href="{{ route('order.mark-as-processing', $order->id) }}" class="btn-info btn rounded-pill px-25 text-white m-1">Mark as Processing</a>
                                <a href="{{ route('order.mark-as-canceled', $order->id) }}" class="btn-danger btn rounded-pill px-25 text-white m-1">Mark as Canceled</a>
                            @elseif($order->status == 1)
                                <a href="{{ route('order.mark-as-delivered', $order->id) }}" class="btn-success btn rounded-pill px-25 text-white m-1">Mark as Delivered</a>
                                <a href="{{ route('order.mark-as-canceled', $order->id) }}" class="btn-danger btn rounded-pill px-25 text-white m-1">Mark as Canceled</a>
                            @endif
                        </div>
                        @endif
                    </div><!-- End: .payment-invoice-table -->
                </div><!-- End: .payment-invoice__body -->
            </div><!-- End: .payment-invoice -->

        </div>
    </div>
@endsection
