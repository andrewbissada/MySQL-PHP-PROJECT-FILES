<?php
if(isset($_REQUEST['Save'])){
	extract($_REQUEST);

	//Check Duplicate records

		$sqlChkDuplicate = "select count(*) as Total from `ShippingPrices` WHERE State='".$State."'";
		$resP = mysql_query($sqlChkDuplicate);
		$recrds = mysql_fetch_assoc($resP);

		if($recrds['Total'] > 1){
			$msgDis = "Duplicate number is not allowed.";
		}else{
			//INSERT RECORDS
		
		$sqlInsert = "
		INSERT INTO `ShippingPrices` SET

		`State`='".$State."',
		`ShipMethod`='".$ShipMethod."',
		`ShippingPrice`='".$ShippingPrice."'
		
		
		;";

	
			if(!mysql_query($sqlInsert)){
				die(mysql_error());
			}else{
				$msgDis = "Record is inserted.";
			}
		
		}

	
		

}

//Edit REcords

if(isset($_REQUEST['State'])){
extract($_REQUEST);
	// UPDATE VALUE
	$State = $_REQUEST['State'];
	if(isset($_REQUEST['Update'])){

		$sqlUpdate = "
		UPDATE `ShippingPrices` SET 
		
		
	
		`ShipMethod`='".$ShipMethod."',
		`ShippingPrice`='".$ShippingPrice."'
		
		WHERE 
		`ShippingPrices`.`State` = '".$State."';
		";

			if(!mysql_query($sqlUpdate)){
				die(mysql_error());
			}else{
				$msgDis = "Record is updated.";
			}

	}

	
	$buttonState = "Update";
	// Get All Records 
	$sqlData = "SELECT * FROM `ShippingPrices` WHERE State='".$State."'";
	$resP = mysql_query($sqlData);

	$recrds = mysql_fetch_assoc($resP);
	//print_r($recrds);

	$readonly="readonly";



}else{
	$buttonState = "Save";
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
<td>State</td><td><div align='left'><input type='text' name="State" value="<?php if(isset($recrds['State'])){ echo $recrds['State']; }?>" <?php echo $readonly;?>></div></td>
</tr>
<tr>
<td>ShipMethod</td><td><div align='left'><input type='text' name="ShipMethod" value="<?php if(isset($recrds['ShipMethod'])){ echo $recrds['ShipMethod']; }?>"></div></td>
</tr>
<tr>
<td>ShippingPrice</td><td><div align='left'><input type='text' name="ShippingPrice" value="<?php if(isset($recrds['ShippingPrice'])){ echo $recrds['ShippingPrice']; }?>"></div></td>
</tr>

<tr>
<td>&nbsp;</td><td><div align='left'><input type='submit' name="<?php echo $buttonState;?>" value="<?php echo $buttonState;?>" style="width:150px;cursor:pointer"></div></td>
</tr>
</table>
</form>

