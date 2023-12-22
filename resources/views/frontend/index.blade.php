@extends('layouts.frontend')
@section('page-class', 'html-home-page')
@section('title', 'Boromokam - Online Shopping in Bangladesh')
@section('content')
<div class="master-column-wrapper">
    <div class="page home-page">
        <div class="page-body">


            <div class="home_slider_area">
                <div class="home_slider">


                    <div class="home-page-top-slider">

                        <div>
                            <div class="container">
                                <a href="javascript:void(0)">
                                    <img src="{{ asset('uploads/sliders/380861139_630010939005556_npl.png') }}" data-thumb="{{ asset('uploads/sliders/380861139_630010939005556_npl.png') }}" />
                                </a>
                            </div>
                        </div>

                    </div>

                </div>
            </div>


            <div class="container">
                <div class="row">
                    <div class="col-sm-12">

                        <section class="home_page_product_area">
                            <div class="page_title_area">
                                <h2 class="page_title">
                                    <span>Recently Added</span>
                                </h2>
                                {{-- <a href="" class="shop-more">
                                    View All
                                </a> --}}
                            </div>
                            <div class="home_page_product">
                                <div class="product-grid product__slider">
                                    <div class="item-grid">
                                        @foreach ($latest as $product)
                                            <x-product-card :product="$product"></x-product-card>
                                        @endforeach
                                    </div> 
                                </div>
                            </div>
                        </section>

                        <section class="home_page_product_area">
                            <div class="page_title_area">
                                <h2 class="page_title">
                                    <span>Cosmetics</span>
                                </h2>
                                <a href="{{ route('category', $cosmetics_category->slug) }}" class="shop-more">
                                    View All
                                </a>
                            </div>
                            <div class="home_page_product">
                                <div class="product-grid product__slider">
                                    <div class="item-grid">
                                        @foreach ($cosmetics as $product)
                                            <x-product-card :product="$product"></x-product-card>
                                        @endforeach
                                    </div> 
                                </div>
                            </div>
                        </section>

                        <section class="home_page_product_area">
                            <div class="page_title_area">
                                <h2 class="page_title">
                                    <span>{{ $baby_and_kids_category->name }}</span>
                                </h2>
                                <a href="{{ route('category', $baby_and_kids_category->slug) }}" class="shop-more">
                                    View All
                                </a>
                            </div>
                            <div class="home_page_product">
                                <div class="product-grid product__slider">
                                    <div class="item-grid">
                                        @foreach ($baby_and_kids as $product)
                                            <x-product-card :product="$product"></x-product-card>
                                        @endforeach
                                    </div> 
                                </div>
                            </div>
                        </section>

                        <section class="home_page_product_area">
                            <div class="page_title_area">
                                <h2 class="page_title">
                                    <span>{{ $womens_fashion_category->name }}</span>
                                </h2>
                                <a href="{{ route('category', $womens_fashion_category->slug) }}" class="shop-more">
                                    View All
                                </a>
                            </div>
                            <div class="home_page_product">
                                <div class="product-grid product__slider">
                                    <div class="item-grid">
                                        @foreach ($womens_fashion as $product)
                                            <x-product-card :product="$product"></x-product-card>
                                        @endforeach
                                    </div> 
                                </div>
                            </div>
                        </section>


                    </div>
                </div>
            </div>


        </div>
    </div>




</div>
@endsection