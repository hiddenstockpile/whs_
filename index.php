<?php

define ('HOME_URL' , "http://dev.testbet.eu");
define ('IMAGES_URL' , HOME_URL . '/images');

define ('ROOT_DIR', dirname(__FILE__));
define ('INCLUDES_DIR', ROOT_DIR . '/includes');
define ('CONTROLLER_DIR', ROOT_DIR . '/controller');
define ('MODEL_DIR', ROOT_DIR . '/model');
define ('VIEW_DIR', ROOT_DIR . '/view');
define ('TEMPLATE_DIR', ROOT_DIR . '/template');

require_once(INCLUDES_DIR . '/class.Constants.inc.php');
require_once(INCLUDES_DIR . '/class.Utils.inc.php');
require_once(INCLUDES_DIR . '/class.Serve.inc.php');

require_once(CONTROLLER_DIR . '/PromotionController.php');


$objPromotionController = new PromotionController;
$objServe = new Serve($objPromotionController);
$objServe->Page();


