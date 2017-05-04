<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  Captcha
 *
 * @copyright   Copyright (C) 2015 JoomlaRoad.com. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * JRCaptcha Plugin.
 *
 * @package     Joomla.Plugin
 * @subpackage  Captcha
 * @since       3
 */
if(!defined('DS')) define('DS', DIRECTORY_SEPARATOR);
class PlgCaptchaJrcaptcha extends JPlugin
{
	/**
	 * Initialise the captcha
	 *
	 *
	 * @return  Boolean	True on success, false otherwise
	 *
	 * @since  3
	 */
	public function onInit()
	{
		$this->path=JPATH_PLUGINS.DS.'captcha'.DS.'jrcaptcha'.DS;
		return true;
	}

	/**
	 * Gets the challenge HTML
	 *
	 * @param   string  $id     The id of the field.
	 * @param   string  $class  The class of the field. This should be passed as
	 *                          e.g. 'class="required"'.
	 *
	 * @return  string  The HTML to be embedded in the form.
	 *
	 * @since  3
	 */
	public function onDisplay($id = 'dynamic_recaptcha_1', $class = '')
	{
		$captcha = $this->create_image();
		$currentSession =  JFactory::getSession();
		$currentSession->set('sijr_code_'.$captcha['count'], $captcha['word']);
		return '<div id="' . $id . '" ' . $class . '><img src="'.JURI::root().'plugins/captcha/jrcaptcha/cache/image'.$captcha['count'].'.png">
		 	<br><input type="text" name="jrcaptcha_value" required="required" />
			<input type="hidden" name="jrcaptcha_id" value="'.$captcha['count'].'" />
		</div>';
	}

	/**
	 * Calls an HTTP POST function to verify if the user's guess was correct
	 *
	 * @return  True if the answer is correct, false otherwise
	 *
	 * @since  2.5
	 */
	protected function  create_image(){
		    $image = imagecreatetruecolor(200, 50) or die("Cannot Initialize new GD image stream");

		    $background_color = imagecolorallocate($image, 255, 255, 255);
		    $text_color = imagecolorallocate($image, 0, 255, 255);
		    $line_color = imagecolorallocate($image, 64, 64, 64);
		    $pixel_color = imagecolorallocate($image, 0, 0, 255);

		    imagefilledrectangle($image, 0, 0, 200, 50, $background_color);

		    for ($i = 0; $i < 3; $i++) {
		        imageline($image, 0, rand() % 50, 200, rand() % 50, $line_color);
		    }

		    for ($i = 0; $i < 1000; $i++) {
		        imagesetpixel($image, rand() % 200, rand() % 50, $pixel_color);
		    }


		    $letters = 'ABCDEFGHJKLMNPQRSTUVWXYZabcdefghijkmnpqrstuvwxyz';
		    $len = strlen($letters);
		    $letter = $letters[rand(0, $len - 1)];

		    $text_color = imagecolorallocate($image, 0, 0, 0);
		    $word = "";
		    // Replace path by your own font path
			$font = $this->path.'AHGBold.ttf';
		    for ($i = 0; $i < 6; $i++) {
		        $letter = $letters[rand(0, $len - 1)];
		        imagettftext($image, 20,rand(0,30),15 + ($i * 30), 30, $text_color, $font,$letter );
		        $word .= $letter;
		    }
		    

		    $images = glob($this->path."cache".DS."*.png");
		    if($images){
			    foreach ($images as $image_to_delete) {
			       @unlink($image_to_delete);
			    }
		    }
		    $count=md5(uniqid(rand(), true));
		    imagepng($image, $this->path."cache".DS."image" . $count . ".png");
		    return array('count'=>$count,'word'=>$word);

		}
	public function onCheckAnswer()
	{
		$input      = JFactory::getApplication()->input;
		$currentSession =  JFactory::getSession();
		
		$remoteip   = $input->server->get('REMOTE_ADDR', '', 'string');
		$challenge  = $input->get('jrcaptcha_id', '', 'string');
		$response   = $input->get('jrcaptcha_value', '', 'string');
		$word=$currentSession->get('sijr_code_'.$challenge,'' );
		if(!empty($word) and (strcasecmp($word, $response) == 0))
			return true;
		else{
			$this->_subject->setError(JText::_('PLG_JRCAPTCHA_ERROR_EMPTY_SOLUTION'));
			return false;
		}
		
	}

}
