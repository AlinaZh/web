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


<div class="hdwrapper">
	<div class="callaction">
					<?php foreach ($list as $key => $item) {?>

					
					<a href="<?php echo $link; ?>"><h3><?php echo $item->title; ?></h3></a>
					
					<?php }?>
	</div>	
</div>