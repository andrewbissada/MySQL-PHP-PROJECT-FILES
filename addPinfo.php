<?php
if(isset($_REQUEST['Save'])){
	extract($_REQUEST);

	//Check Duplicate records

		$sqlChkDuplicate = "select count(*) as Total from `PersonalInformation` WHERE SocialSecurity='".$SocialSecurity."'";
		$resP = mysql_query($sqlChkDuplicate);
		$recrds = mysql_fetch_assoc($resP);

		if($recrds['Total'] > 1){
			$msgDis = "Duplicate number is not allowed.";
		}else{
			//INSERT RECORDS
		
		$sqlInsert = "
		INSERT INTO `PersonalInformation` SET
		`Name`='".$Name."',
		`SocialSecurity`='".$SocialSecurity."',		
		`Age`='".$Age."',
		`Nationality`='".$Nationality."',
		`Gender`='".$Gender."'

		;";

	
			if(!mysql_query($sqlInsert)){
				die(mysql_error());
			}else{
				$msgDis = "Record is inserted.";
			}
		
		}

	
		

}

//Edit REcords

if(isset($_REQUEST['SocialSecurity'])){
extract($_REQUEST);
	// UPDATE VALUE
	$SocialSecurity = $_REQUEST['SocialSecurity'];
	if(isset($_REQUEST['Update'])){

		$sqlUpdate = "
		UPDATE `PersonalInformation` SET 
		
		`Name`='".$Name."',			
		`Age`='".$Age."',
		`Nationality`='".$Nationality."',
		`Gender`='".$Gender."'
		
		WHERE 
		`PersonalInformation`.`SocialSecurity` = '".$SocialSecurity."';
		";

			if(!mysql_query($sqlUpdate)){
				die(mysql_error());
			}else{
				$msgDis = "Record is updated.";
			}

	}

	
	$buttonName = "Update";
	// Get All Records 
	$sqlData = "SELECT * FROM `PersonalInformation` WHERE SocialSecurity='".$SocialSecurity."'";
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
<td>SocialSecurity</td><td><div align='left'><input type='text' name="SocialSecurity" value="<?php if(isset($recrds['SocialSecurity'])){ echo $recrds['SocialSecurity']; }?>"></div></td>
</tr>
<tr>
<td>Age</td><td><div align='left'><input type='text' name="Age" value="<?php if(isset($recrds['Age'])){ echo $recrds['Age']; }?>"></div></td>
</tr>
<tr>
<td>Nationality</td><td><div align='left'><input type='text' name="Nationality" value="<?php if(isset($recrds['Nationality'])){ echo $recrds['Nationality']; }?>"></div></td>
</tr>
<tr>
<td>Gender</td><td><div align='left'><input type='text' name="Gender" value="<?php if(isset($recrds['Gender'])){ echo $recrds['Gender']; }?>"></div></td>
</tr>

<tr>
<td>&nbsp;</td><td><div align='left'><input type='submit' name="<?php echo $buttonName;?>" value="<?php echo $buttonName;?>" style="width:150px;cursor:pointer"></div></td>
</tr>
</table>
</form>

