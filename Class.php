<?php 

$filepath = realpath(dirname(__FILE__));

include_once ($filepath.'/../lib/Database.php');

include_once ($filepath.'/../helpers/format.php');


?>


<?php

class Updates{
	
	private $db;

	 private $fm;

	 public	function __construct(){
			 $this->db = new Database();
			 $this->fm = new Format();
		}


		// Insert news and updates

		public function UpdateNewsInsert($update_title, $update_text){


			$update_title = $this->fm->validation($update_title);
			$update_text = $this->fm->validation($update_text);


			$update_title = mysqli_escape_string($this->db->link,$update_title);
			$update_text = mysqli_escape_string($this->db->link,$update_text);

			if ($update_title=="" || $update_text=="") {
				$msg = "<span class='alert alert-danger'> fields must not be empty</span>";
				return $msg;
			}else{
				$query = "INSERT INTO update_tbl(update_title, update_text) VALUES('$update_title', '$update_text')";
				$UpdateNewsInsert= $this->db->insert($query);

				if ($UpdateNewsInsert){
					$msg= "<span class='alert alert-success'>News &Update successfully inserted.</span>";

					return $msg;
				} else {
					$msg = "<span class=' alert alert-danger'>News & Update not inserted</span>";

					return $msg;
				}
				
			}


		}

// display all news and updates
	public function getAllUpdates(){
	$query = "SELECT * FROM update_tbl ORDER BY update_id";

	$result = $this->db->select($query);
	

	return $result;

}


// display all news and updates for home page
	public function getAllUpdatesForHome(){

	$query = "SELECT * FROM update_tbl ORDER BY update_id DESC  LIMIT 0,4 ";

	$result = $this->db->select($query);

	return $result;

}


// Delete news & updates
	public function delUpdateById($id){

	$query = "DELETE FROM update_tbl WHERE update_id = '$id'";

	$delete_row = $this->db->delete($query);

	if ($delete_row) {
		echo "<script>alert('news deleted sucessfully')</script>";
		echo "<script>window.location = 'all_updates.php'</script>";

	
		} else {
			$msg = "<span class='alert alert-danger'>News not deleted</span>";

			return $msg;
		}
	

}

// Get news & updates by ID 

public function getUpdatesById($id){

	$query = "SELECT * FROM update_tbl WHERE update_id = '$id'";

	$result = $this->db->select($query);

	return $result;


}


// Updates News & updates


public function UpdateNews($update_title, $update_text, $id){
 	$update_title = $this->fm->validation($update_title);
 	$update_text = $this->fm->validation($update_text);



	$update_title = mysqli_escape_string($this->db->link,$update_title);
	$update_text = mysqli_escape_string($this->db->link,$update_text);
	$id = mysqli_escape_string($this->db->link,$id);

	if ($update_text=="" || $update_title=="") {
		$msg = "<span class='alert alert-danger'>fields must not be empty</span>";

		return $msg;
	}else {
		$query = "UPDATE update_tbl SET update_title = '$update_title', update_text = '$update_text'  WHERE update_id = '$id'";

		$updated_row = $this->db->update($query);
		if ($updated_row) {
			echo "<script>alert('news updated sucessfully')</script>";
			echo "<script>window.location = 'all_updates.php'</script>";
		} else {
			$msg = "<span class=' alert alert-danger'>news not updated</span>";

			return $msg;
		}
		
	}


 }


}

?>
