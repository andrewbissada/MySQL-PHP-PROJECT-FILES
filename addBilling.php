<?php
if(isset($_REQUEST['Save'])){
	extract($_REQUEST);

	//Check Duplicate records

		$sqlChkDuplicate = "select count(*) as Total from `BillingAddress` WHERE Name='".$Zip."'";
		$resP = mysql_query($sqlChkDuplicate);
		$recrds = mysql_fetch_assoc($resP);

		if($recrds['Total'] > 1){
			$msgDis = "Duplicate number is not allowed.";
		}else{
			//INSERT RECORDS
		
		$sqlInsert = "
		INSERT INTO `BillingAddress` SET

		`LastZip`='".$LastZip."',
		`FirstZip`='".$FirstZip."',
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

if(isset($_REQUEST['Zip'])){
extract($_REQUEST);
	// UPDATE VALUE
	$Zip = $_REQUEST['Zip'];
	if(isset($_REQUEST['Update'])){

		$sqlUpdate = "
		UPDATE `BillingAddress` SET 
		
		
		`LastZip`='".$LastZip."',
		`FirstZip`='".$FirstZip."',
		`City`='".$City."',
		`State`='".$State."',
		`StreetAddress`='".$StreetAddress."'
		
		WHERE 
		`BillingAddress`.`Zip` = '".$Zip."';
		";

			if(!mysql_query($sqlUpdate)){
				die(mysql_error());
			}else{
				$msgDis = "Record is updated.";
			}

	}

	
	$buttonZip = "Update";
	// Get All Records 
	$sqlData = "SELECT * FROM `BillingAddress` WHERE Zip='".$Zip."'";
	$resP = mysql_query($sqlData);

	$recrds = mysql_fetch_assoc($resP);
	//print_r($recrds);

	$readonly="readonly";



}else{
	$buttonZip = "Save";
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
<td>Zip</td><td><div align='left'><input type='text' name="Zip" value="<?php if(isset($recrds['Zip'])){ echo $recrds['Zip']; }?>" <?php echo $readonly?>></div></td>
</tr>
<tr>
<td>Street Address</td><td><div align='left'><input type='text' name="StreetAddress" value="<?php if(isset($recrds['StreetAddress'])){ echo $recrds['StreetAddress']; }?>"></div></td>
</tr>
<tr>
<td>&nbsp;</td><td><div align='left'><input type='submit' name="<?php echo $buttonName;?>" value="<?php echo $buttonName;?>" style="width:150px;cursor:pointer"></div></td>
</tr>
</table>
</form>

