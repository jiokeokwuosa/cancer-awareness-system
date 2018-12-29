<?php 
include'header.php';
require_once"functions.php";

if(! isset($_GET['login_id'])){
?>

<script>
$(document).ready(function() {
alert('Please First Upload Image');
});
</script>

<?php }?>
<div id="form2div">
<?php
if(isset($_GET['my_error']) and !empty($_GET['my_error'])){
     $myError=$_GET['my_error'];
     if(isset($_GET['class']) and $_GET['class']=='success'){
          echo "<span class=success><center><small>$myError</small></center></span>";
     }else{
          echo "<span class=error><center><small>$myError</small></center></span>"; 
        }
}
?>

<form action="transact.php" method="post"enctype="multipart/form-data">
<?php
require_once"functions.php";
if(isset($_GET['login_id'])){
    $db=new Database('localhost','christ4life','','cancer');
    $db->connect(); 
    $result=$db->select(array('login_id'=>$_GET['login_id']),'user_info_table'); 
    $row=mysqli_fetch_assoc($result);
    extract($row);
  
}else{
    $login_id='';
    $first_name='';
    $last_name='';
    $email='';
    $gender='';
    $marital_status='';
    $phone_number='';
    $address='';
    $state=''; 
  }
?>



 
<table>
<tr>
<td colspan="3" style="text-align:center;border-radius:14px 14px 0px 0px;" class="b"><b><?php if(empty($_GET['login_id'])){echo'Register Now';
		} else{echo 'Modify Account';}?> </b></td>
</tr>

<tr>
<td style="text-align:left;" class="a">Login Id:</td>
<td style="text-align:left;"><input type="text" name="login_id"size="30" value="<?php echo htmlspecialchars($login_id);?>"></td>
<td rowspan="6" style="border-style:solid;"width="180" height="181">
			<?php 
			 if(isset($_GET['image_id'])){echo '<img src="image/'.$_GET['image_id'].'.jpg'.'"height="200"width="190"></td></tr>';}
			 else{echo'<div style="color:red;"><small><i>Please upload image first</i></small></div>';}?> </tr>



<tr>
<td style="text-align:left;"class="a">First Name: </td>
<td style="text-align:left;"><input type="text" name="first_name"size="30"value="<?php echo htmlspecialchars($first_name);?>"/></td>
</tr>

<tr>
<td style="text-align:left;"class="a">Last Name: </td>
<td style="text-align:left;"><input type="text" name="last_name"size="30"value="<?php echo htmlspecialchars($last_name);?>"/></td>
</tr>  
   
<tr>
<td style="text-align:left;"class="a">Email Address: </td>
<td style="text-align:left;"><input type="text" name="email"size="30"value="<?php echo htmlspecialchars($email);?>"/></td></tr>

<?php if(empty($_GET['login_id'])){ ?>
<tr>
<td style="text-align:left;"class="a">Password:</td>
<td style="text-align:left;"><input type="password" name="password"size="30"/></td> </tr>

<tr>
<td style="text-align:left;"class="a"> Confirm Password:</td>
<td style="text-align:left;"><input type="password" name="password1"size="30"/></td> </tr>
<?php 
}?> 

<tr>
<td style="text-align:left;"class="a">Gender:</td>
<td style="text-align:left;"><select name="gender">
<option value="Male" <?php if ($gender=='Male'){
echo 'selected="selected"';
					}?>>Male</option>
<option value="Female" <?php if ($gender=='Female'){
echo 'selected="selected"';
					}?>>Female</option>
</select></td></tr>

<tr>
<td style="text-align:left;"class="a">Marital Status:</td>
<td style="text-align:left;"><select name="marital_status">
<option value="Single" <?php if ($marital_status=='Single'){
echo 'selected="selected"';
					}?>>Single</option>
<option value="Married" <?php if ($marital_status=='Married'){
echo 'selected="selected"';
					}?>>Married</option>
<option value="Divorced" <?php if ($marital_status=='Divorced'){
echo 'selected="selected"';
					}?>>Divorced</option>
</select></td></tr>

<tr>
<td style="text-align:left;"class="a">Phone Number: </td>
<td style="text-align:left;"><input type="text" name="phone_number"size="30" placeholder="Enter Phone Num" value="<?php echo htmlspecialchars($phone_number);?>"></td></tr>

<tr>
<td style="text-align:left;"class="a">Address: </td>
<td style="text-align:left;"><input type="text" name="address"size="30" placeholder="Enter Address" value="<?php echo htmlspecialchars($address);?>"></td></tr>

<tr>
<td style="text-align:left;"class="a">State: </td>
<td style="text-align:left;"><input type="text" name="state"size="30" placeholder="State" value="<?php echo htmlspecialchars($state);?>"></td></tr>
<?php  if(isset($_SESSION['access_level']) and $_SESSION['access_level']>1){
?>
<tr>
<td style="text-align:left;"class="a">Access Level: </td>
<td style="text-align:left;"><input type="text" name="access_level"size="30" placeholder="Access_level" value="<?php echo htmlspecialchars($access_level);?>"></td></tr>
<?php 
}?>

<?php if(empty($_GET['login_id'])) {?>
<tr>
<td style="text-align:left;"class="a" colspan="3">Upload Image:<input type="file" name="photo"/>
<input type="submit" name="action" value="Upload Image"style="font-weight: bolder;"/></td></tr>
			
<tr>
<td style="text-align:center;" colspan="3"><input type="submit" name="action" 
value="Complete Registration"style="font-weight: bolder;"/></td></tr>
<?php  }else if($_SESSION['access_level']>1){
		echo'<tr><td style="text-align:left;" class=a colspan="3">Update Image<input type="file" name="photo"style="font-weight: bolder;">
		<input type="hidden" name="login_id" value='.$login_id.'>'.
		'<input type="submit" name="action" value="Update Image"style="font-weight: bolder;">
		</td></tr>';
	    echo'<input type="hidden" name="image_id" value='.$_GET['image_id'].'>';
		echo'<tr><td style="text-align:center;" class=a colspan="2"><input type="submit" name="action"value="Update_Information" 
		style="font-weight: bolder;">
		</td></tr>';} ?>
<tr>
<td colspan="3" style="text-align:center;"><p class="e"><small>&lt;&lt;Go back to HomePage? <a href="index.php">  Click Here!</a></small></p></td>
</tr>
</table>
</form>

</div>

<?php include'footer.php';?>
