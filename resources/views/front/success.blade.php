@extends('front.master.page-master')


@section('title')
The GirlyBag

@endsection
<?php


use App\Http\Controllers\MainController;


?>



@section('body')
<style>
    .confirmgif img
    {
        height: 550px;
    }

    @media (max-width: 767px)
    {
        .confirmgif img
        {
            height: 250px;
        }
    }
</style>
<div class="page-content">
    <div class="holder mt-0">
        <div class="container pt-5">
            <div class="page404-bg">
                <div class="page404-text">
                    <div class="confirmgif"><img src="https://media.giphy.com/media/cmCHuk53AiTmOwBXlw/giphy.gif" alt=""></div>
                    <div class="txt2">Thank You For Your Purchase</div>
                    <div class="text-center"><p>We'll be in touch with you shortly</p></div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
