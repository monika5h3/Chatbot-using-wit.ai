<?php
// error_reporting(0);
require_once "database/functions.php";
$ques = $_POST['ques'];
$intent    = $_POST['new_int'];
$branch_id = $_POST['branch'];
$sem_id    = $_POST['sem'];
$object4 = $_POST['obj4'];
$object3 = $_POST['obj3'];
$object1 = $_POST['obj1'];
$object2 = $_POST['obj2'];


$returnMsg = "This information is not available, Please wait for administrator to update new information.";
$returnMsgInfo = "Can i help you with the information regarding any other branch & Semester?";
if ($_POST['intent'] != '') {
    $intent   = $_POST['intent'];
}

// echo $intent . "==" . $branch_id . "==" . $sem_id  . "==" . $object4 . "==" . $object3 . "==" . $object2 . "==" . $object1;

echo "<li class='odd chat-item'>
        <div class='chat-content'>
        <input type='hidden' name='ques1' id='ques1' value='" . $ques . "'>
            <div class='box bg-light-inverse'>" . $ques . "</div>
            <br>
        </div>
      </li>";
echo "<li class='chat-item' id='display_chat1'>";
if ($intent == "") {
    echo '<ul class="chat-list">
                <li class="chat-item">
                    <div class="chat-img">
                        <img src="assets/images/bot.jpg" alt="user" class="rounded-circle img-fluid">
                    </div>
                    <div class="chat-content">
                        <h6 class="font-medium"></h6>
                        <div class="box bg-light-info">';
    echo "Could not understand your question please leave your query in the feedback menu for the admin to get back to you.";
    echo '</div>
                    </div>
                    <div class="chat-time">' . date('h:i a') . '</div>
                </li>';
} else if ($intent == "information" && $object3 == "" && $object4 == "" && $object1 != "college") {
    if ($branch_id == "")
        $branch_id = queryresult($conn, "select branch_id from branch where branch_name='$object1'", 'branch_id');
    if ($sem_id == "")
        $sem_id = queryresult($conn, "select sem_id from semester where sem_name='$object2'", 'sem_id');
    $semQRY = "";
    if ($sem_id != "") {
        $semQRY = " AND sem_id='$sem_id'";
    }
    
    $qryGetInfo = mysqli_query($conn, "SELECT info_details FROM information WHERE status='1' AND branch_id='$branch_id' $semQRY");
    $resGetInfo = mysqli_fetch_object($qryGetInfo);
    echo '<li class="chat-item">
                    <div class="chat-img">
                        <img src="assets/images/bot.jpg" alt="user" class="rounded-circle img-fluid">
                    </div>
                    <div class="chat-content">
                        <h6 class="font-medium"></h6>
                        <div class="box bg-light-info">';
                        
    echo ($resGetInfo->info_details)?$resGetInfo->info_details:$returnMsg;
    echo '</div>
                    </div>
                    <div class="chat-time">' . date('h:i a') . '</div>
                </li>';
    // echo "<form method='POST' action='' id='form_submit'><input type='hidden' name='new_int1' id='new_id1' value='" . $intent . "'><h6>Please select the Branch</h6>";
    // echo "<select class='form-control col-4 input-focus' name='branch1' id='branch1' onchange='getbranch()'>";
    // echo "<option value=''>Select Branch</option>";
    // $getbranches = mysqli_query($conn, "select * from branch where branch_name !='college'");
    // while ($resbranches = mysqli_fetch_object($getbranches)) {
    //     if ($branch_id == $resbranches->branch_id) {
    //         $select = "selected";
    //     } else {
    //         $select = '';
    //     }
    //     echo "<option  value='" . $resbranches->branch_id . "' " . $select . ">" . $resbranches->branch_name . "</option>";
    // }
    // echo "</select><br><br><h6>Please select the Semester</h6>";
    // echo "<select class='form-control col-4 input-focus' name='sem1' id='sem1' onchange='getbranch()'>";
    // echo "<option value=''>Select semester</option>";
    // $getsem = mysqli_query($conn, "select * from semester");
    // while ($resgetsem = mysqli_fetch_object($getsem)) {
    //     if ($sem_id == $resgetsem->sem_id) {
    //         $select_sem = "selected";
    //     } else {
    //         $select_sem = '';
    //     }
    //     echo "<option value='" . $resgetsem->sem_id . "' " . $select_sem . ">" . $resgetsem->sem_name . "</option>";
    // }
    // echo "</select></form>";

    // $branch = queryresult($conn, "select branch_name from branch where branch_id='$branch_id'", 'branch_name') or die(mysqli_error($conn));
    // $branch_sem_id = queryresult($conn, "select branch_sem_id from branch_sem where branch_id='$branch_id' and sem_id='$sem_id'", 'branch_sem_id') or die(mysqli_error($conn));
    // $sem_name      = queryresult($conn, "select sem_name from semester where sem_id='$sem_id'", 'sem_name') or die(mysqli_error($conn));
    // $qry_results   = mysqli_query($conn, "select * from results where branch_sem_id='$branch_sem_id'") or die(mysqli_error($conn));
    // while ($res_results = mysqli_fetch_object($qry_results)) {
    //     echo '<ul class="chat-list">
    //             <li class="chat-item">
    //                 <div class="chat-img">
    //                     <img src="assets/images/bot.jpg" alt="user" class="rounded-circle img-fluid">
    //                 </div>
    //                 <div class="chat-content">
    //                     <h6 class="font-medium"></h6>
    //                     <div class="box bg-light-info">';


    //     $exam_name = queryresult($conn, "select info_details from information where info_id='$res_results->info_id'", 'info_details') . "<br>";
    //     echo "<a href='" . $res_results->description . "'>" . $branch . "&nbsp;&nbsp;&nbsp;" . $exam_name . "&nbsp;&nbsp;&nbsp;" . $sem_name . "</a>";
    //     echo '</div>
    //                 </div>
    //                 <div class="chat-time"></div>
    //             </li>';
    // }
} else if ($intent == "location_details" && $object2 == "" && $object3 == "") {
    $branch_id = queryresult($conn, "select branch_id from branch where branch_name='$object1'", 'branch_id');
    $qryGetLocation = mysqli_query($conn, "SELECT location_details FROM locations WHERE branch_id='$branch_id'");
    $resGetLocation = mysqli_fetch_object($qryGetLocation);
    echo '<li class="chat-item">
                    <div class="chat-img">
                        <img src="assets/images/bot.jpg" alt="user" class="rounded-circle img-fluid">
                    </div>
                    <div class="chat-content">
                        <h6 class="font-medium"></h6>
                        <div class="box bg-light-info">';
                        
    echo '<a href="' . $resGetLocation->location_details . '" target="_blank">' . $object1 . ' Location </a>';
    echo '</div>
                    </div>
                    <div class="chat-time">' . date('h:i a') . '</div>
                </li>';
} else  if ($object1 != "" && $object2 != "" && $object3 != "") {

    $branch_id = queryresult($conn, "select branch_id from branch where branch_name='$object1'", 'branch_id');
    $sem_id = queryresult($conn, "select sem_id from semester where sem_name='$object2'", 'sem_id');
    $exam_id = queryresult($conn, "select exam_id from exam where exam_type='$object3'", 'exam_id');

    $qryGetTT = mysqli_query($conn, "SELECT tt_details FROM timetables WHERE branch_id='$branch_id' AND sem_id='$sem_id' AND exam_id='$exam_id'");
    $resGetTT = mysqli_fetch_object($qryGetTT);
    echo '<li class="chat-item">
                    <div class="chat-img">
                        <img src="assets/images/bot.jpg" alt="user" class="rounded-circle img-fluid">
                    </div>
                    <div class="chat-content">
                        <h6 class="font-medium"></h6>
                        <div class="box bg-light-info">';
                        
    echo ($resGetTT->tt_details)?'<a href="'.$resGetTT->tt_details.'">'.$resGetTT->tt_details.'</a>':$returnMsg;
    echo '</div>
                    </div>
                    <div class="chat-time">' . date('h:i a') . '</div>
                </li>';
} else  if ($intent == "information" && $object4 != "") {

    $branch_id = queryresult($conn, "select branch_id from branch where branch_name='$object1'", 'branch_id');
    $sem_id = queryresult($conn, "select sem_id from semester where sem_name='$object2'", 'sem_id');
    
    if ($object4 == 'subjects' || $object4 == 'faculty') {
        $qryGetSubjects = mysqli_query($conn, "SELECT * FROM subjects s, faculty f WHERE s.status='1' AND f.status='1' AND s.subject_id=f.subject_id AND f.branch_id='$branch_id' AND f.sem_id='$sem_id'");
        $qryCount = mysqli_num_rows($qryGetSubjects);
        echo '<li class="chat-item">
                    <div class="chat-img">
                        <img src="assets/images/bot.jpg" alt="user" class="rounded-circle img-fluid">
                    </div>
                    <div class="chat-content">
                        <h6 class="font-medium"></h6>
                        <div class="box bg-light-info">';
                        
                        if($qryCount > 0){
        while ($resGetSubjects = mysqli_fetch_object($qryGetSubjects)) {
            echo '<b>'. $resGetSubjects->faculty_details .'&nbsp;&nbsp;&nbsp; <br>Subject: '.$resGetSubjects->subject.'</b><br><br>';
        }
    }else{
        echo $returnMsg;
    }
        echo '</div>
                    </div>
                    <div class="chat-time">' . date('h:i a') . '</div>
                </li>';
    } else if ($object4 == 'fee') {
        $qryGetFee = mysqli_query($conn, "SELECT fee_details, year FROM fee WHERE status='1'AND branch_id='$branch_id'") or die(mysqli_error());
        $qryCount = mysqli_num_rows($qryGetFee);
        
        echo '<li class="chat-item">
                    <div class="chat-img">
                        <img src="assets/images/bot.jpg" alt="user" class="rounded-circle img-fluid">
                    </div>
                    <div class="chat-content">
                        <h6 class="font-medium"></h6>
                        <div class="box bg-light-info">';
                        
                        if($qryCount>0){
        while ($resGetFee = mysqli_fetch_object($qryGetFee)) {
            if($resGetFee->year == 1){
                $yearTxt = "1st Year";
            } else if($resGetFee->year == 2){
                $yearTxt = "2nd Year";
            } else if($resGetFee->year == 3){
                $yearTxt = "3rd Year";
            } else if($resGetFee->year == 4){
                $yearTxt = "4th Year";
            } 
            echo '<b>'. $yearTxt . ' - ' .$resGetFee->fee_details . '</b><br>';
        }
    }else{
        echo $returnMsg;
    }
        echo '</div>
                    </div>
                    <div class="chat-time">' . date('h:i a') . '</div>
                </li>';
    } else {

        // still have to work 

        // $subject_id = queryresult($conn, "select subject_id from exam where exam_type='$object4'", 'subject_id');

        // $qryGetTT = mysqli_query($conn, "SELECT tt_details FROM timetables WHERE branch_id='$branch_id' AND sem_id='$sem_id' AND exam_id='$exam_id'");
        // $resGetTT = mysqli_fetch_object($qryGetTT);
        // echo '<li class="chat-item">
        //             <div class="chat-img">
        //                 <img src="assets/images/bot.jpg" alt="user" class="rounded-circle img-fluid">
        //             </div>
        //             <div class="chat-content">
        //                 <h6 class="font-medium"></h6>
        //                 <div class="box bg-light-info">';
        // echo "select exam_id from exam where exam_type='$object3'";
        // echo $resGetTT->TT_details;
        // echo '</div>
        //             </div>
        //             <div class="chat-time">' . date('h:i a') . '</div>
        //         </li>';
    }
} else if ($object1 == "college") {
    echo '<ul class="chat-list">
                <li class="chat-item">
                    <div class="chat-img">
                        <img src="assets/images/bot.jpg" alt="user" class="rounded-circle img-fluid">
                    </div>
                    <div class="chat-content">
                        <h6 class="font-medium"></h6>
                        <div class="box bg-light-info">';
                        
    echo "<iframe src='https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3797.3256418442584!2d83.29357351488322!3d17.870220487790903!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a395ef6fb8b00c3%3A0xf05a9687dfa65d34!2sNadimpalli%20Satyanarayana%20Raju%20Institute%20of%20Technology!5e0!3m2!1sen!2sin!4v1651771269649!5m2!1sen!2sin' width='600' height='450' style='border:0;' allowfullscreen='' loading='lazy' referrerpolicy='no-referrer-when-downgrade'></iframe>";
    echo '</div>
                    </div>
                    <div class="chat-time">' . date('h:i a') . '</div>
                </li>';
} else {
    echo '<ul class="chat-list">
                <li class="chat-item">
                    <div class="chat-img">
                        <img src="assets/images/bot.jpg" alt="user" class="rounded-circle img-fluid">
                    </div>
                    <div class="chat-content">
                        <h6 class="font-medium"></h6>
                        <div class="box bg-light-info">'
                        .$returnMsg.
                        '</div>
                    </div>
                    <div class="chat-time">' . date('h:i a') . '</div>
                </li>';
}

echo " </li>";
