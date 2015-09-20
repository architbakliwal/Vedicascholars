<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Pin Validation</title>
<script type="text/javascript" src="https://mwsrec.npci.org.in/MWS/Scripts/MerchantScript_v1.0.js"></script>
<script type="text/javascript">
	function accu_FunctionResponse(strResponse) {
		//alert("alert "+strResponse);
		switch (strResponse) {
		case 'ACCU000': //PIN was received so merchant can process the authorization
			Acculynk._modalHide();
			go = true;
			break;
		case 'ACCU200': //user pressed 'cancel' button so merchant may process as credit
			Acculynk._modalHide();
			break;
		case 'ACCU400': //user was inactive
			Acculynk._modalHide();
			break;
		case 'ACCU600': //bad data was posted to Acculynk
			Acculynk._modalHide();
			break;
		case 'ACCU800': //general catch all error
			Acculynk._modalHide();
			break;
		case 'ACCU999': //modal popup was opened successfully
			//no action necessary, but open for merchant to use               
			break;
		default:
			break;
		}
		
		if(strResponse=='ACCU000' || strResponse=='ACCU800' || strResponse=='ACCU400' || strResponse=='ACCU200' || strResponse=='ACCU600'){
			var frm = document.startPin ;
			//alert("post to "+strResponse);
			frm.action = "TestAuth.php";
			frm.sendAuth.value = "Y";
			frm.NPCIResp.value = strResponse;
			frm.submit();	
		}			
	}
	
</script>
<?php

	include("Sfa/BillToAddress.php");
	include("Sfa/CardInfo.php");
	include("Sfa/Merchant.php");
	include("Sfa/MPIData.php");
	include("Sfa/ShipToAddress.php");
	include("Sfa/PGResponse.php");
	include("Sfa/PostLibPHP.php");
	include("Sfa/PGReserveData.php");
	include("Sfa/PaySecureDetails.php");

	function callEnterPin()
		{
			$mod1=null;
			$txnid=null;
			$guid=null;
			$exp1=null;
			$errMsg=null;
			$errCode=null;
			$crdNum=null;
			$epgRefNum=null;
			
			$oMerchant = new Merchant();
			$oCI = new CardInfo ();
			
			
			$oCI->setCardDetails("RUPAY",crdNum,"111","2018","12","Tester","DEBIT");

			$mod1 = $_POST["Modulus"];
			$txnid = $_POST["TxnID"];
			$guid = $_POST["GUID"];
			$exp1 = $_POST["Exponent"];
			$errMsg = $_POST["ErrMsg"];
			$errCode = $_POST["ErrCode"];	
			$crdNum = $_POST["CardNum"];
			$epgRefNum = $_POST["EpgTxnID"];
			
			
			print "<center>";
			print "<div id='accu_screen' style='display: none;'></div>";
			print "<div id='accu_keypad' style='display: none;'></div>";
			print "<div id='accu_form' style='display: none;'></div>";
			print "<div id='accu_loading' style='display: none;'></div>";
			print "<div id='accu_issuer' style='display: none;'></div>";
			print "</center>";
			
			print "<form name='startPin'>";
			print "<input type='button' value='Proceed to Paysecure' onclick=if(Acculynk.browserCheck()){ Acculynk.createForm('".$guid.",".$crdNum.",".$mod1.",".$exp1."');Acculynk.PINPadLoad();}/>";
			print "<input type='hidden' name='TxnID' value=".$txnid.">";
			print "<input type='hidden' name='CardAcceptorID' value=".$oMerchant->MerchantID.">";
			print "<input type='hidden' name='AuthAmt' value=".$oMerchant->Amount.">";
			print "<input type='hidden' name='CurrCode' value=".$oMerchant->CurrCode.">";
			print "<input type='hidden' name='sendAuth' value='Y'>";
			print "<input type=hidden name='EpgTxnID' value=".$epgRefNum.">";
			print "</form>";
		}
	callEnterPin();
?>
<body>

</body>
</html>