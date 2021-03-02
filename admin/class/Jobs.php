<?php
class Job { 
	
	private $jobTable = 'ac_jobs';	
	private $conn;
	
	public function __construct($db){
        $this->conn = $db;
    }	
	
	public function getJobsListing(){	
		
		$sqlQuery = "
			SELECT *
			FROM ".$this->jobTable."  
			 ";
		
		if(!empty($_POST["search"]["value"])){
			$sqlQuery .= 'Where (name LIKE "%'.$_POST["search"]["value"].'%" ';	
			$sqlQuery .= 'OR status LIKE "%'.$_POST["search"]["value"].'%") ';			
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
		
		$stmtTotal = $this->conn->prepare("SELECT * FROM ".$this->jobTable);
		$stmtTotal->execute();
		$allResult = $stmtTotal->get_result();
		$allRecords = $allResult->num_rows;		
		
		$displayRecords = $result->num_rows;
		$jobs = array();		
		while ($job = $result->fetch_assoc()) { 				
			$rows = array();			
            				
            $rows[] = $job['title'];		
            $rows[] = $job['role'];		
            $rows[] = $job['description'];	
            $rows[] = $job['salaryfrom']."-".$job['salaryto'];	
            $rows[] = $job['expfrom']."-".$job['expto'];	
			$rows[] = '<a href="add_jobs.php?id='.$job["id"].'" class="btn btn-warning btn-xs update">Edit</a>';
			$rows[] = '<button type="button" name="delete" id="'.$job["id"].'" class="btn btn-danger btn-xs delete" >Delete</button>';
			$jobs[] = $rows;
		}
		
		$output = array(
			"draw"	=>	intval($_POST["draw"]),			
			"iTotalRecords"	=> 	$displayRecords,
			"iTotalDisplayRecords"	=>  $allRecords,
			"data"	=> 	$jobs
		);
		
		echo json_encode($output);	
	}
	
	public function getJob(){		
		if($this->id) {
			$sqlQuery = "
			SELECT *
			FROM ".$this->jobTable." 			
			WHERE id = ? ";
			$stmt = $this->conn->prepare($sqlQuery);
			$stmt->bind_param("i", $this->id);	
			$stmt->execute();
			$result = $stmt->get_result();
			$job = $result->fetch_assoc();
			return $job;
			//echo $slider;
		}		
	}
	
	public function insert(){
        
        if(!empty($this->title) && !empty($this->role) && !empty($this->description) && !empty($this->salaryfrom)
        && !empty($this->salaryto) && !empty($this->expfrom) && !empty($this->expto)) {

			$stmt = $this->conn->prepare("
				INSERT INTO ".$this->jobTable."(`title`,`role`,`description`,`salaryfrom`,`salaryto`,`expfrom`,`expto`)
				VALUES(?,?,?,?,?,?,?)");
		
            $this->role = htmlspecialchars(strip_tags($this->role));						
            $this->title = htmlspecialchars(strip_tags($this->title));						
            $this->description = htmlspecialchars(strip_tags($this->description));						
            $this->salaryfrom = htmlspecialchars(strip_tags($this->salaryfrom));						
            $this->salaryto = htmlspecialchars(strip_tags($this->salaryto));
            $this->expfrom = htmlspecialchars(strip_tags($this->expfrom));
            $this->expto = htmlspecialchars(strip_tags($this->expto));
            $stmt->bind_param("sssssii", $this->title,$this->role,$this->description,$this->salaryfrom, $this->salaryto,
                                        $this->expfrom,$this->expto);
			
			if($stmt->execute()){
				return $stmt->insert_id;
			}		
		}
	}
	
	public function update(){
		//echo $this->id;
		if($this->id) {			
			$stmt = $this->conn->prepare("
				UPDATE ".$this->jobTable." 
				SET title = ? , role = ?, description = ?,salaryfrom = ?,salaryto = ?,expfrom = ?,expto = ?
				WHERE id = ?");
	 
			$this->id = htmlspecialchars(strip_tags($this->id));
            $this->role = htmlspecialchars(strip_tags($this->role));						
            $this->title = htmlspecialchars(strip_tags($this->title));						
            $this->description = htmlspecialchars(strip_tags($this->description));						
            $this->salaryfrom = htmlspecialchars(strip_tags($this->salaryfrom));						
            $this->salaryto = htmlspecialchars(strip_tags($this->salaryto));
            $this->expfrom = htmlspecialchars(strip_tags($this->expfrom));
            $this->expto = htmlspecialchars(strip_tags($this->expto));						
            $stmt->bind_param("sssssiii", $this->title,$this->role,$this->description,$this->salaryfrom, $this->salaryto,
            $this->expfrom,$this->expto,$this->id);
			if($stmt->execute()){
				return true;
			}			
		}
		
	}
	
	public function delete(){
		
		if($this->id) {	
		
			$stmt = $this->conn->prepare("
				DELETE FROM ".$this->jobTable." 				
				WHERE id = ?");

			$this->id = htmlspecialchars(strip_tags($this->id));

			$stmt->bind_param("i", $this->id);

			if($stmt->execute()){
				return true;
			}
		}
	}
	
	public function totalJobs(){		
		$sqlQuery = "SELECT * FROM ".$this->jobTable;			
		$stmt = $this->conn->prepare($sqlQuery);			
		$stmt->execute();
		$result = $stmt->get_result();
		return $result->num_rows;	
	}	
}
?>