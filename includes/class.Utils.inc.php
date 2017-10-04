<?php

class Utils{

	public static function PrintArray($aArr = array())
	{
		echo '<pre>' . print_r($aArr, true) . '</pre>';
	}
	
	public static function GetValueByIndex($aMixIndex, $aArrStack, $aMixDefault = null)
	{
		if (true == isset($aArrStack) && true == isset($aMixIndex))
		{
			if (true == is_array($aArrStack) && true == isset($aArrStack[$aMixIndex]))
			{
				return $aArrStack[$aMixIndex];
			}
		}
		return $aMixDefault;
	}
	
	public static function FileExists($aStrFile = '')
	{
		if (true === file_exists($aStrFile))
		{
			return true;
		}
		
		return false;
	}
}