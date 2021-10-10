<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
  <link rel="preload" href="css/index.css" as="style"/>
  <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" as="style"/>

  <link rel="stylesheet" type="text/css" href="css/index.css"/>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>

  <title>Update Record</title>
</head>
<body>
  <?php include "app/connection.php"; ?>

  <!-- Navigation Bar -->
  <nav>
    <!-- Navigation Logo -->
    <picture id="nav-logo">
      <source srcset="images/logo.webp" type="image/webp">
      <img src="images/logo.png" alt="Company Logo" />
    </picture>
    
    <!-- Searchbox -->
    <form id="searchbox" action="search.php" method="POST">
      <input id="searchtb" name="search" type="text" placeholder="Search..." required><button id="searchbtn" type="submit"><i class="fa fa-search"></i><span class="hiddentxt">&ensp;Search</span></button>
    </form>
    
    <!-- Navigation Break -->
    <br id="navbreak">
    
    <!-- Database Items Menu -->
    <div class="dropdown">
      <button class="dropbtn" type="button">Update<span class="dropdown-arrow">&#x25BC;<span></button>
      <div class="dropdown-content">
            
        <!-- Home Page Link -->
        <a href="index.php">Home</a>
            
        <!-- Run php loop through the database to display the subject file item names as clickable links -->
        <?php foreach($result as $subjectFile): ?>
            
          <a href="index.php?subjectFile='<?php echo $subjectFile['item']; ?>'"><?php echo $subjectFile['item']; ?></a>
                
        <?php endforeach; ?>
      </div>
    </div>
    
    <!-- Admin Tools Menu -->
    <div class="dropdown">
      <button class="dropbtn" disabled><span class="hiddentxt">Admin</span> Tools<span class="dropdown-arrow">&#x25BC;<span></button>
    </div>
  </nav>

  <!-- Main Body -->
  <div class="wrapper">
    <div class="textblock border">
      <!-- Update Record Below Heading -->
      <h1>Update Record Below</h1>

      <!-- Get Information For Update Form Fields -->
      <?php
        //Get id from update get value
        $id = $_GET['update'];
    
        //Run a sql command to select a record based on the get value
        $record = $connection->query("select * from subjectFiles where id=$id") or die($connection->error());
    
        //Convert record into an associative array
        $assocarray = $record->fetch_assoc();
      ?>

      <!-- Update Record Form -->
      <form class="record-form" method="POST" action="alert.php">
        <!-- If the update button is clicked the connection object will use this value to update the record -->
        <input type="hidden" name="id" value="<?php echo $assocarray['id']; ?>">
                
        <!-- Item -->
        <label>* Item</label>
        <input class="form-control" name="item" type="text" value="<?php echo $assocarray['item']; ?>" placeholder="Enter the Item Number..." maxlength="128" required>
            
        <!-- Object Class -->
        <label>* Object Class</label>
        <input class="form-control" name="class" type="text" value="<?php echo $assocarray['class']; ?>" placeholder="Enter the Object Class..." maxlength="128" required>
            
        <!-- Image Source -->
        <label>Image Source</label>
        <input class="form-control" name="imgsrc" type="text" value="<?php echo $assocarray['imgsrc']; ?>" placeholder="Enter the Image Source..." maxlength="1024">
            
        <!-- Heading 1 -->
        <label>* Heading 1</label>
        <input class="form-control" name="h1" type="text" value="<?php echo $assocarray['h1']; ?>" placeholder="Enter Heading..." maxlength="255" required>

        <!-- Paragraph 1 -->
        <label>* Paragraph 1</label>
        <textarea class="form-control" name="p1" rows="20" placeholder="Enter Paragraph..." required><?php echo $assocarray['p1']; ?></textarea>

        <!-- Heading 2 -->
        <label>* Heading 2</label>
        <input class="form-control" name="h2" type="text" value="<?php echo $assocarray['h2']; ?>" placeholder="Enter Heading..." maxlength="255" required>

        <!-- Paragraph 2 -->
        <label>* Paragraph 2</label>
        <textarea class="form-control" name="p2" rows="20" placeholder="Enter Paragraph..." required><?php echo $assocarray['p2']; ?></textarea>

        <!-- Heading 3 -->
        <label>Heading 3</label>
        <input class="form-control" name="h3" type="text" value="<?php echo $assocarray['h3']; ?>" placeholder="Enter Heading..." maxlength="255">

        <!-- Paragraph 3 -->
        <label>Paragraph 3</label>
        <textarea class="form-control" name="p3" rows="20" placeholder="Enter Paragraph..."><?php echo $assocarray['p3']; ?></textarea>

        <!-- Heading 4 -->
        <label>Heading 4</label>
        <input class="form-control" name="h4" type="text" value="<?php echo $assocarray['h4']; ?>" placeholder="Enter Heading..." maxlength="255">

        <!-- Paragraph 4 -->
        <label>Paragraph 4</label>
        <textarea class="form-control" name="p4" rows="20" placeholder="Enter Paragraph..."><?php echo $assocarray['p4']; ?></textarea>

        <!-- Heading 5 -->
        <label>Heading 5</label>
        <input class="form-control" name="h5" type="text" value="<?php echo $assocarray['h5']; ?>" placeholder="Enter Heading..." maxlength="255">

        <!-- Paragraph 5 -->
        <label>Paragraph 5</label>
        <textarea class="form-control" name="p5" rows="20" placeholder="Enter Paragraph..."><?php echo $assocarray['p5']; ?></textarea>

        <!-- Heading 6 -->
        <label>Heading 6</label>
        <input class="form-control" name="h6" type="text" value="<?php echo $assocarray['h6']; ?>" placeholder="Enter Heading..." maxlength="255">

        <!-- Paragraph 6 -->
        <label>Paragraph 6</label>
        <textarea class="form-control" name="p6" rows="20" placeholder="Enter Paragraph..."><?php echo $assocarray['p6']; ?></textarea>

        <!-- Heading 7 -->
        <label>Heading 7</label>
        <input class="form-control" name="h7" type="text" value="<?php echo $assocarray['h7']; ?>" placeholder="Enter Heading..." maxlength="255">

        <!-- Paragraph 7 -->
        <label>Paragraph 7</label>
        <textarea class="form-control" name="p7" rows="20" placeholder="Enter Paragraph..."><?php echo $assocarray['p7']; ?></textarea>

        <!-- Heading 8 -->
        <label>Heading 8</label>
        <input class="form-control" name="h8" type="text" value="<?php echo $assocarray['h8']; ?>" placeholder="Enter Heading..." maxlength="255">

        <!-- Paragraph 8 -->
        <label>Paragraph 8</label>
        <textarea class="form-control" name="p8" rows="20" placeholder="Enter Paragraph..."><?php echo $assocarray['p8']; ?></textarea>

        <!-- Heading 9 -->
        <label>Heading 9</label>
        <input class="form-control" name="h9" type="text" value="<?php echo $assocarray['h9']; ?>" placeholder="Enter Heading..." maxlength="255">

        <!-- Paragraph 9 -->
        <label>Paragraph 9</label>
        <textarea class="form-control" name="p9" rows="20" placeholder="Enter Paragraph..."><?php echo $assocarray['p9']; ?></textarea>

        <!-- Heading 10 -->
        <label>Heading 10</label>
        <input class="form-control" name="h10" type="text" value="<?php echo $assocarray['h10']; ?>" placeholder="Enter Heading..." maxlength="255">

        <!-- Paragraph 10 -->
        <label>Paragraph 10</label>
        <textarea class="form-control" name="p10" rows="20" placeholder="Enter Paragraph..."><?php echo $assocarray['p10']; ?></textarea>

        <!-- Heading 11 -->
        <label>Heading 11</label>
        <input class="form-control" name="h11" type="text" value="<?php echo $assocarray['h11']; ?>" placeholder="Enter Heading..." maxlength="255">

        <!-- Paragraph 11 -->
        <label>Paragraph 11</label>
        <textarea class="form-control" name="p11" rows="20" placeholder="Enter Paragraph..."><?php echo $assocarray['p11']; ?></textarea>

        <!-- Heading 12 -->
        <label>Heading 12</label>
        <input class="form-control" name="h12" type="text" value="<?php echo $assocarray['h12']; ?>" placeholder="Enter Heading..." maxlength="255">

        <!-- Paragraph 12 -->
        <label>Paragraph 12</label>
        <textarea class="form-control" name="p12" rows="20" placeholder="Enter Paragraph..."><?php echo $assocarray['p12']; ?></textarea>

        <!-- Heading 13 -->
        <label>Heading 13</label>
        <input class="form-control" name="h13" type="text" value="<?php echo $assocarray['h13']; ?>" placeholder="Enter Heading..." maxlength="255">

        <!-- Paragraph 13 -->
        <label>Paragraph 13</label>
        <textarea class="form-control" name="p13" rows="20" placeholder="Enter Paragraph..."><?php echo $assocarray['p13']; ?></textarea>

        <!-- Heading 14 -->
        <label>Heading 14</label>
        <input class="form-control" name="h14" type="text" value="<?php echo $assocarray['h14']; ?>" placeholder="Enter Heading..." maxlength="255">

        <!-- Paragraph 14 -->
        <label>Paragraph 14</label>
        <textarea class="form-control" name="p14" rows="20" placeholder="Enter Paragraph..."><?php echo $assocarray['p14']; ?></textarea>

        <!-- Heading 15 -->
        <label>Heading 15</label>
        <input class="form-control" name="h15" type="text" value="<?php echo $assocarray['h15']; ?>" placeholder="Enter Heading..." maxlength="255">

        <!-- Paragraph 15 -->
        <label>Paragraph 15</label>
        <textarea class="form-control" name="p15" rows="20" placeholder="Enter Paragraph..."><?php echo $assocarray['p15']; ?></textarea>

        <!-- Heading 16 -->
        <label>Heading 16</label>
        <input class="form-control" name="h16" type="text" value="<?php echo $assocarray['h16']; ?>" placeholder="Enter Heading..." maxlength="255">

        <!-- Paragraph 16 -->
        <label>Paragraph 16</label>
        <textarea class="form-control" name="p16" rows="20" placeholder="Enter Paragraph..."><?php echo $assocarray['p16']; ?></textarea>

        <!-- Heading 17 -->
        <label>Heading 17</label>
        <input class="form-control" name="h17" type="text" value="<?php echo $assocarray['h17']; ?>" placeholder="Enter Heading..." maxlength="255">

        <!-- Paragraph 17 -->
        <label>Paragraph 17</label>
        <textarea class="form-control" name="p17" rows="20" placeholder="Enter Paragraph..."><?php echo $assocarray['p17']; ?></textarea>

        <!-- Heading 18 -->
        <label>Heading 18</label>
        <input class="form-control" name="h18" type="text" value="<?php echo $assocarray['h18']; ?>" placeholder="Enter Heading..." maxlength="255">

        <!-- Paragraph 18 -->
        <label>Paragraph 18</label>
        <textarea class="form-control" name="p18" rows="20" placeholder="Enter Paragraph..."><?php echo $assocarray['p18']; ?></textarea>

        <!-- Heading 19 -->
        <label>Heading 19</label>
        <input class="form-control" name="h19" type="text" value="<?php echo $assocarray['h19']; ?>" placeholder="Enter Heading..." maxlength="255">

        <!-- Paragraph 19 -->
        <label>Paragraph 19</label>
        <textarea class="form-control" name="p19" rows="20" placeholder="Enter Paragraph..."><?php echo $assocarray['p19']; ?></textarea>

        <!-- Heading 20 -->
        <label>Heading 20</label>
        <input class="form-control" name="h20" type="text" value="<?php echo $assocarray['h20']; ?>" placeholder="Enter Heading..." maxlength="255">

        <!-- Paragraph 20 -->
        <label>Paragraph 20</label>
        <textarea class="form-control" name="p20" rows="20" placeholder="Enter Paragraph..."><?php echo $assocarray['p20']; ?></textarea>

        <!-- Form Buttons -->
        <div class="form-buttons">
          <button class="form-button" name="update" type="update">Update</button>
          <a class='a-btn form-button' href='index.php'>Back</a>
        </div>
      </form>
    </div>
  </div>
</body>
</html>