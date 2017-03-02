<?php

//DEL RECORDS

if(isset($_REQUEST['del'])){

	$number = $_REQUEST['del'];
	$sqlDel = "DELETE FROM `PersonalInformation` WHERE `PersonalInformation`.`SocialSecurity` = '".$SocialSecurity."'";
	$resP = mysql_query($sqlDel);

}
//GET DATA 

$sqlData = "SELECT * FROM `PersonalInformation`";
$resP = mysql_query($sqlData);



?>

<table border="0" width="100%">
<tr>
<th>Name</th>
<th>SocialSecurity</th>
<th>Age</th>
<th>Nationality</th>
<th>Gender</th>
<th colspan='2'>Options</th>
</tr>
<?php
while($recrds = mysql_fetch_assoc($resP)){
?>
<tr class="alt">
<td><?php echo $recrds['Name'];?></td>
<td><?php echo $recrds['SocialSecurity'];?></td>
<td><?php echo $recrds['Age'];?></td>
<td><?php echo $recrds['Nationality'];?></td>
<td><?php echo $recrds['Gender'];?></td>
<td><a href="/index.php?p=edit_pinfo&SocialSecurity=<?php echo $recrds['SocialSecurity']; ?>">Edit</a></td>
<td><a href="/index.php?p=personalinfo&del=<?php echo $recrds['SocialSecurity']; ?>" onclick="javascript:return confirm('Are you sure you want to delete')">Delete</a></td>
</tr>

<?php
}
?>

</table>