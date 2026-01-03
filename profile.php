<?php
require_once"vulconfig.php";
session_start();
$id=$_SESSION["id"];


$qry4=mysqli_query($conn, "select * from profiles_table where profile_id='$id'") or die(mysqli_error());
$res4=mysqli_fetch_object($qry4);
$date= $res4->dob;
$date=date('d/m/Y',strtotime($date));
?>
<table class="r">
<tr>
<td>Name</td>
<td>:</td>
<td><?=$res4->profile_name;?></td>
</tr>

<tr>
<td>Email</td>
<td>:</td>
<td><?php echo $res4->email;?></td>
</tr>



<tr>
<td>Profile Picture</td>
<td>:</td>
<td><img src="<?php echo $res4->image_url;?>" width="40px" height="40px"></td>
</tr>

<tr>
<td>Contact</td>
<td>:</td>
<td><?php echo $res4->contact;?></td>
</tr>
<tr>
<td>Date of Birth</td>
<td>:</td>
<td><?php echo $date;?></td>
</tr>
<tr>
<td>Gender</td>
<td>:</td>
<td><?php echo $res4->gender;?></td>
</tr>
<tr>


</table>
</div>