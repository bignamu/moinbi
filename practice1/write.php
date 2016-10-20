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
      <form class="" action="process.php" method="post">
        <p>
        <label for="title">제목 :</label>
        <input id="title" type="text" name="title">
        </p>
        <p>
          <label for="author">저자 :</label>
        <input id="author" type="text" name="author" value="">
      </p>
      <p>
        <label for="description">본문 :</label>
        <textarea id="description" name="name" rows="8" cols="40"></textarea>
      </p>
      <p>
        <input type="submit" value="전송">
      </p>
      </form>

    </article>
    <input type="button" name="name" value="흰색" onclick="document.getElementById('body').className=''">
    <input type="button" name="name" value="검은색" onclick="document.getElementById('body').className='black'">
    <a href="write.php">쓰기</a>
    </div>
  </body>
</html>
