<?php
if(isset($_REQUEST['Save'])){
	extract($_REQUEST);

	//Check Duplicate records

		$sqlChkDuplicate = "select count(*) as Total from `OrderInformation` WHERE ItemNum='".$ItemNum."'";
		$resP = mysql_query($sqlChkDuplicate);
		$recrds = mysql_fetch_assoc($resP);

		if($recrds['Total'] > 1){
			$msgDis = "Duplicate number is not allowed.";
		}else{
			//INSERT RECORDS
		
		$sqlInsert = "
		INSERT INTO `OrderInformation` SET

		`OrderNum`='".$OrderNum."',
		`ItemNum`='".$ItemNum."',
		`ItemName`='".$ItemName."',
		`CustomerName`='".$CustomerName."',
		`Quantity`='".$Quantity."',
		`MonthPurchased`='".$MonthPurchased."',
		`DayPurchased`='".$DayPurchased."',
		`YearPurchased`='".$YearPurchased."',
		`PaymentMethod`='".$PaymentMethod."',
		`State`='".$State."',
		`ShipMethod`='".$ShipMethod."'
		
		;";

	
			if(!mysql_query($sqlInsert)){
				die(mysql_error());
			}else{
				$msgDis = "Record is inserted.";
			}
		
		}

	
		

}

//Edit REcords

if(isset($_REQUEST['OrderNum'])){
extract($_REQUEST);
	// UPDATE VALUE
	$OrderNum = $_REQUEST['OrderNum'];
	if(isset($_REQUEST['Update'])){

		$sqlUpdate = "
		UPDATE `OrderInformation` SET 
		`ItemNum`='".$ItemNum."',
		`ItemName`='".$ItemName."',
		`CustomerName`='".$CustomerName."',
		`Quantity`='".$Quantity."',
		`MonthPurchased`='".$MonthPurchased."',
		`DayPurchased`='".$DayPurchased."',
		`YearPurchased`='".$YearPurchased."',
		`PaymentMethod`='".$PaymentMethod."',
		`State`='".$State."',
		`ShipMethod`='".$ShipMethod."'
		WHERE 
		`OrderInformation`.`OrderNum` = '".$OrderNum."';
		";

			if(!mysql_query($sqlUpdate)){
				die(mysql_error());
			}else{
				$msgDis = "Record is updated.";
			}

	}

	
	$buttonName = "Update";
	// Get All Records 
	$sqlData = "SELECT * FROM `OrderInformation` WHERE OrderNum='".$OrderNum."'";
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
<td>Order Num</td><td><div align='left'><input type='text' name="OrderNum" value="<?php if(isset($recrds['OrderNum'])){ echo $recrds['OrderNum']; }?>" ></div></td>
</tr>
<tr>
<td>Item Num</td><td><div align='left'><input type='text' name="ItemNum" value="<?php if(isset($recrds['ItemNum'])){ echo $recrds['ItemNum']; }?>" ></div></td>
</tr>
</tr>
<tr>
<td>Item Name</td><td><div align='left'><input type='text' name="ItemName" value="<?php if(isset($recrds['ItemName'])){ echo $recrds['ItemName']; }?>" ></div></td>
</tr>
</tr>
<tr>
<td>Customer Name</td><td><div align='left'><input type='text' name="CustomerName" value="<?php if(isset($recrds['CustomerName'])){ echo $recrds['CustomerName']; }?>" ></div></td>
</tr>
</tr>
<tr>
<td>Quantity</td><td><div align='left'><input type='text' name="Quantity" value="<?php if(isset($recrds['Quantity'])){ echo $recrds['Quantity']; }?>" ></div></td>
</tr>
</tr>
<tr>
<td>Month Purchased</td><td><div align='left'><input type='text' name="MonthPurchased" value="<?php if(isset($recrds['MonthPurchased'])){ echo $recrds['MonthPurchased']; }?>" ></div></td>
</tr>
</tr>
<tr>
<td>Day Purchased</td><td><div align='left'><input type='text' name="DayPurchased" value="<?php if(isset($recrds['DayPurchased'])){ echo $recrds['DayPurchased']; }?>" ></div></td>
</tr>
</tr>
<tr>
<td>Year Purchased</td><td><div align='left'><input type='text' name="YearPurchased" value="<?php if(isset($recrds['YearPurchased'])){ echo $recrds['YearPurchased']; }?>" ></div></td>
</tr>

<tr>
<td>Payment Method</td><td><div align='left'><input type='text' name="PaymentMethod" value="<?php if(isset($recrds['PaymentMethod'])){ echo $recrds['PaymentMethod']; }?>"></div></td>
</tr>
<tr>
<td>State</td><td><div align='left'><input type='text' name="State" value="<?php if(isset($recrds['State'])){ echo $recrds['State']; }?>"></div></td>
</tr>
<tr>
<td>ShipMethod</td><td><div align='left'><input type='text' name="ShipMethod" value="<?php if(isset($recrds['ShipMethod'])){ echo $recrds['ShipMethod']; }?>"></div></td>
</tr>
<tr>
<td>&nbsp;</td><td><div align='left'><input type='submit' name="<?php echo $buttonName;?>" value="<?php echo $buttonName;?>" style="width:150px;cursor:pointer"></div></td>
</tr>
</table>
</form>

