@extends('front.master.page-master')


@section('title')
The GirlyBag

@endsection




@section('body')
<div class="page-content">
    <div class="holder mt-0 py-3 py-sm-5 py-md-10 bg-cover lazyload fade-up-fast" data-bgset="{{ asset('/') }}public/front/images/pages/contact-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-9 col-xl-9">
                    <div class="page-title-bg py-md-3">
                        <h1>CONTACT US</h1>
                        <p>Keeping track of your period next date is an important task. A surprise period might interrupt your plans. Traditionally marking on a calendar or a note in a diary are common practices around here. But the problem is, you can't always carry them with you. For that, we’ve brought you a tool. With our period calculator, you’ll always be informed.</p>
                        <p>The process is simple, pick your date, tell us your period duration, and cycle. We’ll calculate the next tentative date.</p>
                        <p>Our calculator will help you to plan ahead for a special occasion, vacation, or ovulation (in case you’re planning to get pregnant)!  </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="holder">
        <div class="container">
            <div class="title-wrap text-center">
                <h2 class="h1-style">Our Information</h2>
                <p class="h-sub maxW-825">If you have any queries feel free to contact us</p>
            </div>
            <div class="text-icn-blocks-row">
                <div class="text-icn-block-hor">
                    <div class="icn">
                        <i class="icon-location"></i>
                    </div>
                    <div class="text">
                        <h4>Address:</h4>
                        <p>110/A Road 2, Niketan, Dhaka, Bangladesh</p>
                    </div>
                </div>
                <div class="text-icn-block-hor">
                    <div class="icn">
                        <i class="icon-phone"></i>
                    </div>
                    <div class="text">
                        <h4>Phone:</h4>
                        <p>01516773534</p>
                    </div>
                </div>
                <div class="text-icn-block-hor">
                    <div class="icn">
                        <i class="icon-info"></i>
                    </div>
                    <div class="text">
                        <h4>Hours:</h4>
                        <p>Hours: 7 Days a week<br>
                            09:00am to 5:00pm</p>
                    </div>
                </div>
                <div class="text-icn-block-hor">
                    <div class="icn">
                        <i class="icon-call-center"></i>
                    </div>
                    <div class="text">
                        <h4>Quick Help:</h4>
                        <p>+880 9696300022</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="holder">
        <div class="container">
            <div class="row vert-margin">
                <div class="col-sm-2">
                    {{--                    <div class="contact-map">--}}
                    {{--                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d2201.3258493677126!2d-74.01291322172017!3d40.70657451080482!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sua!4v1492962272380"></iframe>--}}
                    {{--                    </div>--}}
                </div>
                <div class="col-sm-14"><div class="title-wrap"><h2 class="h1-style">Get In Touch With Us</h2>
                    </div>
                    <form data-toggle="validator" class="contact-form" id="contactForm">
                        <div class="form-confirm">
                            <div class="success-confirm">
                                Thanks! Your message has been sent. We will get back to you soon!
                            </div>
                            <div class="error-confirm">
                                Oops! There was an error submitting form. Refresh and send again.
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row vert-margin-middle">
                                <div class="col-lg">
                                    <input type="text" name="name" class="form-control form-control--sm" placeholder="Name" required>
                                </div>
                                <div class="col-lg">
                                    <input type="text" name="lastName" class="form-control form-control--sm" placeholder="Last Name" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row vert-margin-middle">
                                <div class="col-lg">
                                    <input type="text" name="email" class="form-control form-control--sm" placeholder="Email" required>
                                </div>
                                <div class="col-lg">
                                    <input type="text" name="phone" class="form-control form-control--sm" placeholder="Phone" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control form-control--sm textarea--height-200" name="message" placeholder="Message" required></textarea>
                        </div>
                        <button class="btn" type="submit">Send Message</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <div class="holder holder-subscribe-full holder-subscribe--compact">
        <div class="container">
            <div class="row">
                <div class="col-auto">
                    <div class="subscribe-form-title-md">Newsletter</div>
                    <div class="subscribe-form-title-xs">Subscribe to our weekly newsletter.</div>
                </div>
                <div class="col">
                    <div class="subscribe-form">
                        <form action="#">
                            <div class="form-inline">
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" placeholder="Type your e-mail...">
                                    <span class="bottom"></span>
                                    <span class="right"></span>
                                    <span class="top"></span>
                                    <span class="left"></span>
                                </div>
                                <button type="submit" class="btn btn--lg">subscribe</button>
                            </div>
                        </form>
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
