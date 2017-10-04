<?php

require_once(MODEL_DIR . '/PromotionModel.php');
require_once(VIEW_DIR . '/PromotionView.php');


class PromotionController{
	
	protected $pStrTitle;
	protected $pStrHeader;
	protected $pStrBody;
	protected $pStrFooter;
	protected $pStrTemplate;
	protected $pArrData;
	
	public function __construct()
	{
		$this->pStrTitle = '';
		$this->pStrHeader = '';
		$this->pStrBody = '';
		$this->pStrFooter = '';
	}

	public function SetPage()
	{
		$strApiUrl = HOME_URL. "/json-dummy/promoThumbs.php";
		
		$objPromotionModel = new PromotionModel($strApiUrl);
		
		$arrOutputData = array();
		if (true == $objPromotionModel->SendRequest())
		{
			$arrOutputData = $objPromotionModel->GetOutput();
			$this->pArrData = $arrOutputData;
			
		}
		$arrOutputData = Utils::GetValueByIndex(Constants::DATA, $this->pArrData, array());
		$objPromotionView = new PromotionView($arrOutputData);
		
		$this->SetTitle('Promotions Landing Page');
		$strBody = $objPromotionView->DisplayContent();
		//$this->SetTemplate('default.php');
		$this->SetBody($strBody);
	}
	
	private function SetTitle($aStrTitle)
	{
		$this->pStrTitle = $aStrTitle;
	}
	
	public function GetTitle()
	{
		return $this->pStrTitle;
	}
	
	private function SetHeader($aStrHeader)
	{
		$this->pStrHeader = $aStrHeader;
	}
	
	public function GetHeader()
	{
		return $this->pStrHeader;
	}
	
	private function SetBody($aStrBody)
	{
		$this->pStrBody = $aStrBody;
	}
	
	public function GetBody()
	{
		return $this->pStrBody;
	}
	
	private function SetFooter($aStrFooter)
	{
		$this->pStrFooter = $aStrFooter;
	}
	
	public function GetFooter()
	{
		return $this->pStrFooter;
	}
	
	private function SetTemplate($aStrTemplate)
	{
		$this->pStrTemplate = $aStrTemplate;
	}
	
	public function GetTemplate()
	{
		return $this->pStrTemplate;
	}
	
}
