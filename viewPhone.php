<?php

//DEL RECORDS

if(isset($_REQUEST['del'])){

	$Name = $_REQUEST['del'];
	$sqlDel = "DELETE FROM `PhoneNumbers` WHERE `PhoneNumbers`.`Name` = '".$Name."'";
	
	$resP = mysql_query($sqlDel);

}
//GET DATA 
$sqlData = "SELECT * FROM `PhoneNumbers`";
$resP = mysql_query($sqlData);

?>

<table border="0" width="100%">
<tr>
<th>Name</th>
<th>Home</th>
<th>Fax</th>
<th>Mobile</th>

<th colspan='2'>Options</th>
</tr>
<?php
while($recrds = mysql_fetch_assoc($resP)){
?>
<tr class="alt">
<td><?php echo $recrds['Name'];?></td>
<td><?php echo $recrds['Home'];?></td>
<td><?php echo $recrds['Fax'];?></td>
<td><?php echo $recrds['Mobile'];?></td>

<td><a href="/index.php?p=edit_phone&Name=<?php echo $recrds['Name']; ?>">Edit</a></td>
<td><a href="/index.php?p=phone&del=<?php echo $recrds['Name']; ?>" onclick="javascript:return confirm('Are you sure you want to delete')">Delete</a></td>
</tr>

<?php
}
?>

</table>