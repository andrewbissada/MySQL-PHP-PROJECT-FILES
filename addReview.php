<?php
if(isset($_REQUEST['Save'])){
	extract($_REQUEST);

	//Check Duplicate records

		$sqlChkDuplicate = "select count(*) as Total from `Reviews` WHERE itemNum='".$itemNum."'";
		$resP = mysql_query($sqlChkDuplicate);
		$recrds = mysql_fetch_assoc($resP);

		if($recrds['Total'] > 1){
			$msgDis = "Duplicate number is not allowed.";
		}else{
			//INSERT RECORDS
		
		$sqlInsert = "
		INSERT INTO `Reviews` SET

		`itemNum`='".$itemNum."',
		`itemName`='".$itemName."',
		`Rating`='".$Rating."',
		`LastName`='".$LastName."',
		`FirstName`='".$FirstName."'
		
		;";

	
			if(!mysql_query($sqlInsert)){
				die(mysql_error());
			}else{
				$msgDis = "Record is inserted.";
			}
		
		}

	
		

}

//Edit REcords

if(isset($_REQUEST['itemNum'])){
extract($_REQUEST);
	// UPDATE VALUE
	$itemNum = $_REQUEST['itemNum'];
	if(isset($_REQUEST['Update'])){

		$sqlUpdate = "
		UPDATE `Reviews` SET 
		
		
		`itemName`='".$itemName."',
		`Rating`='".$Rating."',
		`LastName`='".$LastName."',
		`FirstName`='".$FirstName."'
		
		WHERE 
		`Reviews`.`itemNum` = '".$itemNum."';
		";

			if(!mysql_query($sqlUpdate)){
				die(mysql_error());
			}else{
				$msgDis = "Record is updated.";
			}

	}

	
	$buttonitemNum = "Update";
	// Get All Records 
	$sqlData = "SELECT * FROM `Reviews` WHERE itemNum='".$itemNum."'";
	$resP = mysql_query($sqlData);

	$recrds = mysql_fetch_assoc($resP);
	//print_r($recrds);

	$readonly="readonly";



}else{
	$buttonitemNum = "Save";
	$readonly="";
}

?>

<form itemNum="addinsurence" action="" method="post">
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
<td>itemNum</td><td><div align='left'><input type='text' name="itemNum" value="<?php if(isset($recrds['itemNum'])){ echo $recrds['itemNum']; }?>" <?php echo $readonly;?>></div></td>
</tr>
<tr>
<td>itemName</td><td><div align='left'><input type='text' name="itemName" value="<?php if(isset($recrds['itemName'])){ echo $recrds['itemName']; }?>"></div></td>
</tr>
<tr>
<td>Rating</td><td><div align='left'><input type='text' name="Rating" value="<?php if(isset($recrds['Rating'])){ echo $recrds['Rating']; }?>"></div></td>
</tr>
<tr>
<td>LastName</td><td><div align='left'><input type='text' name="LastName" value="<?php if(isset($recrds['LastName'])){ echo $recrds['LastName']; }?>"></div></td>
</tr>
<tr>
<td>FirstName</td><td><div align='left'><input type='text' name="FirstName" value="<?php if(isset($recrds['FirstName'])){ echo $recrds['FirstName']; }?>"></div></td>
</tr>

<tr>
<td>&nbsp;</td><td><div align='left'><input type='submit' name="<?php echo $buttonitemNum;?>" value="<?php echo $buttonitemNum;?>" style="width:150px;cursor:pointer"></div></td>
</tr>
</table>
</form>

