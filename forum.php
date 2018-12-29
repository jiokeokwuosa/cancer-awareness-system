<?php   
include'header.php';
require_once"functions.php";
echo"<center>";

if(isset($_GET['my_error']) and !empty($_GET['my_error'])){
     $myError=$_GET['my_error'];
     if(isset($_GET['class']) and $_GET['class']=='success'){
          echo "<span class=success><center><small>$myError</small></center></span>";
     }else{
          echo "<span class=error><center><small>$myError</small></center></span>"; 
        }
}
?>

<?php if(isset($_SESSION['login']) and $_SESSION['login']==1){?>
        <div id="main3">
        <h2 style="font-family:verdana;">Welcome to our Discussion Room!!!</h2>
        <form action="transact.php" method="Post" enctype="multipart/form-data">
        <table class="article">
        <tr>
        <td><textarea name="article_text" rows="7" cols="60" placeholder="Enter your text"></textarea></td>
        </tr>
        <tr>
        <td style="text-align:center;">
        <small><strong>Upload pix(optional):</strong></small> <input type="file" name="photo"/>
        <input type="submit" name="action" value="Drop Suggestion" style="font-weight: bolder;"/>
        </td>
        </tr>
        </table>
        </form>
<?php } else{
            echo'<div id="main3">';
            
                                         
          }?>

<?php 
    $article=new Article('localhost','christ4life','','cancer');  
    $article->connect();
    $result=$article->select(array(),'article',array('submit_date'=>'DESC'));
    if(mysqli_num_rows($result)==0){
        echo'<p><strong>There are no updated status</strong></p>';
    }else{
        while($row=mysqli_fetch_array($result)){
           $article->output_story($row['article_id'],true);
        
        }
      }
         
?>
</div>

</div>
</center>