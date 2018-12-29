<?php 
include'header.php';
require'functions.php';

echo'<center><div id="main3">';

$comment=new Article('localhost','christ4life','','cancer');  
$comment->connect();
$comment->output_story($_GET['article_id']);
$comment->show_comments($_GET['article_id'],True);

echo'</div></center>';
?>