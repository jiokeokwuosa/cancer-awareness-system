<?php

class Database{
    protected $host;
    protected $username;
    protected $password;
    protected $database_name;
    protected $conn;
    protected $data=array();
    protected $data1=array();
    protected $database_table;
    protected $result;
    protected $insert_id;
    protected $order;
        
    
    
    
    public function __construct($host,$username,$password,$database_name){
        if(empty($host) or empty($username) or empty($database_name)){
         die('Missing database Config File');            
        }
      $this->host=$host;
      $this->username=$username;
      $this->password=$password;
      $this->database_name=$database_name;        
    }
   
   
   
    public function connect(){
     $this->conn=new mysqli($this->host,$this->username,$this->password,$this->database_name);   
      if($this->conn->connect_error){
        die('Database Connection couldn\'t be established');
      }  
    }
    
    
    
    public function insert(array $params, $table){
       if(empty($params) or !is_array($params) or empty($table)){
        die("Invalid Data");
       } 
       $this->data=$params;
       $this->database_table=$table;
       
       $query='REPLACE INTO ';
       $query.=$this->database_table.' (';
       
        foreach($this->data as $field=>$value){
            if($field !='action' and $field !='file' and $field !='password1'){
               $query.='`';
               $query.=$field;
               $query.='`,'; 
             }  
        }
        $query=rtrim($query,',');
        $query.=') VALUES (';
                
        foreach($this->data as $field=>$value){
             if($field !='action' and $field !='file' and $field !='password1'){
               $query.='\'';
               $query.=$value;
               $query.='\','; 
             }
        }
        $query=rtrim($query,',');
        $query.=')';
       return $this->conn->query($query);
        
    }
    
    
    
    public function select(array $where,$table,array $order=array()){
     if(!is_array($where) or empty($table)){
        die("Invalid Data");
       } 
       $this->data=$where;
       $this->database_table=$table;
       $this->order=$order;
       
       
       $query='SELECT * FROM ';
       $query.=$this->database_table;
       
       if(!empty($this->data)){
           $query.=' WHERE ';
           
           foreach($this->data as $field=>$value){
                if($field !='action' and $field !='file'){
                  $query.='`'.$field.'`'.'='.'\''.$value.'\''.' AND ';
                }
           }
           $length=strlen($query)-5;
           $query=substr_replace($query,"",$length);
       }
       
       if(!empty($this->order)){
           $query.=' ORDER BY ';
           
           foreach($this->order as $field=>$value){
                
                  $query.=$field.' '.$value;
                
           }
           
       }
       
       $this->result=$this->conn->query($query);  
       
       return $this->result;  
        
    }
    
    
    
    public function update(array $params, array $where,$table){
       if(empty($params) or !is_array($params) or empty($table) or empty($where) or ! is_array($where)){
        die("Invalid Data");
       } 
        $this->data=$params;
        $this->data1=$where;
        $this->database_table=$table; 
        
        $query='UPDATE ';
        $query.=$this->database_table;
        $query.=' SET ';
        
        foreach($this->data as $field=>$value){
                if($field !='action' and $field !='image_id' and $field !='password1'){
                  $query.='`'.$field.'`'.'='.'\''.$value.'\',';
                }
           }
        $query=rtrim($query,',');
        $query.=' WHERE ';
        
        foreach($this->data1 as $field=>$value){
                if($field !='action' and $field !='image_id' and $field !='password1'){
                  $query.='`'.$field.'`'.'='.'\''.$value.'\' AND ';
                }
           }
        
        $length=strlen($query)-5;
       echo $query=substr_replace($query,"",$length);
        $this->conn->query($query);
    
        
    }
    
    
    
    public function delete(array $where,$table){
       if(empty($table) or empty($where) or ! is_array($where)){
        die("Invalid Data");
       } 
        $this->data=$where;
        $this->database_table=$table; 
        
        $query='DELETE FROM ';
        $query.=$this->database_table;
        $query.=' WHERE ';
        
        foreach($this->data as $field=>$value){
                if($field !='action' and $field !='file'){
                  $query.='`'.$field.'`'.'='.'\''.$value.'\'AND';
                }                
           }
        $length=strlen($query)-3;
        $query=substr_replace($query,"",$length);   
        
        $this->conn->query($query);
    
        
    }
    
    
      
    public function insert_id(){
        return $this->conn->insert_id;
    }
    
        
    
}
$db=new Database('localhost','christ4life','','test');
$db->connect(); 
$db->delete(array('first_name'=>'ada'),'user');     

?>