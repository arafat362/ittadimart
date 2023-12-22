<div class="table-wrapper">
    <table class="cart">
        <thead>
            <tr>
                <th class="product-picture">
                    Image
                </th>
                <th class="product" colspan="3">
                    Product(s)
                </th>
                <th class="unit-price">
                    Price
                </th>
                <th class="quantity">
                    Qty.
                </th>
                <th class="subtotal">
                    Total
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="product-picture">
                    <a href="" target="_blank">
                        <img alt="Picture of {{ $product->name }}" src="{{ asset($product->thumbnail) }}" width="45px;">
                    </a>
                </td>
                <td class="product" colspan="3">
                    <a href="" target="_blank" class="product-name">{{ $product->name }}</a>
                    <div class="product-unit-price sm-device">
                        ৳ {{ $product->sale_price }} / Price Per Unit
                    </div>
                </td>
                <td class="unit-price">
                    <label class="td-title">Price:</label>
                    <span class="product-unit-price">৳ {{ $product->sale_price }}</span>
                </td>
                <td class="quantity">
                    <label class="td-title">Qty.:</label>
                    <div class="qty-wrapper">
                        <a onclick="quantityDecrement()">
                            <i class="fa fa-minus"></i>
                        </a>
                        <input id="quantity" name="quantity" type="number" value="{{ $quantity }}" class="qty-input">
                        <a onclick="quantityIncrement()">
                            <i class="fa fa-plus"></i>
                        </a>
                    </div>

                </td>
                <td class="subtotal">
                    <label class="td-title">Total:</label>
                    <span class="product-subtotal">৳ <span id="sub_price">{{ $product->sale_price * $quantity }}</span></span>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<div class="arfu-quantity-box">
    <label>Quantity</label>
    <button class="decrease-btn" onclick="quantityDecrement()"><i class="fa fa-minus"></i></button>
    <input id="quantity_arfu" type="number" value="{{ $quantity }}">
    <button class="icrease-btn" onclick="quantityIncrement()"><i class="fa fa-plus"></i></button>
</div>

<input type="hidden" id="product_id" value="{{ $product->id }}">
<input type="hidden" id="itemprice" value="{{ $product->sale_price }}">

<script>
    function quantityIncrement() {
        document.getElementById("quantity").stepUp(1);
        document.getElementById("quantity_arfu").stepUp(1);
        updateSubTotal();
    }
    function quantityDecrement() {

        if (document.getElementById("quantity").value == 1) {
            return;
        }

        document.getElementById("quantity").stepDown(1);
        document.getElementById("quantity_arfu").stepDown(1);
        updateSubTotal();
    }
    function updateSubTotal() {
        var quantity = document.getElementById("quantity").value;
        var price = document.getElementById("itemprice").value;
        var subtotal = quantity * price;
        document.getElementById("sub_price").innerHTML = subtotal;
    }
</script>

<style>
    .arfu-quantity-box{
        margin-top: 20px;
        display: none;
    }

    .arfu-quantity-box label{
        margin-right: 8px;
    }

    .arfu-quantity-box button {
        height: 30px;
        width: 30px;
        color: #fff;
        border: none;
    }

    .arfu-quantity-box .icrease-btn{
        background: #008e0c;
    }

    .arfu-quantity-box .decrease-btn{
        background: #c20000;
    }

    .arfu-quantity-box input{
        width: 50px;
        height: 30px;
        text-align: center;
    }

    @media (max-width: 1000px){
        .arfu-quantity-box{
            display: block!important;
        }
        .quantity{
            display: none!important;
        }
    }
</style>