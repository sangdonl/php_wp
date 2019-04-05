<?php 
require_once('./header.php'); 
require_once('./customerDAO.php'); // Database connection and function defenition
?>
            <div id="content" class="clearfix">
                <div class="main" style="width: 700px;">
                    <?php
					try {
						$customerDAO = new CustomerDAO();
				        $customers = $customerDAO->getCustomers();
       	    			if($customers){
			                echo "<table class='kbs-table'>";
           	    			echo '<thead><tr><th>Full Name</th><th>Email</th><th>Username</th><th>Phone</th></tr></thead><tbody>';
               				foreach($customers as $customer) {
                   				echo '<tr>';
                   				echo "<td style='width: 150px;'>" . $customer->getFirstName() . ' ' . $customer->getLastName() . '</td>';
           	        			echo "<td style='width: 280px;'><div style='width: 280px; word-wrap: break-word'>" . $customer->getEmailAddress() . '</div></td>';
               	    			echo "<td style='width: 100px;'>" . $customer->getUsername() . '</td>';
								echo "<td style='width: 130px;'>" . $customer->getPhoneNumber() . '</td>';
                   				echo '</tr>';
							}
							echo '</tbody></table>';
               			}
           			} catch(Exception $e) {
           				echo '<h3>Error on page.</h3>';
           				echo '<p>' . $e->getMessage() . '</p>';            
       				}
       			?>
                </div><!-- End Main -->
            </div><!-- End Content -->
            
<?php  
	include './footer.php'; 
?>