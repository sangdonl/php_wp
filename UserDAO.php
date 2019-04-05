<?php
require_once('./abstractDAO.php');

class UserDAO extends AbstractDAO {
    private $username;
    private $password;
	private $adminID;
	private $adminLevel;
    private $dbError;
    private $authenticated = false;
    
    function __construct() {
		try {
            parent::__construct();
			$this->dbError = false;
        } catch(mysqli_sql_exception $e) {
			$this->dbError = true;
        }
    }
	
    public function authenticate($username, $password){
        $sql = "SELECT * FROM adminusers WHERE Username = ? AND Password = ?";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param('ss', $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows == 1){
			$row = $result->fetch_assoc();
            $this->username = $username;
            $this->password = $password;
			$this->adminID = $row['AdminID'];
			$this->adminLevel = $row['AdminLevel'];
            $this->authenticated = true;
			$this->updateLastlogin();
        }
        $stmt->free_result();
    }
	
	private function updateLastlogin() {
        if(!$this->mysqli->connect_errno){
			$date = new DateTime('now');
            $query = 'UPDATE adminusers SET Lastlogin = ? WHERE AdminID = ?';
            $stmt = $this->mysqli->prepare($query);
            $stmt->bind_param('si', $date->format('Y-m-d H:i:s'), $this->getAdminID());
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
	
    public function isAuthenticated(){
        return $this->authenticated;
    }
	
    public function hasDbError(){
        return $this->dbError;
    }
	
    public function getUsername(){
        return $this->username;
    }
	
    public function getPassword(){
        return $this->password;
    }
	
    public function getAdminID(){
        return $this->adminID;
    }
	
    public function getAdminLevel(){
        return $this->adminLevel;
    }
}
?>
