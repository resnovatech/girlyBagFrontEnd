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

    .vc-pane[data-v-37fb1233] {
        min-width: 300px !important;
        min-height: 300px;
    }

    .vc-weeks[data-v-37fb1233] {
        min-height: 300px;
    }

    .vc-weeks[data-v-37fb1233] {
        padding: 5px;
        min-width: 300px;
        border-right: 1px solid #d0d0d0;
        margin-top: 20px;
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
        <div class="holder mt-0 py-3 py-sm-5 py-md-10 bg-cover lazyload"
             data-bgset="{{asset('public/front/images/pages/calculator-bg.jpg')}}">
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

                <div class="container" style="padding-left: 10%; padding-right: 10%;" >
                    <div id="example"></div>
                    <div id="start_date" style="display: none">{{$request->date}}</div>
                    <div id="end_date" style="display: none">{{$date}}</div>
                    <div id="app">
                        <v-calendar :attributes="attrs" is-expanded is-range
                                    :columns="$screens({ default: 1, lg: 3 })"></v-calendar>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-lg-8 text-center">
                        <span
                            style="background-color: #D53F8C; border-radius: 50%; margin-right: 5px; height: 30px; width: 30px; color: #D53F8C">aa</span>Period
                    </div>
                    <div class="col-lg-8 text-center">
                        <span
                            style="background-color: #805AD5; border-radius: 50%; margin-right: 5px; height: 30px; width: 30px; color: #805AD5">aa</span>Ovulation
                    </div>
                </div>

                <p class="text-center">This tool is not intended to be medical advice and should not be used to prevent
                    pregnancy. Results are an estimate and will vary for each women</p>


            </div>
        </div>

    </div>
@endsection
@section('scripts')
    <script src='https://unpkg.com/vue/dist/vue.js'></script>

    <!-- 2. Link VCalendar Javascript (Plugin automatically installed) -->
    <script src='https://unpkg.com/v-calendar'></script>

    <!--3. Create the Vue instance-->

    {{--    <script src="{{mix('js/app.js')}}"></script>--}}
    <script>

        var start_date = document.getElementById('start_date').innerText;
        var end_date = document.getElementById('end_date').innerText;


        var s_day ={{$s_day}};
        var s_month ={{$s_month}};
        var s_year ={{$s_year}};
        var e_day ={{$e_day}};
        var e_month ={{$e_month}};
        var e_year ={{$e_year}};
        var cycle_time ={{$cycle_date}};
        var duration ={{$duration}};

        function calculatedate() {
            s_day = s_day + cycle_time;
            e_day = e_day + cycle_time;
            console.log("from function:" + s_day);
            console.log("from function:" + e_day);
        }

        console.log(s_day + cycle_time + cycle_time);
        console.log(s_month);
        console.log(s_year);
        console.log(e_day);
        console.log(e_month);
        console.log(e_year);
        console.log(cycle_time);
        // alert(start_date);
        // alert(end_date);

        {{--var preiod = {{($start_date_array)}};--}}

        new Vue({
            el: '#app',
            data() {
                return {
                    attrs: [
                        {
                            highlight: {
                                start: {fillMode: 'outline'},
                                base: {
                                    fillMode: 'solid',
                                    color: 'pink',
                                    background: 'linear-gradient(to bottom right, #ff5050, #ff66b3)',
                                    borderRadius: '20px',
                                    borderWidth: '10px',
                                },
                                end: {
                                    fillMode: 'outline',
                                    color: 'pink',
                                    background: 'linear-gradient(to bottom right, #ff5050, #ff66b3)',
                                },
                            },
                            dates:
                                [
                                    //preiod date
                                    {
                                        start: new Date(s_year, s_month, s_day),
                                        end: new Date(e_year, e_month, e_day)
                                    },
                                    //2
                                    {
                                        start: new Date(s_year, s_month, s_day + cycle_time),
                                        end: new Date(e_year, e_month, e_day + cycle_time)
                                    },
                                    //2
                                    {
                                        start: new Date(s_year, s_month, s_day + cycle_time + cycle_time),
                                        end: new Date(e_year, e_month, e_day + cycle_time + cycle_time)
                                    },
                                    //2
                                    {
                                        start: new Date(s_year, s_month, s_day + cycle_time + cycle_time + cycle_time),
                                        end: new Date(e_year, e_month, e_day + cycle_time + cycle_time + cycle_time)
                                    },
                                    //2
                                    {
                                        start: new Date(s_year, s_month, s_day + cycle_time + cycle_time + cycle_time + cycle_time),
                                        end: new Date(e_year, e_month, e_day + cycle_time + cycle_time + cycle_time + cycle_time)
                                    },
                                    //2
                                    {
                                        start: new Date(s_year, s_month, s_day + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time),
                                        end: new Date(e_year, e_month, e_day + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time)
                                    },//2
                                    {
                                        start: new Date(s_year, s_month, s_day + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time),
                                        end: new Date(e_year, e_month, e_day + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time)
                                    },
                                    {
                                        start: new Date(s_year, s_month, s_day + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time),
                                        end: new Date(e_year, e_month, e_day + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time)
                                    },
                                    {
                                        start: new Date(s_year, s_month, s_day + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time),
                                        end: new Date(e_year, e_month, e_day + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time)
                                    },
                                    {
                                        start: new Date(s_year, s_month, s_day + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time),
                                        end: new Date(e_year, e_month, e_day + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time)
                                    },
                                    {
                                        start: new Date(s_year, s_month, s_day + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time),
                                        end: new Date(e_year, e_month, e_day + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time)
                                    },
                                    {
                                        start: new Date(s_year, s_month, s_day + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time),
                                        end: new Date(e_year, e_month, e_day + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time)
                                    },
                                    {
                                        start: new Date(s_year, s_month, s_day + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time),
                                        end: new Date(e_year, e_month, e_day + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time)
                                    },
                                    {
                                        start: new Date(s_year, s_month, s_day + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time),
                                        end: new Date(e_year, e_month, e_day + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time)
                                    },
                                    {
                                        start: new Date(s_year, s_month, s_day + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + +cycle_time + cycle_time + cycle_time + cycle_time + cycle_time),
                                        end: new Date(e_year, e_month, e_day + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time)
                                    },
                                    {
                                        start: new Date(s_year, s_month, s_day + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + +cycle_time + cycle_time + cycle_time + cycle_time + cycle_time),
                                        end: new Date(e_year, e_month, e_day + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time)
                                    },

                                    {
                                        start: new Date(s_year, s_month, s_day + cycle_time + cycle_time + cycle_time + cycle_time+cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + +cycle_time + cycle_time + cycle_time + cycle_time + cycle_time),
                                        end: new Date(e_year, e_month, e_day + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time+cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time)
                                    }


                                ],

                        },
                        {
                            highlight: {
                                start: {fillMode: 'outline'},
                                base: {
                                    fillMode: 'solid',
                                    color: 'purple',
                                    background: 'linear-gradient(to bottom right, #ff5050, #ff66b3)',
                                },
                                end: {
                                    fillMode: 'outline',
                                    color: 'purple',
                                    background: 'linear-gradient(to bottom right, #ff5050, #ff66b3)',
                                },
                            },
                            dates: [

                                //ovaluation time
                                {
                                    style: {color: 'blue'},
                                    start: new Date(s_year, s_month, s_day + 12),
                                    end: new Date(e_year, e_month, s_day + 18)
                                },

                                {
                                    start: new Date(s_year, s_month, s_day + cycle_time + 12),
                                    end: new Date(e_year, e_month, s_day + cycle_time + 18)
                                },
                                {
                                    start: new Date(s_year, s_month, s_day + cycle_time + cycle_time + 12),
                                    end: new Date(e_year, e_month, s_day + cycle_time + cycle_time + 18)
                                },
                                {
                                    start: new Date(s_year, s_month, s_day + cycle_time + cycle_time + cycle_time + 12),
                                    end: new Date(e_year, e_month, s_day + cycle_time + cycle_time + cycle_time + 18)
                                }, {
                                    start: new Date(s_year, s_month, s_day + cycle_time + cycle_time + cycle_time + cycle_time + 12),
                                    end: new Date(e_year, e_month, s_day + cycle_time + cycle_time + cycle_time + cycle_time + 18)
                                }, {
                                    start: new Date(s_year, s_month, s_day + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + 12),
                                    end: new Date(e_year, e_month, s_day + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + 18)
                                }, {
                                    start: new Date(s_year, s_month, s_day + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + 12),
                                    end: new Date(e_year, e_month, s_day + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + 18)
                                },
                                {
                                    start: new Date(s_year, s_month, s_day + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + 12),
                                    end: new Date(e_year, e_month, s_day + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + 18)
                                },
                                {
                                    start: new Date(s_year, s_month, s_day + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + 12),
                                    end: new Date(e_year, e_month, s_day + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + 18)
                                },
                                {
                                    start: new Date(s_year, s_month, s_day + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + 12),
                                    end: new Date(e_year, e_month, s_day + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + 18)
                                },
                                {
                                    start: new Date(s_year, s_month, s_day + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + 12),
                                    end: new Date(e_year, e_month, s_day + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + 18)
                                },
                                {
                                    start: new Date(s_year, s_month, s_day + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + 12),
                                    end: new Date(e_year, e_month, s_day + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + +18)
                                },
                                {
                                    start: new Date(s_year, s_month, s_day + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + 12),
                                    end: new Date(e_year, e_month, s_day + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + 18)
                                },
                                {
                                    start: new Date(s_year, s_month, s_day + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + 12),
                                    end: new Date(e_year, e_month, s_day + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + 18)
                                },
                                {
                                    start: new Date(s_year, s_month, s_day + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + 12),
                                    end: new Date(e_year, e_month, s_day + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + 18)
                                },

                                {
                                    start: new Date(s_year, s_month, s_day + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + 12),
                                    end: new Date(e_year, e_month, s_day + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + cycle_time + 18)
                                }

                            ],


                        },
                        // console.log(dates)
                    ]
                };
            },

        });
        // calculatedate();

    </script>


@endsection
