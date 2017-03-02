<?php

//DEL RECORDS

if(isset($_REQUEST['del'])){

	$State = $_REQUEST['del'];
	$sqlDel = "DELETE FROM `ShippingPrices` WHERE `ShippingPrices`.`State` = '".$State."'";
	
	$resP = mysql_query($sqlDel);

}
//GET DATA 
$sqlData = "SELECT * FROM `ShippingPrices`";
$resP = mysql_query($sqlData);

?>

<table border="0" width="100%">
<tr>
<th>State</th>
<th>ShipMethod</th>
<th>ShippingPrice</th>


<th colspan='2'>Options</th>
</tr>
<?php
while($recrds = mysql_fetch_assoc($resP)){
?>
<tr class="alt">
<td><?php echo $recrds['State'];?></td>
<td><?php echo $recrds['ShipMethod'];?></td>
<td><?php echo $recrds['ShippingPrice'];?></td>

<td><a href="/index.php?p=edit_shiprc&State=<?php echo $recrds['State']; ?>">Edit</a></td>
<td><a href="/index.php?p=shiprc&del=<?php echo $recrds['State']; ?>" onclick="javascript:return confirm('Are you sure you want to delete')">Delete</a></td>
</tr>

<?php
}
?>

</table>