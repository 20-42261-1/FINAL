<?php
session_start();
$isPost=false;
$username="";
$mobilenumber="";
$radio="";

//echo "Running properly";
if(isset($_POST["btnClick"]))
{
	$isPost=true;
	if($_POST["uname"]!="")
		$username=$_POST["uname"];
	//echo "button clicked";
}
$password="";
if(isset($_POST["btnClick"]))
{
	$isPost=true;
	if($_POST["pass"]!="")
		$password=$_POST["pass"];
	//echo "button clicked";
}


if(isset($_POST["btnClick"]))
{
	$isPost=true;
	if($_POST["gender"]!="")
		$gender=$_POST["gender"];
	//echo "button clicked";
}

?>
<form action="#" method="post">
<center><h4 style="fornt-size:20px;color:black">Username:<input type="text" id="uname" name="uname"></h4>
<?php
if($isPost==true && $username=="")
 echo "<span style='color:red;'>Required</span>";
?>

<center><h4 style="fornt-size:20px;color:black">Password:<input type="password" id="pass" name="pass"></h4>
<?php
if($isPost==true && $password=="")
 echo "<span style='color:red;'>Required</span>";
?>

<center><h4 style="fornt-size:20px;color:black">Mobile Number:<input type="Mobile Number" id="mobilenumber" name="mobilenumber"></h4>
<?php
if($isPost==true && $mobilenumber=="")
 echo "<span style='color:red;'>Required</span>";
?>

<center><h4 style="fornt-size:20px;color:black">Gender:<input type="radio" name="gender" value="Male">Male
<input type="radio" name="gender" value="Female">Female
<input type="radio" name="gender" value="Others">Others
</h4>
<?php
if($isPost==true && $radio=="")
 echo "<span style='color:red;'>Select one</span>";
?>


<center><h4 style="fornt-size:20px;color:black">Items:<input type="checkbox" name="sectors[]" value="Vegetable">Vegetable
<input type="checkbox" name="sectors[]" value="Fish ">Fish
<input type="checkbox" name="sectors[]" value="Meat">Meat
<input type="checkbox" name="sectors[]" value="Milk">Milk
<input type="checkbox" name="sectors[]" value="Egg">Egg
<input type="checkbox" name="sectors[]" value="Fruits">Fruites
</h4>

<center><h4 style="fornt-size:20px;color:black">Division:<select name="division"></h4>
<option value="Rongpur">Rongpur</option>
<option value="Rajshahi">Rajshahi</option>
<option value="Khulna">Khulna</option>
<option value="Barishal">Barishal</option>
<option value="Chittagoan">Chittagoan</option>
<option value="Sylhet">Sylhet</option>


</select>
<center><h4 style="fornt-size:20px;color:black">Address:<textarea name="address" rowspan="3" colspan="30"></textarea></h4>


<br><br>
<input type="submit" style="background-color:blue; color:white" value="Submit" name="btnClick">
<?php
if($_POST["uname"]!="" && $_POST["pass"]!="" && $_POST["mobilenumber"]!="" && $_POST["gender"]!="" && $_POST["sectors"]!="" && $_POST["address"]!="" && $_POST["division"]!="" )
{

$servername="localhost:3306";
$usernamedb="root";
$passwordDB="";
$dbname="buyer";
$conn=new mysqli($servernamedb,$username,$passwordDB,$dbname);
if($conn->connect_error)
{
	die("Connection failed:".$conn->connect_error);
}
else
{
	//echo "Successful connection";
	$q="UPDATE buyer_table SET username='".$_POST["uname"]."',Password='".$_POST["pass"]."',Mobilenumber='".$_POST["mobilenumber"]."',Gender='".$_POST["gender"]."',Items='".$_POST["fish"]."',Address='".$_POST["address"]."',Division='".$_POST["division"]."' WHERE username='".$_SESSION["uname"]."'";
	$result=$conn->query($q);
	if($result)
	  echo "data updated";
    else
		echo "data not updated";	

 }
 $_SESSION["uname"] = $_POST["uname"];
$_SESSION["pass"] = $_POST["pass"];
$_SESSION["mobilenumber"] = $_POST["mobilenumber"];
$_SESSION["gender"] = $_POST["gender"];
$_SESSION["sectors"] = $_POST["sectors"];
$_SESSION["division"] = $_POST["division"];
$_SESSION["address"] = $_POST["address"];

}
?>


