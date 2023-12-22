@extends('layouts.backend')
@section('title', 'All Products')
@section('content')
    <div class="row">
        <div class="col-12 mb-30 mt-30">
            <div class="support-ticket-system support-ticket-system--search">

                <div class="breadcrumb-main m-0 breadcrumb-main--table justify-content-sm-between mb-30">
                    <div class=" d-flex flex-wrap justify-content-center breadcrumb-main__wrapper">
                        <div class="d-flex align-items-center ticket__title justify-content-center me-md-25 mb-md-0 mb-20">
                            <h4 class="text-capitalize fw-500 breadcrumb-title">All Products</h4>
                        </div>
                    </div>
                    <div class="action-btn">
                        <a href="{{ route('product.create') }}" class="btn btn-primary"><i class="las la-plus me-1"></i> Add New</a>
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
                                        <span class="userDatatable-title">SL</span>
                                    </th>
                                    <th>
                                        <span class="userDatatable-title">Image</span>
                                    </th>
                                    <th>
                                        <span class="userDatatable-title">Product Name</span>
                                    </th>
                                    <th>
                                        <span class="userDatatable-title">Sale Price</span>
                                    </th>
                                    <th>
                                        <span class="userDatatable-title">Stock Status</span>
                                    </th>
                                    {{-- <th>
                                        <span class="userDatatable-title">Quantity</span>
                                    </th> --}}
                                    </th>
                                    <th class="actions">
                                        <span class="userDatatable-title">Actions</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i=1; @endphp
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>
                                            <img src="{{ asset($product->thumbnail) }}" alt="{{ $product->name }}" width="40px">
                                        </td>
                                        <td>
                                            <a href="{{-- route('product', $product->slug) --}}" class="text-dark fw-500 text-wrap" target="_blank">{{ $product->name }}</a>
                                        </td>
                                        <td>
                                            ৳ {{ $product->sale_price }}
                                        </td>
                                        <td>
                                            @if($product->stock_status == 1)
                                                <span class="bg-opacity-success color-success userDatatable-content-status active">In Stock</span>
                                            @else
                                                <span class="bg-opacity-danger color-danger userDatatable-content-status">Out of Stock</span>
                                            @endif
                                        </td>
                                        {{-- <td>
                                            {{ $product->available_quantity }}
                                        </td> --}}
                                        <td>
                                            <ul class="orderDatatable_actions mb-0 d-flex flex-wrap">
                                                <li>
                                                    <a href="{{ route('product.edit', $product->id) }}" class="edit">
                                                        <i class="uil uil-edit"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    @php $i++; @endphp
                                @endforeach

                            </tbody>
                        </table>
                    </div>


                    <div class="col-12 pt-30">
                        <div class="table-responsive">
                            {{ $products->links() }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
