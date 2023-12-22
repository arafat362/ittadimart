@extends('layouts.backend')
@section('title', 'Edit Product')
@section('content')

<div class="form-element mt-20">
    <div class="row">

       <div class="col-lg-12">
            <div class="card card-default card-md mb-4">
                <div class="card-header">
                    <h6>Edit Product</h6>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('product.update', $product->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mx-n15">

                            <div class="col-md-8 mb-20 px-15">
                                <label for="name" class="il-gray fs-14 fw-500 align-center mb-10">Product Name</label>
                                <input type="text" class="form-control ih-medium ip-light radius-xs b-light @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter Product Name" value="{{ old('name', $product->name) }}" required>
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-20 px-15">
                                <label for="category_id" class="il-gray fs-14 fw-500 align-center mb-10">Product Category</label>
                                <select class="custom-select form-control select-arrow-none ih-medium  radius-xs b-light shadow-none color-light  fs-14 @error('category_id') is-invalid @enderror" id="category_id" name="category_id" required>
                                    <option selected disabled value="">Select Category</option>
                                    {!! generateCategoryOptions($categories, null, 0, $product->category_id) !!}
                                </select>
                                @error('category_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mx-n15">
                            <div class="col-md-4 mb-20 px-15">
                                <label for="regular_price" class="il-gray fs-14 fw-500 align-center mb-10">Regular Price</label>
                                <input type="number" name="regular_price" class="form-control ih-medium ip-light radius-xs b-light @error('regular_price') is-invalid @enderror" id="regular_price" placeholder="Enter Regular Price" value="{{ old('regular_price', $product->regular_price) }}" required>
                                @error('regular_price')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-20 px-15">
                                <label for="sale_price" class="il-gray fs-14 fw-500 align-center mb-10">Sale Price</label>
                                <input type="number" class="form-control ih-medium ip-light radius-xs b-light @error('sale_price') is-invalid @enderror" id="sale_price" name="sale_price" placeholder="Enter Sale Price" value="{{ old('sale_price', $product->sale_price) }}" required>
                                @error('sale_price')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-20 px-15">
                                <label for="stock_status" class="il-gray fs-14 fw-500 align-center mb-10">Stock Status</label>
                                <select class="custom-select form-control select-arrow-none ih-medium radius-xs b-light shadow-none color-light fs-14 @error('stock_status') is-invalid @enderror" id="stock_status" name="stock_status" required>
                                    <option selected disabled value="">Select Stock Status</option>
                                    <option value="1" @if(old('stock_status', $product->stock_status) == 1)selected @endif>In Stock</option>
                                    <option value="0" @if(old('stock_status', $product->stock_status) == 0)selected @endif>Out of Stock</option>
                                </select>
                                @error('stock_status')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>
                            {{-- <div class="col-md-3 mb-20 px-15">
                                <label for="available_quantity" class="il-gray fs-14 fw-500 align-center mb-10">Available Quantity</label>
                                <input type="number" class="form-control ih-medium ip-light radius-xs b-light @error('available_quantity') is-invalid @enderror" id="available_quantity" name="available_quantity" placeholder="Enter Available Quantity" value="{{ old('available_quantity') }}" required>
                                @error('available_quantity')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div> --}}
                        </div>

                        <div class="row mx-n15">

                            <div class="col-md-6 mb-20 px-15">
                                <label for="images" class="il-gray fs-14 fw-500 align-center mb-10">Product Images</label>
                                <input type="file" class="form-control ip-light radius-xs b-light @error('images') is-invalid @enderror" id="images" name="images[]" accept="image/*" multiple>
                                <div class="product_image_all_div" id="imagePreview">
                                    @foreach($product->images as $image)
                                        <div class="thumb_img_div">
                                            <img src="{{ asset($image) }}" alt="{{ $product->name }}">
                                        </div>
                                    @endforeach
                                </div>
                                @error('images')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-20 px-15">
                                <label for="thumbnail" class="il-gray fs-14 fw-500 align-center mb-10">Thumbnail</label>
                                <input type="file" class="form-control ip-light radius-xs b-light @error('thumbnail') is-invalid @enderror" id="thumbnail" name="thumbnail">
                                <img src="{{ asset($product->thumbnail) }}" alt="" id="thumbnailPreview" style="max-width: 100px; max-height: 100px; margin-top: 10px;">
                                @error('thumbnail')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                        </div>

                        <div class="form-group mb-20">
                            <label for="description" class="il-gray fs-14 fw-500 align-center mb-10">Product Description</label>
                            <textarea class="summernote" id="description" name="description">{{ old('description', $product->description) }}</textarea>
                        </div>
                        
                        <button class="btn btn-primary px-30" type="submit">Confirm Update Product</button>
                    </form>
                </div>
            </div>
            <!-- ends: .card -->
        </div>

    </div>
</div>
@endsection

@push('page-css')
<link rel="stylesheet" href="{{ asset('backend/vendor_assets/css/select2.min.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.css">
<style>
    .product_image_all_div{
        display: flex;
        flex-wrap: wrap;
        margin-top: 15px;
    }
    .thumb_img_div {
        width: 100px;
        height: 100px;
        margin: 5px;
        position: relative;
        border: 1px solid #ddd;
    }

    .thumb_img_div img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .thumb_img_div .remove_img {
        position: absolute;
        top: 0;
        right: 0;
        background: #fff;
        border-radius: 50%;
        padding: 5px;
        cursor: pointer;
    }

    .remove_btn {
        position: absolute;
        height: 20px;
        width: 20px;
        background: var(--color-primary);;
        margin-left: -15px;
        margin-top: -5px;
        border-radius: 50%;
        border: none;
        color: #FFF;
    }
</style>
@endpush

@push('page-js')
<script src="{{ asset('backend/vendor_assets/js/select2.full.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.js"></script>
<script>
    $(document).ready(function() {
        $('#category_id').select2();
        $('#stock_status').select2({
            minimumResultsForSearch: Infinity
        });
        $('#stock_status').on('change', function() {
            var stock_status = $(this).val();
            if (stock_status == 1) {
                $('#available_quantity').val('').trigger('change');
                $('#available_quantity').prop('disabled', false);
            } else {
                $('#available_quantity').val(0).trigger('change');
                $('#available_quantity').prop('disabled', true);
            }
        });
        $('.summernote').summernote({
            height: 250,
        });
        
        $('#images').change(function() {
            const previewDiv = $('#imagePreview');
            const files = this.files;

            previewDiv.empty();
            
            $.each(files, function(index, file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = $('<img>').attr({
                        src: e.target.result,
                        alt: 'Product Image',
                    });

                    const div = $('<div>').addClass('thumb_img_div').append(img);

                    previewDiv.append(div);
                }

                reader.readAsDataURL(file);
            });
        });

        $('#thumbnail').change(function() {
            const previewDiv = $('#thumbnailPreview');
            const file = this.files[0];

            if (file == undefined) {
                previewDiv.hide();
                return;
            }

            previewDiv.show();
            
            const reader = new FileReader();
            reader.onload = function(e) {
                previewDiv.attr('src', e.target.result);
            }

            reader.readAsDataURL(file);
        });
        
    });
</script>
@endpush