<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<meta name="author" content="" />

	<title>Cancer Awareness System</title>
    <style type="text/css">
    
    body{background-image: url("images/bg.gif"); width: 100%; margin-left: auto; margin-right: auto;}
    #main{width: 100%; margin-left: auto; margin-right: auto;}
    #header1{width: 100%; height: 75px; background-color: white; margin-top: -7px;margin-left: auto; margin-right: auto;}
    .link1 a{text-decoration: none; color: black; font-family: tahoma;}
    #header1 table{width: 100%;margin-top: 0px;}
    .link1{text-align: right;}
    .banner{width: 60%;}
    #button{ width: 100%; margin-left: auto; margin-right: auto; height: 50px;background-color: #000033;}
   .nav ul{list-style: none;
	  text-align: center;
	  padding: 0px;
	  margin-top: 0px;
       }
 
   .nav li {width:150px ;  
	    height: 50px;
	    line-height: 50px;
	    display: inline-block;
	    font-family:tahoma;
	    font-weight: bold;
	  	background-color:#000033;
        padding: 0px;
       }
       
   .nav a {
	  text-decoration: none;
	  color: white;    /*  color of the links      */
	  display: block;
	  padding-left: 0;
	  
	}  
      
   	.nav a:hover {
		background-color:#000066;	
	}
    
  #slide{width: 100%; margin-top: 2px;}
  #slide img{width: 100%; height: 543px;}
  .error{color: red; font-weight: bolder;}
  .success{color: green;font-weight: bolder;}
  .article{text-align: center; margin-left: auto; margin-right: auto;}
  #main3{width:55%; margin-top: 2px;margin-left: auto; margin-right: auto;}
  .dd{color: white; background-color: #000033;height: 9px; font-family: tahoma;font-weight: bold;}
  .me{color: white; font-weight: bold;}
  #form1div{clear: both; width: 30%;}
  .zz{color:#000033;font-weight: bolder;font-family: tahoma;}
  .e{font-family: tahoma;font-weight: bolder;}
  .e a{text-decoration: none; color:#000033;}
  #form2div{width:40%; margin-left: auto; margin-right: auto;}  
  .a{color: #000033; font-weight: bolder;font-family: tahoma;}
  td{vertical-align: top;}
  .align{text-align: left; font-family: Candara; font-weight: bold; color: #3366FF;}
  .cc{color: white; background-color: #000033;height: 9px;font-weight: bolder;font-family: tahoma;}
  .cc a{color: white; text-decoration: none;}
  .b{background-color:#000033;color:white; font-weight: bolder; font-family: verdana;}
  hr{color:#000033;}
 
 
  
 
  
  
  
  
  
  
  
  
  
 
   </style>  
    

<script src="jquery/jquery-3.2.1.js"></script>
<script src="jquery/jquery.cycle2.js"></script>
<script src="jquery/jquery.cycle2.tile.js"></script>
</head>

<body>
<div id="main">
<div id="header1">
<table>
<tr>
<td>&nbsp;</td>
<td class="banner"><img src="images/banner.gif" height="70" /></td>
<td class="link1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php  if(!isset($_SESSION['login'])){ ?>  <a href="index.php"><small>HOME</small></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="login.php"><small>LOGIN</small></a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="signup.php"><small>SIGN UP</small></a><?php  } ?> </td>
</tr>
</table>
</div>

<div id="button" class="nav">
<ul>
 
<?php  if(isset($_SESSION['login'])){ ?> <li><a href="index.php">HOME</a></li><?php  } ?>
<li><a href="forum.php">FORUM</a></li>
<?php  if(isset($_SESSION['access_level']) and $_SESSION['access_level']>1){ ?><li><a href="admin.php">ADMIN</a></li><?php  } ?>
<?php  if(isset($_SESSION['login'])){ ?><li><a href="transact.php?action=Logout">LOG-OUT</a></li><?php  } ?>
</ul>
</div>







