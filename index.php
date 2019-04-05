<?php 
	require_once('./header.php'); 
	require_once('./class_lib.php');
	
	$date = new DateTime('now');
	$weekString = $date->format('l');
	
	$events[0] = new EventItem("St. Patty's Day Party", "2015-03-17 19:00:00", "Join us for an authentic Irish four course meal, complete with shepard's pie and one green beer!", 35.0);
	$events[1] = new EventItem("Samy's Spring Fling!", "2015-04-18 20:00:00", "Join us for to kick off the beginning of spring! This event will include 4 of Samy's infamous appetizers and one cocktail!", 40.0);
?>

            <div id="content" class="clearfix">
                <aside>
                        <h2><?php echo($weekString) ?>'s Specials</h2>
                        <hr>
                        <img src="images/burger_small.jpg" alt="Burger" title="Monday's Special - Burger">
                        <h3>The WP Burger</h3>
                        <p>Freshly made all-beef patty served up with homefries - $14</p>
                        <hr>
                        <img src="images/kebobs.jpg" alt="Kebobs" title="WP Kebobs">
                        <h3>WP Kebobs</h3>
                        <p>Tender cuts of beef and chicken, served with your choice of side - $17</p>
                        <hr>
                        <h2>Private Dining</h2>
                        <img src="images/dining_room_sm.jpg" width="228" alt="Dining Room" title="The WP Eatery Dining Room">
                        <p>Call us to find out more about our private dinning options.</p>
                </aside>
                <div class="main">
                    <h1>Welcome to WP Eatery!</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                    <h3>Upcoming Events ...</h3>
                    
                    <?php
						foreach ($events as $event) {
					?>
                    	<p>
                    	<strong class="event"><?php echo $event->getEventName() ?></strong><br/>
                    	<strong>Date:</strong> <?php echo $event->getEventDate() ?><br/>
                    	<strong>Time:</strong> <?php echo $event->getEventTime() ?><br/>
                    	<strong>Price:</strong> <?php echo $event->getEventPrice() ?><br/>
                    	<?php echo $event->getEventDesc() ?>
                    </p>
                    <?php
						}
					?>
                    
                    <h2>Book your Private Party!</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                </div><!-- End Main -->
            </div><!-- End Content -->
<?php include 'footer.php'; ?>