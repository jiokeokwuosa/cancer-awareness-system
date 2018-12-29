<?php 
include'header.php';
?>
<center>
<div id="form1div"><form action="transact.php" method="post">
<fieldset>
<legend class="zz"><strong>User Login</strong></legend>
<table>
<tr>
<th colspan="2" class="zz">Already a Member? Login</th></tr>
<tr>
<td style="text-align:left;"class="zz">Login Id:</td>
<td style="text-align:left;"><input type="text" name="login_id" placeholder="Enter Login Id" size="20"></td>
</tr>
<tr>
<td style="text-align:left;"class="zz">Password:</td>
<td style="text-align:left;"><input type="password" name="password" placeholder="Enter Password" size="20"></td>
</tr>
<tr>
<td class="" colspan="2"><input type="submit"  name="action" value="Login" style="font-weight: bolder;"><input type="reset" value="Reset Form" name="reset"style="font-weight: bolder;"></td>
</tr>
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

</table>
</fieldset>
</form>
<p class="e"><small>&lt;&lt;Go back to HomePage? <a href="index.php">  Click Here!</a></small></p>

</div>
</center>

<?php include'footer.php';?>