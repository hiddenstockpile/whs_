<?php

class PromotionModel{

	protected $pStrApiUrl;
	protected $pCurlInfo;
	protected $pOutput;

	public function __construct($aStrApiUrl)
	{
		$this->pStrApiUrl = $aStrApiUrl;
	}
	public function SendRequest()
	{
		if (true == empty($this->pStrApiUrl) || '' == trim($this->pStrApiUrl))
		{
			return false;
		}
		// 1. initialise curl
		$ch = curl_init();
		
		curl_setopt($ch, CURLOPT_URL, $this->pStrApiUrl);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HEADER, false);
		
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
		
		//set curl info just in case we need it
		$this->pCurlInfo = curl_getinfo($ch);
		
		// 3. execute and get the output
		$output = curl_exec($ch);
		// 4. free up the curl handle
		curl_close($ch);
	
		$this->pOutput = $output;
		return $this->CheckOutput();
	}
	
	private function CheckOutput()
	{
		$arrOutput = $this->GetOutput();
		
		$arrData = Utils::GetValueByIndex(Constants::DATA, $arrOutput, null);
		if (null != $arrData)
		{
			return true;
		}
		
		return false;
	}
	
	public function GetOutput($aBoolDecodeOutput = true)
	{
		if (true == $aBoolDecodeOutput)
		{
			return json_decode($this->pOutput, true);
		}
		
		return $this->pOutput;
	}
	
}