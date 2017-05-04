<?php
/**
*	@package Joomla.Site
*	@subpackage mod_header
*	@copyright Copyright (C) Alina Zhumadilova 2017. All right reserved
*	@license Payment
*/

defined('_JEXEC') or die;
require_once JPATH_SITE . '/components/com_content/helpers/route.php';

class ModHeaderHelper{
	public function getList($params){

		$db = JFactory::getDbo();
		$query = $db -> getQuery(true);

		$query->select($db->quoteName(array('id','title','alias','modified')));
		$query->from($db->quoteName('xftsg_content'));
		$query->where('state = 1');
		$query->order('ordering DESC');
		$query->setLimit('3');

		$db->setQuery($query);
		$result = $db->loadObjectList();

		return $result;



	}
}