@extends('layouts.backend')
@section('title', 'Dashboard')
@section('content')
<div class="social-dash-wrap">

    <div class="row d-none d-md-flex">
        <div class="col-lg-12">

            <div class="breadcrumb-main">
                <h4 class="text-capitalize breadcrumb-title">Dashboard</h4>
                <div class="breadcrumb-action justify-content-center flex-wrap">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="uil uil-estate"></i>Boromokam</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                        </ol>
                    </nav>
                </div>
            </div>

        </div>
    </div>

    <div class="row mt-35 mt-md-auto">

        <div class="col-xxl-3 col-sm-6 mb-25">

            <div class="ap-po-details ap-po-details--2 p-25 radius-xl d-flex justify-content-between">
                <div class="overview-content w-100">
                    <div class=" ap-po-details-content d-flex flex-wrap justify-content-between">
                        <div class="ap-po-details__titlebar">
                            <h1>{{ $total_products }}</h1>
                            <p class="mb-0">Total Products</p>
                        </div>
                        <div class="ap-po-details__icon-area">
                            <div class="svg-icon order-bg-opacity-secondary color-secondary">
                                <i class="uil uil-briefcase-alt"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        {{-- <div class="col-xxl-3 col-sm-6 mb-25">

            <div class="ap-po-details ap-po-details--2 p-25 radius-xl d-flex justify-content-between">
                <div class="overview-content w-100">
                    <div class=" ap-po-details-content d-flex flex-wrap justify-content-between">
                        <div class="ap-po-details__titlebar">
                            <h1>{{ $total_orders }}</h1>
                            <p class="mb-0">Total Orders</p>
                        </div>
                        <div class="ap-po-details__icon-area">
                            <div class="svg-icon order-bg-opacity-info color-info">
                                <i class="uil uil-shopping-cart-alt"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        <div class="col-xxl-3 col-sm-6 mb-25">

            <div class="ap-po-details ap-po-details--2 p-25 radius-xl d-flex justify-content-between">
                <div class="overview-content w-100">
                    <div class=" ap-po-details-content d-flex flex-wrap justify-content-between">
                        <div class="ap-po-details__titlebar">
                            <h1>{{ $total_pending_orders }}</h1>
                            <p class="mb-0">Pending Orders</p>
                        </div>
                        <div class="ap-po-details__icon-area">
                            <div class="svg-icon order-bg-opacity-warning color-warning">
                                <i class="uil uil-usd-circle"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xxl-3 col-sm-6 mb-25">
            <div class="ap-po-details ap-po-details--2 p-25 radius-xl d-flex justify-content-between">
                <div class="overview-content w-100">
                    <div class="ap-po-details-content d-flex flex-wrap justify-content-between">
                        <div class="ap-po-details__titlebar">
                            <h1>{{ $total_delivered_orders }}</h1>
                            <p class="mb-0">Total Delivered Orders</p>
                        </div>
                        <div class="ap-po-details__icon-area">
                            <div class="svg-icon order-bg-opacity-success color-success">
                                <i class="uil uil-truck"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xxl-3 col-sm-6 mb-25">
            <div class="ap-po-details ap-po-details--2 p-25 radius-xl d-flex justify-content-between">
                <div class="overview-content w-100">
                    <div class="ap-po-details-content d-flex flex-wrap justify-content-between">
                        <div class="ap-po-details__titlebar">
                            <h1 id="sms_bal" style="display: none"></h1>
                            <button type="button" id="check_sms" class="btn btn-block btn-info btn-squared btn-xs" style="margin-bottom: 5.575px;">CHECK BALANCE</button>
                            <p class="mb-0">Available SMS Balance</p>
                        </div>
                        <div class="ap-po-details__icon-area">
                            <div class="svg-icon order-bg-opacity-info color-info">
                                <i class="uil uil-envelope-alt"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
@endsection

@push('page-js')
<script>
    $(document).ready(function() {
        $('#check_sms').click(function() {
            $(this).text('Checking...');
            $.ajax({
                url: "{{ route('sms-balance') }}",
                success: function(data) {
                    $('#check_sms').hide();
                    $('#sms_bal').text(data).fadeIn();
                },
                error: function() {
                    $('#check_sms').text('Error');
                }
            });
        });
    });
</script>
@endpush