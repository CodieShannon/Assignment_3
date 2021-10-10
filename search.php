<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="preload" href="css/index.css" as="style"/>
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" as="style"/>

    <link rel="stylesheet" type="text/css" href="css/index.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>

    <title>Search</title>
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
            <input id="searchtb" name="search" type="text" placeholder="Search..." required><button id="searchbtn" name="submit-search" type="submit"><i class="fa fa-search"></i><span class="hiddentxt">&ensp;Search</span></button>
        </form>
    
        <!-- Navigation Break -->
        <br id="navbreak">
    
        <!-- Database Items Menu -->
        <div class="dropdown">
            <button class="dropbtn" type="button">Search<span class="dropdown-arrow">&#x25BC;<span></button>
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
            <button class="dropbtn"><span class="hiddentxt">Admin</span> Tools<span class="dropdown-arrow">&#x25BC;<span></button>
            <div class="dropdown-content">
                <a href="form.php">Add Record</a>
            </div>
        </div>
    </nav>

    <!-- Main Body -->
    <div class="wrapper">
        <?php
        if(isset($_POST['submit-search']))
        {
            //Get the users search term
            $search = strtolower($_POST['search']);
            
            //Create a variable that stores subject files which have a similar string for the item name or object class as the users search term
            $result = $connection->query("select * from subjectFiles where item like '%$search%'") or die(mysqli_error($connection));
        
            if($search === "home")
            {
                echo 
                "
                <div class='scpblock border'>
                    <!-- Welcome to our Site -->
                    <div class='textblock border'>
                        <article>
                            <h2>Welcome to our Site</h2>
                            <p>SCP artifacts pose a significant threat to global security. Various agencies from around the world operate to maintain human independence from extra-terrestrial, extra-dimensional, and extra-universal threat. In the past humankind has been at the whim of these bizarre artifacts and similar phenomena, but we have now reached a point in history where we can begin to control and contain these defiances of natural law.
          
                            You are now working for the SCP Foundation. You have no need to understand how or why we operate. What you do need to understand is how vital your mission is.</p>
                        </article>
                    </div>

                    <!-- Our Goals -->
                    <div class='textblock border'>
                        <h2>Our Goals</h2>
                        <ul>
                            <li>Observe preternatural phenomena and develop new theories of science based on their observable behavior.</li>
                            <li>Contain potentially dangerous phenomena.</li>
                            <li>Develop safety procedures for dealing with all future phenomena.</li>
                            <li>Observe, detain, and destroy any one or any thing preventing us from accomplishing the above-stated goals.</li>
                        </ul>
                    </div>

                    <!-- SCP Reports -->
                    <div class='textblock border'>
                        <article>
                            <h2>SCP Reports</h2>
                            <p>One of the most essential functions of the Foundation is to compile and consolidate information about artifacts in our possession, or observed outside of our scope of influence.

                            Special Containment Procedures are required for each and every observed phenomenon. It is amongst your top priorities to assist the higher-level officers in the research required for the composition of these reports. These reports are the foundation of the Foundation.
          
                            Also, it is imperative that these documents never leak to the public. If they are verified and traced back to the source by a party not privy to this information, it could spell disaster for the Foundation and all SCP artifacts currently under our control.</p>
                        </article>
                    </div>
                
                    <a class='a-btn' href='index.php'>Go To Home Page</a>
                </div>
                ";
            }
        
            //Check if a subject file has been located with a similar string for the item name or object class as the users search term 
            if (mysqli_num_rows($result) > 0)
            {
                //Loop through each of the subject files
                foreach($result as $subjectFile)
                {
                    //Assign subject file information into variables
                    $item = $subjectFile['item'];
                    $class = $subjectFile['class'];
                    $imgsrc = $subjectFile['imgsrc'];
                    $h1 = $subjectFile['h1'];
                    $p1 = $subjectFile['p1'];
                    $h2 = $subjectFile['h2'];
                    $p2 = $subjectFile['p2'];
            
                    //Echo out scpblock start tag
                    echo "<div class='scpblock border'>";

                    //Echo out headerblock
                    echo 
                    "
                    <div class='headerblock border'>
                        <h1>Item #: $item</h1>
                        <h2>Object Class: $class</h2>
                    </div>
                    ";

                    //Check if the image source has been set
                    if(!empty($imgsrc))
                    {
                        //Echo out image 
                        echo "<img id='subject-image' src='$imgsrc' alt='Subject Image'>";
                    }

                    //Echo out textblock
                    echo 
                    "<div class='textblock border'>
                        <article>
                            <h2>$h1</h2>
                            <p>$p1</p>
                        </article>
                    </div>";
            
                    //Echo out button for subject file
                    echo "<a class='a-btn' href='index.php?subjectFile=$item'>Read More...</a>";

                    //Echo out scpblock end tag
                    echo "</div>";
                }
            }
            else if(mysqli_num_rows($result) === 0 && $search != home)
            {
                //Echo out no results found message
                echo
                "
                <div class='messagebox'>
                    <div class='messagebox-content border'>
                        <h1>No Results Found</h1>
                    </div>
                </div>
                ";
            }
        }
        ?>
    </div>
</body>
</html>