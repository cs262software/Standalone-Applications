<?php
$data = $_POST['data'];
$fileName = $_POST['name'];
$serverFile = "infile-".time().".txt";
$fp = fopen('tmp/'.$serverFile,'w'); //Prepends timestamp to prevent overwriting
fwrite($fp, $data);
fclose($fp);
$returnData = array( "serverFile" => "tmp/".$serverFile );
echo json_encode($returnData);