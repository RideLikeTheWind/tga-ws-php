<?php

require('WSSecurity.php');
require('functions.php');

//Add the basic WS WSDL file
$wsdl = "https://ws.sandbox.training.gov.au/Deewr.Tga.Webservices/TrainingComponentService.svc?wsdl";

//Service endpoint
$momurl = "https://ws.sandbox.training.gov.au/Deewr.Tga.Webservices/TrainingComponentService.svc/Training";

//Perform Request
$username = '***';
$password = '***';
$client = new WSSoapClient($wsdl, array('location' => $momurl));

//Make sure your set 'PasswordText' otherwise it won't work.
$client->__setUsernameToken($username,$password,'PasswordText');

//Add the SOAP header
$client->__setSoapHeaders($header);

try { 
  
  //This is and example of a complex options array - read the DataModel file provided with the TGA WS SDK
  
	$options = ['request' => [
		'Filter' => 'methods of cookery',
		'PageNumber' => 1,
		'PageSize' => 1,
		'SearchCode' => true,
		'SearchTitle' => true,
		'TrainingComponentTypes' => [
			'IncludeQualification' => false,
			'IncludeUnit' => true,
			'IncludeSkillSet' => true,
			'IncludeUnitContextualisation' => true
		]
	]];
	
	$result = $client->Search($options);
	//var_dump($result);
	
	//Call the function to convert the returned stdObject to an Array
	$resultArr = objectToArray($result);
	
	//Return a key-referenced part of the array (just dumps results - of course, this could be more elegant)
	var_dump($resultArr['SearchResult']['Results']);
	
	//Call a second request to get the details of one unit
	$comdata = ['request' => [
		'Code' => 'SITHCCC201' //This can be extracted from the above search array
	]];
	  //Make the SOAP call
		$unit = $client->GetDetails($comdata);
		$unitArr = objectToArray($unit);
		var_dump($unitArr['GetDetailsResult']['Releases']['Release']);
		
} catch (Exception $e) { 

    //If we threw an error, catch the exception and echo
    $msgs = $e->getMessage();
    echo "Error: $msgs"; 
} 

?>
