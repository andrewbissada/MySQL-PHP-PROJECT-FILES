<?php

//DEL RECORDS

if(isset($_REQUEST['del'])){

	$itemNum = $_REQUEST['del'];
	$sqlDel = "DELETE FROM `Reviews` WHERE `Reviews`.`itemNum` = '".$itemNum."'";
	
	$resP = mysql_query($sqlDel);

}
//GET DATA 
$sqlData = "SELECT * FROM `Reviews`";
$resP = mysql_query($sqlData);

?>

<table border="0" width="100%">
<tr>
<th>itemNum</th>
<th>itemName</th>
<th>Rating</th>
<th>LastName</th>
<th>FirstName</th>

<th colspan='2'>Options</th>
</tr>
<?php
while($recrds = mysql_fetch_assoc($resP)){
?>
<tr class="alt">
<td><?php echo $recrds['itemNum'];?></td>
<td><?php echo $recrds['itemName'];?></td>
<td><?php echo $recrds['Rating'];?></td>
<td><?php echo $recrds['LastName'];?></td>
<td><?php echo $recrds['FirstName'];?></td>

<td><a href="/index.php?p=edit_review&itemNum=<?php echo $recrds['itemNum']; ?>">Edit</a></td>
<td><a href="/index.php?p=review&del=<?php echo $recrds['itemNum']; ?>" onclick="javascript:return confirm('Are you sure you want to delete')">Delete</a></td>
</tr>

<?php
}
?>

</table>