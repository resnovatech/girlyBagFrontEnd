

@extends('front.master.page-master')

<style>

    .inc_dec_button {
        width: 50px;
        background: #EE2C74;
        background: linear-gradient(to right, #E5454C, #ed1b32);
        outline: none;
        border: none !important;
        padding: 15px 4px;
        font-size: 18px;
        color: white;
        font-weight: bold;
    }


    .dec_button {
        border-radius: 10px 0 0 10px;
    }

    .inc_button {
        border-radius: 0 10px 10px 0;
    }

    .increment_field {
        padding: 15px 20px;
        width: 70%;
        border: none !important;
        text-align: center;
        font-size: 18px;
        background-color: #f7f7f8;
    }


    .gj-datepicker-bootstrap [role=right-icon] button .gj-icon, .gj-datepicker-bootstrap [role=right-icon] button .material-icons {

        top: 15px !important;
        left: 20px !important;

    }

    .btn-outline-secondary {
        border-radius: 0 10px 10px 0 !important;
    }


    level {
        font-size: 18px !important;
        font-weight: bold !important;
    }

    .form-control {
        font-size: 18px !important;
    }

    @media (max-width: 1550px) {
        .increment_field {
            width: 50%;
        }
    }

    @media (max-width: 575px) {
        .increment_field {
            width: 70%;
        }

        level {
            font-size: 14px !important;
            font-weight: bold !important;
        }

        .gj-datepicker-bootstrap [role=right-icon] button .gj-icon, .gj-datepicker-bootstrap [role=right-icon] button .material-icons {

            top: 15px !important;
            left: 10px !important;

        }

        .inc_dec_button {
            padding: 10px 4px;
        }

        .increment_field {
            padding: 10px 4px;
        }

        .inc_dec_button {
            width: 35px;
        }

        .h1-style {
            font-size: 20px !important;
        }

    }

    @media (max-width: 350px) {
        .increment_field {
            width: 60%;
        }
    }


</style>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css"/>

@section('title')
    The GirlyBag

@endsection



@section('body')
    <div class="page-content">
        <div class="holder mt-0 py-3 py-sm-5 py-md-10 bg-cover lazyload" data-bgset="{{asset('public/front/images/pages/calculator-bg.jpg')}}">
            <div class="container">
                <div class="row">
                    <div class="col-11 col-md-9 col-xl-9">
                        <div class="page-title-bg py-md-3 py-xl-6">
                            <h1>Period Calculator</h1>
                            <p>Wondering, "When will I get my period?" Always knows! Our easy tracking tool, the Period
                                Calculator, helps to map out your cycle for months. Plan a period-free beach trip or a
                                big
                                event like a wedding using the period cycle calculator. Or track your Fertility time if
                                you're trying using menstrual cycle calculator./p>
                            <p>Ready? You’re three quick questions away from getting your custom menstrual cycle
                                calculator.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="holder">
            <div class="container">
                <div class="title-wrap text-center">
                    <h2 class="h1-style">Calculate Your Period</h2>
                </div>
                <form action="{{route('calender1')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 pl-5 pr-5 pt-4">
                            <level>When was the first day of your last period?</level>
                            <div class="mt-2">
                                <input id="datepicker" class="form-control form-control--sm" name="date" readonly/>
                                <script>
                                    $('#datepicker').datepicker({
                                        uiLibrary: 'bootstrap4'
                                    });
                                </script>
                            </div>
                        </div>
                        <div class="col-lg-6 pl-5 pr-5 pt-4">
                            <level>How long does a period last?</level>
                            <div class="mt-2">
                                <div class="">
                                    <input type="button" class="inc_dec_button dec_button" onclick="decrementValue()"
                                           value="-"/>
                                    <input type="text" class="increment_field" name="duration" value="1" maxlength="2" max="10"
                                           size="1" id="number"/>
                                    <input type="button" class="inc_dec_button inc_button" onclick="incrementValue()"
                                           value="+"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 pl-5 pr-5 pt-4">
                            <level>HOW long is your cycle?</level>
                            <div class="mt-2">
                                <div class="">
                                    <input type="button" class="inc_dec_button dec_button" onclick="decrementValue1()"
                                           value="-"/>
                                    <input type="text" class="increment_field" name="cycle" value="28" maxlength="2"
                                           size="1" id="number1"/>
                                    <input type="button" class="inc_dec_button inc_button" onclick="incrementValue22()"
                                           value="+"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-18 mt-4">
                            <div class="text-center mt-1">
                                <button type="submit" class="btn btn-outline-primary">Calculate Now</button>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
@section('scripts')

    <script type="text/javascript">

        function incrementValue() {
            var value = parseInt(document.getElementById('number').value, 10);
            value = isNaN(value) ? 0 : value;
            if (value < 10) {
                value++;
                document.getElementById('number').value = value;
            }
        }

        function decrementValue() {
            var value = parseInt(document.getElementById('number').value, 10);
            value = isNaN(value) ? 0 : value;
            if (value > 1) {
                value--;
                document.getElementById('number').value = value;
            }

        }
    </script>

    <script type="text/javascript">

        function incrementValue22() {
            var value = parseInt(document.getElementById('number1').value, 10);
            value = isNaN(value) ? 0 : value;
            if (value < 100) {
                value++;
                document.getElementById('number1').value = value;
            }
        }

        function decrementValue1() {
            var value = parseInt(document.getElementById('number1').value, 10);
            value = isNaN(value) ? 0 : value;
            if (value > 1) {
                value--;
                document.getElementById('number1').value = value;
            }

        }
    </script>


@endsection
