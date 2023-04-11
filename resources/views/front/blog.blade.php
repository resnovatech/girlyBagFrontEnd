@extends('front.master.page-master')


@section('title')
The GirlyBag

@endsection




@section('body')
<div class="page-content">
    <div class="holder breadcrumbs-wrap mt-0">
        <div class="container">
            <ul class="breadcrumbs">
                <li><a href="{{ route('index') }}">Home</a></li>
                <li><span>Our Blog</span></li>
            </ul>
        </div>
    </div>
    <div class="holder">
        <div class="container">
            <div class="page-title text-center">
                <h1>Our Blog</h1>
            </div>
            <div class="row">
                <div class="col-md-14 aside aside--content">
                    <div class="post-prws-listing">
                        <div class="post-prw">
                            <div class="row vert-margin-middle">
                                <div class="post-prw-img col-md-7">
                                    <a href="{{route('blog1')}}">
                                        <img src="data:{{ asset('/') }}public/front/image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                             data-src="{{ asset('/') }}public/front/images/blog/blog01.jpg" class="lazyload fade-up" alt="">
                                    </a>
                                </div>
                                <div class="post-prw-text col-md-11">
                                    <div class="post-prw-links">
                                        <div class="post-prw-date"><i class="icon-calendar"></i>10 nov, 2020</div>
                                        <div class="post-prw-date"><i class="icon-chat"></i>5 comments</div>
                                    </div>
                                    <h4 class="post-prw-title"><a href="blog-post.html">Why Should We Celebrate Menstrual Hygiene Day?</a>
                                    </h4>
                                    <div class="post-prw-teaser">28th May, Menstrual Hygiene Day. Though it is relatively new but we should celebrate this day as like International Women's Day or Women's Equality Day. Since 20th century women have reinvent social norms. But still in some issues woman have to face social scrutiny. Especially when it comes to menstrual health. In some part of the world, talking about period still a taboo subject.
                                    </div>
                                    <div class="post-prw-btn">
                                        <a href="{{route('blog1')}}" class="btn btn--sm">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="post-prw">
                            <div class="row vert-margin-middle">
                                <div class="post-prw-img col-md-7">
                                    <a href="blog-post.html">
                                        <img src="data:{{ asset('/') }}public/front/image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                             data-src="{{ asset('/') }}public/front/images/blog/blog02.jpg" class="lazyload fade-up" alt="">
                                    </a>
                                </div>
                                <div class="post-prw-text col-md-11">
                                    <div class="post-prw-links">
                                        <div class="post-prw-date"><i class="icon-calendar"></i>15 nov, 2020</div>
                                        <div class="post-prw-date"><i class="icon-chat"></i>5 comments</div>
                                    </div>
                                    <h4 class="post-prw-title"><a href="blog-post.html">Slider/Megamenu visual
                                            builder</a></h4>
                                    <div class="post-prw-teaser">Lorem ipsum dolor sit amet, consectetur adipiscing
                                        elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
                                        ad minim veniam, quis nostrud exercitation ullamco
                                    </div>
                                    <div class="post-prw-btn">
                                        <a href="blog-post.html" class="btn btn--sm">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
{{--                <div class="col-md-4 aside aside--sidebar aside--right">--}}
{{--                    <div class="aside-content">--}}
{{--                        <div class="aside-block">--}}
{{--                            <h2 class="text-uppercase">Popular Tags</h2>--}}
{{--                            <ul class="tags-list">--}}
{{--                                <li><a href="#">jeans</a></li>--}}
{{--                                <li><a href="#">hand bags</a></li>--}}
{{--                                <li><a href="#">gift card</a></li>--}}
{{--                                <li><a href="#">goodwin</a></li>--}}
{{--                                <li><a href="#">seiko</a></li>--}}
{{--                                <li><a href="#">banita</a></li>--}}
{{--                                <li><a href="#">foxic</a></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                        <div class="aside-block">--}}
{{--                            <h2 class="text-uppercase">Archives</h2>--}}
{{--                            <ul class="list list--nomarker">--}}
{{--                                <li><a href="#">January 2018</a></li>--}}
{{--                                <li><a href="#">February 2018</a></li>--}}
{{--                                <li><a href="#">March 2018</a></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function(){
    //edit product
       $(".view-product").click(function(){
         var productid=$(this).data('productid');
        //ajax
         $.ajax({
           headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          url:"{{route('single_category')}}",
          type:"POST",
          data:{'productid':productid},
                //dataType:'json',
                success:function(data){
                    $(".modal-data").html(data);
                  $('.productModal').modal('show');
                },
                error:function(){
                  toastr.error("Something went Wrong, Please Try again.");
                }
              });

          //end ajax
       });


        });

       </script>


       @endsection
