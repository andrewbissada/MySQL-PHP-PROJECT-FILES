<?php

//DEL RECORDS

if(isset($_REQUEST['del'])){

	$OrderNum = $_REQUEST['del'];
	$sqlDel = "DELETE FROM `OrderInformation` WHERE `OrderInformation`.`OrderNum` = '".$OrderNum."'";
	$resP = mysql_query($sqlDel);

}
//GET DATA 

$sqlData = "SELECT * FROM `OrderInformation`";
$resP = mysql_query($sqlData);



?>

<table border="0" width="100%">
<tr>
<th>OrderNum</th>
<th>Item Num</th>
<th>Item Name</th>
<th>Customer Name</th>
<th>Quantity</th>
<th>Month Purchased</th>
<th>Day Purchased</th>
<th>Year Purchased</th>
<th>Payment Method</th>
<th>State </th>
<th>ShipMethod</th>
<th colspan='2'>Options</th>
</tr>
<?php
while($recrds = mysql_fetch_assoc($resP)){
?>
<tr class="alt">
<td><?php echo $recrds['OrderNum'];?></td>
<td><?php echo $recrds['ItemNum'];?></td>
<td><?php echo $recrds['ItemName'];?></td>
<td><?php echo $recrds['CustomerName'];?></td>
<td><?php echo $recrds['Quantity'];?></td>
<td><?php echo $recrds['MonthPurchased'];?></td>
<td><?php echo $recrds['DayPurchased'];?></td>
<td><?php echo $recrds['YearPurchased'];?></td>
<td><?php echo $recrds['PaymentMethod'];?></td>
<td><?php echo $recrds['State'];?></td>

<td><?php echo $recrds['ShipMethod'];?></td>
<td><a href="/index.php?p=edit_orders&OrderNum=<?php echo $recrds['OrderNum']; ?>">Edit</a></td>
<td><a href="/index.php?p=orders&del=<?php echo $recrds['OrderNum']; ?>" onclick="javascript:return confirm('Are you sure you want to delete')">Delete</a></td>
</tr>

<?php
}
?>

</table>