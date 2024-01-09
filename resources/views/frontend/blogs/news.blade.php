@extends("frontend.layout_trang_chu")
@section("append-du-lieu")
<!-- breadcrumb shop -->
<div class="breadcrumb-shop clearfix">
    <div class="container-fluid">
        <div>
            <ol class="breadcrumb breadcrumb-arrows">
                <li><a href="{{ url('') }}"><span>Trang chủ</span></a></li>
                <li><span>Tin tức</span></li>
            </ol>
        </div>
    </div>
</div>

<!-- blogs -->
<div id="blog">
	<div class="container-fluid">
		<div class="row wrapper-row pd-page">
			<div class="col-md-9 col-sm-12 col-xs-12">
				<div class="heading-page clearfix">
					<h1>Tin tức</h1>
				</div>
				<div class="blog-content">
					<div class="list-article-content blog-posts">
                        @foreach ($rows as $row)
						<article class="blog-loop">
							<div class="blog-post row">
								<div class="col-md-4 col-xs-12 col-sm-4">
									<a href="{{ url('blogs/news/'.$row->id) }}" class="blog-post-thumbnail fade-box lazyloaded" rel="nofollow">
										<img class="lazyautosizes ls-is-cached lazyloaded" src="{{ asset('upload/news/'.$row->photo) }}" width="291px" height="auto">
									</a>
								</div>
								<div class="col-md-8 col-xs-12 col-sm-8">
									<h3 class="blog-post-title">
										<a href="{{ url('blogs/news/'.$row->id) }}">{{ $row->name }}</a>
									</h3>
									<div class="blog-post-meta">
										<span class="author vcard">Người viết: GreenZone GreenZone</span>
										<span class="date">
											<time>{{ $row->updated_at }}</time>
										</span>
									</div>
									<p class="entry-content">{!! $row->description !!}</p>
								</div>
							</div>
						</article>
                        @endforeach
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-12 col-xs-12">
				<div class="sidebar-blog">
					<div class="news-latest">
						<div class="sidebarblog-title title_block">
							<h2>Bài viết mới nhất<span class="fa fa-angle-down"></span></h2>
						</div>
						<div class="list-news-latest layered">
                            @foreach ($news_topic as $row)
                            <div class="item-article clearfix">
								<div class="post-image">
									<a href="{{ url('blogs/news/'.$row->id) }}" rel="nofollow">
										<picture>
											<source media="(min-width: 768px) and (max-width: 991px)" srcset="{{ asset('upload/news/'.$row->photo) }}">
											<img src="{{ asset('upload/news/'.$row->photo) }}">
										</picture>
									</a>
								</div>
								<div class="post-content">
									<h3>
										<a href="{{ url('blogs/news/'.$row->id) }}">{{ $row->name }}</a>
									</h3>
									<span class="author">
										<a href="{{ url('blogs/news/'.$row->id) }}">GreenZone GreenZone</a>
									</span>
                                    <br>
									<span class="date">{{ $row->updated_at }}</span>
								</div>
							</div>
                            @endforeach
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
