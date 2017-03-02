<?php

//DEL RECORDS

if(isset($_REQUEST['del'])){

	$number = $_REQUEST['del'];
	$sqlDel = "DELETE FROM `Insurance` WHERE `Insurance`.`Number` = '".$number."'";
	$resP = mysql_query($sqlDel);

}
//GET DATA 

$sqlData = "SELECT * FROM `Insurance`";
$resP = mysql_query($sqlData);



?>

<table border="0" width="100%">
<tr>
<th>Name</th>
<th>Company</th>
<th>Number</th>
<th>Month</th>
<th>Year</th>
<th colspan='2'>Options</th>
</tr>
<?php
while($recrds = mysql_fetch_assoc($resP)){
?>
<tr class="alt">
<td><?php echo $recrds['Name'];?></td>
<td><?php echo $recrds['Company'];?></td>
<td><?php echo $recrds['Number'];?></td>
<td><?php echo $recrds['Month'];?></td>
<td><?php echo $recrds['Year'];?></td>
<td><a href="/index.php?p=edit_insu&num=<?php echo $recrds['Number']; ?>">Edit</a></td>
<td><a href="/index.php?p=insurence&del=<?php echo $recrds['Number']; ?>" onclick="javascript:return confirm('Are you sure you want to delete')">Delete</a></td>
</tr>

<?php
}
?>

</table>