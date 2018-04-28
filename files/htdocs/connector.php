<?php 
class Connector
{
	public $link;
	public $succCon;
    public function __construct()
    {
		$this->link = mysqli_init();
    }
    public function connect($user, $password, $db, $host, $port)
    {
		$this->succCon = mysqli_real_connect(
		   $this->link, 
		   $host, 
		   $user, 
		   $password, 
		   $db,
		   $port
		);

		if (!$this->link)
		{
			die("mysqli_init failed");
		}

		if (!$this->succCon)
		{
			die("Connect Error: " . mysqli_connect_error());
		}
    }
    public function chooseDB($dbname)
    {
        $selectDb = mysqli_select_db($this->link,$dbname);
		if(!$selectDb)
		{
			die("Error in Selecting DB: " . mysqli_error($this->link));
		}
    }
    public function queryDB($query)
    {
        $result = mysqli_query($this->link, $query);

		if(!$result)
		{
			die("Error in Query: " . mysqli_error($this->link));
		}
		
		echo "<table><tr><th>ID</th><th>Name</th><th>Lastname</th></tr>";
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
		{
			echo "<tr><td>".$row["ID"]."</td><td>".$row["Name"]."</td><td>".$row["Lastname"]."</td></tr>";
		}
		echo "</table>";
		mysqli_free_result($result);
        
    }
	public function close()
	{
		mysqli_close($this->link);
	}
}


