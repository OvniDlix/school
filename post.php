<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Blog</title>
</head>
<body>
  <?php while($row=mysqli_fetch_assoc($dbQuery)){?>

  <article>
    <header>
      
      <h2><?php echo $row['postTitle']?></h2>
      <span><?php echo $row['postDate']?></span>
    </header>

      <p><?php echo $row['postIntro'];?></p>
      <p><?php echo $row['postReadMore'];?></p>

    <footer>
      
    </footer>
    
  </article>

  <?php } ?>

</body>
</html>