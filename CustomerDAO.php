<?php
require_once('./abstractDAO.php');
require_once('./customer.php');

class CustomerDAO extends AbstractDAO {
        
    function __construct() {
        try {
            parent::__construct();
        } catch(mysqli_sql_exception $e) {
            throw $e;
        }
    }
    
    /*
     * Returns an array of all Customer objects. If no customers exist, returns false.
     */
    public function getCustomers() {
        //The query method returns a mysqli_result object
        $result = $this->mysqli->query('SELECT * FROM mailinglist');
        $customers = Array();
        
        if($result->num_rows >= 1){
            while($row = $result->fetch_assoc()){
                //Create a new customer object, and add it to the array.
                $customer = new Customer($row['_id'], $row['firstName'], $row['lastName'], 
					$row['phoneNumber'], $row['emailAddress'], $row['username'], $row['referrer']);
                $customers[] = $customer;
            }
            $result->free();
            return $customers;
        }
        $result->free();
        return false;
    }
    
    /*
     * Returns an Customer object. If no customer exist, returns false.
     */
    public function getCustomer($customerID){
        $query = 'SELECT * FROM mailinglist WHERE _id = ?';
		// The prepare method of the mysqli object returns a mysqli_stmt object.  
        // It takes a parameterized query as a parameter.
        $stmt = $this->mysqli->prepare($query);
		// The string contains a one-letter datatype description for each parameter. 'i' is used for integer.
        $stmt->bind_param('i', $customerID);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows == 1){
            $row = $result->fetch_assoc();
            $customer = new Customer($row['_id'], $row['firstName'], $row['lastName'], 
					$row['phoneNumber'], $row['emailAddress'], $row['username'], $row['referrer']);
            $result->free();
            return $customer;
        }
        $result->free();
        return false;
    }

	/*
     * Returns an Customer object using username. If no customer exist, returns false.
     */
    public function getCustomerByUsername($username){
        $query = 'SELECT * FROM mailinglist WHERE username = ?';
		// The prepare method of the mysqli object returns a mysqli_stmt object.  
        // It takes a parameterized query as a parameter.
        $stmt = $this->mysqli->prepare($query);
		// The string contains a one-letter datatype description for each parameter. 's' is used for string.
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows == 1){
            $result->free();
            return true;
        }
        $result->free();
        return false;
    }

    public function insertCustomer($firstName, $lastName, $phoneNumber, $emailAddress, $username, $referrer){
															
		// validation check : if(!is_numeric($employee->getEmployeeId())){ return 'EmployeeId must be a number.';

        if(!$this->mysqli->connect_errno){
			
            $query = 'INSERT INTO mailinglist (firstName, lastName, phoneNumber, emailAddress, username, referrer) 
				VALUES (?, ?, ?, ?, ?, ?)';
            // The prepare method of the mysqli object returns a mysqli_stmt object.  
            // It takes a parameterized query as a parameter.
            $stmt = $this->mysqli->prepare($query);
            // The first parameter of bind_param takes a string describing the data. 
			// In this case, we are passing six variables.
			$hash = password_hash($emailAddress, PASSWORD_BCRYPT); // one side encryption for password
            $stmt->bind_param('ssssss', $firstName, $lastName, $phoneNumber, $hash, $username, $referrer);
            //Execute the statement
            $stmt->execute();
            //If there are errors, they will be in the error property of the mysqli_stmt object.
            if($stmt->error){
                return false;
            } else {
                return true;
            }
        } else {
            return false;
        }
    }
    
    public function deleteCustomer($customerID) {
        if(!$this->mysqli->connect_errno){
            $query = 'DELETE FROM mailinglist WHERE _id = ?';
            $stmt = $this->mysqli->prepare($query);
            $stmt->bind_param('i', $customerID);
            $stmt->execute();
            if($stmt->error){
                return false;
            } else {
                return true;
            }
        } else {
            return false;
        }
    }
    
    public function updateCustomer($customerID, $firstName, $lastName, $phoneNumber, $emailAddress, $username, $referrer) {
        if(!$this->mysqli->connect_errno){
            $query = 'UPDATE mailinglist SET firstName = ?, lastName = ?, phoneNumber = ?, emailAddress = ?, username = ?,
				referrer = ? WHERE _id = ?';
            $stmt = $this->mysqli->prepare($query);
            $stmt->bind_param('ssssssi', $firstName, $lastName, $phoneNumber, $emailAddress, $username, $referrer, $customerID);
            $stmt->execute();
            if($stmt->error){
                return false;
            } else {
                return true;
            }
        } else {
            return false;
        }
    }
}

?>
