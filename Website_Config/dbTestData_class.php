<?php
require('dbBuild_class.php');
class dbTestData extends dbBuild {

	public function __construct(){  //Generate Connection via dbConn class
		parent::__construct();
	}
	
	function insertAdmin($campaign_id){
		$sql = "SELECT * from Admin WHERE Admin.Campaign_id=$campaign_id";
		$result = $this->conn->query($sql);
		if(!$result){
			die("Error Message: " . $result->error);
		}
		else{
			if ($result->num_rows > 0) {
				echo "Admin Found in Table! <br>";
			}
			else{
				$sql = "INSERT INTO Admin (Campaign_ID, Login, Password)
						VALUES ('$campaign_id', 'admin@secondharvest.com', 'admin')";
				$result = $this->conn->query($sql);
				if(!$result){
					die("Error Message: " . $result->error);
				}
				else{
					echo "Admin Uploaded <br>";
				}
			}
		}
	}

	function insertCampaign($campaign_id){
		$sql = "SELECT * from Campaigns WHERE Campaigns.id=$campaign_id";
		$result = $this->conn->query($sql);
		if(!$result){
			die("Error Message: " . $result->error);
		}
		else{
			if ($result->num_rows > 0) {
				echo "Campaign ". $campaign_id . "Found in Table! <br>";
			}	
			else{
				$sql = "INSERT INTO Campaigns (Start_Date, End_Date, Campaign_Name, Campaign_Goal, Max_Tickets)
						VALUES (2017-01-01, 2017-05-01, 'Hero Campaign', 100000, 10000)";
				$result = $this->conn->query($sql);
				if(!$result){
					die("Error Message: " . $result->error);
				}
				else{
					echo "Admin Uploaded <br>";
				}
			}
		}
	}

	function insertTicket_Types($campaign_id, $price){
		$sql = "INSERT INTO Ticket_Type (Campaign_ID, Price_Per_Ticket)
				VALUES ('$campaign_id', '$price')";
		$result = $this->conn->query($sql);
		if(!$result){
			die("Error Message: " . $result->error);
		}
		else{
			echo "One Ticket Type Uploaded <br>";
		}
	}

	function insertTickets($campaign_id, $seller_id, $buyer_id, $ticker_type_id, $payment_status, $counter){
	for($i=0; $i<$counter; $i++){
		$sql = "INSERT INTO Tickets (Seller_ID, Campaign_ID, Buyer_ID, Price_Tier_ID, Payment_Status)
				VALUES ('$seller_id', '$campaign_id', '$buyer_id', '$ticker_type_id', '$payment_status')";
		$result = $this->conn->query($sql);
		if(!$result){
			die("Error Message: " . $result->error);
		}
		else{
			echo "Total Tickets Uploaded: " . $i . "<br>";
		}
	}
	}

	function insertBuyers($campaign_id, $counter, $seller_id){
		for($i=0; $i<$counter; $i++){
			$sql = "INSERT INTO Buyers (FirstName, LastName, Email, Address1,
					Address2, City, Province, Postal_Code, Country, Phone, Occupation, Email_Contact,
					Post_Contact, Sellers_ID, Campaign_ID, Donation, Means_of_Payment)
					VALUES ('John', 'Doe', 'test@buyer.com', '1 King Street',
					'Suite 100', 'Toronto', 'ON', 'M5V0K4', 'Canada', '111-111-1111', 'Software Consultant', 1,
					0, '$seller_id', '$campaign_id', 0, 0)";
			$result = $this->conn->query($sql);
			if(!$result){
				die("Error Message: " . $result->error);
			}
			else{
				echo "Total Buyer Uploaded: " . $i . "<br>";
			}
		}
	}

	function insertSellers($campaign_id, $counter){
		for($i=0; $i<$counter; $i++){
			$sql = "INSERT INTO Sellers (Email, uid, FirstName, LastName, Address1,
					Address2, City, Province, Postal_Code, Country, Phone, Invites_Sent,
					Email_Contact, Post_Contact, Seller_Ticket_Goal, Campaign_ID)
					VALUES ('test@seller.com', 999, 'Jane', 'Finch', '8 King Street',
					'Suite 800', 'Toronto', 'ON', 'M5V0K4', 'Canada', '111-111-1111', '$counter',
					1, 0, 100, '$campaign_id')";
			$result = $this->conn->query($sql);
			if(!$result){
				die("Error Message: " . $result->error);
			}
			else{
				echo "Total Seller Uploaded: " . $i . "<br>";
			}
		}
	}

	function insertSellers1($campaign_id, $counter){
		for($i=0; $i<$counter; $i++){
			$sql = "INSERT INTO Sellers (Email, uid, FirstName, LastName, Address1,
					Address2, City, Province, Postal_Code, Country, Phone, Invites_Sent,
					Email_Contact, Post_Contact, Seller_Ticket_Goal, Campaign_ID)
					VALUES ('Zcah@seller.com', 111, 'Zach', 'Morris', '395 Yonge Street',
					'Apt 350', 'Ottawa', 'ON', 'K5V9F3', 'Canada', '888-888-8888', '$counter',
					0, 1, 150, '$campaign_id')";
			$result = $this->conn->query($sql);
			if(!$result){
				die("Error Message: " . $result->error);
			}
			else{
				echo "Total Seller Uploaded: " . $i . "<br>";
			}
		}
	}
}
?>