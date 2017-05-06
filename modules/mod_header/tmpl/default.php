<?php
/**
*	@package Joomla.Site
*	@subpackage mod_header
*	@copyright Copyright (C) Alina Zhumadilova 2017. All right reserved
*	@license Payment
*/

defined('_JEXEC') or die;
require_once JPATH_SITE . '/components/com_content/helpers/route.php';

?>


<div class="hdwrapper" style="text-align:center">
	<div class="callaction">
					<?php foreach ($list as $key => $item) {?>
					
					<?php
					$slug = $item->id.'-'.$item->alias;
					$link = JRoute::_(ContentHelperRoute::getArticleRoute($slug, $item->catid));?>
					<h1><a style="font-size:3rem" href="<?php echo $link; ?>"<i class="fa fa-pencil" aria-hidden="true"> Последняя статья: <?php echo $item->title; ?></i></a></h1>
					
					<?php }?>
	</div>	
</div>
