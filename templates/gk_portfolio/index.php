<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.gk_portfolio
 *
 * @copyright   Copyright (C) 2015 GavickPro. All rights reserved.
 * @license     GNU General Public License version 3 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Basic template variables
$app    = JFactory::getApplication();
$doc    = JFactory::getDocument();
$user   = JFactory::getUser();
$menu 	= $app->getMenu();
$lang 	= JFactory::getLanguage();
// Getting params from template
$params = $app->getTemplate(true)->params;

require_once('inc/head.php');
require_once('inc/layout.php');

?>
<!DOCTYPE html>
<html lang="ru" <?php gkHtmlAtts($this); ?>>
<head>
 <title>Aljoy | персональный блог</title> 
  <meta http-equiv="content-language" content="ru" />
 <meta name="yandex-verification" content="8b4e8a40fdc17041" />
  <meta name='wmail-verification' content='0c1d573bbc3e3c079c3c486b89cc1c85' />
<meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta charset="UTF-8">
  <meta name="description" content="Aljoy - персональный блог. Интересное о книгах, сериалах, фильмах, спорте, местах и событиях в Алматы и Астане.">
  <meta name="keywords" content="Книги, фильмы, сериалы, спорт,места, Астана, Алматы">
  <meta name="author" content="Aljoy">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<jdoc:include type="head" />
<?php if(gkIsOldIE()) : ?>
<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" />
<?php endif; ?>
<!--[if lt IE 9]>
		<script src="<?php echo JUri::root(true); ?>/media/jui/js/html5.js"></script>
	<![endif]-->

   
</head>

<body>
<!--[if lte IE 8]>
	<div id="ie-toolbar"><div><?php echo JText::_('TPL_GK_PORTFOLIO_IE_BANNER'); ?></div></div>
	<![endif]-->

<?php if(count($app->getMessageQueue())) : ?>
<jdoc:include type="message" />
<?php endif; ?>
<header class="header">

     <?php gkLogo($params); ?>
     <?php if($this->countModules('search')) : ?>
     <div class="header__search">
          <jdoc:include type="modules" name="search" style="none" />
     </div>
     <!-- .header__search -->
     <?php endif; ?>
     <?php if($this->countModules('top-menu')) : ?>
     <div class="header__topmenu">
          <jdoc:include type="modules" name="top-menu" style="none" />
     </div>
     <!-- .header__topmenu -->
     <?php endif; ?>
            <?php if($this->countModules('main-menu')) : ?>

</header>
<!-- .header -->

<div class="hfeed site">
     <div class="site__main">
          <nav class="navigation">
               <jdoc:include type="modules" name="main-menu" style="none" />
          </nav>
          <!-- .navigation -->
          <?php endif; ?>
          <?php if($this->countModules('top')) : ?>
          <div class="site__top clearfix subpage" role="complementary" data-mod-num="<?php echo gkModuleNumber($this, 'top'); ?>">
               <jdoc:include type="modules" name="top" style="xhtml" />
          </div>
          <!-- .site__top -->
          <?php endif; ?>
          <div class="site__content" role="main">
               <?php if($this->countModules('content_top') && !gkIsPortfolioView()) : ?>
               <div class="component__top subpage clearfix" role="complementary">
                    <jdoc:include type="modules" name="content_top" style="xhtml" />
               </div>
               <!-- .component__top -->
               <?php endif; ?>
               <?php if(!gkIsPortfolioView() && !gkIsNarrowView() && !gkIsArticleView()) : ?>
               <div class="subpage component">
                    <?php endif; ?>
                    <jdoc:include type="component" />
                    <?php if(!gkIsPortfolioView() && !gkIsNarrowView()) : ?>
               </div>
               <!-- subpage component -->
               <?php endif; ?>
               <?php if($this->countModules('content_bottom') && !gkIsPortfolioView()) : ?>
               <div class="component__bottom subpage clearfix" role="complementary">
                    <jdoc:include type="modules" name="content_bottom" style="xhtml" />
               </div>
               <!-- .component__bottom -->
               <?php endif; ?>
          </div>
          <!-- .site__content -->
     </div>
     <!-- .site__main -->
</div>
<?php if($this->countModules('breadcrumb')) : ?>
<div class="breadcrumb">
     <jdoc:include type="modules" name="breadcrumb" style="none" />
</div>
<!-- .breadcrumb -->
<?php endif; ?>
<footer class="footer">
     <?php if($this->countModules('bottom')) : ?>
     <div class="footer__bottom" role="complementary" data-mod-num="<?php echo gkModuleNumber($this, 'bottom'); ?>">
          <jdoc:include type="modules" name="bottom" style="xhtml" />
     </div>
     <!-- .footer__bottom -->
     <?php endif; ?>
     <?php if($this->countModules('social-menu')) : ?>
     <div class="footer__social">
          <jdoc:include type="modules" name="social-menu" style="none" />
     </div>
     <!-- .footer__social -->
     <?php endif; ?>

    

     <div class="footer__copyrights">
          <?php if($this->countModules('copyrights')) : ?>
          <div class="footer__copyrights_module">
               <jdoc:include type="modules" name="copyrights" style="none" />
          </div>
          <!-- .footer__copyrights_module -->
          <?php endif; ?>
          <?php if ($menu->getActive() == $menu->getDefault($lang->getTag())) : ?>
         <!--  <p class="footer__copyrights_text">
               Responsive Joomla Portfolio Template
               <a href="https://www.gavick.com/joomla-templates/photography-portfolio" rel="nofollow">designed by GavickPro </a>
          </p>-->
          <p class="footer__copyrights_text">
              Жумадилова Алина 2017
          </p>
          <?php else : ?>
         <!--  <p class="footer__copyrights_text">
               Responsive Joomla Portfolio Template designed by GavickPro
          </p>-->
          <p class="footer__copyrights_text">
              Жумадилова Алина 2017
          </p>
          <?php endif; ?>
     </div>
      
     <!-- .footer__copyrights -->

</footer>
<!-- .footer -->

<jdoc:include type="modules" name="debug" style="none" />

   <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-97381649-1', 'auto');
  ga('send', 'pageview');

</script>
  <!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter44216229 = new Ya.Metrika({
                    id:44216229,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/44216229" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
  <script type="application/ld+json">
{
  "@context" : "http://aljoy.kz",
  "@type" : "Blog",
  "name" : "Aljoy",
  "url" : "http://aljoy.kz",
  "sameAs" : [
    "https://plus.google.com/u/0/104200588957483219188",
    "https://www.facebook.com/profile.php?id=100002198800967",
    "https://twitter.com/aniel_30?lang=ru"
   ],
  "address": {
    "@type": "Address",
    "streetAddress": "Akniet",
    "addressRegion": "Astana",
    "postalCode": "010018",
    "addressCountry": "Kazakhstan"
  }
}
</script>
        <!-- ZERO.kz -->
<span id="_zero_68881">
<noscript>
<a href="http://zero.kz/?s=68881" target="_blank">
<img src="http://c.zero.kz/z.png?u=68881" width="88" height="31" alt="ZERO.kz" />
</a>
</noscript>
</span>

<script type="text/javascript"><!--
var _zero_kz_ = _zero_kz_ || [];
_zero_kz_.push(["id", 68881]);
_zero_kz_.push(["type", 1]);

(function () {
    var a = document.getElementsByTagName("script")[0],
    s = document.createElement("script");
    s.type = "text/javascript";
    s.async = true;
    s.src = (document.location.protocol == "https:" ? "https:" : "http:")
    + "//c.zero.kz/z.js";
    a.parentNode.insertBefore(s, a);
})(); //-->
</script>
<!-- End ZERO.kz -->

</body>
</html>
