<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

class Model
{
	public function __construct()
	{
		$hostname = "sql112.epizy.com";
		$username = "epiz_32786088";
		$password = "3rMQqS3Mlvs1M";
		$database = "epiz_32786088_sakura";

	$this->link = mysqli_connect($hostname,$username,$password,$database);

	}

	public function store_input($insertID)
	{

		$name = $_POST["name"];
		$mobile = $_POST["mobile"];
		$level = $_POST["level"];

		date_default_timezone_set('Asia/Dhaka');
		$created_at = date('d-M-y');
		//$created_at = date('d-M-y h:i a');
		//$selectedVendor = ($_POST['vendor'] == "others" ) ?  $_POST['othervendor']: $_POST['vendor'];

		$query = "INSERT INTO `users`(`username`,`name`,`user_level`,`created_on`) VALUES ('$mobile','$name','$level','$created_at')";
		// var_dump($query);
		// exit();
		//mysqli_query($this->link,$query);

		$sql = mysqli_query($this->link,$query);

		// var_dump($this->link);
		// exit();
		//header("location: forms.php");
		if ($sql==true) {
		header("location: store_list.php?msg=Data inserted successfully");
				//exit();
			}else{
				echo "Failed to insert";
			}
	}

	public function category_input($insertID)
	{

		$cat_name = $_POST["category"];

		$query = "INSERT INTO `product_category`(`cat_name`) VALUES ('$cat_name')";
		// var_dump($query);
		// exit();
		//mysqli_query($this->link,$query);

		$sql = mysqli_query($this->link,$query);

		if ($sql==true) {
		header("location: categories.php?msg=Data inserted successfully");
				//exit();
			}else{
				echo "Failed to insert";
			}
	}

		public function product_input($insertID)
	{
		$c_name = $_POST["c_name"];
		$p_name = $_POST["p_name"];
		
		$query = "INSERT INTO `product_list`(`cat_id`,`product_name`) VALUES ('$c_name','$p_name')";
		// var_dump($query);
		// exit();

		$sql = mysqli_query($this->link,$query);
		if ($sql==true) {
		header("location: product_list.php?msg=Data inserted successfully");
				//exit();
			}else{
				echo "Failed to insert";
			}
	}

	public function show_store_data()
	{

	$query = "SELECT * FROM users WHERE user_level = 'store' 
	ORDER BY id ASC";


	return mysqli_query($this->link,$query);
	}

	public function show_category()
	{

	$query = "SELECT * FROM product_category 
	ORDER BY cat_id ASC";


	return mysqli_query($this->link,$query);
	}

	// public function show_product(){

	// $id= $_GET['cat'];
	// switch($id) {
 //  	case "tok":
	// $query = "SELECT * FROM product_list 
	// WHERE cat_id = '1' ORDER BY product_id ASC";
 //    break;

 //    case "selection":
	// $query = "SELECT * FROM product_list 
	// WHERE cat_id = '2' ORDER BY product_id ASC";
 //    break;

 //    case "local":
	// $query = "SELECT * FROM product_list 
	// WHERE cat_id = '3' ORDER BY product_id ASC";
 //    break;
	// }
 //    return mysqli_query($this->link,$query);
	// }

	public function show_product(){

		$query = "SELECT * FROM product_list INNER JOIN product_category ON product_list.cat_id = product_category.cat_id ORDER BY product_id DESC";
		return mysqli_query($this->link,$query);
	}

		public function show_store(){

		$query = "SELECT * FROM users WHERE user_level = 'store'";
		return mysqli_query($this->link,$query);
	}

		public function show_quantity(){

		$query = "SELECT * FROM update_quantity INNER JOIN product_list ON update_quantity.product_id = product_list.product_id 
			INNER JOIN store_details ON 
			update_quantity.store_id = 
			store_details.store_num
			ORDER BY id DESC";
		return mysqli_query($this->link,$query);
	}

	public function print_store_data($userId)
	{
	$query = "SELECT * FROM users WHERE id = '$userId'";
	$result = mysqli_query($this->link,$query);

	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		return $row;
	}else{
		echo "Record not found";
	}
}

	public function display_product_data($userId)
	{
	$query = "SELECT * FROM product_list INNER JOIN product_category ON product_list.cat_id = product_category.cat_id
	 WHERE product_id = '$userId'";
	$result = mysqli_query($this->link,$query);

	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		return $row;
	}else{
		echo "Record not found";
	}
}



	//maintenance Tab start from here


	public function store_data_delete($id)
	{
		$query = "DELETE FROM `users` WHERE id = $id";

		$sql = mysqli_query($this->link,$query);

		//$sql = $this->link->query($query);
			if ($sql==true) {
				$message = "Record deleted successfully";
				header("Location:store_list.php?msg=$message");
			}else{
				echo "Failed to delete";
			}
	}

		public function category_delete($id)
	{
		$query = "DELETE FROM `product_category` WHERE cat_id = $id";

		$sql = mysqli_query($this->link,$query);

		//$sql = $this->link->query($query);
			if ($sql==true) {
				$message = "Record deleted successfully";
				header("Location:categories.php?msg=$message");
			}else{
				echo "Failed to delete";
			}
	}


	// 	public function product_delete($id)
	// {
	// 	$query = "DELETE FROM `product_list` WHERE product_id = $id";

	// 	$sql = mysqli_query($this->link,$query);

	// 	//$sql = $this->link->query($query);
	// 		if ($sql==true) {
	// 			$message = "Record deleted successfully";
	// 			header("Location:report.php?msg=$message");
	// 		}else{
	// 			echo "Failed to delete";
	// 		}
	// }


	public function store_update($data)

	{
		  $id = $_POST['id'];
		  $name = $_POST["name"];
	      $mobile = $_POST["mobile"];
		date_default_timezone_set('Asia/Dhaka');
	    $updated_at = date('d-M-y h:i a');

		$query = "UPDATE `users` SET `name` = '$name', `username` = '$mobile', `updated_on` = '$updated_at' WHERE id = '$id'";

		// var_dump($query);
		// exit();

		$sql = mysqli_query($this->link,$query);

		//$sql = $this->link->query($query);
			if ($sql==true) {
			header("Location:store_list.php?msg=Record updated successfully");
			}else{
				echo "Unable to update record";
			}
	}

	public function product_update($data)

	{
	  $id = $_POST['id'];
	  $c_name = $_POST["c_name"];
	  $p_name = $_POST["p_name"];
	

	$query = "UPDATE `product_list` SET `cat_id` = '$c_name', `product_name` = '$p_name' WHERE product_id = '$id'";

		// var_dump($query);
		// exit();

		$sql = mysqli_query($this->link,$query);

		//$sql = $this->link->query($query);
			if ($sql==true) {
			header("Location:product_list.php?msg=Record updated successfully");
			}else{
				echo "Unable to update record";
			}
	}

	public function quantity_update($data)

	{
		session_start();
	  $id = $_POST['product_id'];
	  $u_quantity = $_POST["new_quatity"];
	  $p = $_SESSION['name'];

	$q = "SELECT quantity FROM `product_list` WHERE product_id = $id";
	

	$query = "UPDATE `product_list` SET `quantity` = '$u_quantity', `store_name` = '$p' WHERE product_id = '$id'";

		// var_dump($query);
		// exit();

		$sql = mysqli_query($this->link,$query);

		//$sql = $this->link->query($query);
			if ($sql==true) {
			header("Location:product_list.php?msg=Record updated successfully");
			}else{
				echo "Unable to update record";
			}
	}

		public function update_quantity($data)

	{
	  session_start();
	  $product_id = $_POST['id'];
	  $u_quantity = $_POST["u_quantity"];
	  $store_name = $_SESSION['username'];
	  //$update_id = rand(1000, 9999);

		date_default_timezone_set('America/Havana');
		$created_at = date('Y-m-d');

		foreach ($product_id as $key => $value) {
							
		$p_id = $product_id[$key];
		$qty = $u_quantity[$key];
		//$date = $created_at[$key];

		$check = "SELECT * FROM update_quantity WHERE submit_date = '$created_at' AND  product_id='$p_id' AND store_id = '$store_name'";
		$check_query = mysqli_query($this->link,$check);

		if($qty > 0){

		if($check_query->num_rows>0){
			
		$update_query = "UPDATE `update_quantity` SET quantity='$qty' WHERE product_id ='$p_id' AND submit_date = '$created_at' AND store_id = '$store_name'";

		// var_dump($update_query);
		// exit();

		
	$update_sql = mysqli_query($this->link,$update_query);	

	}else{
	$query = "INSERT INTO `update_quantity`(`store_id`,`product_id`,`quantity`,`submit_date`) VALUES ('$store_name','$p_id','$qty','$created_at')";
		$sql = mysqli_query($this->link,$query);
		}

}

	}

		if ($update_sql or $sql) {
		header("Location:quantity.php?msg=Record updated successfully");
		}
		else{
			echo "Unable to update record";
		}
	}

		public function data_search(){
		if (isset($_GET['search'])) {

			$from = $_GET['from'];
			$to = $_GET['to'];
			$store = $_GET['store_name'];

			// var_dump($from,$to,$store);
			// exit();
				
			$query = "SELECT * FROM update_quantity 
			INNER JOIN product_list ON update_quantity.product_id = product_list.product_id
			INNER JOIN users ON update_quantity.store_id = users.username
			 WHERE (submit_date BETWEEN '$from' AND '$to') AND store_id = '$store'";

			 // var_dump($query);
			 // exit();
			$result = mysqli_query($this->link,$query);

			 // var_dump($result);
			 // exit();

			if ($result->num_rows > 0) {
				// $row = $result->fetch_assoc();

				return $result;
			}else{
				echo "Record not found";
			}
		}
}
}

?>