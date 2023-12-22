@extends('layouts.backend')
@section('title', 'All Orders')
@section('content')
    <div class="row">
        <div class="col-12 mb-30 mt-20">
            <div class="support-ticket-system support-ticket-system--search">

                <div class="breadcrumb-main m-0 breadcrumb-main--table justify-content-sm-between mb-30">
                    <div class="d-flex flex-wrap justify-content-center breadcrumb-main__wrapper">
                        <div class="d-flex align-items-center ticket__title justify-content-center me-md-25 mb-md-0 mb-20">
                            <h4 class="text-capitalize fw-500 breadcrumb-title">All orders</h4>
                        </div>
                    </div>
                </div>

                {{-- <div class="support-form datatable-support-form d-flex justify-content-xxl-between justify-content-center align-items-center flex-wrap">
                    <div class="support-form__input">
                        <div class="d-flex flex-wrap">
                            <div class="support-form__input-id">
                                <label>Id:</label>

                                <div class="dm-select ">

                                    <select name="select-search" class="select-search form-control ">
                                        <option value="01">All</option>
                                        <option value="02">Option 2</option>
                                        <option value="03">Option 3</option>
                                        <option value="04">Option 4</option>
                                        <option value="05">Option 5</option>
                                    </select>

                                </div>

                            </div>
                            <div class="support-form__input-status">
                                <label>status:</label>

                                <div class="dm-select ">

                                    <select name="select-search" class="select-search form-control ">
                                        <option value="01">All</option>
                                        <option value="02">Option 2</option>
                                        <option value="03">Option 3</option>
                                        <option value="04">Option 4</option>
                                        <option value="05">Option 5</option>
                                    </select>

                                </div>

                            </div>

                            <button class="support-form__input-button">search</button>
                        </div>
                    </div>
                    <div class="support-form__search">
                        <div class="support-order-search">
                            <form action="/" class="support-order-search__form">
                                <img src="{{ asset('backend/img/svg/search.svg') }}" alt="search" class="svg">
                                <input class="form-control border-0 box-shadow-none" type="search" placeholder="Search" aria-label="Search">
                            </form>
                        </div>
                    </div>
                </div> --}}

                <div class="userDatatable userDatatable--ticket userDatatable--ticket--2 mt-1">
                    <div class="table-responsive">
                        <table class="table mb-0 table-borderless">
                            <thead>
                                <tr class="userDatatable-header">
                                    <th>
                                        <span class="userDatatable-title">Order ID</span>
                                    </th>
                                    <th>
                                        <span class="userDatatable-title">Customer Name</span>
                                    </th>
                                    <th>
                                        <span class="userDatatable-title">Customer Phone</span>
                                    </th>
                                    <th>
                                        <span class="userDatatable-title">Order Amount</span>
                                    </th>
                                    <th>
                                        <span class="userDatatable-title">Status</span>
                                    </th>
                                    <th><span class="userDatatable-title">Order Date</span></th>
                                    </th>
                                    {{-- <th class="actions">
                                        <span class="userDatatable-title">Actions</span>
                                    </th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>
                                            <a href="{{ route('order.show', $order->id) }}" class="text-dark fw-500">{{ $order->id }}</a>
                                        </td>
                                        <td>{{ $order->customer_name }}</td>
                                        <td>{{ $order->customer_phone }}</td>
                                        <td>
                                            ৳ {{ $order->subtotal }}
                                        </td>
                                        <td>
                                            @if($order->status == 0)
                                                <span class="bg-opacity-warning color-warning userDatatable-content-status">Pending</span>
                                            @elseif($order->status == 1)
                                                <span class="bg-opacity-info color-info userDatatable-content-status">Processing</span>
                                            @elseif($order->status == 2)
                                                <span class="bg-opacity-success color-success userDatatable-content-status">Delivered</span>
                                            @elseif($order->status == 3)
                                                <span class="bg-opacity-danger color-danger userDatatable-content-status">Canceled</span>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $order->created_at->format('h:i A, d M Y') }}
                                        </td>
                                        {{-- <td>
                                            <ul class="orderDatatable_actions mb-0 d-flex flex-wrap">
                                                <li>
                                                    <a href="#" class="edit">
                                                        <i class="uil uil-edit"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </td> --}}
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                    {{-- <div class="d-flex justify-content-end pt-30">

                        <nav class="dm-page ">
                            <ul class="dm-pagination d-flex">
                                <li class="dm-pagination__item">
                                    <a href="#" class="dm-pagination__link pagination-control"><span
                                            class="la la-angle-left"></span></a>
                                    <a href="#" class="dm-pagination__link"><span class="page-number">1</span></a>
                                    <a href="#" class="dm-pagination__link active"><span
                                            class="page-number">2</span></a>
                                    <a href="#" class="dm-pagination__link"><span class="page-number">3</span></a>
                                    <a href="#" class="dm-pagination__link pagination-control"><span
                                            class="page-number">...</span></a>
                                    <a href="#" class="dm-pagination__link"><span class="page-number">12</span></a>
                                    <a href="#" class="dm-pagination__link pagination-control"><span
                                            class="la la-angle-right"></span></a>
                                    <a href="#" class="dm-pagination__option">
                                    </a>
                                </li>
                                <li class="dm-pagination__item">
                                    <div class="paging-option">
                                        <select name="page-number" class="page-selection">
                                            <option value="20">20/page</option>
                                            <option value="40">40/page</option>
                                            <option value="60">60/page</option>
                                        </select>
                                    </div>
                                </li>
                            </ul>
                        </nav>

                    </div> --}}

                    <div class="col-12 pt-30">
                        <div class="table-responsive">
                            {{ $orders->links() }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection