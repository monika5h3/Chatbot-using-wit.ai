<?php
require_once("config.php");
require_once "functions.php";
error_reporting(0);
session_start();
if (isset($_POST["save"])) {
    $username = $_POST["adm_name"];
    $password = $_POST["pass"];
    $qry1 = mysqli_query($conn, "select * from security where user_name='$username' and password='$password'") or die(mysqli_error());
    $res1 = mysqli_num_rows($qry1);
    $qry1_fetch = mysqli_fetch_object($qry1);
    $id = $qry1_fetch->security_id;
    $_SESSION['id'] = $id;
    if ($username == "") {
        $message = "plese enter valied user name";
    } else if ($res1 == 1) {
        header("location:admin_bot_new.php");
    } else {
        $message = "wrong password";
    }
}
?>
<!-- ----//end--------- -->

<!-- ---------style-start--------------- -->
<style>
    @import url(https://fonts.googleapis.com/css?family=Open+Sans);

    .btn {
        display: inline-block;
        *display: inline;
        *zoom: 1;
        padding: 4px 10px 4px;
        margin-bottom: 0;
        font-size: 13px;
        line-height: 18px;
        color: #333333;
        text-align: center;
        text-shadow: 0 1px 1px rgba(255, 255, 255, 0.75);
        vertical-align: middle;
        background-color: #f5f5f5;
        background-image: -moz-linear-gradient(top, #ffffff, #e6e6e6);
        background-image: -ms-linear-gradient(top, #ffffff, #e6e6e6);
        background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#ffffff), to(#e6e6e6));
        background-image: -webkit-linear-gradient(top, #ffffff, #e6e6e6);
        background-image: -o-linear-gradient(top, #ffffff, #e6e6e6);
        background-image: linear-gradient(top, #ffffff, #e6e6e6);
        background-repeat: repeat-x;
        filter: progid:dximagetransform.microsoft.gradient(startColorstr=#ffffff, endColorstr=#e6e6e6, GradientType=0);
        border-color: #e6e6e6 #e6e6e6 #e6e6e6;
        border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
        border: 1px solid #e6e6e6;
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        border-radius: 4px;
        -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
        -moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
        box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
        cursor: pointer;
        *margin-left: .3em;
    }

    .btn:hover,
    .btn:active,
    .btn.active,
    .btn.disabled,
    .btn[disabled] {
        background-color: #e6e6e6;
    }

    .btn-large {
        padding: 9px 14px;
        font-size: 15px;
        line-height: normal;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
    }

    .btn:hover {
        color: #333333;
        text-decoration: none;
        background-color: #e6e6e6;
        background-position: 0 -15px;
        -webkit-transition: background-position 0.1s linear;
        -moz-transition: background-position 0.1s linear;
        -ms-transition: background-position 0.1s linear;
        -o-transition: background-position 0.1s linear;
        transition: background-position 0.1s linear;
    }

    .btn-primary,
    .btn-primary:hover {
        text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
        color: #ffffff;
    }

    .btn-primary.active {
        color: rgba(255, 255, 255, 0.75);
    }

    .btn-primary {
        background-color: #4a77d4;
        background-image: -moz-linear-gradient(top, #6eb6de, #4a77d4);
        background-image: -ms-linear-gradient(top, #6eb6de, #4a77d4);
        background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#6eb6de), to(#4a77d4));
        background-image: -webkit-linear-gradient(top, #6eb6de, #4a77d4);
        background-image: -o-linear-gradient(top, #6eb6de, #4a77d4);
        background-image: linear-gradient(top, #6eb6de, #4a77d4);
        background-repeat: repeat-x;
        filter: progid:dximagetransform.microsoft.gradient(startColorstr=#6eb6de, endColorstr=#4a77d4, GradientType=0);
        border: 1px solid #3762bc;
        text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.4);
        box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.5);
    }

    .btn-primary:hover,
    .btn-primary:active,
    .btn-primary.active,
    .btn-primary.disabled,
    .btn-primary[disabled] {
        filter: none;
        background-color: #4a77d4;
    }

    .btn-block {
        width: 100%;
        display: block;
    }

    * {
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        -ms-box-sizing: border-box;
        -o-box-sizing: border-box;
        box-sizing: border-box;
    }

    html {
        width: 100%;
        height: 100%;
        overflow: hidden;
        position: fixed;
    }

    body {
        width: 100%;
        height: 100%;
        font-family: 'Open Sans', sans-serif;

    }

    .login {
        position: absolute;
        top: 50%;
        left: 50%;
        margin: -150px 0 0 -150px;
        width: 300px;
        height: 300px;

    }


    .login h1 {
        color: #fff;
        text-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        letter-spacing: 1px;
        text-align: center;
    }

    input {
        width: 100%;
        margin-bottom: 10px;
        background: rgba(0, 0, 0, 0.3);
        border: 1px solid white;

        padding: 10px;
        font-size: 13px;
        color: #fff;
        text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.3);
        border: 1px solid white;
        border-radius: 4px;
        box-shadow: inset 0 -5px 45px rgba(100, 100, 100, 0.2), 0 1px 1px rgba(255, 255, 255, 0.2);
        -webkit-transition: box-shadow .5s ease;
        -moz-transition: box-shadow .5s ease;
        -o-transition: box-shadow .5s ease;
        -ms-transition: box-shadow .5s ease;
        transition: box-shadow .5s ease;
    }

    input:focus {
        box-shadow: inset 0 -5px 45px rgba(100, 100, 100, 0.4), 0 1px 1px rgba(255, 255, 255, 0.2);
    }

    body {
        height: 100%;
        font-weight: 300;
        /*background-image: url("circuit.png");*/
    }

    body {
        font-family: Arial;
    }

    svg {
        display: block;
        font: 4em 'Montserrat';
        width: 950px;
        height: 250px;
        margin-top: 20px;
    }

    .text-copy {
        fill: none;
        stroke: white;
        stroke-dasharray: 6% 29%;
        stroke-width: 5px;
        stroke-dashoffset: 0%;
        animation: stroke-offset 5.5s infinite linear;
    }

    .text-copy:nth-child(1) {
        stroke: #3E85F7;
        animation-delay: -1;
    }

    .text-copy:nth-child(2) {
        stroke: #EE443A;
        animation-delay: -2s;
    }

    .text-copy:nth-child(3) {
        stroke: #FCBD06;
        animation-delay: -3s;
    }

    .text-copy:nth-child(4) {
        stroke: #3F86F8;
        animation-delay: -4s;
    }

    .text-copy:nth-child(5) {
        stroke: #33A953;
        animation-delay: -5s;
    }

    @keyframes stroke-offset {
        100% {
            stroke-dashoffset: -35%;
        }
    }

    .usr {
        margin-top: 170px;
    }

    .error {
        margin-left: 900px;
    }

    ::placeholder {
        /* Chrome, Firefox, Opera, Safari 10.1+ */
        color: white;
        opacity: 1;
        /* Firefox */
    }
</style>
<!-- ---------//style-end------------------->

<!-- -----html-start--------------------- -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="assets/css/lib/toastr/toastr.min.css" rel="stylesheet">
</head>

<body>
    <div class="background_img" style="width:130%; height:100%;">
        <img src="circuit.png" style="width:78%;height: 100%;margin-left: -10px;">
    </div>

    <div class="main-body">
        <div class="error"><?= $message ?></div>

        <div class="login">

            <form method="POST" action="">

                <h1 style="color: white;font-size: 40px;">LOGIN</h1>

                <input type="text" name="adm_name" placeholder="Username" required="required" class="usr" />
                <input type="password" name="pass" placeholder="Password" required="required" />
                <button type="submit" class="btn btn-primary btn-block btn-large" name="save" id="save" onclick="return check_error()">Let Me In
                </button>
                <!-- <button type="button" class="btn btn-danger m-b-10 m-l-5" id="toastr-danger-top-right">Error</button> -->
            </form>
        </div>
        <div class="title">
            <center>
                <svg viewBox="0 100 960 300" class>
                    <symbol id="s-text">
                        <text text-anchor="middle" x="50%" y="80%">LOGIN</text>
                    </symbol>
                    <g class="g-ants">
                        <use xlink:href="#s-text" class="text-copy"></use>
                        <use xlink:href="#s-text" class="text-copy"></use>
                        <use xlink:href="#s-text" class="text-copy"></use>
                        <use xlink:href="#s-text" class="text-copy"></use>
                        <use xlink:href="#s-text" class="text-copy"></use>
                    </g>
                </svg>
            </center>
        </div>

    </div>
    <!-- ---//html-end--------------- -->
    <script src="assets/js/lib/jquery.min.js"></script>
    <script src="assets/js/lib/jquery.nanoscroller.min.js"></script>
    <!-- nano scroller -->
    <script src="assets/js/lib/menubar/sidebar.js"></script>
    <script src="assets/js/lib/preloader/pace.min.js"></script>
    <!-- sidebar -->
    <script src="assets/js/lib/bootstrap.min.js"></script>
    <!-- bootstrap -->
    <script src="assets/js/lib/toastr/toastr.min.js"></script>
    <!-- scripit init-->
    <script src="assets/js/lib/toastr/toastr.init.js"></script>
    <script type="text/javascript" src="toster.js"></script>
    <script src="assets/js/scripts.js"></script>

</body>