<html>
<head><title>HeHe</title></head>
<body>
<?php
include "conn.php";

$query="select * from user_detail";
$result=mysqli_query($conn,$query);
?>
<table border="1">
<tr><th>Name</th><th>Last Name</th><th>Email</th><th>DOB</th><th>Phone no.</th><th>Address</th><th>City</th></tr>
<?php
while($row=mysqli_fetch_assoc($result))
{
	
?>

<tr>
	
	<td><?php echo $row['FName'];?></td>
	
	<td><?php echo $row['LName'];?></td>
	
	<td><?php echo $row['Email'];?></td>
	
	<td><?php echo $row['DOB'];?></td>
	
	<td><?php echo $row['Phone'];?></td>
	
	<td><?php echo $row['Address'];?></td>
	
	<td><?php echo $row['City'];?></td>
</tr>

<?php
}
?>
</table>
</body>
</html>