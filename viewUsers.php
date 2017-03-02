<?php

//DEL RECORDS

if(isset($_REQUEST['del'])){

	$Zip = $_REQUEST['del'];
	$sqlDel = "DELETE FROM `HomeAddress` WHERE `HomeAddress`.`Zip` = '".$Zip."'";
	
	$resP = mysql_query($sqlDel);

}
//GET DATA 
$sqlData = "SELECT * FROM `HomeAddress`";
$resP = mysql_query($sqlData);

?>

<table border="0" width="100%">
<tr>
<th>Last Name</th>
<th>First Name</th>
<th>City</th>
<th>State</th>
<th>Zip</th>
<th>StreetAddress</th>
<th colspan='2'>Options</th>
</tr>
<?php
while($recrds = mysql_fetch_assoc($resP)){
?>
<tr class="alt">
<td><?php echo $recrds['LastName'];?></td>
<td><?php echo $recrds['FirstName'];?></td>
<td><?php echo $recrds['City'];?></td>
<td><?php echo $recrds['State'];?></td>
<td><?php echo $recrds['Zip'];?></td>
<td><?php echo $recrds['StreetAddress'];?></td>
<td><a href="/index.php?p=edit_users&zip=<?php echo $recrds['Zip']; ?>">Edit</a></td>
<td><a href="/index.php?p=users&del=<?php echo $recrds['Zip']; ?>" onclick="javascript:return confirm('Are you sure you want to delete')">Delete</a></td>
</tr>

<?php
}
?>

</table>