<div class="item-box">
    <div class="product-item">
        <div class="picture">
            @if($product->stock_status === 0)
            <div class="discount-info2" style="position: absolute;z-index: 1;opacity:60%;">
                <img src="{{ asset('assets/images/sold-out.jpg') }}">
            </div>
            @elseif(calculateDiscountPercentage($product->regular_price, $product->sale_price))
                <div class="discount-info">{{ calculateDiscountPercentage($product->regular_price, $product->sale_price) }}% off </div>
            @endif
            <a href="{{ route('product', $product->slug) }}">
                <img src="{{ asset($product->thumbnail) }}" alt="Picture of {{ $product->name }}"/>
            </a>
        </div>
        <div class="details">
            <h2 class="product-title">
                <a href="{{ route('product', $product->slug) }}">{{ $product->name }}</a>
            </h2>
            <div class="add-info">
                <div class="prices">
                    <div class="register-prices">
                        <span class="price actual-price">৳ {{ $product->sale_price }}</span>
                        <span class="price old-price">৳ {{ $product->regular_price }}</span>
                    </div>
                </div>
                <button class="order-now-button buy-now-action" data-product-id="{{ $product->id }}">{{ __('order_now') }}</button>
            </div>
        </div>
    </div>
</div>