<?php

//DEL RECORDS

if(isset($_REQUEST['del'])){

	$ItemNum = $_REQUEST['del'];
	$sqlDel = "DELETE FROM `ItemInformation` WHERE `ItemInformation`.`ItemNum` = '".$ItemNum."'";
	
	$resP = mysql_query($sqlDel);

}
//GET DATA 
$sqlData = "SELECT * FROM `ItemInformation`";
$resP = mysql_query($sqlData);

?>

<table border="0" width="100%">
<tr>
<th>Item Num</th>
<th>Item Name</th>
<th>Price</th>

<th colspan='2'>Options</th>
</tr>
<?php
while($recrds = mysql_fetch_assoc($resP)){
?>
<tr class="alt">
<td><?php echo $recrds['ItemNum'];?></td>
<td><?php echo $recrds['ItemName'];?></td>
<td><?php echo $recrds['Price'];?></td>
<td><a href="/index.php?p=edit_items&ItemNum=<?php echo $recrds['ItemNum']; ?>">Edit</a></td>
<td><a href="/index.php?p=items&del=<?php echo $recrds['ItemNum']; ?>" onclick="javascript:return confirm('Are you sure you want to delete')">Delete</a></td>
</tr>

<?php
}
?>

</table>