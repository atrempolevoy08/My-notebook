<?php
function __autoload($class){
	require_once('class_'.$class.'.php');
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "zapisnaya";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

if(isset($_GET[del]))
{
	$sql = "DELETE FROM kniga WHERE nom = '$_GET[del]'";
	$result = $conn->query($sql);
 	echo "<script>location.replace('zk.php')</script>";
}


$sql = "SELECT count(*) FROM kniga";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$ALines=$row['count(*)'];
$str=$ALines/5;
$str= ceil($str);

for($i=1; $i<=$str; $i++)
{
echo " 
<div style='width:20pt; border:1 solid black; height:20pt; treansform-position: left;
	 margin: 10 px; padding:5px;  display: inline;";
if($_GET[page])
{
if($_GET[page]==$i)
echo"background-color:white;";
}
else
{
if($i===1)
echo"background-color:black;";
}
echo"' >
<a href='zk.php?page=".$i."'> ".$i." </a>
</div>
";
}

 
echo "<br>";



$sql = "SELECT * FROM kniga";
$result = $conn->query($sql);
$rrr=1;

if($_GET[page])
{
$ttt=$_GET[page]*5;
}
else
{ 
$ttt=5;
}
	while($row = $result->fetch_assoc()) 
	{
		if($rrr>$ttt-5 && $rrr<=$ttt)
		{
		echo"<div style= 'width:50%; border:solid black; border-width: 1pt; margin:5pt; padding:5pt; font-size:20pt;'>";
			echo "<tr>
			<td>".$row["nom"]."</td>
			<td>".$row["info"]."</td>
			<td>".$row["dat"]."</td>
			<td><a href=?del=$row[nom]>Delete</a></td>
			<td><a href=?ed1=$row[nom]>Update</a>
			</td></tr>";
			echo"</div>";
	$rrr++;
	}
else 
{
	$rrr++;
	
}
	}

?>

<html>
<body>
<form>
New note: </br>
</br><input type=text value="<?php echo "$_GET[info1]" ?>" name=info1 size=30> </br>
<input type=submit value="Insert" name=ok><br/><br/>
</form>

<?php
if (isset($_GET[ok]))
{
	if($_GET[info1]=="")
	{
		echo "Error!!!";
	}
	else 
	{
	$w = $_GET[info1];

	$sql1 = "insert into kniga (info) values ('$w')";
	$result = $conn->query($sql1);


	echo "<script> location.replace('zk.php')</script>";
$conn->close();
	}
}
if(isset($_GET[ed1]))
{
	$sql = "SELECT * FROM kniga WHERE nom = $_GET[ed1]";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
echo "$_GET[nom]<br>
<form>
<input type=text value= $row[info] name=in size=30><br/>
<input type=HIDDEN value=$_GET[ed1] name=NZ size=5>
<input type=submit value=Update name=ed2><br/><br/>
</form>
";	
}
if(isset($_GET[ed2]))
{
	
	$sql = "UPDATE kniga SET info = '$_GET[in]' WHERE nom = $_GET[NZ]";
	$result = $conn->query($sql);
	echo "<script> location.replace('zk.php')</script>";
}
?>