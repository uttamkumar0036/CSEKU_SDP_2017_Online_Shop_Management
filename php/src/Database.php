 <?php
class Database{

	public $host   = DB_HOST;
	public $user   = DB_USER; 
	public $pass   = DB_PASS;
	public $dbname = DB_NAME;

	public $link;
	public $error;

	public function __construct()
	{
		$this->connectDB();
	}

	private function connectDB()
	{
		$this->link = new mysqli($this->host, $this->user, $this->pass,$this->dbname);

		if(! $this->link)
		{
			$this->error = "Connection Fail".$this->link->connect_error;
			return false;
		}
	}

	//SELECT or READ Data
	public function select($query)
	{
		$result = $this->link->query($query) or die ($this->link->error.__LINE__);
		if($result->num_rows > 0)
		{
			return $result;
		}
		else
		{
			return false;
		}
	}

	//Create/ Insert Data

	public function insert($query)
	{
		$insert_row = $this->link->query($query) or die ($this->link->error.__LINE__);
		if($insert_row)
		{
			header("Location: catlist.php?msg=".urldecode('Category Name inserted Successfully!!'));
			exit();
		}
		else
		{
			die("Error: (".$this->link->errno.")".$this->link-error);
		}

	}
	public function cinsert($query)
	{
		$this->link->query($query);

	}


	//For Brand Insert
	public function binsert($query)
	{
		$insert_row = $this->link->query($query) or die ($this->link->error.__LINE__);

		if($insert_row)
		{
			header("Location: brandlist.php?msg=".urldecode('Brand Name inserted Successfully!!'));
			exit();
		}
		else
		{
			die("Error: (".$this->link->errno.")".$this->link-error);
		}

	}
		

	//Update Data

	public function update($query)
	{
		$update_row = $this->link->query($query) or die ($this->link->error.__LINE__);
		if($update_row)
		{
			header("Location: catlist.php?msg=".urldecode('Category Name Updated Successfully!!'));
			exit();
		}
		else
		{
			die("Error: (".$this->link->errno.")".$this->link-error);
		}

	}

	//Brand Update

	public function bupdate($query)
	{
		$update_row = $this->link->query($query) or die ($this->link->error.__LINE__);
		if($update_row)
		{
			header("Location: brandlist.php?msg=".urldecode('Brand Name Updated Successfully!!'));
			exit();
		}
		else
		{
			die("Error: (".$this->link->errno.")".$this->link-error);
		}

	}

	//Delete Data

	public function delete($query)
	{
		$delete_row = $this->link->query($query) or die ($this->link->error.__LINE__);
		if($delete_row)
		{
			header("Location: catlist.php?msg=".urldecode('Category Deleted Successfully!!'));
			exit();
		}
		else
		{
			die("Error: (".$this->link->errno.")".$this->link-error);
		}

	}

	//Brand Delete
	public function bdelete($query)
	{
		$delete_row = $this->link->query($query) or die ($this->link->error.__LINE__);
		if($delete_row)
		{
			header("Location: brandlist.php?msg=".urldecode('Brand Deleted Successfully!!'));
			exit();
		}
		else
		{
			die("Error: (".$this->link->errno.")".$this->link-error);
		}

	}

	//Product
	public function proinsert($query)
	{
		$insert_row = $this->link->query($query) or die ($this->link->error.__LINE__);
		if($insert_row)
		{
			header("Location: productlist.php?msg=".urldecode('Product inserted Successfully!!'));
			exit();
		}
		else
		{
			die("Error: (".$this->link->errno.")".$this->link-error);
		}

	}

	public function proupdate($query)
	{
		$update_row = $this->link->query($query) or die ($this->link->error.__LINE__);
		if($update_row)
		{
			header("Location: productlist.php?msg=".urldecode('Product Updated Successfully!!'));
			exit();
		}
		else
		{
			die("Error: (".$this->link->errno.")".$this->link-error);
		}

	}
		public function prodelete($query)
	{
		$delete_row = $this->link->query($query) or die ($this->link->error.__LINE__);
		if($delete_row)
		{
			header("Location: productlist.php?msg=".urldecode('Product Deleted Successfully!!'));
			exit();
		}
		else
		{
			die("Error: (".$this->link->errno.")".$this->link-error);
		}

	}
	public function customerinsert($query)
	{
		$insert_row = $this->link->query($query) or die ($this->link->error.__LINE__);
		if($insert_row)
		{
			header("Location: cuslogin.php?msg=".urldecode('Registration Successful!!'));
			exit();
		}
		else
		{
			die("Error: (".$this->link->errno.")".$this->link-error);
		}
	}

	public function customerLogin($data)
	{
		$username = mysqli_real_escape_string($this->db->link,$data['cus_username']);
		
	}


}