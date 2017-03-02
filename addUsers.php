<?php
if(isset($_REQUEST['Save'])){
	extract($_REQUEST);

	//Check Duplicate records

		$sqlChkDuplicate = "select count(*) as Total from `HomeAddress` WHERE Zip='".$Zip."'";
		$resP = mysql_query($sqlChkDuplicate);
		$recrds = mysql_fetch_assoc($resP);

		if($recrds['Total'] > 1){
			$msgDis = "Duplicate number is not allowed.";
		}else{
			//INSERT RECORDS
		
		$sqlInsert = "
		INSERT INTO `HomeAddress` SET

		`LastName`='".$LastName."',
		`FirstName`='".$FirstName."',
		`City`='".$City."',
		`State`='".$State."',
		`Zip`='".$Zip."',
		`StreetAddress`='".$StreetAddress."'
		;";

	
			if(!mysql_query($sqlInsert)){
				die(mysql_error());
			}else{
				$msgDis = "Record is inserted.";
			}
		
		}

	
		

}

//Edit REcords

if(isset($_REQUEST['zip'])){
extract($_REQUEST);
	// UPDATE VALUE
	$zip = $_REQUEST['zip'];
	if(isset($_REQUEST['Update'])){

		$sqlUpdate = "
		UPDATE `HomeAddress` SET 
		
		`LastName`='".$LastName."',
		`FirstName`='".$FirstName."',
		`City`='".$City."',
		`State`='".$State."',
		`StreetAddress`='".$StreetAddress."'
		
		WHERE 
		`HomeAddress`.`Zip` = '".$zip."';
		";

			if(!mysql_query($sqlUpdate)){
				die(mysql_error());
			}else{
				$msgDis = "Record is updated.";
			}

	}

	
	$buttonName = "Update";
	// Get All Records 
	$sqlData = "SELECT * FROM `HomeAddress` WHERE Zip='".$zip."'";
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
<td>Last Name</td><td><div align='left'><input type='text' name="LastName" value="<?php if(isset($recrds['LastName'])){ echo $recrds['LastName']; }?>"></div></td>
</tr>
<tr>
<td>First Name</td><td><div align='left'><input type='text' name="FirstName" value="<?php if(isset($recrds['FirstName'])){ echo $recrds['FirstName']; }?>"></div></td>
</tr>
<tr>
<td>City</td><td><div align='left'><input type='text' name="City" value="<?php if(isset($recrds['City'])){ echo $recrds['City']; }?>"></div></td>
</tr>
<tr>
<td>State</td><td><div align='left'><input type='text' name="State" value="<?php if(isset($recrds['State'])){ echo $recrds['State']; }?>"></div></td>
</tr>
<tr>
<td>Zip</td><td><div align='left'><input type='text' name="Zip" value="<?php if(isset($recrds['Zip'])){ echo $recrds['Zip']; }?>"></div></td>
</tr>
<tr>
<td>Street Address</td><td><div align='left'><input type='text' name="StreetAddress" value="<?php if(isset($recrds['StreetAddress'])){ echo $recrds['StreetAddress']; }?>"></div></td>
</tr>
<tr>
<td>&nbsp;</td><td><div align='left'><input type='submit' name="<?php echo $buttonName;?>" value="<?php echo $buttonName;?>" style="width:150px;cursor:pointer"></div></td>
</tr>
</table>
</form>

