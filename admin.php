<?php
ob_start();
require_once'header.php';

if($_SESSION['login'] !=1){
   header('location:index.php');
}

require_once"functions.php";


$db=new Database('localhost','christ4life','','cancer');
        $db->connect();
        $result=$db->select(array(),'access_level');
        $privileges=array();
        
        while($row=mysqli_fetch_assoc($result)){
            $privileges[$row['access_level']]=$row['access_name'];    
        }
        echo'<h2>User Administration</h2>';
        $limit=count($privileges);
        
        for($i=1; $i<=$limit; $i++){
         	echo'<h3 class="align">'.$privileges[$i].'</h3>'; 
           $result1=$db->select(array('access_level'=>$i),'user_info_table'); 
           if(mysqli_num_rows($result1)==0){
    			echo'<p><strong>There are no '.$privileges[$i].' accounts registered</strong></p>';
            } else{
                   echo'<ul style="text-align:left;">';
                        while($row=mysqli_fetch_assoc($result1)){
                          extract($row);
                          $result2=$db->select(array('login_id'=>$login_id),'image_table'); 
                          $row2=mysqli_fetch_assoc($result2);
                          $image_id=$row2['image_id'];
                          
                              if($_SESSION['login_id']==$login_id){
        						  echo'<li>'.htmlspecialchars(ucwords(strtolower($last_name))).' '.htmlspecialchars(ucwords(strtolower($first_name))).'</li>';	
        					   }else{
        							  echo'<li><a href="signup.php?login_id='.$login_id.'&image_id='.$image_id.'">'
        							  .htmlspecialchars(ucwords(strtolower($last_name))).' '.htmlspecialchars(ucwords(strtolower($first_name))).
        							  '</a>
        							  </li>';    
    	    	                  }
                          
                          
                          
                        }
                }       echo'</ul>';
            
        }




?>