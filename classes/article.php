<?php
require'database.php';
class Article extends Database{
    
    

    function trim_body($text,$max_length=400,$tail='...'){
    $tail_len=strlen($tail);
    	if(strlen($text)> $max_length){
    		$tmp_text=substr($text,0,$max_length-$tail_len);
    //$max_length-$tail_length becos the $tail contains some characters(...)already that will be included in the main text	
    		if(substr($text, $max_length-$tail_len, 1)== ' '){
    //if an empty space is next after the last truncated character
    
    // note use double space not single space
    			$text = $tmp_text;
    		}
    		else{
    //if not then the truncation happened within a word
    			$pos=strrpos($tmp_text,' ');
    // getting the position of the last space
    			$text=substr($text,0,$pos);		
    		}
    		$text = $text.$tail;		
    	}
    	return $text;
    }    
    


    function output_story($article_id, $preview_only=False){
    	if(empty($article_id)){
    		die('Incomplete data');
    	
    	}
         $this->connect();
    	 $result=$this->select(array('article_id'=>$article_id),'article');
              		
    		
    			
    			if($row=mysqli_fetch_assoc($result)){
    				extract($row);
                                        
                   
    		          $result1=$this->select(array('login_id'=>$login_id),'user_info_table');
	    			  $row1=mysqli_fetch_assoc($result1);
       			      $first_name=$row1['first_name'];
       			      $last_name=$row1['last_name'];
                      
    		      
                      $result2=$this->select(array('login_id'=>$login_id),'image_table');
                      $row2=mysqli_fetch_assoc($result2);
            	      $image_id=$row2['image_id'];
                      
                      $result3=$this->select(array('image_id'=>$article_id),'image_table2');
                      if(mysqli_num_rows($result3)>0){
                        $row3=mysqli_fetch_assoc($result3);
                        $image1_id=$row3['image_id'];
                        $exist=true;
                      }
                      
                      if(!$preview_only and isset($exist)){
                      	echo'<table width=100%><tr><td colspan=2><img src="image1/'.$image1_id.'.jpg'.'" width="100%" height="300"style="vertical-align:top;border-radius: 5px 5px 0px 0px"></td></tr></table>';  
                        
                      }
                    echo'<table width=100%>';     				  
        			echo'<tr><td rowspan="3"height="130"width="130"><img src="image/'.$image_id.'.jpg'.'"height="130"width="130" style="float:left; text-align:left; vertical-align:top;border-radius: 5px 0px 0px 0px"></td></tr>';
        			echo'<tr><td style="text-align:justify; border-radius: 5px 5px 5px 5px" class=dd><b>By '.$last_name.' '.$first_name.' on '.$submit_date.' </b></td></tr>';
        			
        		
        			if($preview_only){
        				echo'<tr><td style="text-align:justify;">'.$this->trim_body($article_text).'</td></tr>';
            			echo '<tr><td style="text-align:center;border-radius: 5px 5px 5px 5px" class=dd><a class=me href="view_article.php?article_id='.$article_id .'"> 
            			Read Full Story
            			 </a></td></tr>';
        			} else{
        					echo'<tr><td style="text-align:justify;">'.$article_text.'</td></tr>';
        					
        				}
    			}
    			
    			echo'</table><hr>';
    			
    	mysqli_free_result($result);
        
    }
    
    
    
    function show_comments($article_id, $show_link = TRUE){
    
        	if(empty($article_id)){
        		die('Incomplete data');
            }
        
        $this->connect();
        $result=$this->select(array('article_id'=>$article_id),'comments',array('comment_date'=>'DESC'));
        
        $id=array(); $comment=array(); $date=array(); $text=array();
        while($row=mysqli_fetch_assoc($result)){
            extract($row);
           $id[]=$login_id;
           $commment[]=$comment_text; 
           $date[]=$comment_date;
           $text[]=$comment_text;
        }
               
                        
       if(!isset($_SESSION['login'])){
        $show_link=false;
        }
        
        if($show_link){
        echo'<table width=100%>';
        echo'<tr><td colspan=2 class=dd><b>'.mysqli_num_rows($result).' Comment (s)::<a href="comment.php?article_id='.$article_id.'" class="cc">
        <u> Add Your Comment</u>
        </a></b></td></tr>';
        echo'</table>';
        }
                
        echo'<table width=100%>';
        
        for($i=0; $i<count($id); $i++){
          $result1=$this->select(array('login_id'=>$id[$i]),'user_info_table');   
              if($row1=mysqli_fetch_assoc($result1)){
                extract($row1);
              }  
          echo'<tr>';
          echo'<td colspan=2 style="text-align:left;" class=cc><b><u> By '.$last_name.' '.htmlspecialchars($first_name).' on '.$date[$i].'</b></u></td>
          </tr>';
          echo'<tr><td colspan=2 style="text-align:justify;">'.htmlspecialchars($text[$i]).'<hr></td></tr>';  
                  
        }
       	echo'</table>';        
        mysqli_free_result($result);
    }  
    

    
    
}

?>