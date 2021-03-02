<?php
class Slider { 
	
	private $sliderTable = 'ac_slider';	
	private $conn;
	
	public function __construct($db){
        $this->conn = $db;
    }	
	
	public function getSliderListing(){	
		
		$sqlQuery = "
			SELECT *
			FROM ".$this->sliderTable."  
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
		
		$stmtTotal = $this->conn->prepare("SELECT * FROM ".$this->sliderTable);
		$stmtTotal->execute();
		$allResult = $stmtTotal->get_result();
		$allRecords = $allResult->num_rows;		
		
		$displayRecords = $result->num_rows;
		$sliders = array();		
		while ($slider = $result->fetch_assoc()) { 				
			$rows = array();			
            				
            $rows[] = $slider['title'];		
            $rows[] = $slider['description'];		
            $rows[] = $slider['tagline'];	
            $rows[] = $slider['image'];		
			$rows[] = '<a href="add_slider.php?id='.$slider["id"].'" class="btn btn-warning btn-xs update">Edit</a>';
			$rows[] = '<button type="button" name="delete" id="'.$slider["id"].'" class="btn btn-danger btn-xs delete" >Delete</button>';
			$sliders[] = $rows;
		}
		
		$output = array(
			"draw"	=>	intval($_POST["draw"]),			
			"iTotalRecords"	=> 	$displayRecords,
			"iTotalDisplayRecords"	=>  $allRecords,
			"data"	=> 	$sliders
		);
		
		echo json_encode($output);	
	}
	
	public function getSlider(){		
		if($this->id) {
			$sqlQuery = "
			SELECT *
			FROM ".$this->sliderTable." 			
			WHERE id = ? ";
			$stmt = $this->conn->prepare($sqlQuery);
			$stmt->bind_param("i", $this->id);	
			$stmt->execute();
			$result = $stmt->get_result();
			$slider = $result->fetch_assoc();
			return $slider;
			//echo $slider;
		}		
	}
	
	public function insert(){
        
		if(!empty($this->imagepath) && !empty($this->title) && !empty($this->description) && !empty($this->tagline)) {

			$stmt = $this->conn->prepare("
				INSERT INTO ".$this->sliderTable."(`image`,`title`,`description`,`tagline`)
				VALUES(?,?,?,?)");
		
            $this->imagepath = htmlspecialchars(strip_tags($this->imagepath));						
            $this->title = htmlspecialchars(strip_tags($this->title));						
            $this->description = htmlspecialchars(strip_tags($this->description));						
            $this->tagline = htmlspecialchars(strip_tags($this->tagline));						
			$stmt->bind_param("ssss", $this->imagepath,$this->title,$this->description,$this->tagline);
			
			if($stmt->execute()){
				return $stmt->insert_id;
			}		
		}
	}
	
	public function update(){
		//echo $this->id;
		if($this->id) {			
			$stmt = $this->conn->prepare("
				UPDATE ".$this->sliderTable." 
				SET image = ?,title = ?,description = ?,tagline = ?
				WHERE id = ?");
	 
			$this->id = htmlspecialchars(strip_tags($this->id));
            $this->imagepath = htmlspecialchars(strip_tags($this->imagepath));						
            $this->title = htmlspecialchars(strip_tags($this->title));						
            $this->description = htmlspecialchars(strip_tags($this->description));						
            $this->tagline = htmlspecialchars(strip_tags($this->tagline));						
			$stmt->bind_param("ssssi", $this->imagepath,$this->title,$this->description,$this->tagline,$this->id);
			//var_dump($stmt->execute());
			if($stmt->execute()){
				return true;
			}			
		}
		
	}
	
	public function delete(){
		
		if($this->id) {	
		
			$stmt = $this->conn->prepare("
				DELETE FROM ".$this->sliderTable." 				
				WHERE id = ?");

			$this->id = htmlspecialchars(strip_tags($this->id));

			$stmt->bind_param("i", $this->id);

			if($stmt->execute()){
				return true;
			}
		}
	}
	
	public function totalSliders(){		
		$sqlQuery = "SELECT * FROM ".$this->sliderTable;			
		$stmt = $this->conn->prepare($sqlQuery);			
		$stmt->execute();
		$result = $stmt->get_result();
		return $result->num_rows;	
	}	
}
?>