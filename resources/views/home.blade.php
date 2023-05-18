@extends('layouts.web.web')
@section('head')
<style>
    .fa-copy {
        cursor: pointer;
        transition: all 0.3s ease-in-out;
        margin-left: 5px;
    }

    .fa-copy:hover {
        color: #2B845D;
        transform: scale(1.2);
    }

    .accepectedText {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .form-select,
    .form-control {
        height: 45px;
        font: 16px Lato-Regular, Arial, sans-serif;
        color: #3a4763;
    }


    .wantAccessToken {
        font-size: 14px !important;
        font-weight: bold !important;
        color: #1f9108 !important;
    }




    .copyIcon:hover {
        border: #1f9108 1px solid;
        border-radius: 50%;
        background-color: rgb(192, 185, 185);

    }

    button {
        margin: 20px;
    }

    .custom-btn {
        width: 130px;
        height: 40px;
        color: #fff;
        border-radius: 5px;
        padding: 10px 25px;
        font-family: 'Lato', sans-serif;
        font-weight: 500;
        background: transparent;
        cursor: pointer;
        transition: all 0.3s ease;
        position: relative;
        display: inline-block;
        box-shadow: inset 2px 2px 2px 0px rgba(255, 255, 255, .5),
            7px 7px 20px 0px rgba(0, 0, 0, .1),
            4px 4px 5px 0px rgba(0, 0, 0, .1);
        outline: none;
    }

    /* 7 */
    .getProxyBtn {
        background: linear-gradient(0deg, rgb(13, 121, 72) 0%, rgb(2, 251, 77) 100%);
        line-height: 42px;
        padding: 0;
        border: none;
    }

    .resetProxyBtn {
        background: linear-gradient(0deg, rgb(186, 9, 9) 0%, rgb(251, 135, 2) 100%) !important;
        line-height: 42px;
        padding: 0;
        border: none;
    }

    .custom-level-IP,
    .custom-level-port {
        background: linear-gradient(0deg, rgb(1, 168, 124) 0%, rgb(96, 177, 120) 100%);
        line-height: 42px;
        padding: 0;
        border: none;
        margin-top: 3.5rem !important;
    }

    .custom-level-port {
        padding: 0px 10px;
    }


    .getProxyBtn span {
        position: relative;
        display: block;
        width: 100%;
        height: 100%;
    }

    .resetProxyBtn span {
        position: relative;
        display: block;
        width: 100%;
        height: 100%;
    }

    .getProxyBtn:before,
    .getProxyBtn:after {
        position: absolute;
        content: "";
        right: 0;
        bottom: 0;
        background: rgb(13, 121, 16);
        box-shadow:
            -7px -7px 20px 0px rgba(255, 255, 255, .9),
            -4px -4px 5px 0px rgba(255, 255, 255, .9),
            7px 7px 20px 0px rgba(0, 0, 0, .2),
            4px 4px 5px 0px rgba(0, 0, 0, .3);
        transition: all 0.3s ease;
    }

    .resetProxyBtn:before,
    .resetProxyBtn:after {
        position: absolute;
        content: "";
        right: 0;
        bottom: 0;
        background: #ef5350;
        box-shadow:
            -7px -7px 20px 0px rgba(255, 255, 255, .9),
            -4px -4px 5px 0px rgba(255, 255, 255, .9),
            7px 7px 20px 0px rgba(0, 0, 0, .2),
            4px 4px 5px 0px rgba(0, 0, 0, .3);
        transition: all 0.3s ease;
    }


    .getProxyBtn:before {
        height: 0%;
        width: 2px;
    }

    .resetProxyBtn:before {
        height: 0%;
        width: 2px;
    }

    .getProxyBtn:after {
        width: 0%;
        height: 2px;
    }

    .resetProxyBtn:after {
        width: 0%;
        height: 2px;
    }

    .getProxyBtn:hover {
        color: rgb(13, 121, 16);
        background: transparent;
    }

    .resetProxyBtn:hover {
        color: rgb(186, 9, 9) !important;
        background: transparent !important;
    }

    .getProxyBtn:hover:before {
        height: 100%;
    }

    .resetProxyBtn:hover:before {
        height: 100%;
    }

    .getProxyBtn:hover:after {
        width: 100%;
    }

    .resetProxyBtn:hover:after {
        width: 100%;
    }



    .getProxyBtn span:before {
        width: 2px;
        height: 0%;
    }

    .resetProxyBtn span:before {
        width: 2px;
        height: 0%;
    }

    .getProxyBtn span:after {
        height: 2px;
        width: 0%;
    }

    .resetProxyBtn span:after {
        height: 2px;
        width: 0%;
    }

    .getProxyBtn span:hover:before {
        height: 100%;
    }

    .resetProxyBtn span:hover:before {
        height: 100%;
    }

    .getProxyBtn span:hover:after {
        width: 100%;
    }

    .resetProxyBtn span:hover:after {
        width: 100%;
    }

    @keyframes slide {
        0% {
            background-position: 0 0;
        }

        100% {
            background-position: -120px 60px;
        }
    }



    /* level */
    .custom-level {
        background: linear-gradient(0deg, rgb(13, 121, 16) 0%, rgb(2, 251, 77) 100%);
        line-height: 42px;
        padding: 1px 5px 5px 20px;
        border: none;
        color: rgb(13, 121, 16);
        background: transparent;
    }

    .custom-level span {
        position: relative;
        display: block;
        width: 100%;
        height: 100%;
    }

    .custom-level:before,
    .custom-level:after {
        position: absolute;
        content: "";
        right: 0;
        bottom: 0;
        background: rgb(13, 121, 16);
        box-shadow:
            -7px -7px 20px 0px rgba(255, 255, 255, .9),
            -4px -4px 5px 0px rgba(255, 255, 255, .9),
            7px 7px 20px 0px rgba(0, 0, 0, .2),
            4px 4px 5px 0px rgba(0, 0, 0, .3);
        transition: all 0.3s ease;
    }

    .custom-level:before {
        height: 100%;
        width: 2px;
    }

    .custom-level:after {
        width: 100%;
        height: 2px;
    }

    .custom-level span:before,
    .custom-level span:after {
        position: absolute;
        content: "";
        left: 0;
        top: 0;
        background: rgba(251, 75, 2, 1);
        box-shadow:
            -7px -7px 20px 0px rgba(255, 255, 255, .9),
            -4px -4px 5px 0px rgba(255, 255, 255, .9),
            7px 7px 20px 0px rgba(0, 0, 0, .2),
            4px 4px 5px 0px rgba(0, 0, 0, .3);
        transition: all 0.3s ease;
    }

    .custom-level span:before {
        width: 2px;
        height: 100%;
    }

    .custom-level span:after {
        height: 2px;
        width: 100%;
    }



    #InfoBanner {
        margin-bottom: 10px;
        position: absolute;
        left: -15px;
        top: 115px;
        text-align: center;
        width: 100%;
    }

    .reversed {
        display: inline-block;
        padding: 0.3em;
        padding-left: 0.3em;
        margin-left: 0.8em;
        position: relative;
        text-align: center;
        vertical-align: middle;
        line-height: 1;
        color: #fff;
        font-size: 15px;
        background-color: #ef5350;
    }

    .reversed:before,
    .reversed:after {
        content: '';
        width: 0;
        height: 0;
        right: -0.8em;
        position: absolute;
        top: 0;
        border-top: 0.8em solid #ef5350;
    }

    .reversed:after {
        top: auto;
        bottom: 0;
        border-top: none;
        border-bottom: 0.8em solid #ef5350;
    }

    .reversedRight:before,
    .reversedRight:after {
        border-right: 0.8em solid transparent;
        right: -0.8em;
    }

    .reversedRight {
        width: 24px;
        border-radius: 5px 0px 0px 5px;
        animation: tilt 2s infinite;
    }

    @keyframes tilt {
        0% {
            left: 0%;
        }

        50% {
            left: 9px;
        }

        100% {
            left: 0px;
        }
    }

    .reversedLeft {
        margin-left: 15px;
        border-radius: 0px 5px 5px 0px;
    }

    .reversedLeft:before,
    .reversedLeft:after {
        content: '';
        width: 0;
        height: 0;
        border-left: 0.8em solid transparent;
        left: -0.8em;
        position: absolute;
    }

    .reversedLeft:after {
        top: auto;
        bottom: 0;
        border-top: 0.8em solid #ef5350;
        border-bottom: none;
    }

    .reversedLeft:before {
        bottom: auto;
        top: 0;
        border-bottom: 0.8em solid #ef5350;
        border-top: none;
    }

    .bgAnimation {
        background-color: #ef5350;
        background-image: linear-gradient(45deg,
                #e57373 25%,
                transparent 25%,
                transparent 75%,
                #e57373 75%,
                #e57373), linear-gradient(-45deg,
                #e57373 25%,
                transparent 25%,
                transparent 75%,
                #e57373 75%,
                #e57373);
        background-size: 60px 60px;
        animation: slide 4s infinite linear;
    }

    @media (max-width: 767px) {
        .px-10 {
            padding-left: 1rem !important;
            padding-right: 1rem !important;
        }
    }

    @media (max-width: 767px) {
        .px-10 {
            padding-left: 1rem !important;
            padding-right: 1rem !important;
        }
    }

    @media (max-width: 414px) {
        .getProxyBtn {
            line-height: 1.5;
            font-size: small;
        }

        .shadow-sm {
            height: 79px !important;
        }
    }

    .input_copy_wrapper {
        width: 450px;
        padding: 50px;
        margin: 0 auto;
    }

    .input_copy {
        padding: 15px 25px;
        font-size: .8em;
        background: #fff;
        border-radius: 5px;
        box-shadow:
            -7px -7px 20px 0px rgba(255, 255, 255, .9),
            -4px -4px 5px 0px rgba(255, 255, 255, .9),
            7px 7px 20px 0px rgba(0, 0, 0, .2),
            4px 4px 5px 0px rgba(0, 0, 0, .3);
        border: 1px solid #ccc;
        position: relative;
        margin-bottom: 20px;
        width: 100%;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    }


    .input_copy .icon {
        display: block;
        max-width: 25px;
        cursor: pointer;
        float: right;
    }

    .input_copy .icon img {
        max-width: 25px;
    }

    .input_copy .txt {
        width: 80%;
        display: inline-block;
        overflow: hidden;
    }


    /* click animation */

    .flashBG {
        animation-name: flash;
        animation-timing-function: ease-out;
        animation-duration: 1s;
    }

    @keyframes flash {
        0% {
            background: #28a745;
        }

        100% {
            background: transparent;
        }
    }
</style>
@endsection
@section('content')
<section>
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8 col-xl-7 col-xxl-6 mt-2">
                <h1 class="fs-2 fs-sm-3 fs-md-4">Get HTTPS and Socks5 proxy IP</h1>
                <div class="header_divider"></div>
            </div>
        </div>
        <div id="InfoBanner" class="w-100" style="">
            <span class="reversed reversedRight">
                <span>
                    &#9888;
                </span>
            </span>
            <span class="reversed reversedLeft">
                Warning ! <span class="warning-msg">Selected Fields are Required.</span>
            </span>
        </div>
        <div class="row flex-center mt-8 selected-section">
            <div class="col-md-3 service d-none">
                <select id="service" placeholder="Choose a type..." autocomplete="off">
                    <option value="" disabled selected>Choose a type...</option>
                    <option value="HTTPS">HTTPS</option>
                    <option value="SOCKS5">SOCKS5</option>
                </select>
            </div>
            <div class="col-md-3 location d-none">
                <select id="location" placeholder="Select a country..." autocomplete="off">
                    <option value="" disabled selected>Select a country...</option>
                    @foreach($locations as $location)
                    <option value="{{ $location->country_code }}" data-proxyId="{{ $location->proxy_id }}">
                        {{$location->country_code}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3 timepriod d-none">
                <select id="timepriod" placeholder="Select a time period..." autocomplete="off">
                    <option value="" disabled selected>Select a time period...</option>
                    <option value="1 week">1 Week</option>
                    <option value="2 weeks">2 Weeks</option>
                    <option value="1 month">1 Month</option>
                    <option value="2 months">2 Months</option>
                    <option value="3 months">3 Months</option>
                    <option value="6 months">6 Months</option>
                    <option value="9 months">9 Months</option>
                    <option value="12 months">12 Months</option>
                </select>
            </div>
            <div class="col-md-3 count_proxy d-none">
                <select id="count_proxy" placeholder="Select proxy items..." autocomplete="off">
                    <option value="" disabled selected>Select proxy items...</option>
                    @for ($i = 1; $i <= 5; $i++) <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                </select>
            </div>
            <div class="row">
                <div class="col-md-12 mt-5 accepectedText IP-and-Port-Section d-none">
                    <div class="alert alert-success border-2 d-flex align-items-center" role="alert">
                        <p class="mb-0 flex-1 px-10">
                            <strong class="text-center m-auto">
                                Your Expected IP</strong>
                        </p>
                    </div>
                </div>
                <div id="tableExample2" class="IP-and-Port-Section d-none">
                    <div class="table-responsive scrollbar">
                        <table class="table table-bordered table-striped fs--1 mb-0">
                            <thead class="bg-200 text-900">
                                <tr>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>Ip Address</th>
                                    <th>Port</th>

                                </tr>
                            </thead>
                            <tbody class="list">
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-12 mt-3 accepectedText">
                    <button class="custom-btn w-25 m-3 getProxyBtn" disabled type="button">GET PROXY</button>
                    <button class="custom-btn w-25 m-3 resetProxyBtn d-none" type="button">RESET</button>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
    var getService = "";
    var getLocation = "";
    var getSelectPeriod = "";
    var getCountProxy = "";
    var flagSendBackend = true;

    // selected
    var serviceSelectTom = "";
    var locationSelectTom = "";
    var timeSelectTom = "";
    var countProxySelectTom = "";




    $(document).ready(function() {
        checkUserLimitIpProxyPerDay();
        handleService();
        handleLocation();
        handleTimepriod();
        handleCountProxy();
        handle();
        handleTomSelect();
        getProxyBtn();
        handleCopyIcon();
    });

    function handleTomSelect(){
        locationSelectTom = new TomSelect("#location",{
            create: false,
            sortField: {
                field: "text",
                direction: "asc"
            }
        });
        $('.location').removeClass('d-none');
       serviceSelectTom = new TomSelect("#service",{
            create: false,
            sortField: {
                field: "text",
                direction: "asc"
            }
        });
        $('.service').removeClass('d-none');
       timeSelectTom = new TomSelect("#timepriod",{
            create: false,
            sortField: {
                field: "text",
                direction: "asc"
            }
        });
        $('.timepriod').removeClass('d-none');

       countProxySelectTom = new TomSelect("#count_proxy",{
            create: false,
            sortField: {
                field: "text",
                direction: "asc"
            }
        });
        $('.count_proxy').removeClass('d-none');
    }

    function handleService(){
        $("#service").on("change", function() {
            getService = $(this).val();
            handle();
        });
    }

    function handleLocation(){
        $("#location").on("change", function() {
            getLocation = $(this).val();
            handle();
        });
    }
    function handleTimepriod(){
        $("#timepriod").on("change", function() {
            getSelectPeriod = $(this).val();
            handle();
        });
    }

    function handleCountProxy(){
        $("#count_proxy").on("change", function() {
            getCountProxy = $(this).val();
            handle();
        });
    }


    function handleCopyIcon(){
        $(document).on("click",".fa-copy", function() {
            var copyText = $(this).parent().find("span").text();
            var $temp = $("<input>");
            $("body").append($temp);
            $temp.val(copyText).select();
            document.execCommand("copy");
            $temp.remove();
            $(this).removeClass("fa fa-copy").addClass("fas fa-check");
            // $(this).parent().find(".copyIconUsername").html('<i class="fas fa-check"></i>');
            toastr.info("USERNAME copied successfully!");
        });       
    }

    function handle(){
        if(getService && getLocation && getSelectPeriod && getCountProxy){
            $(".getProxyBtn").removeAttr('disabled');
            $("#InfoBanner").addClass("d-none");
        }else{
            $(".getProxyBtn").attr('disabled', 'disabled');
            $("#InfoBanner").removeClass("d-none");
        }
    }


    function getProxyBtn(){

        var html = "";
        $(".getProxyBtn").on("click", function() {
        let data = {
        service: getService,
        location: getLocation,
        time: getSelectPeriod,
        time_count: getCountProxy
        }
        
        axios.post("/proxy/get",data)
        .then(function (response) {
            let data = response.data.data;
            $(".list").html("");
            data.forEach(element => {
                
                html = `
                        <tr>
                            <td><span>${element.username}</span> <i class="fa fa-copy"></i></td>
                            <td><span>${element.password}</span> <i class="fa fa-copy"></i></td>
                            <td><span>${element.proxy_address}</span> <i class="fa fa-copy"></i></td>
                            <td><span>${element.port}</span> <i class="fa fa-copy"></i></td>
                        </tr>
                `;
                $(".list").append(html);
            });
            $(".IP-and-Port-Section").removeClass("d-none");
            $(".getProxyBtn").addClass("d-none");
            $(".resetProxyBtn").removeClass("d-none");
            handleResetBtn();
        });
        });
    }


    function handleResetBtn(){
        $(".resetProxyBtn").on("click", function() {
            $(".IP-and-Port-Section").addClass("d-none");
            $(".getProxyBtn").removeClass("d-none");
            $(".resetProxyBtn").addClass("d-none");
            flagSendBackend = true;
            // reset tom select
            locationSelectTom.clear();
            locationSelectTom.clear();
            $(".list").html("");
            handle();
        });
    }




    function checkUserLimitIpProxyPerDay(){
        axios.get('/proxy/check-per-day')
        .then(function (response) {
            if(response.data.data > 10){
                $(".getProxyBtn").attr('disabled', 'disabled');
                $(".warning-msg").html("You have reached your daily limit of IP proxies. Please try again tomorrow.");
                $(".getProxyBtn").addClass("d-none");
                $(".selected-section").addClass("d-none");
            }else{
                $(".getProxyBtn").removeAttr('disabled');
                $(".getProxyBtn").removeClass("d-none");
                $(".selected-section").removeClass("d-none");
            }
        });
    }

</script>
@endsection