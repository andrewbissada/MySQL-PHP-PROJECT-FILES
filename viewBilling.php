<?php

//DEL RECORDS

if(isset($_REQUEST['del'])){

	$Zip = $_REQUEST['del'];
	$sqlDel = "DELETE FROM `BillingAddress` WHERE `BillingAddress`.`Zip` = '".$Zip."'";
	
	$resP = mysql_query($sqlDel);

}
//GET DATA 
$sqlData = "SELECT * FROM `BillingAddress`";
$resP = mysql_query($sqlData);

?>

<table border="0" width="100%">
<tr>
<th>Zip</th>
<th>Home</th>
<th>Fax</th>
<th>Mobile</th>

<th colspan='2'>Options</th>
</tr>
<?php
while($recrds = mysql_fetch_assoc($resP)){
?>
<tr class="alt">
<td><?php echo $recrds['Zip'];?></td>
<td><?php echo $recrds['Home'];?></td>
<td><?php echo $recrds['Fax'];?></td>
<td><?php echo $recrds['Mobile'];?></td>

<td><a href="/index.php?p=add_billing&Zip=<?php echo $recrds['Zip']; ?>">Edit</a></td>
<td><a href="/index.php?p=billing&del=<?php echo $recrds['Zip']; ?>" onclick="javascript:return confirm('Are you sure you want to delete')">Delete</a></td>
</tr>

<?php
}
?>

</table>