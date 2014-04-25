<?php

        $soapClient = new SoapClient("demo.tag-acresta.com/nav/nav.xml");
   
        // Prepare SoapHeader parameters
        $sh_param = array(
                    'Username'    =>    'cch\administrator',
                    'Password'    =>    'p@ssw0rd');
        $headers = new SoapHeader('http://203.116.24.75:7047/DynamicsNAV70/WS/services', 'UserCredentials', $sh_param);
   
        // Prepare Soap Client
        $soapClient->__setSoapHeaders(array($headers));
   
        // Setup the RemoteFunction parameters
        $ap_param = array(
                    'amount'     =>    $irow['total_price']);
                   
        // Call RemoteFunction ()
        $error = 0;
        try {
            $info = $soapClient->__call("RemoteFunction", array($ap_param));
        } catch (SoapFault $fault) {
            $error = 1;
            print("
            alert('Sorry, blah returned the following ERROR: ".$fault->faultcode."-".$fault->faultstring.". We will now take you back to our home page.');
            window.location = 'main.php';
            ");
        }
       
        if ($error == 0) {       
            $auth_num = $info->RemoteFunctionResult;
           
            if ($auth_num < 0) {
                ....

                // Setup the OtherRemoteFunction() parameters
                $at_param = array(
                            'amount'        => $irow['total_price'],
                            'description'    => $description);
           
                // Call OtherRemoteFunction()
                $trans = $soapClient->__call("OtherRemoteFunction", array($at_param));
                $trans_result = $trans->OtherRemoteFunctionResult;
            ....
                } else {
                    // Record the transaction error in the database
               
                // Kill the link to Soap
                unset($soapClient);
            }
        }
    }   
}
   
?>