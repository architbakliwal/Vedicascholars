<?php


include("Sfa/Merchant.php");
include("Sfa/PGResponse.php");
include("Sfa/PGSearchResponse.php");
include("Sfa/PostLibPHP.php");


 $oPostLibphp	=	new	PostLibPHP();

 $oMerchant	=	new	Merchant();

 $oPGResp	=	new	PGResponse();

 $oPGSearchResp =       new     PGSearchResponse();



$oMerchant->setMerchantOnlineInquiry("00000001","6044");

$oPGSearchResp=$oPostLibphp->postStatusInq($oMerchant);

$arrayPGRespObj = $oPGSearchResp->getPGResponseObjects();







	if($arrayPGRespObj != null ){

		foreach ($arrayPGRespObj as $oPgResp){
			print "<br>";
			print " Response Code: ".$oPgResp->getRespCode()."<br>";
			print " Response Message: ".$oPgResp->getRespMessage()."<br>";
			print " Transaction ID: ".$oPgResp->getTxnId()."<br>";
			print " Epg Transaction ID: ".$oPgResp->getEpgTxnId()."<br>";
			print " Auth Id Code: ".$oPgResp->getAuthIdCode()."<br>";
			print " RRN: ".$oPgResp->getRRN()."<br>";
			print " Txn Type: ".$oPgResp->getTxnType()."<br>";
			print " Txn Date Time: ".$oPgResp->getTxnDateTime()."<br>";
			print " CvResp Code: ".$oPgResp->getCVRespCode()."<br>";
			print "<br>";

		}
	}

 ?>