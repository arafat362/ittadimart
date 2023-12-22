@extends('layouts.frontend')
@section('page-class', 'html-category-page')
@section('title', $category->name . ' - Boromokam')
@section('content')
    <div class="breadcrumb_area">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">

                    <div class="breadcrumb">
                        <ul>
                            <li>
                                <a href="{{ url('/') }}" title="Home">{{ __('home') }}</a>
                                <span class="delimiter">/</span>
                            </li>
                            <li>
                                <strong class="current-item">{{ $category->name }}</strong>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <div class="master-column-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 center-1">

                    <div class="page category-page">
                        <div class="page-body">

                            <div class="catgegory_top_banner">
                                <div class="catgegory_top_banner_image">
                                    <img class="img-responsive" alt="">
                                </div>
                                <div class="page-title">
                                    <h1>{{ $category->name }}</h1>
                                    <p class="subtitle"></p>
                                </div>
                            </div>



                            {{-- <div class="section-white">
                                <div class="product-selectors">

                                    <div class="product-sorting">
                                        <select id="products-orderby" name="products-orderby"
                                            onchange="setLocation(this.value);">
                                            <option selected="selected" value="https://www.deshify.com/table?orderby=0">
                                                Position</option>
                                            <option value="https://www.deshify.com/table?orderby=5">Name: A to Z</option>
                                            <option value="https://www.deshify.com/table?orderby=6">Name: Z to A</option>
                                            <option value="https://www.deshify.com/table?orderby=10">Price: Low to High
                                            </option>
                                            <option value="https://www.deshify.com/table?orderby=11">Price: High to Low
                                            </option>
                                            <option value="https://www.deshify.com/table?orderby=15">Created on</option>
                                        </select>
                                    </div>
                                    <div class="product-viewmode">
                                        <span>View as</span>
                                        <a class="viewmode-icon list " href="https://www.deshify.com/table?viewmode=list"
                                            title="List">
                                            <i class="glyphicon glyphicon-menu-hamburger"></i>
                                            List
                                        </a>
                                        <a class="viewmode-icon grid selected"
                                            href="https://www.deshify.com/table?viewmode=grid" title="Grid">
                                            <i class="glyphicon glyphicon-th"></i>
                                            Grid
                                        </a>
                                    </div>
                                    <div class="product-page-size">
                                        <span>Display</span>
                                        <select id="products-pagesize" name="products-pagesize"
                                            onchange="setLocation(this.value);">
                                            <option selected="selected" value="https://www.deshify.com/table?pagesize=80">80
                                            </option>
                                            <option value="https://www.deshify.com/table?pagesize=100">100</option>
                                            <option value="https://www.deshify.com/table?pagesize=120">120</option>
                                        </select>
                                    </div>
                                </div>
                            </div> --}}

                            <div class="row">

                                {{-- <div class="col-sm-3">
                                    <div class="section-white">

                                        <script type="text/javascript">
                                            AjaxFilter.init({
                                                "AjaxProductsModel": null,
                                                "CategoryId": 207,
                                                "VendorId": 0,
                                                "EnableManufacturersFilter": true,
                                                "EnableVendorsFilter": true,
                                                "EnablePriceRangeFilter": true,
                                                "EnableSpecificationsFilter": true,
                                                "EnableAttributesFilter": true,
                                                "filterPriceModel": {
                                                    "CurrencySymbol": "BDT",
                                                    "MinPrice": 250.0,
                                                    "MaxPrice": 1399.0,
                                                    "CurrentMinPrice": 250.0,
                                                    "CurrentMaxPrice": 1399.0,
                                                    "CustomProperties": {}
                                                },
                                                "manufacturerModel": null,
                                                "specyficationModel": null,
                                                "vendorsModel": null,
                                                "attributesModel": null,
                                                "ViewMode": "",
                                                "PageSize": 80,
                                                "SortOption": 0,
                                                "PageNumber": 0,
                                                "Count": 0,
                                                "WidgetZone": null,
                                                "CustomProperties": {}
                                            }, 'https://www.deshify.com/Plugins/StoreFontProductFilter/ReloadFilters/');
                                        </script>

                                        <form id="ajaxfilter-form" action="" novalidate="novalidate">
                                            <input type="hidden" name="VendorId" value="0">
                                            <input type="hidden" name="CategoryId" value="207">
                                            <input type="hidden" name="EnableManufacturersFilter" value="True">
                                            <input type="hidden" name="EnableVendorsFilter" value="True">
                                            <input type="hidden" name="EnablePriceRangeFilter" value="True">
                                            <input type="hidden" name="EnableSpecificationsFilter" value="True">
                                            <input type="hidden" name="EnableAttributesFilter" value="True">
                                            <input type="hidden" name="ViewMode" id="ViewMode" value="">
                                            <input type="hidden" name="PageSize" id="PageSize" value="80">
                                            <input type="hidden" name="SortOption" id="SortOption" value="0">
                                            <input type="hidden" name="PageNumber" id="PageNumber" value="0">
                                            <input type="hidden" name="Count" id="Count" value="0">

                                            <div class="ajax-filter-section">

                                                <div>

                                                    <div id="price-filter-section">

                                                        <script>
                                                            $(function() {

                                                                $("#slider-range").slider({
                                                                    range: true,
                                                                    min: 250,
                                                                    max: 1399,
                                                                    values: [250, 1399],

                                                                    slide: function(event, ui) {
                                                                        var currentMin = ui.values[0];
                                                                        var currentMax = ui.values[1];
                                                                        $("#price-current-min").val(currentMin);
                                                                        $("#price-current-max").val(currentMax);
                                                                    },
                                                                    create: function(event, ui) {
                                                                        if ((250 == 250 && 1399 == 1399)) {
                                                                            $(".filter-section .ajaxfilter-clear-price").hide();
                                                                        }
                                                                    },
                                                                    stop: function(event, ui) {
                                                                        var currentMin = ui.values[0];
                                                                        var currentMax = ui.values[1];

                                                                        if (250 == currentMin && 1399 == currentMax) {
                                                                            $(".filter-section .ajaxfilter-clear-price").hide();
                                                                        } else {
                                                                            $(".filter-section .ajaxfilter-clear-price").show();
                                                                        }
                                                                        AjaxFilter.setFilter('p');
                                                                    }
                                                                });
                                                                $("#price-current-min").val(250);
                                                                $("#price-current-max").val(1399);


                                                                $('.ajaxfilter-clear-price').click(function(e) {
                                                                    $("#price-current-min").val(250);
                                                                    $("#price-current-max").val(1399);

                                                                    $("#slider-range").slider("values", 0, 250);
                                                                    $("#slider-range").slider("values", 1, 1399);
                                                                    AjaxFilter.setFilter('p');
                                                                });

                                                            });
                                                        </script>
                                                        <div class="filter-section">
                                                            <div class="title">
                                                                <span class="ajaxfilter-title"
                                                                    style="float:left">Price</span>
                                                                <a class="ajaxfilter-clear-price"
                                                                    style="float: right; display: none;">Clear All</a>
                                                            </div>

                                                            <div class="clear"></div>
                                                            <div class="ajaxfilter-section">
                                                                <input type="hidden" value="BDT" id="currency-symbol"
                                                                    name="filterPriceModel][CurrencySymbol">
                                                                <div class="ajaxfilter-price-range-section">
                                                                    <div class="price-min" style="float: left">
                                                                        <span>Min:</span>
                                                                        <span class="price-range-min">BDT250</span>
                                                                    </div>
                                                                    <div class="price-max" style="float: right">
                                                                        <span>Max:</span>
                                                                        <span class="price-range-max">BDT1399</span>
                                                                    </div>
                                                                </div>

                                                                <div id="slider-range"
                                                                    class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"
                                                                    aria-disabled="false">
                                                                    <input type="hidden" value="250" id="min-price">
                                                                    <input type="hidden" value="1399" id="max-price">
                                                                    <div class="ui-slider-range ui-widget-header ui-corner-all"
                                                                        style="left: 0%; width: 100%;"></div><a
                                                                        class="ui-slider-handle ui-state-default ui-corner-all"
                                                                        href="#" style="left: 0%;"></a><a
                                                                        class="ui-slider-handle ui-state-default ui-corner-all"
                                                                        href="#" style="left: 100%;"></a>
                                                                </div>


                                                                <div class="ajaxfilter-price-section">
                                                                    <div class="ajaxfilter-price-section">
                                                                        <input type="text" value="250"
                                                                            readonly="" id="price-current-min"
                                                                            name="filterPriceModel][CurrentMinPrice">
                                                                        <input type="text" value="1399"
                                                                            readonly="" id="price-current-max"
                                                                            name="filterPriceModel][CurrentMaxPrice">
                                                                        <input type="hidden" value="250"
                                                                            name="filterPriceModel][MinPrice">
                                                                        <input type="hidden" value="1399"
                                                                            name="filterPriceModel][MaxPrice">
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>



                                            </div>
                                        </form>


                                        <div id="product-warning-modal" class="white-popup mfp-hide">
                                            <h1>Warning</h1>
                                            <p>
                                                Your query returned an empty result !
                                            </p>
                                        </div>
                                    </div>
                                </div> --}}

                                <div class="col-sm-12">
                                    <div class="product-grid">
                                        <div class="item-grid grid_5">

                                            {{--  <div class="item-box">
                                                <div class="product-item" data-productid="2349">
                                                    <div class="picture">

                                                        <div class="discount-info">
                                                            50% off </div>
                                                        <a href="/foldable-laptop-table-single-leg-big-size-black-color"
                                                            title="Show details for Foldable Laptop Table  Single leg  Big Size ( Black Color)">
                                                            <img alt="Picture of Foldable Laptop Table  Single leg  Big Size ( Black Color)"
                                                                src="https://www.deshify.com/images/thumbs/0016573_foldable-laptop-table-single-leg-big-size-black-color_415.jpeg"
                                                                title="Show details for Foldable Laptop Table  Single leg  Big Size ( Black Color)">
                                                        </a>
                                                    </div>
                                                    <div class="details">
                                                        <h2 class="product-title">
                                                            <a
                                                                href="/foldable-laptop-table-single-leg-big-size-black-color">Foldable
                                                                Laptop Table Single leg Big Size ( Black Color)</a>
                                                        </h2>

                                                        <div class="description">
                                                            ড্রয়ার সহ আকর্ষণীয় ল্যাপটপ/বাচ্চাদের পড়ার টেবিল।একের ভিতর
                                                            দুই। আকর্ষণীয় টেবিল টি Laptop টেবিল ও বাচ্চাদের পড়ার টেবিল
                                                            হিসেবেও ব্যবহার হবে।
                                                        </div>
                                                        <div class="add-info">
                                                            <div class="prices">
                                                                <div class="register-prices">
                                                                    <span class="price actual-price">৳ 450</span>
                                                                    <span class="price old-price">৳ 900</span>
                                                                </div>





                                                                <div class="rating-wrapper">
                                                                    <div class="product-rating-box" title="0 review(s)">
                                                                        <div class="rating">
                                                                            <div style="width: 0%">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                            </div>



                                                            <div class="buttons clearfix">


                                                                <div class="single_button add-to-cart-btn">
                                                                    <div class="btn btn-default">
                                                                        <div class="button_icon">
                                                                            <i class="fa fa-shopping-cart"></i>
                                                                        </div>
                                                                        <input type="button" value="Add to cart"
                                                                            class="button-2 product-box-add-to-cart-button"
                                                                            onclick="AjaxCart.addproducttocart_catalog('/addproducttocart/catalog/2349/1/1');return false;">

                                                                    </div>
                                                                </div>

                                                                <div class="single_button">
                                                                    <div class="button_icon">
                                                                        <i class="fa fa-heart"></i>
                                                                    </div>
                                                                    <input type="button" value="Add to wishlist"
                                                                        title="Add to wishlist"
                                                                        class="button-2 add-to-wishlist-button"
                                                                        onclick="AjaxCart.addproducttocart_catalog('/addproducttocart/catalog/2349/2/1');return false;">
                                                                </div>
                                                                <div class="single_button">
                                                                    <div class="button_icon">
                                                                        <i class="fa fa-retweet"></i>
                                                                    </div>
                                                                    <input type="button" value="Add to compare list"
                                                                        title="Add to compare list"
                                                                        class="button-2 add-to-compare-list-button"
                                                                        onclick="AjaxCart.addproducttocomparelist('/compareproducts/add/2349');return false;">
                                                                </div>

                                                            </div>


                                                        </div>
                                                    </div>


                                                </div>
                                            </div> --}}

                                            @foreach ($products as $product)
                                                <x-product-card :product="$product"></x-product-card>
                                            @endforeach
                                        </div>

                                        {{-- <div class="pager">
                                        <ul>
                                            <li class="current-page"><span>1</span></li>
                                            <li class="individual-page"><a
                                                    href="https://www.deshify.com/table?pagenumber=2">2</a></li>
                                            <li class="next-page"><a
                                                    href="https://www.deshify.com/table?pagenumber=2">Next</a></li>
                                        </ul>
                                    </div> --}}

                                        {{ $products->links() }}


                                    </div>
                                </div>

                            </div>
                        </div>





                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
