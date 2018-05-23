<?php
  function dbConnector($dbHost, $dbUserName, $dbUserPassword, $dbName)
  {
    // Create connection
  $connect = mysqli_connect($dbHost, $dbUserName, $dbUserPassword, $dbName);
  
  // Check connection
  if (!$connect) {
      die("blad");
  }
  return $connect;
  }
  $dbHost = "localhost";
  $dbUserName = "root";
  $dbUserPassword = "root";
  $dbName="BlogX";
  
  $dbConnect = dbConnector($dbHost, $dbUserName, $dbUserPassword, $dbName);

  $sql="SELECT idPosts,postDate,postTitle,postIntro FROM Posts";
  $dbQuery=mysqli_query($dbConnect, $sql);


?>
<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="style.css">
  <title>Admin</title>
</head>
<body>
  <?php while($row=mysqli_fetch_assoc($dbQuery)){?>
  <article>
    <?php echo $row['postDate']?>
    <?php echo $row['postTitle']?>
  
    <a href="admin.php?postid=<?php echo $row['idPosts'];?>">Usuń</a>
    <a href="admin.php?editid=<?php echo $row['idPosts'];?>">Edytuj</a>
    <br><br>
  </article>

  <?}?>
</body>
</html>
<?
    if(isset($_GET['postid'])){
    $postNumber=$_GET['postid'];
    $sql="DELETE FROM Posts WHERE idPosts= $postNumber";
    $dbQuery=mysqli_query($dbConnect, $sql);
  }
?>
<?   
    if(isset($_GET['editid'])){
      $id=$_GET['editid'];?>
      <form action="admin.php" >
        <input type="text" value="<?php echo $id['postTitle']?>"> Title
        <br>
        <input type="text" value="<?php echo $id['postDate']?>"> Date
        <br>
        <input type="text" value="<?php echo $id['postIntro']?>"> Intro
      </form>
   <? }?>
  
