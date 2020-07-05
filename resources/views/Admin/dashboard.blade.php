@extends("Admin.layout")
@section("title","Dashboard")
@section("styles")
<style type="text/css">
	.list-style-one li{
float: left;
    width: 33.3333333%;
	}
</style>
@endsection
@section("content")
<div class="dashboard-content">
	                <div class="dashboard-header clearfix">
	                    <div class="row">
	                        <div class="col-md-6 col-sm-12"><h4>Hi , {{auth()->user()->name}}</h4></div>
	                        <div class="col-md-6 col-sm-12">
	                            <div class="breadcrumb-nav">
	                                <ul>
	                                     
	                                    <li class="active">Dashboard</li>
	                                </ul>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	                
	               {{--  <div class="alert alert-success" role="alert">
	                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
	                    <strong>Your listing</strong> YOUR LISTING HAS BEEN APPROVED!
	                </div> --}}

	                <div class="row">
	                    <div class="col-lg-4 col-md-6 col-sm-6">
	                        <div class="ui-item bg-success">
	                            <div class="left">
	                                <h4>{{$activelisting}}</h4>
	                                <p>Active Listings</p>
	                            </div>
	                            <div class="right">
	                                <i class="la la-map-marker"></i>
	                            </div>
	                        </div>
	                    </div>
	                    <div class="col-lg-4 col-md-6 col-sm-6">
	                        <div class="ui-item bg-warning">
	                            <div class="left">
	                                <h4>{{$views}}</h4>
	                                <p>Listing Views</p>
	                            </div>
	                            <div class="right">
	                                <i class="la la-eye"></i>
	                            </div>
	                        </div>
	                    </div>
	                    <div class="col-lg-4 col-md-6 col-sm-6">
	                        <div class="ui-item bg-active">
	                            <div class="left">
	                                <h4>{{$messages}}</h4>
	                                <p>Messages</p>
	                            </div>
	                            <div class="right">
	                                <i class="la la-comments-o"></i>
	                            </div>
	                        </div>
	                    </div>
	                </div>

	                <div class="row">
	                    <div class="column col-lg-6 col-md-12">
	                    	{{-- <div class="comments-tab">
	                    		<h3>Comments</h3>
                                <div class="tabs-box">
                                	<ul class="tab-buttons">
					                    <li data-tab="#pending" class="tab-btn active-btn">Pending</li>
					                    <li data-tab="#approved" class="tab-btn">Approved</li>
					                </ul>

                                    <div class="tabs-content" >
                                    	<!-- Tab Active tab-->
                						<div class="tab active-tab" id="pending">
                                            <div class="comments-area">
				                                <!--comment-->
				                                <article class="message-box">
				                                    <div class="thumb-box">
				                                        <figure class="thumb"><img src="images/resource/review-thumb-1.jpg" alt=""></figure>
				                                        <a href="#" class="reply-btn">Reply Now</a>
				                                    </div>
				                                    <div class="content-box">
				                                        <div class="name">Monija Moro</div>
				                                        <span class="date"><i class="la la-calendar"></i> 8:42 PM 1/28/2017</span>
				                                        <div class="text">Accusantium aut, consequatur, culpa dolorum est facilis illo magnam numquam officia omnis qui recusandae sit, tempora ullam unde velit!</div>
				                                    </div>
				                                </article>

				                                <!--comment-->
				                                <article class="message-box">
				                                    <div class="thumb-box">
				                                        <figure class="thumb"><img src="images/resource/review-thumb-2.jpg" alt=""></figure>
				                                        <a href="#" class="reply-btn">Reply Now</a>
				                                    </div>
				                                    <div class="content-box">
				                                        <div class="name">Mibano Rests</div>
				                                        <span class="date"><i class="la la-calendar"></i> 8:42 PM 1/28/2017</span>
				                                        <div class="text">Accusantium aut, consequatur, culpa dolorum est facilis illo magnam numquam officia omnis qui recusandae sit, tempora ullam unde velit!</div>
				                                    </div>
				                                </article>

				                                <!--comment-->
				                                <article class="message-box">
				                                    <div class="thumb-box">
				                                        <figure class="thumb"><img src="images/resource/review-thumb-3.jpg" alt=""></figure>
				                                        <a href="#" class="reply-btn">Reply Now</a>
				                                    </div>
				                                    <div class="content-box">
				                                        <div class="name">Cojari Barna</div>
				                                        <span class="date"><i class="la la-calendar"></i> 8:42 PM 1/28/2017</span>
				                                        <div class="text">Accusantium aut, consequatur, culpa dolorum est facilis illo magnam numquam officia omnis qui recusandae sit, tempora ullam unde velit!</div>
				                                    </div>
				                                </article>
					                        </div>
                                        </div>

                                    	<!-- Tab -->
                                        <div class="tab" id="approved">
                                            <div class="comments-area">
				                                <!--comment-->
				                                <article class="message-box">
				                                    <div class="thumb-box">
				                                        <figure class="thumb"><img src="images/resource/review-thumb-1.jpg" alt=""></figure>
				                                        <a href="#" class="reply-btn">Reply Now</a>
				                                    </div>
				                                    <div class="content-box">
				                                        <div class="name">Monija Moro</div>
				                                        <span class="date"><i class="la la-calendar"></i> 8:42 PM 1/28/2017</span>
				                                        <div class="text">Accusantium aut, consequatur, culpa dolorum est facilis illo magnam numquam officia omnis qui recusandae sit, tempora ullam unde velit!</div>
				                                    </div>
				                                </article>

				                                <!--comment-->
				                                <article class="message-box">
				                                    <div class="thumb-box">
				                                        <figure class="thumb"><img src="images/resource/review-thumb-2.jpg" alt=""></figure>
				                                        <a href="#" class="reply-btn">Reply Now</a>
				                                    </div>
				                                    <div class="content-box">
				                                        <div class="name">Mibano Rests</div>
				                                        <span class="date"><i class="la la-calendar"></i> 8:42 PM 1/28/2017</span>
				                                        <div class="text">Accusantium aut, consequatur, culpa dolorum est facilis illo magnam numquam officia omnis qui recusandae sit, tempora ullam unde velit!</div>
				                                    </div>
				                                </article>

				                                <!--comment-->
				                                <article class="message-box">
				                                    <div class="thumb-box">
				                                        <figure class="thumb"><img src="images/resource/review-thumb-3.jpg" alt=""></figure>
				                                        <a href="#" class="reply-btn">Reply Now</a>
				                                    </div>
				                                    <div class="content-box">
				                                        <div class="name">Cojari Barna</div>
				                                        <span class="date"><i class="la la-calendar"></i> 8:42 PM 1/28/2017</span>
				                                        <div class="text">Accusantium aut, consequatur, culpa dolorum est facilis illo magnam numquam officia omnis qui recusandae sit, tempora ullam unde velit!</div>
				                                    </div>
				                                </article>
					                        </div>
                                        </div>
                                    </div>
                                </div>
	                    	</div> --}}
	                    	<app-amenities></app-amenities>
	                    </div>
	                    <div class="column col-lg-6 col-md-12">
	                    	<app-category></app-category>
	                    </div>

	                </div>
	            </div>
@endsection