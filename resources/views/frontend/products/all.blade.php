@extends("frontend.layout_trang_trong")
@section("append-du-lieu")
<!-- breadcrumb shop -->
<div class="breadcrumb-shop clearfix">
    <div class="container-fluid">
        <div>
            <ol class="breadcrumb breadcrumb-arrows">
                <li><a href="{{ url('') }}"><span>Trang chủ</span></a></li>
                <li><span><a href="{{ url('products/category/all') }}">Sản phẩm</a></span></li>
                <li><span>Tất cả</span></li>
            </ol>
        </div>
    </div>
</div>
<!-- collection -->
<div class="collection-page">
    <div class="banner-collection text-center">
        <img src="{{ asset('frontend/img/banner.png') }}">
    </div>
    <div class="main-content container-fluid">
        <div class="row">
            <div class="wrap-collection-body clearfix">
                <div class="col-md-12">
                    <div class="wrap-collection-title row">
                        <div class="heading-collection row">
                            <div class="col-md-3">
                                <div class="filterTag">
                                    <i class="fa fa-sliders"></i>
                                    <span>Bộ lọc</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h1>Tất cả sản phẩm</h1>
                            </div>
                            <div class="col-md-3">
                                <div class="sortFilter">
                                    <div class="collection-sort">
                                        <div class="sortby-option browse-tag option">
                                            <label class="label-tt" for="sort-by">
                                                <i class="fa fa-sort-alpha-asc"></i>
                                            </label>
                                            <span>
                                                <select class="custom-dropdown" aria-label="sort-by" onchange="location.href = '{{ url('products/category/all?order=') }}'+this.value;">
                                                <option value="0">Sắp xếp</option>
                                                <option @if($order=="price_asc") selected @endif value="price_asc">Giá tăng dần</option>
                                                <option @if($order=="price_desc") selected @endif value="price_desc">Giá giảm dần</option>
                                                <option @if($order=="name_asc") selected @endif value="name_asc">Sắp xếp A-Z</option>
                                                <option @if($order=="name_desc") selected @endif value="name_desc">Sắp xếp Z-A</option>
                                                </select>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row filter-here">
                        <div class="content-product-list product-list clearfix">
                            @foreach($rows as $row)
                            <div class="col-md-3 pro-loop col-20">
                                <div class="product-block product-resize fixheight" style="height: 315px;">
                                    <div class="product-img">
                                        <a href="{{ url('products/detail/'.$row->id) }}" class="image-resize fade-box lazyloaded" style="height: 262px;">
                                            <picture>
                                                <img class="img-loop mediabox-img lazyautosizes ls-is-cached lazyloaded" src="{{ asset('upload/products/'.$row->photo) }}">
                                            </picture>
                                        </a>
                                        <div class="productQuickView">
                                       
                                        </div>
                                    </div>
                                    <div class="product-detail clearfix">
                                        <div class="box-pro-detail">
                                            <h3 class="pro-name">
                                                <a href="{{ url('products/detail/'.$row->id) }}">{{ $row->name }}</a>
                                            </h3>
                                            <div class="box-pro-prices">
                                                <p class="pro-price highlight">
                                                    <span>{{ number_format($row->price - ($row->price * $row->discount)/100)  }}₫</span>
                                                    <span class="pro-price-del">
                                                        <del class="compare-price">{{ number_format($row->price) }}₫</del>
                                                    </span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="clearfix text-center">
                            <div id="pagination" class="clearfix">
                                <div class="col-md-12"> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
