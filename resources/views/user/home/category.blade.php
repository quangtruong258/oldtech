@extends('user.layout')

@section('content')
    <section id="advertisement">
        <div class="container">
            <img src="frontend/images/shop/advertisement.jpg" alt="" />
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Danh mục</h2>
                        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                            @foreach ($categories as $category)
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordian" href="#sportswear">
                                                <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                                {{ $category->ten }}
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="sportswear" class="panel-collapse collapse">
                                        @foreach ($typeprodcuts as $type)
                                            <div class="panel-body">
                                                <ul>
                                                    <li><a href="">{{ $type->ten }} </a></li>

                                                </ul>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach


                        </div><!--/category-productsr-->

                        <div class="brands_products"><!--brands_products-->
                            <h2>Brands</h2>
                            <div class="brands-name">
                                <ul class="nav nav-pills nav-stacked">
                                    <li><a href=""> <span class="pull-right">(50)</span>Acne</a></li>
                                    <li><a href=""> <span class="pull-right">(56)</span>Grüne Erde</a></li>
                                    <li><a href=""> <span class="pull-right">(27)</span>Albiro</a></li>
                                    <li><a href=""> <span class="pull-right">(32)</span>Ronhill</a></li>
                                    <li><a href=""> <span class="pull-right">(5)</span>Oddmolly</a></li>
                                    <li><a href=""> <span class="pull-right">(9)</span>Boudestijn</a></li>
                                    <li><a href=""> <span class="pull-right">(4)</span>Rösch creative culture</a>
                                    </li>
                                </ul>
                            </div>
                        </div><!--/brands_products-->

                        <div class="price-range"><!--price-range-->
                            <h2>Price Range</h2>
                            <div class="well">
                                <input type="text" class="span2" value="" data-slider-min="0"
                                    data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]"
                                    id="sl2"><br />
                                <b>$ 0</b> <b class="pull-right">$ 600</b>
                            </div>
                        </div><!--/price-range-->

                        <div class="shipping text-center"><!--shipping-->
                            <img src="images/home/shipping.jpg" alt="" />
                        </div><!--/shipping-->

                    </div>
                </div>

                <div class="col-sm-9 padding-right">
                    <div class=""><!--features_items-->
                        <h2 class="title text-center">{{ $cat->ten }}</h2>
                        <div class="col-sm-4">
                            @foreach ($products as $prod)
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <a href="{{ route('home.product', $prod->id) }}">
                                                <img src="uploads/images/{{ $prod->image }}" alt="" width="80%"
                                                    height="100px" />
                                            </a>
                                            <h2>{{ number_format($prod->price) }} VNĐ</h2>
                                            <p><a href="{{ route('home.product', $prod->id) }}">{{ $prod->ten }}</a>
                                            </p>
                                            <a href="#" class="btn btn-default add-to-cart"><i
                                                    class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                                        </div>
                                        {{-- <div class="product-overlay">
                                            <div class="overlay-content">
                                                <h2>{{ number_format($prod->price) }} VNĐ</h2>
                                                <p>{{ $prod->ten }}</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i
                                                        class="fa fa-shopping-cart"></i>
                                                    <Table></Table>hêm vào giỏ hàng
                                                </a>
                                            </div>
                                        </div> --}}
                                    </div>
                                    {{-- <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                        <li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                    </ul>
                                </div> --}}
                                </div>
                            @endforeach

                        </div>


                        {{-- <ul class="pagination">
                            <li class="active"><a href="">1</a></li>
                            <li><a href="">2</a></li>
                            <li><a href="">3</a></li>
                            <li><a href="">&raquo;</a></li>
                        </ul> --}}
                    </div><!--features_items-->
                </div>
            </div>
        </div>
    </section>
@endsection
