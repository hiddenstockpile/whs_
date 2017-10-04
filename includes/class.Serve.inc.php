<?php

class Serve{

	private $pObjPromotionController;
	
	public function __construct(PromotionController $aObjPromotionController)
	{
		$this->pObjPromotionController = $aObjPromotionController;
		$this->pObjPromotionController->SetPage();
	}
	
	public function Page()
	{
		$strTemplate = $this->pObjPromotionController->GetTemplate();
		
		if (null == $strTemplate || '' == $strTemplate)
		{
			$strTemplate = null;
		}
		else
		{
			$strTemplate = TEMPLATE_DIR . '/' .$strTemplate;
		}
		
		
		if (true == Utils::FileExists($strTemplate))
		{
			echo $strTemplate;
			require_once ($strTemplate);
		}
		else
		{
			require_once (TEMPLATE_DIR . "/default.php");
		}
	}
	
	public function GetData()
	{
		return $this->pObjPromotionController->GetData();
	}
	public function GetTitle()
	{
		return $this->pObjPromotionController->GetTitle();
	}
	public function GetHeader()
	{
		return $this->pObjPromotionController->GetHeader();
	}
	public function GetBody()
	{
		return $this->pObjPromotionController->GetBody();
	}
	public function GetFooter()
	{
		return $this->pObjPromotionController->GetFooter();
	}
}