<?php
if(isset($_REQUEST['Save'])){
	extract($_REQUEST);

	//Check Duplicate records

		$sqlChkDuplicate = "select count(*) as Total from `ItemInformation` WHERE ItemNum='".$ItemNum."'";
		$resP = mysql_query($sqlChkDuplicate);
		$recrds = mysql_fetch_assoc($resP);

		if($recrds['Total'] > 1){
			$msgDis = "Duplicate number is not allowed.";
		}else{
			//INSERT RECORDS
		
		$sqlInsert = "
		INSERT INTO `ItemInformation` SET

		`ItemNum`='".$ItemNum."',
		`ItemName`='".$ItemName."',
		`Price`='".$Price."'
		
		;";

	
			if(!mysql_query($sqlInsert)){
				die(mysql_error());
			}else{
				$msgDis = "Record is inserted.";
			}
		
		}

	
		

}

//Edit REcords

if(isset($_REQUEST['ItemNum'])){
extract($_REQUEST);
	// UPDATE VALUE
	$ItemNum = $_REQUEST['ItemNum'];
	if(isset($_REQUEST['Update'])){

		$sqlUpdate = "
		UPDATE `ItemInformation` SET 
		`ItemName`='".$ItemName."',
		`Price`='".$Price."'
		WHERE 
		`ItemInformation`.`ItemNum` = '".$ItemNum."';
		";

			if(!mysql_query($sqlUpdate)){
				die(mysql_error());
			}else{
				$msgDis = "Record is updated.";
			}

	}

	
	$buttonName = "Update";
	// Get All Records 
	$sqlData = "SELECT * FROM `ItemInformation` WHERE ItemNum='".$ItemNum."'";
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
<td>Item Num</td><td><div align='left'><input type='text' name="ItemNum" value="<?php if(isset($recrds['ItemNum'])){ echo $recrds['ItemNum']; }?>" ></div></td>
</tr>
<tr>
<td>Item Name</td><td><div align='left'><input type='text' name="ItemName" value="<?php if(isset($recrds['ItemName'])){ echo $recrds['ItemName']; }?>"></div></td>
</tr>
<tr>
<td>Price</td><td><div align='left'><input type='text' name="Price" value="<?php if(isset($recrds['Price'])){ echo $recrds['Price']; }?>"></div></td>
</tr>
<tr>
<td>&nbsp;</td><td><div align='left'><input type='submit' name="<?php echo $buttonName;?>" value="<?php echo $buttonName;?>" style="width:150px;cursor:pointer"></div></td>
</tr>
</table>
</form>

