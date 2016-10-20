<?php $config = array(
  "host"=>"localhost",
  "duser"=>"root",
  "dpw"=>"kwak625",
  "dname"=>"opentutorials2"
);
function db_init($host, $duser, $dpw, $dname){
  $conn = mysqli_connect($host, $duser, $dpw);
  mysqli_select_db($conn, $dname);
  return $conn;
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <style media="screen">
    body{
      margin:0;
    }
    body.black {
      background-color: black;
      color:white;
    }
    header {
        border-bottom: 1px solid gray;
        padding-left: 30px;
        height: 44px;
    }
    nav{
      border-right: 1px solid gray;
      width:150px;
      float: left;
      height: 1200px;
    }
    nav ol{
      margin:0;
      padding: 20px;
      list-style: none;
    }
    #content {
    padding-left:20px;
    float: left;
    width: 1000px;
    }

    </style>
  </head>
  <body id="body">
    <header>
      <h1><a href="index.php">Custom Maid</a></h1>
    </header>
    <nav>
     <ol>
       <?php

       $conn = db_init($config["host"], $config["duser"], $config["dpw"], $config["dname"]);
       $result = mysqli_query($conn, "SELECT * FROM topic");
       while( $row = mysqli_fetch_assoc($result)){
         echo '<li><a href="index.php?id='.$row['id'].'">'.htmlspecialchars($row['title']).'</a></li>'."\n";
}
?>
     </ol>
    </nav>
    <div id="content">
    <article>
      <?php
      if(empty($_GET['id'])){
        echo "HI";
      }
        else {
          $id = mysqli_real_escape_string($conn, $_GET['id']);
          $sql = "SELECT * FROM topic WHERE id=".$id;
          $sql = "SELECT topic.id, topic.title, topic.description, user.name, topic.created
          FROM topic LEFT JOIN user ON topic.author = user.id WHERE topic.id=".$id;
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
          ?>
          <h2><?=htmlspecialchars($row['title'])?></h2>
          <div><?=htmlspecialchars($row['created'])?>|<?=htmlspecialchars($row['name'])?>
          <div><?=htmlspecialchars($row['description'])?></div>
          <?php
        }

       ?>
    </article>
    <input type="button" name="name" value="흰색" onclick="document.getElementById('body').className=''">
    <input type="button" name="name" value="검은색" onclick="document.getElementById('body').className='black'">
    <a href="write.php">쓰기</a>
    </div>
  </body>
</html>
