<?php

class Upload{
    protected $data;
    protected $tmp;
    protected $directory;
    protected $table;
    protected $image;
    
    
    public function __construct(array $params,$dir,$table){
        if( !is_array($params) or empty($dir) or empty($table)){
            die('invalid data');
        }
        $this->directory=$dir;
        $this->table=$table;
        $this->data=$params;
        foreach($this->data as $a=>$b){
              $this->tmp=$b['tmp_name'];  
             }
      
    }  
    
    
    
    public function image(){
        list($width, $height, $type, $attr) = getimagesize($this->tmp);
        $error = "The file you uploaded is not a supported filetype";
        	 switch ($type) {
                case IMAGETYPE_GIF:
                   $image = imagecreatefromgif($this->tmp) or die($error);
                    break;
                case IMAGETYPE_JPEG:
                   $image = imagecreatefromjpeg($this->tmp) or die($error);
                    break;
                case IMAGETYPE_PNG:
                    $image = imagecreatefrompng($this->tmp) or die($error);
                    break;
                default:
                    die($error);
            }
     $this->image=$image;       
    }
    
  
  
    public function save($name){     
     imagejpeg($this->image, $this->directory . '/' . $name. '.jpg');   
    }
  
  
  
    
    
}

?>