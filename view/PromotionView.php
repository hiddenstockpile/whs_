<?php

class PromotionView{
	
	private $pArrData;
	const INDEX_IMAGE_URL = 0;
	const INDEX_TITLE = 1;
	const INDEX_EXCERPT = 2;
	
	public function __construct($aArrData = array())
	{
		$this->pArrData = $aArrData;
	}
	
	public function DisplayContent()
	{
		$strHtml = '';
		$arrPromoThumbs = Utils::GetValueByIndex(Constants::PROMO_THUMBS, $this->pArrData, array());
		
		$strHtml .=  '<h2>Promotions</h2>';
		$strHtml .=  '<div class="row">';
		foreach($arrPromoThumbs as $arrPromoDetails)
		{
			$strHtml .= '<div class="col-xs-12 col-md-3">' ;
			$strHtml .= '	<p><img class="img-responsive" src=" ' . HOME_URL . '/'. $arrPromoDetails[self::INDEX_IMAGE_URL] .'" /></p>'; 
			$strHtml .= '	<h3> ' . $arrPromoDetails[self::INDEX_TITLE] . ' </h3>';
			$strHtml .= '	<p> ' . $arrPromoDetails[self::INDEX_EXCERPT] . ' </p>';
			$strHtml .= '	<p><input class="form-control" type="button" value="Get Your Bonus" /></p>';
			$strHtml .=  '</div>'; 
		}
		$strHtml .=  '</div>'; 
		
		return $strHtml;
	}
	
}