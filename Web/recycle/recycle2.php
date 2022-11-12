<?php
   session_start();
  $conn=oci_connect("RUSHAD","rushad5698","localhost/XE");


	echo '<pre>';
	print_r($_POST);
	echo '</pre>';
	
	$material_name = $material_amount = '';
	
	$material_name = $_POST['material_name'];
    $material_amount = $_POST['material_amount'];
	
	$count = 0;
	$c = 0;
	
	
	
	function checkKeys($conn,$randStr){
	$keyExists = false;
	
	$sql = "Select * from recycle";
	
	$result = oci_parse($conn,$sql);
	oci_execute($result);
	while($row = oci_fetch_array($result)){
		if($row['PROCESS_ID'] == $randStr && $row['PROCESS_ID'] != null){
			$keyExists = true;
			break;
		}
		else{
			$keyExists = false;
		}
	}
	return $keyExists;
	}
	
	function generateKey($conn){
	$keyLength = 12;
	//all the strings i want in id//
	$str = "0123456789";
	$randStr = substr(str_shuffle($str),0,$keyLength);
	$material_name = $_POST['material_name'];
	if($material_name == "steel"){
		$randStr1 = "ST-";
	}
	else if($material_name == "pcb"){
		$randStr1 = "PB-";
	}
	else if($material_name == "copper wire"){
		$randStr1 = "CW-";
	}
	else if($material_name == "plastic"){
		$randStr1 = "PL-";
	}
	
	$randStr2 = $randStr1 . $randStr;
	$checkKey = checkKeys($conn,$randStr2);
	while($checkKey == true){
		$randStr = substr(str_shuffle($str),0,$keyLength);
		$checkKey = checkKeys($conn,$randStr);
	}
	return $randStr2;
	}
	
	
	$process_id = generateKey($conn);
	
	date_default_timezone_set('Asia/Dacca');
	$datetime = date("d/m/Y h:i a");
	
	$sql = "select material_code from materials where material_name = '$material_name'";
	$result = oci_parse($conn,$sql);
	oci_execute($result);
	
	while($row = oci_fetch_array($result)){
				$material_code = $row['MATERIAL_CODE'];
	}
	
	echo 'Material Code is ' .$material_code.'<br/>';
	
	$sql2 = "insert into recycle(process_id,material_code,material_amount,process_date)
	values(:process_id,:material_code,:material_amount,to_timestamp('".$datetime."','DD/MM/YY HH:MI AM'))";
	
	$result = oci_parse($conn,$sql2);
	
	oci_bind_by_name($result,':process_id',$process_id);
	oci_bind_by_name($result,':material_code',$material_code);
	oci_bind_by_name($result,':material_amount',$material_amount);
	
	oci_execute($result);
	
	echo 'Process id is ' .$process_id.'<br/>';
	
	
	
	
	$_SESSION['process_id'] = $process_id;
	if($material_name == "steel"){
		header("Location: Steel_recycle.php");
	}
	else if($material_name == "pcb"){
		header("Location: Pcb_recycle.php");
	}
	else if($material_name == "copper wire"){
		header("Location: Copper_wire_recycle.php");
	}
	else if($material_name == "plastic"){
		header("Location: Plastic_recycle.php");
	}
?>





