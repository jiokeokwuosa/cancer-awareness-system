<?php   
include'header.php';
require'functions.php';

$article_id=isset($_GET['article_id'])?$_GET['article_id']:'';

echo'<center>';
echo'<div id="main3">';

if(isset($_GET['my_error']) and !empty($_GET['my_error'])){
     $myError=$_GET['my_error'];
     if(isset($_GET['class']) and $_GET['class']=='success'){
          echo "<span class=success><center><small>$myError</small></center></span>";
     }else{
          echo "<span class=error><center><small>$myError</small></center></span>"; 
        }
}

$com=new Article('localhost','christ4life','','cancer');  
$com->connect();
$com->output_story($_GET['article_id']);
?>
<form method="post" action="transact.php">

<table>
<tr>
<th colspan="2" class="dd">Add a Comment</th>
</tr>
<tr>
<td class="a">Comment:</td>
<td><textarea name="comment_text" rows="10" cols="50"></textarea></td><br/>
</tr>
<td></td>
<td><input type="submit" name="action" value="Submit_Comment" style="font-weight:bolder;"/></td>
<input type="hidden" name="article_id" value="<?php   echo $article_id;?>"/>
</table>

</form>
<?php 
$com->show_comments($article_id,FALSE);
echo'</div>';
echo"</center>";
?>

