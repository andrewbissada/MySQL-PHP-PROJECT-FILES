<?php
if(isset($_REQUEST['Save'])){
	extract($_REQUEST);

	//Check Duplicate records

		$sqlChkDuplicate = "select count(*) as Total from `Insurance` WHERE Number='".$Number."'";
		$resP = mysql_query($sqlChkDuplicate);
		$recrds = mysql_fetch_assoc($resP);

		if($recrds['Total'] > 1){
			$msgDis = "Duplicate number is not allowed.";
		}else{
			//INSERT RECORDS
		
		$sqlInsert = "
		INSERT INTO `Insurance` (
		`Name` ,
		`Company` ,
		`Number` ,
		`Month` ,
		`Year`
		)
		VALUES (
		'".$Name."',
		'".$Company."',
		'".$Number."',
		'".$Month."',
		'".$Year."'
		);";

	
			if(!mysql_query($sqlInsert)){
				die(mysql_error());
			}else{
				$msgDis = "Record is inserted.";
			}
		
		}

	
		

}

//Edit REcords

if(isset($_REQUEST['num'])){
extract($_REQUEST);
	// UPDATE VALUE
	$number = $_REQUEST['num'];
	if(isset($_REQUEST['Update'])){

		$sqlUpdate = "
		UPDATE `Insurance` SET 
		`Name` = '".$Name."',
		`Company` = '".$Company."',
		`Month` = '".$Month."',
		`Year` = '".$Year."'
		WHERE 
		`Insurance`.`Number` = '".$number."';
		";

			if(!mysql_query($sqlUpdate)){
				die(mysql_error());
			}else{
				$msgDis = "Record is updated.";
			}

	}

	
	$buttonName = "Update";
	// Get All Records 
	$sqlData = "SELECT * FROM `Insurance` WHERE Number='".$number."'";
	$resP = mysql_query($sqlData);

	$recrds = mysql_fetch_assoc($resP);
	//print_r($recrds);



}else{
	$buttonName = "Save";
}

?>

<form name="addinsurence" action="" method="post">
<table border="0" width="60%">
<tr>
<td>&nbsp;</td><td><div align='center'>
<?php
if(isset($msgDis)){
	echo $msgDis;
}
?>
</div></td>
</tr>
<tr>
<td>Name</td><td><div align='left'><input type='text' name="Name" value="<?php if(isset($recrds['Name'])){ echo $recrds['Name']; }?>"></div></td>
</tr>
<tr>
<td>Company</td><td><div align='left'><input type='text' name="Company" value="<?php if(isset($recrds['Company'])){ echo $recrds['Company']; }?>"></div></td>
</tr>
<tr>
<td>Number</td><td><div align='left'><input type='text' name="Number" value="<?php if(isset($recrds['Number'])){ echo $recrds['Number']; }?>"></div></td>
</tr>
<tr>
<td>Month</td><td><div align='left'><input type='text' name="Month" value="<?php if(isset($recrds['Month'])){ echo $recrds['Month']; }?>"></div></td>
</tr>
<tr>
<td>Year</td><td><div align='left'><input type='text' name="Year" value="<?php if(isset($recrds['Year'])){ echo $recrds['Year']; }?>"></div></td>
</tr>
<tr>
<td>&nbsp;</td><td><div align='left'><input type='submit' name="<?php echo $buttonName;?>" value="<?php echo $buttonName;?>" style="width:150px;cursor:pointer"></div></td>
</tr>
</table>
</form>

