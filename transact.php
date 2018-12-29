<?php
session_start();
require_once"functions.php";

if (isset($_REQUEST['action'])) {
    
  switch ($_REQUEST['action']) {
    
    
    case 'Login':
    
         $error = array();
        
         $validate= new Validator($_POST);
         $validate->validate_index(); 
        
         if($validate->getIsValid()){
            $db=new Database('localhost','christ4life','','cancer');
            $db->connect();
            $result=$db->select($_POST,'user_info_table');
            if(mysqli_num_rows($result)==1){
                $row=mysqli_fetch_assoc($result);
                $_SESSION['access_level']=$row['access_level'];
                $_SESSION['login_id']=$_POST['login_id'];
                $_SESSION['login']=1;
                header('location:index.php');
            }else{
                $my_error='Invalid Login Id/Password';
                header("location:login.php?my_error=$my_error");
              }
       
         }else{
             $error=$validate->getError();
             foreach($error as $a=>$b){
                   $my_error.=$b;
                   $my_error.="<br>";
              }
            $my_error=urlencode($my_error);     
            header("location:login.php?my_error=$my_error");
           }  
 
    break;
 


    case 'Complete Registration':
            
         $error = array();
        
         $validate= new Validator($_POST);
         $validate->validate_signup(); 
        
         if($validate->getIsValid()){
           $db=new Database('localhost','christ4life','','cancer');
           $db->connect();
           $save=$db->insert($_POST,'user_info_table');
           $db->update(array('login_id'=>$_POST['login_id']),array('login_id'=>$_SESSION['session']),'image_table'); 
                if($save){
                    $error='Account Created Successfully'; 
                    $class='success';
                } else{
                    $error='Error Occured!!!';
                    $class='error';
                    } 
                    
           header("location:signup.php?my_error=$error&class=$class");          
         }else{
             $error=$validate->getError();
             foreach($error as $a=>$b){
                   $my_error.=$b;
                   $my_error.="<br>";                   
               } 
            $my_error=urlencode($my_error);      
            header("location:signup.php?my_error=$my_error");
           } 
 
    break;
    
    
    case'Logout':
    session_destroy();
    header('location:index.php');
    break;
    
    
    case 'Upload Image':
            
            $validate=new Validator($_FILES);
            $validate->image();
            if($validate->getIsValid()){
                $dir = 'D:\xampp\htdocs\erosion management system\image';
                $upload=new Upload($_FILES,$dir,'image_table');
                $upload->image();
                $db=new Database('localhost','christ4life','','cancer');
                $db->connect();
                $session=session_id();
    		    $_SESSION['session']=$session;
                $db->insert(array('login_id'=>$session),'image_table');
                $image_id=$db->insert_id();
                $upload->save($image_id);
                header("location:signup.php?image_id=$image_id");
                            
            }else{
                 $error=$validate->getError();
                 foreach($error as $a=>$b){
                       $my_error.=$b;
                       $my_error.="<br>";                   
                   }                   
                $my_error=urlencode($my_error);      
                header("location:signup.php?my_error=$my_error");
              }

    break;
    
    
    
    case "Drop Suggestion":
        	$error = array();
                       
            $validate= new Validator($_POST);
            $validate->validate_article();            
            
            if($validate->getIsValid()){
             $login_id = $_SESSION['login_id'];
             
             $date=date('d M Y @ h: i: s', strtotime('now'));   
              
             $db=new Database('localhost','christ4life','','cancer');
             $db->connect();
             $save=$db->insert(array('login_id'=>$login_id,'submit_date'=>$date,'article_text'=>$_POST['article_text']),'article');   
                    
                    if(isset($_FILES['photo']['tmp_name']) and !empty($_FILES['photo']['tmp_name'])) {
                            $validate=new Validator($_FILES);
                            $validate->image();
                            if($validate->getIsValid()){
                                $dir = 'D:\xampp\htdocs\erosion management system\image1';
                                $upload=new Upload($_FILES,$dir,'image_table2');
                                $upload->image();                                                          
                                $image_id=$db->insert_id();
                                $db->insert(array('image_id'=>$image_id),'image_table2');
                                $upload->save($image_id);
                                                                        
                            }else{
                                 $error=$validate->getError();
                                 foreach($error as $a=>$b){
                                       $my_error.=$b;
                                       $my_error.="<br>";                   
                                   }                   
                                $my_error=urlencode($my_error);      
                                header("location:forum.php?my_error=$my_error");
                              }
                                         
                     
                    }
                    
                    
               if($save){
                    $error='Suggestion Submitted Successfully'; 
                    $class='success';
                } else{
                    $error='Error Occured!!!';
                    $class='error';
                    } 
             
                header("location:forum.php?my_error=$error&class=$class");  
            } else{
               $error=$validate->getError();
              
               foreach($error as $a=>$b){
                   $my_error.=$b;
                   $my_error.="<br>"; 
                }
                    $my_error=urlencode($my_error);      
                    header("location:forum.php?my_error=$my_error");
             
             }
            
           
    break;
    
    
    
    case "Submit_Comment":
        	$error = array();
        
            $validate= new Validator($_POST);
            $validate->validate_comment();            
            $article_id=$_POST['article_id'];
            if($validate->getIsValid()){
             $login_id = $_SESSION['login_id'];
             
             
             $date=date('d M Y @ h: i: s', strtotime('-2 hours'));   
              
             $db=new Database('localhost','christ4life','','cancer');
             $db->connect();
             $save=$db->insert(array('login_id'=>$login_id,'comment_date'=>$date,'comment_text'=>$_POST['comment_text'],'article_id'=>$_POST['article_id']),'comments');   
                                              
                if($save){
                    $error='Comment Submitted Successfully'; 
                    $class='success';
                } else{
                    $error='Error Occured!!!';
                    $class='error';
                    } 
             
               header("location:comment.php?my_error=$error&class=$class&article_id=$article_id");  
            }else{
               $error=$validate->getError();
              
               foreach($error as $a=>$b){
                   $my_error.=$b;
                   $my_error.="<br>"; 
                }
                    $my_error=urlencode($my_error);      
                    header("location:comment.php?my_error=$my_error&article_id=$article_id");
             
             }
            
           
    break;
            
            
            
    case 'Update Image':
            
             if(isset($_FILES['photo']['tmp_name']) and !empty($_FILES['photo']['tmp_name'])) {
                $validate=new Validator($_FILES);
                $validate->image();
                if($validate->getIsValid()){
                    $dir = 'D:\xampp\htdocs\erosion management system\image';
                    $upload=new Upload($_FILES,$dir,'image_table');
                    $upload->image();
                    $db=new Database('localhost','christ4life','','cancer');
                    $db->connect();
                    $db->delete(array('login_id'=>$_POST['login_id']),'image_table');
                    $db->insert(array('login_id'=>$_POST['login_id']),'image_table');
                    $image_id=$db->insert_id();
                    $upload->save($image_id);
                    header("location:signup.php?image_id=$image_id&login_id=".$_POST['login_id']);
                                
                }else{
                     $error=$validate->getError();
                     foreach($error as $a=>$b){
                           $my_error.=$b;
                           $my_error.="<br>";                   
                       }                   
                    $my_error=urlencode($my_error);      
                    header("location:signup.php?my_error=$my_error&login_id=".$_POST['login_id']);
                  }
              }  else{
                    die('No file found');
                   }  
            
    break;	  
     
   
    case 'Update_Information':
            
        $error = array();
        
         $validate= new Validator($_POST);
         $validate->validate_update(); 
        
         if($validate->getIsValid()){
           $db=new Database('localhost','christ4life','','cancer');
           $db->connect();
           $save=$db->update($_POST,array('login_id'=>$_POST['login_id']),'user_info_table');
           
           header('location:admin.php');   
         }else{
             $image_id=$_POST['image_id'];
             $error=$validate->getError();
             foreach($error as $a=>$b){
                   $my_error.=$b;
                   $my_error.="<br>";                   
               } 
            $my_error=urlencode($my_error);      
            header("location:signup.php?my_error=$my_error&login_id=$login_id&image_id=$image_id");
           } 
 
    break; 
   
   
   default:
            header('Location:index.php');
   break;
   
   
   
  }    
}

?>