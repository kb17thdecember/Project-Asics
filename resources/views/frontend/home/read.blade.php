@extends("frontend.layout_trang_chu")
@section("append-du-lieu")
<!-- main begin -->
<main class="mainContainer-theme">
    <!-- home slider -->
    <div id="home-slider">
        <div id="homepage-slider" class="fade">
            <div>
                <div class="item">
                    <div class="slide-img">
                        <a href="#">
                            <picture>
                                <img src="{{  asset('frontend/img/silde0.png')  }}">
                            </picture>
                        </a>
                    </div>
                </div>
            </div>

            <div>
                <div class="item">
                    <div class="slide-img">
                        <a href="#">
                            <picture>
                                <img src="{{  asset('frontend/img/banner.png')  }}">
                            </picture>
                        </a>
                    </div>
                    <div class="content-slide">
                        <div class="container-fluid">
                            <div class="slide-btn-content">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <div class="item">
                    <div class="slide-img">
                        <a href="#">
                            <picture>
                                <img src="{{  asset('frontend/img/silde3.png')  }}">
                            </picture>
                        </a>
                    </div>
                
                </div>
            </div>
        </div>
    </div>


<!-- banner home -->
    <section id="section-collection-info" class="section section-collection-info mt-5">
        <div class="container-fluid">
            <div class="rowFlexMargin">
                <div class="col-md-6">
                    <div class="collectionItem ">
                        <div class="collectionImage fade-box effectFour">
                            <a href="#" class="lazyloaded">
                                <img class="img-responsive no-border mediabox-img lazyautosizes ls-is-cached lazyloaded" src="{{  asset('frontend/img/50%.jpg')  }}">
                            </a>
                            <div class="collectionGroup">
                                <div class="box-button">
                                    <a href="#" class="button-bn">Về chúng tôi</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6 position-relative">
                </br>
                </br>
                </br>
            </br></br></br></br> </br> </br>

                   <h1>Giày thể thao ASICS SPORTSTYLE EX89™ sẽ có kiểu đặc trưng từ cảm hứng từ nguyên bản với bốn lần lặp lại khối màu nhóm và các phiên bản trung tính được làm bằng loại vật liệu cổ điển.</h1>
                   <div class="button-content-box">
                    <a class="" href="#">Xem ngay</a>
                </div>
                </div>
            </div>
        </div>
    </section>


                <!-- collection home -->
    <section id="section-collection-home" class="section section-collection">
        <div class="wrapper-heading-home text-center">
            <div class="container-fluid">
                <div class="groupTitle-home">
                    <h2><a href="#"> Sản phẩm mới </a></h2>
                    <p>Cập nhật những sản phẩm mới nhất</p>
                </div>
            </div>
        </div>
        <div class="wrapper-collection-1">
            <div class="container-fluid">
                <div class="row">
                    <div class="content-product-list clearfix">
                        @foreach($hot_products as $row)
                        <div class="col-md-3 col-sm-4 col-xs-6 pro-loop col-20">
                            <div class="product-block product-resize fixheight">
                                <div class="product-img">
                                    <a href="{{ url('products/detail/'.$row->id) }}" class="image-resize fade-box lazyloaded" style="height: 200px;">
                                        <picture>
                                            <img class="img-loop mediabox-img lazyautosizes ls-is-cached lazyloaded" src="{{ asset('upload/products/'.$row->photo) }}" sizes="262px">
                                        </picture>
                                    </a>
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
                </div>
            </div>
        </div>
    </section>

    <div>
        <div class="item" style="display: grid; place-items: center;">
            <div class="slide-img">
                <a href="#">
                    <picture>
                        <img src="{{  asset('frontend/img/slide1.png')  }}">
                    </picture>
                </a>
            </div>
        </div>
    </div>
</br>

<!-- collection info -->
<section id="section-collection-info" class="section section-collection-info">
    <div class="container-fluid">
        <div class="rowFlexMargin">
            <div class="col-md-6">
                <div class="collectionItem ">
                    <div class="collectionImage fade-box effectFour">
                        <a href="#" class="lazyloaded">
                            <img class="img-responsive no-border mediabox-img lazyautosizes ls-is-cached lazyloaded" src="{{  asset('frontend/img/col61.png')  }}">
                        </a>
                        <div class="collectionGroup">
                            <div class="box-button">
                                <a href="#" class="button-bn">Về chúng tôi</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="collectionItem ">
                    <div class="collectionImage fade-box effectFour">
                        <a href="#" class="lazyloaded">
                            <img class="img-responsive no-border mediabox-img lazyautosizes ls-is-cached lazyloaded" src="{{  asset('frontend/img/col62.png')  }}">
                        </a>
                        <div class="collectionGroup">
                            <div class="box-button">
                                <a href="#" class="button-bn">Về chúng tôi</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- sản phẩm giảm giá --}}
<section id="section-collection-sales" class="section section-collection-sales">
    <div class="wrapper-heading-home text-center">
        <div class="container-fluid">
            <div class="groupTitle-home">
                <h2><a href="{{ url('products/category/all') }}">Sản phẩm khuyến mãi</a></h2>
                <p>Ưu đãi lên tới 10%</p>
            </div>
        </div>
    </div>
    <div class="wrapper-collection-3">
        <div class="container-fluid">
            <div class="row" id="collection-slide">
                <div class="col-md-12">
                    <div class="clearfix content-product-list">
                        @foreach ($hot_products as $row)
                        @php
                            $hot_products = DB::table("products")->where("hot","=","1")->offset(3)->take(15)->get();
                        @endphp
                        <div class="col-md-3 product-horizontal">
                            <div class="col-md-12 pro-loop">
                                <div class="product-block product-resize d-flex fixheight" style="height: 90px;">
                                    <div class="product-img">
                                        <a href="{{  url('products/detail/'.$row->id)  }}" class="image-resize fade-box lazyloaded" style="height: 90px;">
                                            <picture>
                                                <img class="img-loop mediabox-img lazyautosizes ls-is-cached lazyloaded" src="{{  asset('upload/products/'.$row->photo)  }}" sizes="90px">
                                            </picture>
                                        </a>
                                    </div>
                                    <div class="product-detail clearfix">
                                        <div class="box-pro-detail">
                                            <h3 class="pro-name">
                                                <a href="{{  url('products/detail/'.$row->id)  }}">{{  $row->name  }}</a>
                                            </h3>
                                            <div class="box-pro-prices">	
                                                <p class="pro-price highlight">
                                                    <span> {{ number_format($row->price - ($row->price * $row->discount)/100)  }}  ₫</span>
                                                    <span class="pro-price-del">
                                                        <del class="compare-price"> {{ number_format($row->price) }} ₫</del>
                                                    </span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



                <!-- blog -->
    <section id="section-blog" class="section section-blog">
        <div class="wrapper-heading-home text-center">
            <div class="container-fluid">
                <div class="groupTitle-home">
                    <h2><a href="{{ url('blogs/news') }}">Tin tức</a></h2>
                    <p>Cập nhật tin tức mới nhất!</p>
                </div>
            </div>
        </div>
        <div class="wrapper-content-home">
            <div class="container-fluid">
                <div class="row" id="blog-slide">
                    @foreach($news as $row)
                    <div class="col-md-4 item-blog no-pd">
                        <div class="velaBlogItem ">
                            <div class="blogPostImage">
                                <a href="{{ url('blogs/news') }}" class="fade-box lazyloaded">
                                    <picture>
                                        <img class="img-responsive mediabox-img lazyautosizes ls-is-cached lazyloaded" src="{{ asset('upload/news/'.$row->photo) }}" height="248px" width="398px">
                                    </picture>
                                </a>
                            </div>
                            <div class="blogPostContent">
                                <h3 class="blogPostTitle">
                                    <a href="{{ url('blogs/news') }}" style="width: 360px">{{ $row->name }}</a>
                                </h3>
                               
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</main>
<!-- main end -->
@endsection