<?php
if(isset($_REQUEST['Save'])){
	extract($_REQUEST);

	//Check Duplicate records

		$sqlChkDuplicate = "select count(*) as Total from `PhoneNumbers` WHERE Name='".$Name."'";
		$resP = mysql_query($sqlChkDuplicate);
		$recrds = mysql_fetch_assoc($resP);

		if($recrds['Total'] > 1){
			$msgDis = "Duplicate number is not allowed.";
		}else{
			//INSERT RECORDS
		
		$sqlInsert = "
		INSERT INTO `PhoneNumbers` SET

		`Name`='".$Name."',
		`Home`='".$Home."',
		`Fax`='".$Fax."',
		`Mobile`='".$Mobile."'
		
		;";

	
			if(!mysql_query($sqlInsert)){
				die(mysql_error());
			}else{
				$msgDis = "Record is inserted.";
			}
		
		}

	
		

}

//Edit REcords

if(isset($_REQUEST['Name'])){
extract($_REQUEST);
	// UPDATE VALUE
	$Name = $_REQUEST['Name'];
	if(isset($_REQUEST['Update'])){

		$sqlUpdate = "
		UPDATE `PhoneNumbers` SET 
		
		`Home`='".$Home."',
		`Fax`='".$Fax."',
		`Mobile`='".$Mobile."'
		
		WHERE 
		`PhoneNumbers`.`Name` = '".$Name."';
		";

			if(!mysql_query($sqlUpdate)){
				die(mysql_error());
			}else{
				$msgDis = "Record is updated.";
			}

	}

	
	$buttonName = "Update";
	// Get All Records 
	$sqlData = "SELECT * FROM `PhoneNumbers` WHERE Name='".$Name."'";
	$resP = mysql_query($sqlData);

	$recrds = mysql_fetch_assoc($resP);
	//print_r($recrds);

	$readonly="readonly";



}else{
	$buttonName = "Save";
	$readonly="";
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
<td>Name</td><td><div align='left'><input type='text' name="Name" value="<?php if(isset($recrds['Name'])){ echo $recrds['Name']; }?>" <?php echo $readonly;?>></div></td>
</tr>
<tr>
<td>Home</td><td><div align='left'><input type='text' name="Home" value="<?php if(isset($recrds['Home'])){ echo $recrds['Home']; }?>"></div></td>
</tr>
<tr>
<td>Fax</td><td><div align='left'><input type='text' name="Fax" value="<?php if(isset($recrds['Fax'])){ echo $recrds['Fax']; }?>"></div></td>
</tr>
<tr>
<td>Mobile</td><td><div align='left'><input type='text' name="Mobile" value="<?php if(isset($recrds['Mobile'])){ echo $recrds['Mobile']; }?>"></div></td>
</tr>

<tr>
<td>&nbsp;</td><td><div align='left'><input type='submit' name="<?php echo $buttonName;?>" value="<?php echo $buttonName;?>" style="width:150px;cursor:pointer"></div></td>
</tr>
</table>
</form>

