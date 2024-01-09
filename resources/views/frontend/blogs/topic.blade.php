@extends("frontend.layout_trang_chu")
@section("append-du-lieu")
<!-- breadcrumb shop -->
<div class="breadcrumb-shop clearfix">
    <div class="container-fluid">
        <div>
            <ol class="breadcrumb breadcrumb-arrows">
                <li><a href="{{ url('') }}"><span>Trang chủ</span></a></li>
                <li><a href="{{ url('blogs/news') }}"><span>Tin tức</span></a></li>
                <li><span>Bài viết số {{ $topic->id }}</span></li>
            </ol>
        </div>
    </div>
</div>

<!-- blogs -->
<div id="article">
	<div class="container-fluid">
		<div class="row wrapper-row pd-page">
			<div class="col-md-9 col-sm-12 col-xs-12">
				<div class="content-page">
					<div class="article-content">
						<div class="box-article-heading clearfix">
							<ul class="article-info-more">
								<li> Người viết: Asics lúc <time>{{ $topic->updated_at }}</time></li>
								<li><i class="fa fa-file-text-o"></i><a href="#"> Tin tức</a> </li>
								<li>- <i class="comment-icon fa fa-comment-o"></i>
									<a href="#">
										0<span> Bình luận</span>
									</a>
								</li>
							</ul>
                            <h1 class="sb-title-article">{{ $topic->name }}</h1>
							<div class="background-img">
								<img src="{{ asset('upload/news/'.$topic->photo) }}">
                                <h4>{!! $topic->description !!}</h4>
							</div>
						</div>
						<div class="article-pages">{!! $topic->content !!}</div>
						<div class="meta-tags">
							<span class="tags-title">Tags: </span>
							<a class="tag" href="#">Orange</a>
						</div>
						<div class="post-navigation">
							<span class="right"><a href="#" title="">Bài sau →</a></span>

						</div>
					</div>
					<div role="tabpanel" class="article-comment">
						<div class="title-bl">
							<h2>
								<a data-spy="scroll" data-target="#comment" href="#comment" aria-controls="comment" role="tab">Viết bình luận</a>
							</h2>
						</div>
						<div id="comment">
							<div id="comments" class="comments ">
								<div class="comment_form">
                                    <form accept-charset="UTF-8" action="/blogs/news/bai-viet-mau-3/comments" class="comment-form" id="article--comment-form" method="post">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <input required="" type="text" id="comment_author" name="comment[author]" size="40" class="text form-control" placeholder="Tên của bạn ">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <input required="" type="text" id="comment_email" name="comment[email]" size="40" class="text form-control" placeholder="Email của bạn">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <textarea required="" id="comment_body" name="comment[body]" cols="40" rows="5" class="text form-control" placeholder="Viết bình luận ..."></textarea>
                                        </div>
                                        <button type="submit" class="readmore btn-rb clear-fix" id="comment-submit">Gửi bài viết</button>
                                    </form>
                                </div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-12 col-xs-12 sidebar_blog_article">
				<div class="sidebar-blog">
					<div class="news-latest clearfix">
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
