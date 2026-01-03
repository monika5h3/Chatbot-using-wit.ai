<?php
// require_once "database/functions.php";

?>
<!DOCTYPE html>
<html dir="ltr" lang="en">


<!-- Mirrored from themedesigner.in/demo/adminbite/html/ltr/app-chats.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 25 Feb 2020 05:05:58 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">a
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/favicon.png">
    <link rel="stylesheet" href="./style.css">
    <title> ChatBOT </title>
    <!-- This page css -->
    <!-- Custom CSS -->
    <link href="./style.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    <style type="text/css">
        .input-focus {
            border-color: rgb(46, 150, 247);
        }
        #main-wrapper[data-layout=vertical] .left-sidebar[data-sidebarbg=skin5], #main-wrapper[data-layout=vertical] .left-sidebar[data-sidebarbg=skin5] ul, #main-wrapper[data-layout=horizontal] .left-sidebar[data-sidebarbg=skin5], #main-wrapper[data-layout=horizontal] .left-sidebar[data-sidebarbg=skin5] ul {
            background: #000e45;
        }
        #main-wrapper[data-layout=vertical] .topbar .top-navbar .navbar-header[data-logobg=skin5], #main-wrapper[data-layout=horizontal] .topbar .top-navbar .navbar-header[data-logobg=skin5] {
            background: #000e45;
        }
    </style>
    <script src="jquery.min.js"></script>
    <script type="text/javascript">
        // $("#ques").keypress(function(event){
        //     // var a = $("#ques").val();
        //     alert(event);
        //     // var keycode = (event.keyCode ? event.keyCode : event.which);
        //     // if(keycode == '13'){

        //     //     bot_ai(); 
        //     // }
        // });

        // window.setInterval(function() {
        //getlatestsearch(); /// call your function here
        // }, 3000);

        function getlatestsearch() {

            $.ajax({
                url: "ajax_latest_search.php",
                type: "GET",
                data: {},
                success: function(e) {
                    //$('#display_chat').html(e);
                    // alert(e);
                    if (e != '') {
                        bot_ai(e);
                    }
                }
            });
        }


        function getbranch() {


            // document.getElementById("form_submit").submit();

            var ques = document.getElementById('ques1').value;

            if ($('#new_id1').length != '') {
                var intent1 = document.getElementById("new_id1").value;
                var branch1 = document.getElementById("branch1").value;
                var sem1 = document.getElementById("sem1").value;
                if (branch1 != '' && sem1 != '') {
                    $.ajax({
                        url: "ajax_reply_bot.php",
                        type: "POST",
                        data: {
                            'new_int': intent1,
                            'branch': branch1,
                            'sem': sem1,
                            'ques': ques
                        },
                        success: function(e) {
                            $('#display_chat').html(e);

                        }
                    });
                }
            }


            if ($('#new_id2').length != '') {
                var intent2 = document.getElementById("new_id2").value;
                var sub1 = document.getElementById("sub1").value;
                var sem2 = document.getElementById("sem2").value;
                if (sub1 != '' && sem2 != '') {

                    $.ajax({
                        url: "ajax_reply_bot.php",
                        type: "POST",
                        data: {
                            'new_int': intent2,
                            'sub1': sub1,
                            'sem': sem2,
                            'ques': ques
                        },
                        success: function(e) {
                            $('#display_chat').html(e);

                        }
                    });
                }
            }


            if ($('#new_id3').length != '') {
                var intent3 = document.getElementById("new_id3").value;
                var sub1 = document.getElementById("sub1_1").value;
                var sub2 = document.getElementById("sub2_1").value;
                var sem2 = document.getElementById("sem2").value;
                if (branch1 != '' && sem1 != '') {

                    $.ajax({
                        url: "ajax_reply_bot.php",
                        type: "POST",
                        data: {
                            'new_int': intent3,
                            'sub1': sub1,
                            'sem2': sem1,
                            'sub2': sub2,
                            'ques': ques
                        },
                        success: function(e) {
                            $('#display_chat').html(e);

                        }
                    });
                }
            }
        }

        function bot_ai(question) {
            var ques = '';
            if (question != '') {
                ques = question;
            } else {
                ques = document.getElementById('ques').value;
            }
            // alert(ques);
            if (ques != '') {
                $.ajax({
                    url: "search_api_bot.php",
                    type: "POST",
                    dataType: "json",
                    data: {
                        'ques': ques
                    },
                    beforeSend: function() {

                        $("#loader6").show();
                        // $("#save1").attr("disabled", true);
                    },
                    success: function(e) {
                        console.log(e);
                        // alert(JSON.stringify(e));
                        $("#loader6").hide('');
                        if (e.object1 != '' && e.object1 != null) {
                            var object1 = e.object1;
                            // alert(object1);
                            $("#obj1").val(object1);
                        }
                        if (e.object2 != '' && e.object2 != null) {
                            var object2 = e.object2;
                            // alert(object2);
                            $("#obj2").val(object2);
                            // var object2 = e.object2;
                        }
                        if (e.object3 != '' && e.object3 != null) {
                            var object3 = e.object3;
                            // alert(object3);
                            $("#obj3").val(object3);
                            // var object3 = e.object3;
                        }
                        if (e.object4 != '' && e.object4 != null) {
                            var object4 = e.object4;
                            // alert(object3);
                            $("#obj4").val(object4);
                            // var object3 = e.object3;
                        }
                        if (e.intent != '' && e.intent != null) {
                            var intent = e.intent;
                            // alert(intent);
                            $("#intent").val(intent);

                        }


                        obj1 = $("#obj1").val();
                        obj2 = $("#obj2").val();
                        obj3 = $("#obj3").val();
                        obj4 = $("#obj4").val();
                        intent = $("#intent").val();

                        $.ajax({
                            url: "ajax_reply_bot.php",
                            type: "POST",
                            data: {
                                'obj4': obj4,
                                'obj3': obj3,
                                'obj2': obj2,
                                'obj1': obj1,
                                'intent': intent,
                                'ques': ques
                            },
                            success: function(e) {
                                // alert(e);
                                $('#display_chat').append(e);
                                $("#obj1").val('');
                                $("#obj2").val('');
                                $("#obj3").val('');
                                $("#obj4").val('');
                                $("#intent").val('');
                                $("#ques").val('');

                                var element = document.getElementById('div');
                                element.scrollTop = element.scrollHeight;
                            }
                        });

                    }
                });
            } else {
                $('#ques').focus();
                alert("Type Your Question");
            }

        }
    </script>
</head>

<body>

    <div class="preloader" id='reload'>
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>

    <div id="main-wrapper">

        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                        <i class="ti-menu ti-close"></i>
                    </a>

                    <a class="navbar-brand" href="" style="justify-content: center;">
                        <b class="logo-icon">
                            <img src="../../assets/images/logo.png" class="light-logo" alt="homepage" style="width: 150px;" />
                        </b>
                        <span class="logo-text"></span>
                    </a>

                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="ti-more"></i>
                    </a>
                </div>

                <div class="navbar-collapse collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav float-left mr-auto">
                        <li class="nav-item d-none d-md-block">
                            <a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar">
                                <i class="sl-icon-menu font-20"></i>
                            </a>
                        </li>

                    </ul>

                </div>
            </nav>
        </header>

        <aside class="left-sidebar">

            <div class="scroll-sidebar">

                <nav class="sidebar-nav">
                    <ul id="sidebarnav">

                        <li>

                            <div class="user-profile dropdown m-t-20">

                                <div class="user-content hide-menu m-t-10">
                                    <h5 class="m-b-10 user-name font-medium">WELCOME USER</h5>
                                </div>
                            </div>

                        </li>

                        <li class="sidebar-item">
                            <a href="feedback_admin.php" class="sidebar-link">
                                <i class="icon-Car-Wheel"></i>
                                <span class="hide-menu"> Feedback to Admin </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="https://www.google.com/" class="sidebar-link">
                                <i class="mdi mdi-email"></i>
                                <span class="hide-menu"> HELP </span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

        </aside>

        <div class="page-wrapper">

            <div class="p-20" id="mess">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Chat Bot</h4>
                        <!-- <div class="chat-box scrollable" style=""> -->
                        <!--chat Row -->
                        <!-- <form method="POST" action=""> -->
                        <input type="hidden" name="obj1" id="obj1" value="">
                        <input type="hidden" name="obj2" id="obj2" value="">
                        <input type="hidden" name="obj3" id="obj3" value="">
                        <input type="hidden" name="obj4" id="obj4" value="">
                        <input type="hidden" name="intent" id="intent" value="">
                        <!-- <input type="submit" name="search" id="search" value="search"> -->
                        <!-- </form> -->
                        <div class="chat-box" style="width:100%;overflow-y: auto;height:calc(100vh - 300px);" id="div">
                            <div style="margin-top: 200px;margin-left: 35%; position: fixed;"> <img src="faculty_images/ajax-loader.gif" id="loader6" style="display: none"></div>
                            <ul class="chat-list">
                                <!--chat Row -->


                                <div id="display_chat">

                                </div>

                            </ul>
                        </div>
                        <!-- </div> -->
                    </div>
                    <!--  <form id="upload-widget" method="post" action="/upload" class="dropzone" style="display: none;">
        <div class="fallback">
            <input name="file" type="file" />
        </div>
    </form> -->
                    <div class="card-body border-top" id="div_hide">
                        <form method="POST" action="" enctype="multipart/form-data" id="form">
                            <div class="row" for="inputGroupFile01">
                                <div class="col-10">
                                    <div class="input-field m-t-0 m-b-0">
                                        <input type="text" class="form-control border-0" placeholder="Type and enter" name="ques" id="ques" value="">
                                    </div>
                                </div>
                                <div class="col-2">

                                    <label>
                                        <button class="btn btn-circle btn-lg btn-cyan text-white" onclick="bot_ai('')" type="button" name="srch" id="srch">
                                            <i class="fas fa-paper-plane"></i>
                                        </button>
                                    </label>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <footer class="footer text-center">
                Developed By CSE(2019-23)th Batch.
                <a href="">Refresh</a>.
            </footer>

        </div>

    </div>

    <div class="chat-windows"></div>
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../../assets/extra-libs/taskboard/js/jquery.ui.touch-punch-improved.js"></script>
    <script src="../../assets/extra-libs/taskboard/js/jquery-ui.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../../assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="../../assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <script src="../../dist/js/app.min.js"></script>
    <script src="../../dist/js/app.init.js"></script>
    <script src="../../dist/js/app-style-switcher.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="../../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="../../assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="../../dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="../../dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../../dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <script src="../../dist/js/dropzone.min.js"></script>
    <!--This dropzone JavaScript -->
    <script>


    </script>
</body>


<!-- Mirrored from themedesigner.in/demo/adminbite/html/ltr/app-chats.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 25 Feb 2020 05:05:58 GMT -->

</html>


?>