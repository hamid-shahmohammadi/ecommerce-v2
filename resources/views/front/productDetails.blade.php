@extends('front.master')

@section('content')
    <section id="app" aria-label="Main content" role="main" class="product-detail">
        <div itemscope="" itemtype="http://schema.org/Product">

            <div class="shadow">
                <div class="_cont detail-top">
                    <div class="cols">
                        <div class="left-col">
                            <div class="thumbs">

                            </div>
                            <div class="big">
                                <img :src="getImagePro(product.image)" />

                                <div id="banner-gallery" class="swipe">
                                    <div class="swipe-wrap">

                                    </div>
                                </div>
                                <div class="detail-socials">
                                    <div class="social-sharing" data-permalink="">
                                        <a target="_blank" class="share-facebook" title="Share"></a>
                                        <a target="_blank" class="share-twitter" title="Tweet"></a>
                                        <a target="_blank" class="share-pinterest" title="Pin it"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="right-col">
                            <h1 itemprop="name">@{{product.pro_name}}</h1>
                            <div itemprop="offers" itemscope="" itemtype="http://schema.org/Offer">
                                <meta itemprop="priceCurrency" content="USD">
                                <link itemprop="availability" href="https://schema.org/InStock">
                                <div class="price-shipping">
                                    <div class="price" id="price-preview" quickbeam="price" quickbeam-price="800">
                                        $@{{product.pro_price}}
                                    </div>
                                    <a>Free shipping</a>
                                </div>
                                <div class="swatches">
                                    <div class="swatch clearfix" data-option-index="0">
                                        <div class="header">Size</div>
                                        <div data-value="M" class="swatch-element plain m available">
                                            <input id="swatch-0-m" type="radio" name="option-0" value="M" checked="">
                                            <label for="swatch-0-m">
                                                M

                                            </label>
                                        </div>
                                        <div data-value="L" class="swatch-element plain l available">
                                            <input id="swatch-0-l" type="radio" name="option-0" value="L">
                                            <label for="swatch-0-l">
                                                L

                                            </label>
                                        </div>
                                        <div data-value="XL" class="swatch-element plain xl available">
                                            <input id="swatch-0-xl" type="radio" name="option-0" value="XL">
                                            <label for="swatch-0-xl">
                                                XL

                                            </label>
                                        </div>
                                        <div data-value="XXL" class="swatch-element plain xxl available">
                                            <input id="swatch-0-xxl" type="radio" name="option-0" value="XXL">
                                            <label for="swatch-0-xxl">
                                                XXL

                                            </label>
                                        </div>
                                    </div>
                                    <div class="swatch clearfix" data-option-index="1">
                                        <div class="header">Color</div>

                                        {{--<div data-value="Blue" class="swatch-element color blue available">--}}
                                            {{--<div class="tooltip">Blue</div>--}}
                                            {{--<input quickbeam="color" id="swatch-1-blue" type="radio" name="option-1" value="Blue" checked  />--}}
                                            {{--<label for="swatch-1-blue" style="border-color: blue;">--}}
                                                {{--<img class="crossed-out" src="//cdn.shopify.com/s/files/1/1047/6452/t/1/assets/soldout.png?10994296540668815886" />--}}
                                                {{--<span style="background-color: blue;"></span>--}}
                                            {{--</label>--}}
                                        {{--</div>--}}
                                        {{--<div data-value="Red" class="swatch-element color red available">--}}
                                            {{--<div class="tooltip">Red</div>--}}
                                            {{--<input quickbeam="color" id="swatch-1-red" type="radio" name="option-1" value="Red"  />--}}
                                            {{--<label for="swatch-1-red" style="border-color: red;">--}}
                                                {{--<img class="crossed-out" src="//cdn.shopify.com/s/files/1/1047/6452/t/1/assets/soldout.png?10994296540668815886" />--}}
                                                {{--<span style="background-color: red;"></span>--}}
                                            {{--</label>--}}
                                        {{--</div>--}}
                                        {{--<div data-value="Yellow" class="swatch-element color yellow available">--}}
                                            {{--<div class="tooltip">Yellow</div>--}}
                                            {{--<input quickbeam="color" id="swatch-1-yellow" type="radio" name="option-1" value="Yellow"  />--}}
                                            {{--<label for="swatch-1-yellow" style="border-color: yellow;">--}}
                                                {{--<img class="crossed-out" src="//cdn.shopify.com/s/files/1/1047/6452/t/1/assets/soldout.png?10994296540668815886" />--}}
                                                {{--<span style="background-color: yellow;"></span>--}}
                                            {{--</label>--}}
                                        {{--</div>--}}

                                        <div v-if="pa_colors" v-for="pac in pa_colors" data-value="Blue" :class="['swatch-element color available',pac.pa_name]" @click="checkColor(pac.id)">
                                            <div class="tooltip">@{{pac.pa_name}}</div>
                                            <input quickbeam="color" :id="'swatch-1-'+pac.pa_name" type="radio" name="option-1" value="Blue" :checked="pac.id==pac_click">
                                            <label for="swatch-1-blue" style="border-color: blue;">

                                                <span style="background-color: blue;"></span>
                                            </label>
                                        </div>

                                    </div>
                                    <div class="guide">
                                        <a>Size guide</a>
                                    </div>
                                </div>
                                <!-- <form method="post" enctype="multipart/form-data" id="AddToCartForm"> -->
                                <form id="AddToCartForm">
                                    <select name="id" id="productSelect" quickbeam="product" class="product-single__variants">
                                        <option selected="selected" data-sku="" value="7924994501">
                                            M / Blue - $800.00 USD
                                        </option>
                                        <option data-sku="" value="7924995077">
                                            M / Red - $850.00 USD
                                        </option>
                                        <option data-sku="" value="7924994437">
                                            L / Blue - $850.00 USD
                                        </option>
                                        <option data-sku="" value="7924994693">
                                            L / Yellow - $850.00 USD
                                        </option>
                                        <option data-sku="" value="7924995013">
                                            L / Red - $850.00 USD
                                        </option>
                                        <option data-sku="" value="7924994373">
                                            XL / Blue - $900.00 USD
                                        </option>
                                        <option data-sku="" value="7924994629">
                                            XL / Yellow - $850.00 USD
                                        </option>
                                        <option data-sku="" value="7924830021">
                                            XXL / Blue - $950.00 USD
                                        </option>
                                        <option data-sku="" value="7924994885">
                                            XXL / Red - $850.00 USD
                                        </option>
                                    </select>
                                    <div class="btn-and-quantity-wrap">
                                        <div class="btn-and-quantity">
                                            <div class="spinner">
                                                <span class="btn minus" @click="minsQty"></span>
                                                {{--<input type="text" id="updates_2721888517" name="quantity" value="1" class="quantity-selector">--}}
                                                {{--<input type="hidden" id="product_id" name="product_id" value="2721888517">--}}
                                                <span class="q">@{{ qty }} Qty.</span>
                                                <span class="btn plus" @click="plusQty"></span>
                                            </div>
                                            <div id="AddToCart" quickbeam="add-to-cart" @click="addCart">
                                                <span id="AddToCartText">Add to Cart</span>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                                <ul class="nav nav-tabs mt-3" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#info" role="tab" aria-controls="home" aria-selected="true">Info</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#brand" role="tab" aria-controls="profile" aria-selected="false">Brand</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="home-tab">@{{product.pro_info}}</div>
                                    <div class="tab-pane fade" id="brand" role="tabpanel" aria-labelledby="profile-tab">BMW</div>
                                </div>

                                <div class="social-sharing-btn-wrapper">
                                    <span id="social_sharing_btn">Share</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>

@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('/assets/front/css/productDetails.css')}}">
@endsection
@section('js')
    <script>
        const base_url='{{url('/')}}';
        var product=@json($product);
        var pa_colors=@json($pa_colors);
    </script>
    <script src="{{asset('/assets/js/axios.min.js')}}"></script>
    <script src="{{asset('/assets/js/vue.min.js')}}"></script>
    <!-- development version, includes helpful console warnings -->
    {{--<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>--}}
    <!-- production version, optimized for size and speed -->
    {{--<script src="https://cdn.jsdelivr.net/npm/vue"></script>--}}
    <script src="{{asset('assets/front/js/app/productDetails.js')}}"></script>
@endsection