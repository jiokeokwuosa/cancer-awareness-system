<?php
class Validator{
    protected $is_valid=true;
    protected $error_Messages=array();
    protected $data=array();
    protected $type;
    
    
    public function __construct(array $params){
      if(empty($params) or !is_array($params)){
        die("Invalid Data");
      } 
     $this->data=$params;  
    }    
    
    
    
    public function validate_index(){
       if(empty($this->data['login_id'])){
        $this->error_Messages['login_id']='Please Enter your login Id';        
       }
       
       if(empty($this->data['password'])){
        $this->error_Messages['password']='Please Enter your Password';        
       }else{
            $password=$this->data['password'];
                     
          } 
                    
            
       if(!empty($this->error_Messages)){
        $this->is_valid=false;    
       }      
          
    }
    
    
    public function validate_article(){
       if(empty($this->data['article_text'])){
        $this->error_Messages['article_text']='Please Drop Suggestion';        
       }
                         
       if(!empty($this->error_Messages)){
        $this->is_valid=false;    
       }      
          
    }
    
    
    public function validate_comment(){
       if(empty($this->data['comment_text'])){
        $this->error_Messages['comment_text']='Please Drop Comment';        
       }
                         
       if(!empty($this->error_Messages)){
        $this->is_valid=false;    
       }      
          
    }
    
    
    
    public function validate_signup(){
       if(empty($this->data['login_id'])){
        $this->error_Messages['login_id']='Please Enter Login Id';        
       }
       
       if(empty($this->data['first_name'])){
        $this->error_Messages['first_name']='Please Enter First Name';        
       }   
                         
       if(empty($this->data['last_name'])){
        $this->error_Messages['last_name']='Please Enter Last Name';        
       }
                   
       if(empty($this->data['email'])){
        $this->error_Messages['email']='Please Enter Email Address';        
       }else{
            $email=$this->data['email']; 
            if(! filter_var($email, FILTER_VALIDATE_EMAIL)){
              $this->error_Messages['email']='Please Enter Valid Email';  
            }           
         }    
      
       if(empty($this->data['password'])){
        $this->error_Messages['password']='Please Enter Password';        
       }else{
            $password=$this->data['password'];
          } 
       
       if(empty($this->data['password1'])){
        $this->error_Messages['password1']='Please Enter Confirm Password';        
       }else{
            $password1=$this->data['password1'];
            
            if(strlen($password1)<5){
             $this->error_Messages['password1']='Password must be at least 5digits long';   
            }else{
                   if(! empty($password)){
                     if($password1!=$password1){
                        $this->error_Messages['password1']='Confirm Password does not match'; 
                     }
                    
                    
                   } 
                
               }
          } 
      
      if(empty($this->data['phone_number'])){
        $this->error_Messages['phone_number']='Please Enter Phone Number';        
      } 
      
      if(empty($this->data['address'])){
        $this->error_Messages['address']='Please Enter Address';        
      } 
      
      if(empty($this->data['state'])){
        $this->error_Messages['state']='Please Enter State';        
      }            
           
      
                           
      if(!empty($this->error_Messages)){
        $this->is_valid=false;    
       }  
    
    
    }
    
    
    
    public function validate_update(){
       if(empty($this->data['login_id'])){
        $this->error_Messages['login_id']='Please Enter Login Id';        
       }
       
       if(empty($this->data['first_name'])){
        $this->error_Messages['first_name']='Please Enter First Name';        
       }   
                         
       if(empty($this->data['last_name'])){
        $this->error_Messages['last_name']='Please Enter Last Name';        
       }
                   
       if(empty($this->data['email'])){
        $this->error_Messages['email']='Please Enter Email Address';        
       }else{
            $email=$this->data['email']; 
            if(! filter_var($email, FILTER_VALIDATE_EMAIL)){
              $this->error_Messages['email']='Please Enter Valid Email';  
            }           
         }    
           
       if(empty($this->data['phone_number'])){
        $this->error_Messages['phone_number']='Please Enter Phone Number';        
       }
       
       if(empty($this->data['access_level'])){
        $this->error_Messages['access_level']='Please Enter Access Level';        
       }  
      
       if(empty($this->data['address'])){
        $this->error_Messages['address']='Please Enter Address';        
       } 
      
       if(empty($this->data['state'])){
        $this->error_Messages['state']='Please Enter State';        
       }            
                                  
       if(!empty($this->error_Messages)){
        $this->is_valid=false;    
       }  
    
    
    }
        
    
      
   
    public function image(){
        foreach($this->data as $a=>$b){
          $this->type=$b['type'];  
        }
        
        if($this->type !='image/jpeg' and $this->type!='image/png' and $this->type!='image/gif'){
        $this->error_Messages['type']='Image type not supported';    
        }        
        
        if(!empty($this->error_Messages)){
            $this->is_valid=false;    
        }    
           
        
    }
    
    
    
    
    
    
    
  
    public function getIsValid(){
     return $this->is_valid;
            
    }
    
    
   
    public function getError(){
     return $this->error_Messages;
            
    }
    
    
    
    
    
    
    
}
?>