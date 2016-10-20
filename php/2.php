<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8">
     <style media="screen">
       body {
         font-size: 50px;
       }
     </style>
</head>
<body>
  <?php
    echo file_get_contents($_GET['id'].".txt");
   ?>
</body>
</html>
