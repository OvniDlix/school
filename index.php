<?php

class blog
{
  private $dbConn;

  function __construct($serverName, $userName, $password, $dbName)
  {
    //create connection
    $this -> dbConn = mysqli_connect($serverName, $userName, $password, $dbName);

    // Check connection
    if (!$this -> dbConn) 
    { 
      die ("blad");
      // die($error = mysqli_connect_error());
      // include("errors.php");
    } 
   
    echo "Connected succesfully";


   }

   function dodaj($postDate, $postIntro, $postReadmore, $postAuthor, $postTitle)
   {
    $sql = "INSERT INTO Posts(postDate, postIntro, postReadmore, postAuthors, postTitle) VALUES ('$postDate', '$postIntro', '$postReadmore', '$postAuthor' , '$postTitle')";
    mysqli_query($this->dbConn, $sql);
    mysqli_close($this->dbConn);
   }

   function usun($idPosts)
   {
    $usun="DELETE FROM Posts WHERE idPosts= $idPosts";
    mysqli_query($this->dbConn, $usun);
    mysqli_close($this->dbCpnn);
   }

   function edytuj($postDate, $postIntro, $postReadmore, $postAuthor, $postTitle)
   {
    $edytuj= "UPDATE Posts SET (postDate='$postDate',postIntro='$postIntro',postReadMore='$postReadmore',postAuthor='$postAuthor',postTitle='$postTitle')";
    mysqli_query($this->dbConn, $edytuj);
    mysqli_close($this->dbConn);
   }
}

$action = $_GET['action'];

switch ($action)
{
  case 'usun':
  $blogTomka->usun(2);
  break;
}

$blogTomka = new blog('localhost', 'root', 'root', 'BlogX');
$blogTomka -> dodaj('2001-12-12', 'intro', 'readmore', '2', 'title');

?>

<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>blogg</title>
</head>
<body>
  <a href="index.php?action=usun&id=2">dodaj</a>
</body>
</html>