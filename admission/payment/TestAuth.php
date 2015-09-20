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
	
	$sendA = $_POST['sendAuth'];
	$pgRespCode=null;
	$txnid = null;
	$guid = null;
	$exp1 = null;
	$errMsg = null;
	$errCode = null;
	$mod1 = null;
	$mid1 = null;
	$amt = null;
	$curr = null;
	$npciResp = null;
	$epgRefNum = null;
	$crdNum = "6076000000000022";

	$oPostLibPHP	= new PostLibPHP();
	$oPSD = new PaySecureDetails();
	$oMerchant = new Merchant();
	$oPgResponse = new PGResponse();
	$oCI = new CardInfo();
	$oReserveData = new PGReserveData();
			
	$oMerchant->setMerchantDetails("00001203","00001203","00001203","10.10.10.167",rand()."","","","","INR","INV123","req.Sale","10","","Ext1","Ext2","Ext3","Ext4","Ext5");
	$oCI->setCardDetails ("RUPAY",$crdNum,"234","2018","12","Tester","DEBIT");

	if($sendA == "N") 
	{	
		print ".....Inside TestAuth1.php....."."<br>";
		
		$mod1 = $_POST['Modulus'];
		$txnid = $_POST['TxnID'];
		$guid = $_POST['GUID'];
		$exp1 = $_POST['Exponent'];
		$errMsg = $_POST['ErrMsg'];
		$errCode = $_POST['ErrCode'];	
		$crdNum = $_POST['CardNum'];
		$epgRefNum = $_POST['EpgTxnID'];
			
		print "Merchant Txn Id : ".$txnid."<br>";
		print "WS Error Code :".$errCode."<br>";
		print "WS Error Code :".$errMsg."<br>";
		print "WS GUID : ".$guid ."<br>";
		print "Card Number : ".$crdNum."<br>";
		
		print "Merchant Data ->".$oMerchant.MerchantID.",".$oMerchant.Amount.",".$oMerchant.CurrCode;
		
		print "<form name='startPin' method='post' action='TestAuth.php'>";
		print "<input type='hidden' name='TxnID' value=".$txnid.">";
		print "<input type='hidden' name='CardAcceptorID' value=".$oMerchant.MerchantID.">";
		print "<input type='hidden' name='AuthAmt' value=".$oMerchant.Amount.">";
		print "<input type='hidden' name='CurrCode' value=".$oMerchant.CurrCode.">";
		print "<input type='hidden' name='sendAuth' value='Y'>";
		print "<input type=hidden name='EpgTxnID' value=".$epgRefNum.">";
		print " User Action : " ;
		print "<select name='NPCIResp'>";
		print "<option value='ACCU000' selected='selected'>"."Pin Validation Successful"."</option>";
		print "<option value='ACCU200'> User Cancel Txn</option>";
		print "<option value='ACCU400'>User was Inactive</option>";
		print "<option value='ACCU600'>Invalid Data Posted</option>";
		print "<option value='ACCU700'>Card Issuer Error</option>";
		print "<option value='ACCU800'>";
		print "Rejected by Paysecure : ";
		print "</option>";
		print "</select>";
		print "<input type='submit'/>";
		print "</form>";
	}
	else 
	{	
		print "-------Enter TestAuth2.php After Pin ------"."<br>";
		
		$txnid = $_POST['TxnId'];
		$mid1 = $_POST['CardAcceptorID'];
		$amt = $_POST['AuthAmt'];
		$curr = $_POST['CurrCode'];
		$npciResp = $_POST['NPCIResp'];
		$epgRefNum = $_POST['EpgTxnID'];
				
		$oPSD->setAuthDetails($mid1,$txnid,$curr,$amt,$npciResp);
		
		print "npciResp : ".$npciResp."<br>";
		print "curr : ".$curr."<br>";
		print "txnid : ".$txnid."<br>";
		print "mid1 : ".$mid1."<br>";
		print "amt : ".$amt."<br>";
		
		$epgRefNum = $oPgResponse->getEpgTxnId();	
		$oPgResp = new PGResponse();
		$oPgResp	= $oPostLibPHP->postAuth($oMerchant,$oCI,$oPgResponse,$oPSD,$oReserveData);
		
		print "Response Code :".$oPgResp->RespCode."<br>";
		print "Response Message : ".$oPgResp->RespMessage."<br>";
		print "Merchant Txn Id : ".$oPgResp->TxnId."<br>";
		print " Epg Txn Id :".$oPgResp->EPGTxnId."<br>";
		print " AuthId Code :".$oPgResp->AuthIdCode."<br>";
		print " RRN :".$oPgResp->RRN."<br>";
		print " CVRESP Code :".$oPgResp->CVRespCode."<br>";
		
		print " WS Err Code :".$oPgResp->WsErrCode."<br>";
		print " WS Err Msg  :".$oPgResp->WsErrMsg."<br>";
		print " WS Exponent :".$oPgResp->WsExponent."<br>";
		print " WS GUID     :".$oPgResp->WsGuid."<br>";
		print " WS Modulus  :".$oPgResp->WsModulus."<br>";
		print " WS TxnID    :".$oPgResp->WsTxnId."<br>";
		
		print " Reserve Fld-1 :".$oPgResp->ReserveFld1."<br>";
		print " Reserve Fld-2 :".$oPgResp->ReserveFld2."<br>";
		print " Reserve Fld-3 :".$oPgResp->ReserveFld3."<br>";
		print " Reserve Fld-4 :".$oPgResp->ReserveFld4."<br>";
		print " Reserve Fld-5 :".$oPgResp->ReserveFld5."<br>";
		print " Reserve Fld-6 :".$oPgResp->ReserveFld6."<br>";
		
	}

  ?>