
<?php

	class connect
	{
		public $host="localhost";
		public $username="root";
		public $password="";
		public $database="project";
		public $con;
		
		function __construct()
		{
			$this->con=mysqli_connect($this->host,$this->username,$this->password,$this->database) or die("<h1>Connection to the Database was Failed. Please contact the admin at Mobile No- +xx xxx xxx xxxx or at E-mail: xxxxxxxx@xxx.xx</h1>");
		}
		function query_idu($query)
		{
			$query_var=mysqli_query($this->con,$query);
			if($query_var)
				return 1;
			else
				return 0;
		}
		function query_s($query)
		{
			$query_var=mysqli_query($this->con,$query);
			if(isset($query_var))
				return $query_var;
			else
				return 0;
		}
	}
	$con_obj=new connect();

?>