<?php
/**
*	@package Joomla.Site
*	@subpackage mod_header
*	@copyright Copyright (C) Alina Zhumadilova 2017. All right reserved
*	@license Payment
*/

defined('_JEXEC') or die;

require_once __DIR__.'/helper.php';

$list =  ModHeaderHelper::getList($params);

require JModuleHelper::getLayoutPath('mod_header', $params->get('layout','default'));