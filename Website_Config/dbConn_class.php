<?php
include('psl-config.php');

class dbConn extends mysqli{
	protected $conn;
	
	function __construct() {		
		$this->conn = new mysqli(HOST, USER, PASSWORD, MYDATABASE);
		if ($this->conn->connect_error) {
		  die("Connection failed: " . $this->conn->connect_error);
		}
		echo "Connected successfully! <br>";
	}
	
	function getConn(){
		return $this->conn;
	}
/*
	function execute_sql($sql) {		
		if(!$this->conn->query($sql)){
			printf("Errormesssage: %s\n", $this->conn->error);
			exit();
		}
		else{
			return $this->conn ->query($sql);
		}
	}
*/
	function countTicketsDB_All($campaign_id){
		$sql = "SELECT COUNT(*) as NumberOfOrders FROM Tickets Where Tickets.Campaign_ID='$campaign_id'";
		$result = $this->conn->query($sql);
		if(!$result){
			die("Error Message: " . $result->error);
		}
		else{
			$row = $result->fetch_assoc();
			return $row['NumberOfOrders'];
		}
	}

	function countTicketsDB_BySeller($campaign_id, $seller_id){
		$sql = "SELECT COUNT(*) as NumberOfOrders FROM Tickets Where Tickets.Seller_ID='$seller_id' AND Tickets.Campaign_ID='$campaign_id'";
		$result = $this->conn->query($sql);
		if(!$result){
			die("Error Message: " . $result->error);
		}
		else{
			$row = $result->fetch_assoc();
			return $row['NumberOfOrders'];
		}
	}

	function countTicketsDB_BySeller_Confirmed($campaign_id, $seller_id){
		$sql = "SELECT COUNT(*) as NumberOfOrders FROM Tickets WHERE Tickets.Payment_Status=1 AND Tickets.Seller_ID='$seller_id' AND Tickets.Campaign_ID='$campaign_id'";
		$result = $this->conn->query($sql);
		if(!$result){
			die("Error Message: " . $result->error);
		}
		else{
			$row = $result->fetch_assoc();
			return $row['NumberOfOrders'];
		}
	}

	function countTicketsDB_ByBuyer($campaign_id, $buyer_id){
		$sql="SELECT COUNT(*) as NumberOfOrders FROM Tickets Where Tickets.Buyer_ID='$buyer_id' AND Tickets.Campaign_ID='$campaign_id'";
		$result = $this->conn->query($sql);
		if(!$result){
			die("Error Message: " . $result->error);
		}
		else{
			$row = $result->fetch_assoc();
			return $row['NumberOfOrders'];
		}
	}

	function countTicketsDB_ByBuyer_Confirmed($campaign_id, $buyer_id){
		$sql = "SELECT COUNT(*) as NumberOfOrders FROM Tickets WHERE Tickets.Payment_Status=1 AND Tickets.Buyer_ID = '$buyer_id' AND Tickets.Campaign_ID='$campaign_id'";
		$result = $this->conn->query($sql);
		if(!$result){
			die("Error Message: " . $result->error);
		}
		else{
			$row = $result->fetch_assoc();
			return $row['NumberOfOrders'];
		}
	}	

	function countSellersDB($campaign_id){
		$sql = "SELECT COUNT(*) as NumberOfSellers FROM Sellers WHERE Campaign_ID='$campaign_id'";
		$result = $this->conn->query($sql);
		if(!$result){
			die("Error Message: " . $result->error);
		}
		else{
			$row = $result->fetch_assoc();
			return $row['NumberOfSellers'];
		}
	}

	function countBuyersDB($campaign_id){
		$sql = "SELECT COUNT(*) as NumberOfBuyers FROM Buyers WHERE Campaign_ID='$campaign_id'";
		$result = $this->conn->query($sql);
		if(!$result){
			die("Error Message: " . $result->error);
		}
		else{
			$row = $result->fetch_assoc();
			return $row['NumberOfBuyers'];
		}
	}

	function totalValueSold_BySeller($campaign_id, $seller_id){
		$sql = "SELECT SUM(Price_Per_Ticket) as Totals FROM (Ticket_Type INNER JOIN Tickets ON 
				Tickets.Price_Tier_ID=Ticket_Type.id AND Tickets.seller_id = '$seller_id' AND Tickets.campaign_id='$campaign_id')";
		$result = $this->conn->query($sql);
		if(!$result){
			die("Error Message: " . $result->error);
		}
		else{
			$row = $result->fetch_assoc();
			return $row['Totals'];
		}
	}

	function totalValueSold_ByBuyer($campaign_id, $buyer_id){
		$sql = "SELECT SUM(Price_Per_Ticket) as Totals FROM (Ticket_Type INNER JOIN Tickets ON 
				Tickets.Price_Tier_ID=Ticket_Type.id AND Tickets.Buyer_ID = '$buyer_id' AND Tickets.Campaign_ID='$campaign_id')";
		$result = $this->conn->query($sql);
		if(!$result){
			die("Error Message: " . $result->error);
		}
		else{
			$row = $result->fetch_assoc();
			return $row['Totals'];
		}
	}

	function totalValueSoldDB_All($campaign_id){
		$sql = "SELECT SUM(Price_Per_Ticket) as Totals FROM (Ticket_Type INNER JOIN Tickets ON
				Tickets.Price_Tier_ID=Ticket_Type.id AND Tickets.Campaign_ID = '$campaign_id')";
		$result = $this->conn->query($sql);
		if(!$result){
			die("Error Message: " . $result->error);
		}
		else{
			$row = $result->fetch_assoc();
			return $row['Totals'];
		}
	}

	function countCampaignsDB($campaign_id){
		$sql = "SELECT COUNT(*) as NumberOfCampaigns FROM Campaigns WHERE Campaigns.id='$campaign_id'";
		$result = $this->conn->query($sql);
		if(!$result){
			die("Error Message: " . $this->conn->error);
		}	
		else{
			$row = $result->fetch_assoc();
			return $row['NumberOfCampaigns'];
		}
	}

	function login($user_id, $user_pwd, $campaign_id){
		$sql = "SELECT * FROM Admin where '$user_id'=Admin.Login AND '$user_pwd'=Admin.Password AND '$campaign_id'=Admin.Campaign_ID";
		$result = $this->conn->query($sql);
		if(!$result){
			die("Error Message: " . $result->error);
		}
		else{	
			if ($result->num_rows > 0) {
				echo "Validated As Admin";
				header('Location: Secondharvestdash.html');
				exit();
			} else{
				$sql = "SELECT * FROM Sellers where '$user_id'=Sellers.Email AND '$user_pwd'=Sellers.uid AND '$campaign_id'=Sellers.Campaign_ID";
				$result1 = $this->conn->query($sql);
				if(!$result1){
					die("Error Message: " . $result1->error);
				}
				else{
					if ($result1->num_rows > 0) {
						echo "Validated As Seller";
						header('Location: Championdash.html');
						exit();
					} else{
						echo "Not Validated<br>";
					}
				}
			}
		}
	}

	function displaySellerTable($campaign_id){
		echo "<table><thead>";
		$this->displaySellerTableHeaders();
		$sql = "SELECT * FROM Sellers WHERE Sellers.Campaign_ID='$campaign_id'";
		$result = $this->conn->query($sql);
		if(!$result){
			die("Error Message: " . $result->error);
		}
		else{
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					$Seller_Tickets = $this->countTicketsDB_BySeller($campaign_id, $row['id']);
					$Seller_Confirmed_Tickets = $this->countTicketsDB_BySeller_Confirmed($campaign_id, $row['id']);
					$Seller_Value_Sold = $this->totalValueSold_BySeller($campaign_id, $row['id']);

					echo "<tr>";
					echo "<th>" . $row['id'] . "</th>";
					echo "<th>" . $row['Campaign_ID'] . "</th>";
					echo "<th>" . $row['FirstName'] . "</th>";
					echo "<th>" . $row['LastName'] . "</th>";
					echo "<th>" . $row['Email'] . "</th>";
					echo "<th>" . $Seller_Tickets . "</th>";
					echo "<th>" . $Seller_Confirmed_Tickets . "</th>";
					echo "<th>" . $Seller_Value_Sold . "</th>";
					echo "<th>" . $row['Address1'] . "</th>";
					echo "<th>" . $row['Address2'] . "</th>";
					echo "<th>" . $row['City'] . "</th>";
					echo "<th>" . $row['Province'] . "</th>";
					echo "<th>" . $row['Postal_Code'] . "</th>";
					echo "<th>" . $row['Phone'] . "</th>";
					echo "<th>" . $row['Email_Contact'] . "</th>";
					echo "<th>" . $row['Post_Contact'] . "</th>";
					echo "</tr>";
				}				
				echo "</thead></table>";
			  }
			else {
				echo "0 results";
			}
		}
	}

	function displayBuyerTable($campaign_id){
		echo "<table><thead>";
		$this->displayBuyerTableHeaders();
		$sql = "SELECT * FROM Buyers WHERE Campaign_ID='$campaign_id'";
		$result = $this->conn->query($sql);
		if(!$result){
			die("Error Message: " . $result->error);
		}
		else{
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					$Buyer_Tickets = $this->countTicketsDB_ByBuyer($campaign_id, $row['id']);
					$Buyer_Confirmed = $this->countTicketsDB_ByBuyer_Confirmed($campaign_id, $row['id']);
					$Buyer_Total_Value = $this->totalValueSold_ByBuyer($campaign_id, $row['id']);

					echo "<tr>";
					echo "<th>" . $row['id'] . "</th>";
					echo "<th>" . $row['Campaign_ID'] . "</th>";
					echo "<th>" . $row['FirstName'] . "</th>";
					echo "<th>" . $row['LastName'] . "</th>";
					echo "<th>" . $row['Email'] . "</th>";
					echo "<th>" . $Buyer_Tickets . "</th>";
					echo "<th>" . $Buyer_Confirmed . "</th>";
					echo "<th>" . $Buyer_Total_Value . "</th>";
					echo "<th>" . $row['Address1'] . "</th>";
					echo "<th>" . $row['Address2'] . "</th>";
					echo "<th>" . $row['City'] . "</th>";
					echo "<th>" . $row['Province'] . "</th>";
					echo "<th>" . $row['Postal_Code'] . "</th>";
					echo "<th>" . $row['Phone'] . "</th>";
					echo "<th>" . $row['Email_Contact'] . "</th>";
					echo "<th>" . $row['Post_Contact'] . "</th>";
					echo "</tr>";
				}				
				echo "</thead></table>";
			  }
			else {
				echo "0 results";
			}
		}
	}

	function displayCampaignTable(){
		echo "<table><thead>";
		$this->displayCampaignTableHeaders();
		$sql = "SELECT * FROM Campaigns";
		$result = $this->conn->query($sql);
		if(!$result){
			die("Error Message: " . $result->error);
		}
		else{
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
				$sellers_counts=$this->countSellersDB($row['id']);
				$buyers_counts=$this->countBuyersDB($row['id']);
				$total_value=$this->totalValueSoldDB_All($row['id']);
			
					echo "<tr>";
					echo "<th>" . $row['id'] . "</th>";
					echo "<th>" . $row['Campaign_Name'] . "</th>";
					echo "<th>" . $row['Start_Date'] . "</th>";
					echo "<th>" . $row['End_Date'] . "</th>";
					echo "<th>" . $sellers_counts . "</th>";
					echo "<th>" . $buyers_counts . "</th>";
					echo "<th>" . $row['Campaign_Goal'] . "</th>";
					echo "<th>" . $row['Max_Tickets'] . "</th>";
					echo "<th>" . $total_value . "</th>";
					echo "</tr>";
				}
				echo "</thead></table>";
			  }
			else {
				echo "0 results";
			}
		}
	}

	private function displaySellerTableHeaders(){
		echo "<th>ID</th>";
		echo "<th>Campaign ID</th>";
		echo "<th>First Name</th>";
		echo "<th>Surname</th>";
		echo "<th>Email</th>";
		echo "<th>Invitations Sent</th>";
		echo "<th>Confirmed Tickets</th>";
		echo "<th>Purchased Tickets</th>";
		echo "<th>Value Sold</th>";
		echo "<th>Address1</th>";
		echo "<th>Address2</th>";
		echo "<th>City</th>";
		echo "<th>Province</th>";
		echo "<th>Postal Code</th>";
		echo "<th>Phone</th>";
		echo "<th>E-mail Contact</th>";
		echo "<th>Postal Contact</th>";
	}
	
	private function displayBuyerTableHeaders(){
		echo "<th>ID</th>";
		echo "<th>Campaign ID</th>";
		echo "<th>First name</th>";
		echo "<th>Surname</th>";
		echo "<th>Email</th>";
		echo "<th>Confirmed Tickets</th>";
		echo "<th>Purchased Tickets</th>";
		echo "<th>Value Bought</th>";
		echo "<th>Address1</th>";
		echo "<th>Address2</th>";
		echo "<th>City</th>";
		echo "<th>Province</th>";
		echo "<th>Postal Code</th>";
		echo "<th>Phone</th>";
		echo "<th>Email Contact</th>";
		echo "<th>Post Contact</th>";
	}

	private function displayCampaignTableHeaders(){
		echo "<th>ID</th>";
		echo "<th>Campaign Name</th>";
		echo "<th>Start Date</th>";
		echo "<th>End Date</th>";
		echo "<th>Sellers</th>";
		echo "<th>Buyers</th>";
		echo "<th>Campaign_Goal</th>";
		echo "<th>Max_Tickets</th>";
		echo "<th>Total_Value_Sold</th>";
	}

	function importCSV($filename){
		ini_set('auto_detect_line_endings',TRUE);
		//$filename = "ChampionUserFields.csv";
		
		if(($file = fopen($filename, 'r'))!==FALSE){
			fgetcsv($file); //Skip First Line
			while(($line = fgetcsv($file, 1000, ",")) !== FALSE) {
			$sql = "INSERT INTO Sellers (LastName, FirstName, Address1, Address2, City, Province,
					Postal_Code, Country, Phone, Email, Email_Contact, Post_Contact, uid, Campaign_ID)
					VALUES ('$line[1]', '$line[2]', '$line[3]', '$line[4]', '$line[5]', '$line[6]',
					'$line[7]', '$line[8]', '$line[9]', '$line[11]', '$line[12]', '$line[13]', '$line[16]', '$line[52]')";
//				if ($this->execute($sql) === TRUE) {
				if ($this->conn->query($sql) === TRUE) {
					echo "";
				} else {
					echo "";
				}
			}
			fclose($file);
		}		
		ini_set('auto_detect_line_endings',FALSE);
	}

	function exportDB(){
	$sql = "SELECT 'id', 'FirstName', 'LastName', 'Email', 'Address1', 'Address2'
			'City', 'Province', 'Postal_Code', 'Country', 'Phone', 'Email_Contact', 'Post_Contact',
			'Sellers_ID', 'Donation', 'Means_of_Payment', 'reg_date', 'Campaign_ID'
		   UNION ALL
		   SELECT id, FirstName, LastName, Email, Address1, Address2
			City, Province, Postal_Code, Country, Phone, Email_Contact, Post_Contact,
			Sellers_ID, Donation, Means_of_Payment, Campaign_ID, reg_date
		   FROM BUYERS
		   INTO OUTFILE '/tmp/Buyers.csv'
		   FIELDS ESCAPED BY ','
		   TERMINATED BY ','
		   ENCLOSED BY '\"'
		   LINES TERMINATED BY '\r\n'";
	$result = $this->conn->query($sql);
		if(!$result){
			die("Error Message: " . $result->error);
		}
		else{
			echo "Outputted Buyers <br>";
		}
	}

	function __destruct() {		
		$this->conn->close();
		echo "Connection Closed! <br>";
	}
}
?>