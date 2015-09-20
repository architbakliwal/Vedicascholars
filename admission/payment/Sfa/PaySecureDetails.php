<?php
	
class PaySecureDetails 
{	 	
	var $mstrCardAcceptorID=null;
	var $mstrPaySecureTxnID=null;
	var $mstrCurrCode=null;
	var $mstrAmount=null;
	var $mstrPaysecureResp=null;

	function setAuthDetails($astrCardAcceptorID, $astrPaySecureTxnID, $astrCurrCode, $astrAmount, $astrPaysecureResp)
	{
		$mstrAmount = $astrAmount;
		$mstrCurrCode = $astrCurrCode;
		$mstrCardAcceptorID = $astrCardAcceptorID;
		$mstrPaySecureTxnID = $astrPaySecureTxnID;
		$mstrPaysecureResp = $astrPaysecureResp;
	}
	
	function getPaysecureResp()
	{ 
		return $this->mstrPaysecureResp;
	}
	
	function setPaysecureResp( $astrPaysecureResp)
	{ 
		 $this->mstrPaysecureResp = $astrPaysecureResp;
	}
	
	function getCardAcceptorID()
	{ 
		return $this->mstrCardAcceptorID;
	}
	
	function setCardAcceptorID( $astrCardAcceptorID)
	{ 
		 $this->mstrCardAcceptorID = $astrCardAcceptorID;
	}
	
	function getPaySecureTxnID()
	{ 
		return $this->mstrPaySecureTxnID;
	}
	
	function setPaySecureTxnID( $mstrPaySecureTxnID)
	{ 
		 $this->mstrPaySecureTxnID = $mstrPaySecureTxnID;
	}
	
	function getCurrCode()
	{ 
		return $this->mstrCurrCode;
	}
	
	function setCurrCode( $mstrCurrCode)
	{ 
		 $this->mstrCurrCode = $mstrCurrCode;
	}
	
	function getAuthAmount()
	{ 
		return $this->mstrAmount;
	}
	
	function setAuthAmount( $mstrAuthAmount)
	{ 
		 $this->mstrAmount = $mstrAuthAmount;
	}
}

?>
