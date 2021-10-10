<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="preload" href="css/index.css" as="style"/>
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" as="style"/>

    <link rel="stylesheet" type="text/css" href="css/index.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>

    <?php
    include "app/connection.php";
    
    //Add Record
    //Check if the add record submit button was clicked
    if(isset($_POST['submit']))
    {
        //Save the page name as a variable
        $pgname = "Add";
        
        //Store the values from the add form
        //Bypass single quotation mark error
        $item = mysqli_real_escape_string($connection, $_POST['item']);
        $class = mysqli_real_escape_string($connection, $_POST['class']);
        $imgsrc = mysqli_real_escape_string($connection, $_POST['imgsrc']);
        $h1 = mysqli_real_escape_string($connection, $_POST['h1']);
        $p1 = mysqli_real_escape_string($connection, $_POST['p1']);
        $h2 = mysqli_real_escape_string($connection, $_POST['h2']);
        $p2 = mysqli_real_escape_string($connection, $_POST['p2']);
        $h3 = mysqli_real_escape_string($connection, $_POST['h3']);
        $p3 = mysqli_real_escape_string($connection, $_POST['p3']);
        $h4 = mysqli_real_escape_string($connection, $_POST['h4']);
        $p4 = mysqli_real_escape_string($connection, $_POST['p4']);
        $h5 = mysqli_real_escape_string($connection, $_POST['h5']);
        $p5 = mysqli_real_escape_string($connection, $_POST['p5']);
        $h6 = mysqli_real_escape_string($connection, $_POST['h6']);
        $p6 = mysqli_real_escape_string($connection, $_POST['p6']);
        $h7 = mysqli_real_escape_string($connection, $_POST['h7']);
        $p7 = mysqli_real_escape_string($connection, $_POST['p7']);
        $h8 = mysqli_real_escape_string($connection, $_POST['h8']);
        $p8 = mysqli_real_escape_string($connection, $_POST['p8']);
        $h9 = mysqli_real_escape_string($connection, $_POST['h9']);
        $p9 = mysqli_real_escape_string($connection, $_POST['p9']);
        $h10 = mysqli_real_escape_string($connection, $_POST['h10']);
        $p10 = mysqli_real_escape_string($connection, $_POST['p10']);
        $h11 = mysqli_real_escape_string($connection, $_POST['h11']);
        $p11 = mysqli_real_escape_string($connection, $_POST['p11']);
        $h12 = mysqli_real_escape_string($connection, $_POST['h12']);
        $p12 = mysqli_real_escape_string($connection, $_POST['p12']);
        $h13 = mysqli_real_escape_string($connection, $_POST['h13']);
        $p13 = mysqli_real_escape_string($connection, $_POST['p13']);
        $h14 = mysqli_real_escape_string($connection, $_POST['h14']);
        $p14 = mysqli_real_escape_string($connection, $_POST['p14']);
        $h15 = mysqli_real_escape_string($connection, $_POST['h15']);
        $p15 = mysqli_real_escape_string($connection, $_POST['p15']);
        $h16 = mysqli_real_escape_string($connection, $_POST['h16']);
        $p16 = mysqli_real_escape_string($connection, $_POST['p16']);
        $h17 = mysqli_real_escape_string($connection, $_POST['h17']);
        $p17 = mysqli_real_escape_string($connection, $_POST['p17']);
        $h18 = mysqli_real_escape_string($connection, $_POST['h18']);
        $p18 = mysqli_real_escape_string($connection, $_POST['p18']);
        $h19 = mysqli_real_escape_string($connection, $_POST['h19']);
        $p19 = mysqli_real_escape_string($connection, $_POST['p19']);
        $h20 = mysqli_real_escape_string($connection, $_POST['h20']);
        $p20 = mysqli_real_escape_string($connection, $_POST['p20']);

        //Create a insert command that will take the form values and store them in the database table
        $insert = "insert into subjectFiles(item, class, imgsrc, h1, p1, h2, p2, h3, p3, h4, p4, h5, p5, h6, p6, h7, p7, h8, p8, h9, p9, h10, p10, h11, p11, h12, p12, h13, p13, h14, p14, h15, p15, h16, p16, h17, p17, h18, p18, h19, p19, h20, p20)
        values('$item', '$class', '$imgsrc', '$h1', '$p1', '$h2', '$p2', '$h3', '$p3', '$h4', '$p4', '$h5', '$p5', '$h6', '$p6', '$h7', '$p7', '$h8', '$p8', '$h9', '$p9', '$h10', '$p10', '$h11', '$p11', '$h12', '$p12', '$h13', '$p13', '$h14', '$p14', '$h15', '$p15', '$h16', '$p16', '$h17', '$p17', '$h18', '$p18', '$h19', '$p19', '$h20', '$p20')";

        //Connect to the database and run the $insert query
        if($connection->query($insert) === TRUE)
        {
            //If the $insert query ran successfully save the following alert information
            $error = false;
            $h = "Record Successfully Added";
        }
        else
        {
            //If the $insert query ran unsuccessfully save the following alert information
            $error = true;
            $h = "Error Submitting Record";
            $p = "$connection->error";
        }
    }

    //Delete Record
    //Check if the delete record button was clicked
    if(isset($_GET['delete']))
    {
        //Save the page name as a variable
        $pgname = "Delete";
        
        //Get the id of the item to be deleted
        $id = $_GET['delete'];
    
        //Create a delete sql command using the get value
        $del = "delete from subjectFiles where id=$id";
    
        //Connect to the database and run the $del query
        if($connection->query($del) === TRUE)
        {
            //If the $del query ran successfully save the following alert information
            $error = false;
            $h = "Record Successfully Deleted";
        }
        else
        {
            //If the $del query ran unsuccessfully save the following alert information
            $error = true;
            $h = "Error Deleting Record";
            $p = "$connection->error";
        }
    }

    //Update Record
    //Check if the update button was clicked within the update form
    if(isset($_POST['update']))
    {
        //Save the page name as a variable
        $pgname = "Update";
        
        //Get the subject file id
        $id = $_POST['id'];
    
        //Store the values from the update form
        //Bypass single quotation mark error
        $item = mysqli_real_escape_string($connection, $_POST['item']);
        $class = mysqli_real_escape_string($connection, $_POST['class']);
        $imgsrc = mysqli_real_escape_string($connection, $_POST['imgsrc']);
        $h1 = mysqli_real_escape_string($connection, $_POST['h1']);
        $p1 = mysqli_real_escape_string($connection, $_POST['p1']);
        $h2 = mysqli_real_escape_string($connection, $_POST['h2']);
        $p2 = mysqli_real_escape_string($connection, $_POST['p2']);
        $h3 = mysqli_real_escape_string($connection, $_POST['h3']);
        $p3 = mysqli_real_escape_string($connection, $_POST['p3']);
        $h4 = mysqli_real_escape_string($connection, $_POST['h4']);
        $p4 = mysqli_real_escape_string($connection, $_POST['p4']);
        $h5 = mysqli_real_escape_string($connection, $_POST['h5']);
        $p5 = mysqli_real_escape_string($connection, $_POST['p5']);
        $h6 = mysqli_real_escape_string($connection, $_POST['h6']);
        $p6 = mysqli_real_escape_string($connection, $_POST['p6']);
        $h7 = mysqli_real_escape_string($connection, $_POST['h7']);
        $p7 = mysqli_real_escape_string($connection, $_POST['p7']);
        $h8 = mysqli_real_escape_string($connection, $_POST['h8']);
        $p8 = mysqli_real_escape_string($connection, $_POST['p8']);
        $h9 = mysqli_real_escape_string($connection, $_POST['h9']);
        $p9 = mysqli_real_escape_string($connection, $_POST['p9']);
        $h10 = mysqli_real_escape_string($connection, $_POST['h10']);
        $p10 = mysqli_real_escape_string($connection, $_POST['p10']);
        $h11 = mysqli_real_escape_string($connection, $_POST['h11']);
        $p11 = mysqli_real_escape_string($connection, $_POST['p11']);
        $h12 = mysqli_real_escape_string($connection, $_POST['h12']);
        $p12 = mysqli_real_escape_string($connection, $_POST['p12']);
        $h13 = mysqli_real_escape_string($connection, $_POST['h13']);
        $p13 = mysqli_real_escape_string($connection, $_POST['p13']);
        $h14 = mysqli_real_escape_string($connection, $_POST['h14']);
        $p14 = mysqli_real_escape_string($connection, $_POST['p14']);
        $h15 = mysqli_real_escape_string($connection, $_POST['h15']);
        $p15 = mysqli_real_escape_string($connection, $_POST['p15']);
        $h16 = mysqli_real_escape_string($connection, $_POST['h16']);
        $p16 = mysqli_real_escape_string($connection, $_POST['p16']);
        $h17 = mysqli_real_escape_string($connection, $_POST['h17']);
        $p17 = mysqli_real_escape_string($connection, $_POST['p17']);
        $h18 = mysqli_real_escape_string($connection, $_POST['h18']);
        $p18 = mysqli_real_escape_string($connection, $_POST['p18']);
        $h19 = mysqli_real_escape_string($connection, $_POST['h19']);
        $p19 = mysqli_real_escape_string($connection, $_POST['p19']);
        $h20 = mysqli_real_escape_string($connection, $_POST['h20']);
        $p20 = mysqli_real_escape_string($connection, $_POST['p20']);

        //Create an update command that will take the update form values and update the subject file information within the database
        $update = 
        "update subjectFiles set item='$item', class='$class', imgsrc='$imgsrc', h1='$h1', p1='$p1', h2='$h2', p2='$p2', h3='$h3', p3='$p3', h4='$h4', p4='$p4', h5='$h5', p5='$p5', h6='$h6', p6='$p6', h7='$h7', p7='$p7', h8='$h8', p8='$p8', h9='$h9', p9='$p9', h10='$h10', p10='$p10', h11='$h11', p11='$p11', h12='$h12', p12='$p12', h13='$h13', p13='$p13', h14='$h14', p14='$p14', h15='$h15', p15='$p15', h16='$h16', p16='$p16', h17='$h17', p17='$p17', h18='$h18', p18='$p18', h19='$h19', p19='$p19', h20='$h20', p20='$p20'
    
        where id='$id'";

        //Connect to the database and run the $update query
        if($connection->query($update) === TRUE)
        {
            //If the $update query ran successfully save the following alert information
            $error = false;
            $h = "Record Successfully Updated";
        }
        else
        {
            //If the $update query ran unsuccessfully save the following alert information
            $error = true;
            $h = "Error Updating Record";
            $p = "$connection->error";
        }
    }
    
    //Refresh the variable that stores all the records from the database
    $result = $connection->query("select * from subjectFiles") or die(mysqli_error($connection));
    ?>

    <title><?php echo "$pgname Record"; ?></title>
</head>
<body>
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
    
        <!-- Database Items List -->
        <div class="dropdown">
            <button class="dropbtn" type="button"><?php echo "$pgname"; ?><span class="dropdown-arrow">&#x25BC;<span></button>
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
        <!-- Admin Tools Menu -->
        <div class="dropdown">
            <button class="dropbtn"><span class="hiddentxt">Admin</span> Tools<span class="dropdown-arrow">&#x25BC;<span></button>
            <div class="dropdown-content">
                <a href="form.php">Add Record</a>
            </div>
        </div>
    </nav>

    <!-- Main Body -->
    <div class="messagebox">
        <div class='messagebox-content border'>
            <?php
            //Echo out $h string
            echo "<h1>$h</h1>";

            //Check if the $error boolean has been set to true
            if($error === TRUE)
            {
                //Echo out $p string
                echo "<p>$p</p>";
            }
            
            //Echo out the back to home page button
            echo "<a class='a-btn messagebox-btn' href='index.php'>Go to Home Page</a>";
            ?>
        </div>
    </div>
</body>
</html>