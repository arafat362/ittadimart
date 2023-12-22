@extends('layouts.frontend')
@section('page-class', 'html-product-details-page')
@section('title', $product->name . ' - Boromokam')
@section('content')
<div class="breadcrumb_area">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">

                <div class="breadcrumb text-center">
                    <ul>

                        <li>
                            <span itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
                                <a href="{{ url('/') }}" itemprop="url">
                                    <span itemprop="title">{{ __('home') }}</span>
                                </a>
                            </span>
                            <span class="delimiter">/</span>
                        </li>
                        <li>
                            <span itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
                                <a href="{{ route('category', $product->category->slug) }}" itemprop="url">
                                    <span itemprop="title">{{ $product->category->name }}</span>
                                </a>
                            </span>
                            <span class="delimiter">/</span>
                        </li>
                        <li>
                            <strong class="current-item">{{ $product->name }}</strong>
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


                <!--product breadcrumb-->

                <div class="page product-details-page">
                    <div class="page-body">

                        <form method="post" id="product-details-form" action="{{ $product->slug }}">
                            <div itemscope itemtype="http://schema.org/Product" data-productid="{{ $product->id }}">
                                <div class="product-essential section-white">

                                    <div class="row row-flex">
                                        <div class="col-sm-5">

                                            <!--product pictures-->

                                            <div>

                                                <div class="picture-gallery">
                                                    <div class="picture" data-popup="#dialogForImgPopUp">
                                                        <link rel="image_src" href="{{ asset($product->images[0]) }}" />
                                                        <a href="{{ asset($product->images[0]) }}" title="" class="cloud-zoom" rel="position: 'right',smoothMove: 3,showTitle: true,titleOpacity: 0,adjustX: 10,adjustY: 30,lensOpacity: 0,tintOpacity: 0,softFocus: false" id="main-product-img-lightbox-anchor-{{ $product->id }}">
                                                            <img alt="Picture of {{ $product->name }}" src="{{ asset($product->images[0]) }}" title="Picture of {{ $product->name }}" style="border-width: 0px;" class="cloud-zoom-image cloud-zoom-image-size" id="main-product-img-lightbox-anchor-{{ $product->id }}" />
                                                        </a>
                                                        <div class="imgForMobile" id="dialogForImgPopUp"
                                                            style="display:none;">
                                                            <img alt="" src="" />
                                                        </div>
                                                    </div>
                                                    <div class="picture-thumbs">
                                                        <div style="margin-top: 10px;text-align: left;">
                                                            @foreach($product->images as $image)
                                                            <div style="display: inline-block;border: 1px solid #BBBB8E;" class="thumb active">
                                                                <a href="{{ asset($image) }}" rel="lightbox-p" class="src-zoom-anchor" onclick="return false;" data-halfimgurl="{{ asset($image) }}">
                                                                    <img src="{{ asset($image) }}" alt="Picture of {{ $product->name }}" class="src-zoom-image" style="height:100px; width:100px" />
                                                                </a>
                                                            </div>
                                                            @endforeach
                                                        </div>
                                                    </div>

                                                    <script type="text/javascript">
                                                        var zoomEffect = function () {
                                                            $("a.cloud-zoom").imagesLoaded({
                                                                done: function ($images) {
                                                                    var width = $(".cloud-zoom-image-size").width() * 1.1;
                                                                    var height = $(".cloud-zoom-image-size").height() * 1.2;
                                                                    $('.cloud-zoom').CloudZoom({ zoomWidth: width, zoomHeight: height });
                                                                }
                                                            });

                                                            //when click on sub item
                                                            $('.src-zoom-anchor').on({
                                                                'click': function () {
                                                                    $('.cloud-zoom').each(function () {
                                                                        $(this).data('zoom').destroy();
                                                                    });

                                                                    var aSrc = $(this).attr('href');
                                                                    var imgSrc = $(this).attr('data-halfimgurl');
                                                                    $('.cloud-zoom-image').attr('src', imgSrc);
                                                                    $('.cloud-zoom').attr('href', aSrc);

                                                                    $("a.cloud-zoom").imagesLoaded({
                                                                        done: function ($images) {
                                                                            var width = $(".cloud-zoom-image-size").width() * 1.1;
                                                                            var height = $(".cloud-zoom-image-size").height() * 1.2;
                                                                            $('.cloud-zoom').CloudZoom({ zoomWidth: width, zoomHeight: height });
                                                                        },
                                                                    });
                                                                }
                                                            });

                                                            $('.src-zoom-anchor').on({
                                                                'hover': function () {
                                                                    $('.cloud-zoom').each(function () {
                                                                        $(this).data('zoom').destroy();
                                                                    });

                                                                    var aSrc = $(this).attr('href');
                                                                    var imgSrc = $(this).attr('data-halfimgurl');
                                                                    $('.cloud-zoom-image').attr('src', imgSrc);
                                                                    $('.cloud-zoom').attr('href', aSrc);

                                                                    $("a.cloud-zoom").imagesLoaded({
                                                                        done: function ($images) {
                                                                            var width = $(".cloud-zoom-image-size").width() * 1.1;
                                                                            var height = $(".cloud-zoom-image-size").height() * 1.2;
                                                                            $('.cloud-zoom').CloudZoom({ zoomWidth: width, zoomHeight: height });
                                                                        },
                                                                    });
                                                                }
                                                            });
                                                        };

                                                        var fullScreenPopUp = function () {
                                                            $('.imgForMobile').find('img').attr('src', $('.picture').find('.cloud-zoom').attr('href'));
                                                            $(".picture-gallery .picture").fullScreenPopup({});
                                                            $('.src-zoom-anchor').on({
                                                                'click': function () {
                                                                    var aSrc = $(this).attr('href');
                                                                    var imgSrc = $(this).attr('data-halfimgurl');
                                                                    $('.cloud-zoom-image').attr('src', imgSrc);
                                                                    $('.cloud-zoom').attr('href', aSrc);

                                                                    $("a.cloud-zoom").imagesLoaded({
                                                                        done: function ($images) {
                                                                            var width = $(".cloud-zoom-image-size").width() * 1.1;
                                                                            var height = $(".cloud-zoom-image-size").height() * 1.2;
                                                                            $('.cloud-zoom').CloudZoom({ zoomWidth: width, zoomHeight: height });
                                                                        },
                                                                    });
                                                                }
                                                            });
                                                        };


                                                        $(document).ready(function () {
                                                            if ($(window).width() <= 768) {
                                                                fullScreenPopUp();
                                                            }
                                                            else {
                                                                zoomEffect();
                                                            }
                                                        });

                                                        $(window).resize(function () {
                                                            if ($(window).width() <= 768) {
                                                                fullScreenPopUp();
                                                            }
                                                            else {
                                                                zoomEffect();
                                                            }
                                                        });
                                                    </script>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-sm-7">
                                            <div class="row-flex row-overview">
                                                <div class="overview">

                                                    @if($product->stock_status === 0)
                                                        <div class="discontinued-product">
                                                            <h4>দুঃখিত - প্রোডাক্টটি আমাদের স্টকে নেই!</h4>
                                                        </div>
                                                    @endif

                                                    <div class="product-name">
                                                        <h1 itemprop="name">{{ $product->name }}</h1>
                                                    </div>
                                                    <!--price -->



                                                    <div class="prices" itemprop="offers" itemscope
                                                        itemtype="http://schema.org/Offer">
                                                        <div class="product-price">
                                                            <label>Price:</label>
                                                            <span itemprop="price" content="{{ $product->sale_price }}" class="price-value-{{ $product->id }}">৳ {{ $product->sale_price }}
                                                            </span>
                                                        </div>
                                                        <div class="old-product-price">
                                                            <label>Old price:</label>
                                                            <span>৳ {{ $product->regular_price }}</span>
                                                        </div>
                                                        @if(calculateDiscountPercentage($product->regular_price, $product->sale_price))
                                                        <div class="discount-info" style="margin-top: 7px;">
                                                            <label>You Save:</label>
                                                            <span id="blink">{{ calculateDiscountPercentage($product->regular_price, $product->sale_price) }}% off</span>
                                                        </div>
                                                        @endif
                                                        <meta itemprop="priceCurrency" content="BDT" />
                                                    </div>

                                                    <script type="text/javascript">
                                                        var blink = document.getElementById('blink');
                                                        setInterval(function () {
                                                            blink.style.opacity = (blink.style.opacity == 0 ? 1 : 0);
                                                        }, 500);
                                                    </script>

                                                    <style>
                                                        #blink {
                                                            font-size: 20px;
                                                            font-weight: bold;
                                                            color: #1c87c9;
                                                            transition: 0.4s;
                                                            padding: 10px;
                                                        }
                                                    </style>
                                                    <!-- Customer enter price -->


                                                    <!-- Tier price -->

                                                    <!--product reviews-->
                                                    {{-- <div class="product-reviews-overview">
                                                        <div class="product-review-box">
                                                            <div class="rating">
                                                                <div style="width: 0%">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="product-no-reviews">
                                                            ( <a href="/productreviews/{{ $product->id }}">Be the first to
                                                                review this product</a> )
                                                        </div>
                                                    </div> --}}




                                                    <div class="product_additional_info_top">
                                                        <!--availability-->


                                                        <!--SKU, MAN, GTIN, vendor-->
                                                        <div class="additional-details">
                                                        </div>

                                                        <!-- social share button -->
                                                        <div class="product-share-button">
                                                            <span class="label">Share:</span>
                                                            <span class="value">
                                                                <!-- AddToAny BEGIN -->
                                                                <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                                                                    <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                                                                    <a class="a2a_button_facebook"></a>
                                                                    <a class="a2a_button_twitter"></a>
                                                                    <a class="a2a_button_facebook_messenger"></a>
                                                                    <a class="a2a_button_whatsapp"></a>
                                                                    <a class="a2a_button_copy_link"></a>
                                                                    </div>
                                                                <script async src="https://static.addtoany.com/menu/page.js"></script>
                                                                <!-- AddToAny END -->
                                                            </span>
                                                        </div>

                                                

                                                    </div>

                                                    {{-- <div class="short-description">
                                                        <h4 class="attr_ttile">Description</h4>
                                                        আপনার শখের ল্যাপটপটিকে এখন যেকোনো স্থানে বসে যেকোনো
                                                        পজিশন থেকে খুব সহজে ব্যবহার করতে পারবেন । এর জন্য আর
                                                        আলাদা করে কষ্ট করতে হবে না।
                                                    </div> --}}

                                                    <!-- cart & wishlist, compare , email button -->
                                                    <div class="add_to_cart_overview_button">


                                                        @if($product->stock_status)
                                                        <div class="add_to_cart_overview_button_content clearfix">
                                                            <!--price & add to cart-->
                                                            <div class="download-sample-wrapper">


                                                                <div class="quantity-panel">
                                                                    <label class="qty-label"
                                                                        for="addtocart_{{ $product->id }}_EnteredQuantity">Quantity:</label>
                                                                    <div class="quantity-box">
                                                                        <input class="qty-input" type="number" min="1" step="1" id="addtocart_{{ $product->id }}_EnteredQuantity" name="addtocart_{{ $product->id }}.EnteredQuantity" value="1" />
                                                                    </div>
                                                                </div>


                                                                <div class="add-to-cart">
                                                                    <div class="add-to-cart-panel">
                                                                        <button type="button" id="buy_this_product_{{ $product->id }}" class="quick-buy-button buy-now-action" data-product-id="{{ $product->id }}">Order Now</button>
                                                                    </div>
                                                                </div>

                                                                <div class="deliver-charges">
                                                                    <table class="table table-bordered">
                                                                        <tbody>
                                                                        <tr>
                                                                            <th colspan="3" scope="row"> ঢাকার ভিতরে ডেলিভারি চার্জ </th>
                                                                            <td>৭০ টাকা </td>
                                                                        </tr>
                                                                        
                                                                        <tr>
                                                                            <th colspan="3" scope="row"> ঢাকার বাহিরে ডেলিভারি চার্জ </th>
                                                                            <td>১৩০ টাকা</td>
                                                                        </tr>
                                                                            
                                                                        </tbody>
                                                                    </table>
                                                               
                                                                </div>

                                                                <script>
                                                                    $('<div class="quantity-button quantity-up">+</div><div class="quantity-button quantity-down">-</div>').insertAfter('.quantity-box input');

                                                                    $('.quantity-box').each(function () {
                                                                        var spinner = $(this),
                                                                            input = spinner.find('input[type="number"]'),
                                                                            btnUp = spinner.find('.quantity-up'),
                                                                            btnDown = spinner.find('.quantity-down'),
                                                                            min = input.attr('min'),
                                                                            max = input.attr('max');

                                                                        btnUp.click(function () {
                                                                            var oldValue = parseFloat(input.val());
                                                                            if (oldValue >= max) {
                                                                                var newVal = oldValue;
                                                                            } else {
                                                                                var newVal = oldValue + 1;
                                                                            }
                                                                            spinner.find("input").val(newVal);
                                                                            spinner.find("input").trigger("change");
                                                                        });

                                                                        btnDown.click(function () {
                                                                            var oldValue = parseFloat(input.val());
                                                                            if (oldValue <= min) {
                                                                                var newVal = oldValue;
                                                                            } else {
                                                                                var newVal = oldValue - 1;
                                                                            }
                                                                            spinner.find("input").val(newVal);
                                                                            spinner.find("input").trigger("change");
                                                                        });

                                                                    });

                                                                </script>

                                                                <style>
                                                                    .quick-buy-button {
                                                                        width: 245px;
                                                                        height: 40px;
                                                                        border: 1px solid #ecbe39;
                                                                        background-image: linear-gradient(to bottom, #ecb107, #c5650f);
                                                                        padding: 0 15px;
                                                                        font-size: 13px;
                                                                        color: #fff;
                                                                        text-transform: uppercase;
                                                                        -webkit-transition: all 0.3s ease;
                                                                        -o-transition: all 0.3s ease;
                                                                        transition: all 0.3s ease;
                                                                        line-height: 40px;
                                                                        margin-bottom: 10px;
                                                                        float: left;
                                                                        min-width: 115px;
                                                                        text-align: center;
                                                                    }

                                                                    .quick-buy-button:hover {
                                                                        background-image: linear-gradient(to bottom, #0782ec, #c5650f);
                                                                    }
                                                                </style>
                                                                <div class="divDownload">
                                                                </div>
                                                            </div>

                                                            <!--wishlist, compare, email a friend-->
                                                            {{-- <div class="overview-buttons">

                                                                <div class="add-to-wishlist">
                                                                    <input type="button"
                                                                        id="add-to-wishlist-button-{{ $product->id }}"
                                                                        class="button-2 add-to-wishlist-button"
                                                                        value="Add to wishlist"
                                                                        data-productid="{{ $product->id }}"
                                                                        onclick="AjaxCart.addproducttocart_details('/addproducttocart/details/{{ $product->id }}/2', '#product-details-form');return false;" />
                                                                </div>
                                                                <div class="compare-products">
                                                                    <input type="button"
                                                                        value="Add to compare list"
                                                                        class="button-2 add-to-compare-list-button"
                                                                        onclick="AjaxCart.addproducttocomparelist('/compareproducts/add/{{ $product->id }}');return false;" />
                                                                </div>

                                                                <div class="email-a-friend">
                                                                    <input type="button"
                                                                        value="Email a friend"
                                                                        class="button-2 email-a-friend-button"
                                                                        onclick="setLocation('/productemailafriend/{{ $product->id }}')" />
                                                                </div>

                                                            </div> --}}

                                                        </div>
                                                        @endif


                                                    </div>

                                                    <div class="product_additional_info_bottom">

                                                        <!--manufacturers-->


                                                        <!--delivery-->


                                                    </div>




                                                </div> <!-- .overview -->



                                            </div>
                                        </div>
                                    </div>



                                </div>

                                <div class="product-collateral section-white">

                                    <div class="product_page_tab">

                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs" role="tablist">

                                            <li role="presentation" class="active">
                                                <a href="#description" aria-controls="description" role="tab" data-toggle="tab">Description</a>
                                            </li>


                                            <li role="presentation">
                                                <a href="#productdeliveryandreturnpolicy" aria-controls="productdeliveryandreturnpolicy" role="tab" data-toggle="tab">Delivery & Return Policy</a>
                                            </li>
                                            {{-- <li role="presentation">
                                                <a href="#productreview" aria-controls="productreview" role="tab" data-toggle="tab">Review</a>
                                            </li> --}}
                                        </ul>

                                        <!-- Tab panes -->
                                        <div class="tab-content">

                                            <div role="tabpanel" class="tab-pane active" id="description">
                                                <div class="full-description" itemprop="description" id="descriptionTextBox">
                                                    {!! $product->description !!}
                                                </div>
                                                <a style="border:1px solid;color:chocolate;font:bold; padding: 0 10px;"
                                                    onclick="copyToClipboard('#descriptionTextBox','Description Copied To Clipboard')">Copy
                                                    Description To Clipboard</a>
                                                <div class="alert alert-success" id="success-alert" style="margin-top: 15px;">
                                                    <strong>Success! </strong> Description Copied To Clipboard.
                                                </div>
                                            </div>

                                            {{-- <div role="tabpanel" class="tab-pane"
                                                id="productspecifications">
                                                <div id="productspecificationsTextBox">

                                                </div>
                                                <a style="border:1px solid;color:chocolate;font:bold"
                                                    onclick="copyToClipboard('#productspecificationsTextBox','Specifications Copied To Clipboard')">Copy
                                                    Specifications To Clipboard</a>
                                                <div class="alert alert-success"
                                                    id="success-alertSpecifications">
                                                    <strong>Success! </strong> Specifications Copied To Clipboard.
                                                </div>
                                            </div>
                                            <div role="tabpanel" class="tab-pane" id="producttags">

                                            </div> --}}
                                            <div role="tabpanel" class="tab-pane" id="productdeliveryandreturnpolicy">
                                                <div class="topic-block">
                                                    <div class="topic-block-body">
                                                        <ul>
                                                            <li>Delivery charges: In Dhaka city – 60 taka
                                                                and out of Dhaka- 120 taka.</li>
                                                            <li>We make delivery on business day.</li>
                                                            <li>We deliver product within 1-2 business days
                                                                in Dhaka city and 3- 5 business days out of
                                                                Dhaka city.</li>
                                                            <li>We offer home delivery only in Dhaka city.
                                                            </li>
                                                            <li>In case of product delivery out of Dhaka,
                                                                customer has to collect products from nearby
                                                                courier service office.</li>
                                                            <li>Customer also can collect product from our
                                                                office.</li>
                                                            <li>Delivery may interrupt due to natural
                                                                disaster or any political crisis.</li>
                                                            <li>Product delivery is entirely subjected to
                                                                availability of stock.</li>
                                                            <li>We offer cash on delivery process to our
                                                                customer.</li>
                                                            <li>You can pay online from your card or pay
                                                                through bkash, rocket and others mobile
                                                                bank.</li>
                                                            <li>Color of the products may slightly vary due
                                                                to photography, lighting sources or your
                                                                monitor resolution.</li>
                                                            <li>If the product is physically damaged or
                                                                damaged by the customer it can’t be returned
                                                                or refunded.</li>
                                                            <li>To return or refund contact us within 24
                                                                hours with our complaint section.</li>
                                                        </ul>
                                                    </div>
                                                </div>

                                            </div>
                                            {{-- <div role="tabpanel" class="tab-pane" id="productreview">
                                                <div class="product-reviews-overview">
                                                    <div class="product-review-box">
                                                        <div class="rating">
                                                            <div style="width: 0%">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="product-no-reviews">
                                                        ( <a href="/productreviews/{{ $product->id }}">Be the first to
                                                            review this product</a> )
                                                    </div>
                                                </div>

                                            </div> --}}
                                        </div>
                                    </div>
                                </div>

                                <div class="section-white">

                                    <div id="related_products_grid" class="home_page_product_area">
                                        <div class="page_title_area">
                                            <h2 class="page_title">
                                                <span>Related products</span>
                                            </h2>
                                        </div>
                                        <div class="item-grid">
                                            @foreach ($related_products as $related)
                                                <x-product-card :product="$related"></x-product-card>
                                            @endforeach
                                        </div>
                                    </div>

                                </div>
                            </div>
                            
                        </form>

                    </div>
                </div>




                <script>
                    $("#success-alert").hide();
                    $("#success-alertSpecifications").hide();
                    

                    $(function () {
                        $("ul.nav-tabs li:first").addClass("active");
                        $(".tab-content .tab-pane:first").addClass("active");
                    });


                    function copyToClipboard(element, alertTxt) {
                        var $temp = $("<input>");
                        $("body").append($temp);
                        $temp.val($(element).text()).select();
                        document.execCommand("copy");
                        $temp.remove();
                        showAlert();
                    }

                    function showAlert() {
                        $("#success-alert").fadeTo(1500, 500).slideUp(500, function () {
                            $("#success-alert").slideUp(500);
                        });
                        $("#success-alertSpecifications").fadeTo(1500, 500).slideUp(500, function () {
                            $("#success-alertSpecifications").slideUp(500);
                        });
                    }
                </script>

            </div>
        </div>
    </div>


</div>
@endsection

@section('styles')
<link href="{{ asset('assets/css/cloud-zoom.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('scripts')
<script src="{{ asset('assets/js/cloud-zoom.1.0.2.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/jquery.imagesloaded.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/jquery.fullscreen-popup.min.js') }}" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function(){
        setTimeout(function() {
            $("#buy_this_product_{{ $product->id }}").trigger('click');
        }, 100); // 5000 milliseconds = 5 seconds
    });
</script>
@endsection