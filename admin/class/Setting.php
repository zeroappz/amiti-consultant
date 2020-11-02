<?php
class Setting { 
	
	private $settingTable = 'ac_setting';	
	private $conn;
	
	public function __construct($db){
        $this->conn = $db;
    }	
	
	public function getSettingListing(){	
		
		$sqlQuery = "
			SELECT id, business_name, contact_no, firm_email, fb_url, yt_url, lin_url, twt_url, street, city, state, country, zipcode
			FROM ".$this->settingTable."  
			 ";
		
		if(!empty($_POST["search"]["value"])){
			$sqlQuery .= ' name LIKE "%'.$_POST["search"]["value"].'%" ';				
		}
		
		if(!empty($_POST["order"])){
			$sqlQuery .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
		} else {
			$sqlQuery .= 'ORDER BY id DESC ';
		}
		if($_POST["length"] != -1){
			$sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}

		$stmt = $this->conn->prepare($sqlQuery);
		$stmt->execute();
		$result = $stmt->get_result();	
		
		$stmtTotal = $this->conn->prepare("SELECT * FROM ".$this->settingTable);
		$stmtTotal->execute();
		$allResult = $stmtTotal->get_result();
		$allRecords = $allResult->num_rows;		
		
		$displayRecords = $result->num_rows;
		$settings = array();		
		while ($setting = $result->fetch_assoc()) { 				
			$rows = array();				
			$rows[] = $setting['id'];
            $rows[] = $setting['business_name'];	
            $rows[] = $setting['contact_no'];
            $rows[] = $setting['firm_email'];
            $rows[] = $setting['fb_url'];
            $rows[] = $setting['yt_url'];
            $rows[] = $setting['lin_url'];
            $rows[] = $setting['twt_url'];
            $rows[] = $setting['street'];
            $rows[] = $setting['city'];
            $rows[] = $setting['state'];
            $rows[] = $setting['country'];
            $rows[] = $setting['zipcode'];
			$rows[] = '<a href="add_settings.php?id='.$setting["id"].'" class="btn btn-warning btn-xs update">Edit</a>';
			$rows[] = '<button type="button" name="delete" id="'.$setting["id"].'" class="btn btn-danger btn-xs delete" >Delete</button>';
			$settings[] = $rows;
		}
		
		$output = array(
			"draw"	=>	intval($_POST["draw"]),			
			"iTotalRecords"	=> 	$displayRecords,
			"iTotalDisplayRecords"	=>  $allRecords,
			"data"	=> 	$settings
		);
		
		echo json_encode($output);	
	}
	
	public function getSetting(){		
		if($this->id) {
			$sqlQuery = "
			SELECT id, business_name, contact_no, firm_email, fb_url, yt_url, lin_url, twt_url, street, city, state, country, zipcode
			FROM ".$this->settingTable." 			
			WHERE id = ? ";
			$stmt = $this->conn->prepare($sqlQuery);
			$stmt->bind_param("i", $this->id);	
			$stmt->execute();
			$result = $stmt->get_result();
			$setting = $result->fetch_assoc();
			return $setting;
			//echo $setting;
		}		
	}
	
	public function insert(){
		
		if($this->business_name) {

			$stmt = $this->conn->prepare("
				INSERT INTO ".$this->settingTable."(`business_name`, `contact_no`, `firm_email`, `fb_url`, `yt_url`, `lin_url`, `twt_url`, `street`, `city`, `state`, `country`, `zipcode`)
                VALUES(?,?,?,?,?,?,?,?,?,?,?,?)");
                
                $this->business_name = htmlspecialchars(strip_tags($this->business_name));
				$this->contact_no = htmlspecialchars(strip_tags($this->contact_no));
				$this->firm_email = htmlspecialchars(strip_tags($this->firm_email));
                $this->fb_url = htmlspecialchars(strip_tags($this->fb_url));
                $this->yt_url = htmlspecialchars(strip_tags($this->yt_url));
                $this->lin_url = htmlspecialchars(strip_tags($this->lin_url));		
                $this->twt_url = htmlspecialchars(strip_tags($this->twt_url));
                $this->street = htmlspecialchars(strip_tags($this->street));
                $this->city = htmlspecialchars(strip_tags($this->city));
                $this->state = htmlspecialchars(strip_tags($this->state));	
                $this->country = htmlspecialchars(strip_tags($this->country));
                $this->zipcode = htmlspecialchars(strip_tags($this->zipcode));
               
                            
                $stmt->bind_param("ssssssssssss",$this->business_name, $this->contact_no,  $this->firm_email, $this->fb_url, $this->yt_url, $this->lin_url, $this->twt_url,$this->street,$this->city, $this->state,$this->country,$this->zipcode);
                
			
			if($stmt->execute()){
				return $stmt->insert_id;
			}		
		}
	}
	
	public function update(){
		
		if($this->id) {			
			$stmt = $this->conn->prepare("
				UPDATE ".$this->settingTable." 
				SET business_name= ?, contact_no = ?, firm_email = ?, fb_url = ?, yt_url= ?,lin_url = ?, twt_url = ?, street = ?, city= ?, state = ?, country= ?, zipcode = ?
				WHERE id = ?");

                $this->business_name = htmlspecialchars(strip_tags($this->business_name));
				$this->contact_no = htmlspecialchars(strip_tags($this->contact_no));
				$this->firm_email = htmlspecialchars(strip_tags($this->firm_email));
                $this->fb_url = htmlspecialchars(strip_tags($this->fb_url));
                $this->yt_url = htmlspecialchars(strip_tags($this->yt_url));
                $this->lin_url = htmlspecialchars(strip_tags($this->lin_url));		
                $this->twt_url = htmlspecialchars(strip_tags($this->twt_url));
                $this->street = htmlspecialchars(strip_tags($this->street));
                $this->city = htmlspecialchars(strip_tags($this->city));
                $this->state = htmlspecialchars(strip_tags($this->state));	
                $this->country = htmlspecialchars(strip_tags($this->country));
                $this->zipcode = htmlspecialchars(strip_tags($this->zipcode));	
			
                $stmt->bind_param("ssssssssssss", $this->business_name, $this->contact_no,  $this->firm_email, $this->fb_url, $this->yt_url, $this->lin_url, $this->twt_url,$this->street,$this->city, $this->state,$this->country,$this->zipcode);
                
			
			if($stmt->execute()){
				return true;
			}			
		}
		
	}
	
	public function delete(){
		
		if($this->id) {	
		
			$stmt = $this->conn->prepare("
				DELETE FROM ".$this->settingTable." 				
				WHERE id = ?");

			$this->id = htmlspecialchars(strip_tags($this->id));

			$stmt->bind_param("i", $this->id);

			if($stmt->execute()){
				return true;
			}
		}
	}
	
	public function totalSetting(){		
		$sqlQuery = "SELECT * FROM ".$this->settingTable;			
		$stmt = $this->conn->prepare($sqlQuery);			
		$stmt->execute();
		$result = $stmt->get_result();
		return $result->num_rows;	
	}	
}
?>