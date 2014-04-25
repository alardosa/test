
<?php

$soapURLa = "http://203.116.24.75:7047/DynamicsNAV70/WS/services" ;
$soapParameters = Array('login' => "cch\administrator", 'password' => "p@ssw0rd") ;
$soapFunction = "someFunction" ;
$soapFunctionParameters = Array('param1' => 42, 'param2' => "Search") ;

$soapClient = new SoapClient($soapURL, $soapParameters);

$soapResult = $soapClient->__soapCall($soapFunction, $soapFunctionParamters) ;

if(is_array($soapResult) && isset($soapResult['someFunctionResult'])) {
    // Process result.
} else {
    // Unexpected result
    if(function_exists("debug_message")) {
        debug_message("Unexpected soapResult for {$soapFunction}: ".print_r($soapResult, TRUE)) ;
    }
}
?>