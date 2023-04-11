@extends('front.master.page-master')


@section('title')
    The GirlyBag

@endsection




@section('body')

<div class="page-content">
    <div class="holder breadcrumbs-wrap mt-0">
        <div class="container">
            <ul class="breadcrumbs">
                <li><a href="{{route('index')}}">Home</a></li>
                <li><span>Blog Post</span></li>
            </ul>
        </div>
    </div>
    <div class="holder">
        <div class="container">
            <div class="page-title text-center">
                <h1>Blog Post</h1>
            </div>
            <div class="row">
                <div class="col-md-14 aside aside--content">
                    <div class="post-full">
                        <h2 class="post-title">Fashion Trends You Need to Follow</h2>
                        <div class="post-links">
                            <div class="post-date"><i class="icon-calendar"></i>August 27, 2020</div>
                            <a href="#" class="post-link">by John Smith</a>
                            <a href="#postComments" class="js-scroll-to"><i class="icon-chat"></i>15 Comment(s)</a>
                        </div>
                        <div class="post-img image-container" style="padding-bottom: 54.44%">
                            <img class="lazyload fade-up-fast" src="" data-src="{{ asset('/') }}public/front/images/blog/blog01.jpg" alt="">
                        </div>
                        <div class="post-text">
                            <p>
                                28th May, Menstrual Hygiene Day. Though it is relatively new but we should celebrate this day as like International Women's Day or Women's Equality Day. Since 20th century women have reinvent social norms. But still in some issues woman have to face social scrutiny. Especially when it comes to menstrual health. In some part of the world, talking about period still a taboo subject.

                            </p>
                            <p>A brief history:
                                A German based NGO WASH United had started the movement in 2013. They have run a Twitter campaign name “May #MENSTRAVAGANZA" to raise awareness about menstrual health. With their such initiative a global awareness program had begun. On 28th may 2014 people around world celebrated the day with 145 partner organization across the world alongside with MHD.
                            </p>
                            <p>
                                Objective:
                                Objectives of the day, according to Wikipedia is Raising Awareness:
                                Menstrual hygiene day is meant to serve as a platform to bring together individuals, organizations, social businesses and the media to create a united and strong voice for women and girls. It is designed to break the silence about menstrual hygiene management.

                            </p>

                            <p>
                                The objectives of MHD include:
                            </p>

                            <ul>
                                <li>To address the challenges and hardships many women and girls face during their menstruation.</li>
                                <li>To highlight the positive and innovative solutions being taken to address these challenges.</li>
                                <li>To catalyze a growing, global movement that recognizes and supports girls' and women’s rights and build partnerships among those partners on national and local level.</li>
                                <li>To engage in policy dialogue and actively advocate for the integration of menstrual hygiene management (MHM) into global, national and local policies and programs.</li>
                                <li>To create an occasion for media work, including social media.</li>
                                <li>Menstrual Hygiene Day makes audible and visible a growing movement that promotes body literacy and autonomy, as well as gender equality.</li>
                                <li>May 28 has symbolic meaning: May is the 5th month of the year, and the average length of menstruation is 5 days every month. Also, the menstrual cycle averages 28 days.   </li>
                            </ul>

                            <p>
                                Menstrual hygiene is an import part of sustainable development goal initiative. Due to lack of awareness a large number of women and girls are lacking such a right. We as a society should ensure their such right.
                            </p>
                        </div>
                    </div>
                </div>
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
