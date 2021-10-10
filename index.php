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
    
    //Check if a value has been set for the subject file
    if(isset($_GET['subjectFile']))
    {
        //Get id from subjectFile
        //Remove single quotes from subjectFile get value
        $item = trim($_GET['subjectFile'], "'");
        
        //Run a sql command to select a record based on the get value
        $record = $connection->query("select * from subjectFiles where item='$item'") or die($connection->mysqli_error($connection));

        //Convert record into an associative array
        $assocarray = $record->fetch_assoc();
                
        //Variables to hold the update and delete url strings
        $id = $assocarray['id'];
        $update = "update.php?update=" . $id;
        $delete = "alert.php?delete=" . $id;

        //Set page name to the sbuject file item string
        $pgname = $item;
    }
    else
    {
        //Set default page name
        $pgname = "Home";
    }
    ?>
    
    <!-- Echo out page name -->
    <title><?php echo $pgname; ?></title>
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
            <input id="searchtb" name="search" type="text" placeholder="Search..." required><button id="searchbtn" name="submit-search" type="submit"><i class="fa fa-search"></i><span class="hiddentxt">&ensp;Search</span></button>
        </form>
    
        <!-- Navigation Break -->
        <br id="navbreak">
    
        <!-- Database Items Menu -->
        <div class="dropdown">
            <button class="dropbtn" type="button">
                <!-- Echo out page name -->
                <span class="dropdown-text"><?php echo $pgname; ?></span>
                <span class="dropdown-arrow">&#x25BC;<span>
            </button>
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
          
                <?php
                //Check if the item variable contains any text
                if(!empty($item))
                {
                    //Echo out Delete and Update Links
                    echo
                    "
                    <a href='$delete'>Delete Record</a>
                    <a href='$update'>Update Record</a>
                    ";
                }
                ?>
            </div>
      </div>
    </nav>

    <!-- Main Body -->
    <div class="wrapper">
        <?php
        if(isset($item))
        {
            //Declare Variables
            $item = $assocarray['item'];
            $class = $assocarray['class'];
            $image = $assocarray['imgsrc'];

            //Echo out headerblock 
            echo 
            "
            <div class='headerblock border'>
                <h1>Item #: $item</h1>
                <h2>Object Class: $class</h2>
            </div>
            ";
                
            //Check if the image source has been set
            if(!empty($image))
            {
                //Echo out image
                echo 
                "<div class='imageblock border'>
                    <img id='subject-image' src='$image' alt='Subject Image'>
                </div>";
            }

            //Convert associative array to indexed array
            $array = array_values($assocarray);
                
            //Loop through textblock items
            for ($i = 4; $i <= 42; $i+=2)
            {
                //Assign heading and paragraphs into variables
                $h = $array[$i];
                $p = $array[$i + 1];
                
                //Echo out textblocks
                if(!empty($h) && !empty($p))
                {
                    echo 
                    "
                    <div class='textblock border'>
                        <article>
                            <h2>$h</h2>
                            <p>$p</p>
                        </article>
                    </div>
                    ";
                }
            }
        }
        else
        {
            //Echo out default page contents
            echo
            "
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

            <!-- A Word From The Administrator -->
            <div class='textblock border'>
                <article>
                    <h2>A Word from 'The Administrator'</h2>
                    <p>Mankind in its present state has been around for a quarter of a million years, yet only the last 4,000 have been of any significance. So, what did we do for nearly 250,000 years? We huddled in caves and around small fires, fearful of the things that we didn't understand. It was more than explaining why the sun came up, it was the mystery and begged them to spare us and prayed for salvation.
      
                     In time, their numbers dwindled and our numbers rose. The world began to make more sense when there were less things to fear. Yet, the unexplained can never truly go away, as if the universe demands the absurd and impossible.
  
                    Mankind must not go back to hiding in fear. No one else will protect us, we must stand up for ourselves.
  
                    While the rest of mankind dwell in the light, we must stand in the darkness to combat it, contain it, and shield it from the eyes of the public, so that others may live in a sane, normal world.
  
                    We secure. We contain. We protect.</p>
                </article>
            </div>

            <!-- The Foundation -->
            <div class='textblock border'>
                <h2>The Foundation</h2>
                <p>Clandestine and worldwide, The SCP Foundation operates beyond jurisdiction, empowered and entrusted by every major world government with the task of containing 'items which jeopardize normalcy.'

                Many of these 'items' pose both a physical danger to people and a psychological mistrust in worldly affairs, their personal beliefs, and an interruption to daily life.</p>
                <ul>
                    <li>exempli gratia - the average individual might be quite troubled by the existence of SCP-126, believing there could be many like her present at any time.</li>
                    <li>exempli gratia - daunted by the fact that mankind is threatened by SCP-008 or SCP-058</li>
                    <li>exempli gratia - the likelihood that many people would submit to or even worship subjects such as SCP-076 or SCP-882</li>
                </ul>
            </div>

            <!-- Special Containment Procedures -->
            <div class='textblock border'>
                <article>
                    <h2>Special Containment Procedures</h2>
                    <p>Commonly known as 'SCPs,' these articles are overview reports of individual 'Items' in containment by SCP personnel and facilities. They quickly summarize threats and describe Items with only necessary details (as time might be short on hand in the event of a containment breach or other event).

                    Items can be an object, place, person, animal or even an occurance. They are given an Item# as SCP-XXX and categorized. SCPs are grouped as being 'Safe,' 'Euclid,' or 'Keter' which are classifications that explain expected threat levels.
          
                    Anyone may draw up an SCP protocol on any Item and add it to 'The List,' but every author is subject to review by his or her peers, and must adhere to the high standards and clinical approach mandated by his fellows.</p>
                </article>
            </div>
            ";
        }
        ?>
    </div>
</body>
</html>