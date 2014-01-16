<?php
/**
 * @copyright	© 2013 adhocgraFX Johannes Hock 2013 - All Rights Reserved.
 * @copyright	JFlex responsive template ©
 * @license		GNU/GPL
 * @copyright   blank-template index-php Grundstruktur mit css- und js-compressor: Alexander Schmidt
**/
defined( '_JEXEC' ) or die; 

// variables
$app = JFactory::getApplication();
$doc = JFactory::getDocument(); 
$params = $app->getParams();
$pageclass = $params->get('pageclass_sfx'); // parameter (menu entry)
$tpath = $this->baseurl.'/templates/'.$this->template;

$this->setGenerator(null);

// mobile detect usage von Rene Kreijveld
include_once ('js/Mobile_Detect.php');
$detect = new Mobile_Detect();
$layout = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'mobile') : 'desktop');

// mein css
$doc->addStyleSheet($tpath.'/css/jf-template.css');

// modernizer mit html5-shiv must be in the head
$doc->addScript($tpath.'/js/modernizr-2.6.2-respond-1.1.0.min.js');

// get my params
$headfont = $this->params->get('headfont');
$bodyfont = $this->params->get('bodyfont');
$headerlogo = $this->params->get('headerlogo');
$sitetitle = $this->params->get('sitetitle');
$analytics = $this->params->get('analytics');
$anonym = $this->params->get('anonym');
$typesize = $this->params->get('typesize');
$maintitle = $this->params->get('maintitle');
$subtitle = $this->params->get('subtitle');
$textindent = $this->params->get('textindent');

// Add Joomla! JavaScript Frameworks
JHtml::_('bootstrap.framework');

// Add current user information
$user = JFactory::getUser();
?>

<!doctype html>
<!-- ... Modernisierungen ... -->
<!--[if IEMobile]><html lang="<?php echo $this->language; ?>" class="iemobile"> <![endif]-->
<!--[if lt IE 7 ]> <html lang="<?php echo $this->language; ?>" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="<?php echo $this->language; ?>" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="<?php echo $this->language; ?>" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="<?php echo $this->language; ?>" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="<?php echo $this->language; ?>" class="no-js" xmlns="http://www.w3.org/1999/html"><!--<![endif]-->

<head>
<!-- fonts -->
<?php if ($headfont != "default"): ?>
    <script src="http://use.edgefonts.net/<?php echo htmlspecialchars($headfont); ?>.js"></script>
<?php endif;?>
<?php if ($bodyfont != "default"): ?>
    <script src="http://use.edgefonts.net/<?php echo htmlspecialchars($bodyfont); ?>.js"></script>
<?php endif;?>

<?php if ($layout != 'desktop'):?>
<!-- bildverkleinerung über mobify cdn -->
<script>!function(a,b,c,d,e){function g(a,c,d,e){var f=b.getElementsByTagName("script")[0];a.src=e,a.id=c,a.setAttribute("class",d),f.parentNode.insertBefore(a,f)}a.Mobify={points:[+new Date]};var f=/((; )|#|&|^)mobify=(\d)/.exec(location.hash+"; "+b.cookie);if(f&&f[3]){if(!+f[3])return}else if(!c())return;b.write('<plaintext style="display:none">'),setTimeout(function(){var c=a.Mobify=a.Mobify||{};c.capturing=!0;var f=b.createElement("script"),h="mobify",i=function(){var c=new Date;c.setTime(c.getTime()+3e5),b.cookie="mobify=0; expires="+c.toGMTString()+"; path=/",a.location=a.location.href};f.onload=function(){if(e)if("string"==typeof e){var c=b.createElement("script");c.onerror=i,g(c,"main-executable",h,mainUrl)}else a.Mobify.mainExecutable=e.toString(),e()},f.onerror=i,g(f,"mobify-js",h,d)})}(window,document,function(){var a=/webkit|msie\s10|(firefox)[\/\s](\d+)|(opera)[\s\S]*version[\/\s](\d+)|3ds/i.exec(navigator.userAgent);return a?a[1]&&+a[2]<4?!1:a[3]&&+a[4]<11?!1:!0:!1},
// path to mobify.js
"//cdn.mobify.com/mobifyjs/build/mobify-2.0.0.min.js",
// calls to APIs go here
function() {
  var capturing = window.Mobify && window.Mobify.capturing || false;
  if (capturing) {
    Mobify.Capture.init(function(capture){
      var capturedDoc = capture.capturedDoc;
      var images = capturedDoc.querySelectorAll("img, picture");
      Mobify.ResizeImages.resize(images);
      // Render source DOM to document
      capture.renderCapturedDoc();
    });
  }
});
</script>
<?php endif; ?>

<jdoc:include type="head" />

<!-- Mobile Specific Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta name="HandheldFriendly" content="true" />
<meta name="apple-touch-fullscreen" content="YES" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

<!-- load css options -->
<?php include_once ('css/styles-css.php'); ?>

<!-- Favicons -->
<link rel="shortcut icon" href="<?php echo $tpath; ?>/favicon.ico">
<link rel="apple-touch-icon" href="<?php echo $tpath; ?>/images/apple-touch-icon-57x57.png">
<link rel="apple-touch-icon" sizes="72x72" href="<?php echo $tpath; ?>/images/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="114x114" href="<?php echo $tpath; ?>/images/apple-touch-icon-114x114.png">
<link rel="apple-touch-icon" sizes="144x144" href="<?php echo $tpath; ?>/images/apple-touch-icon-ipad-144.png" />
<!-- Win8 tile 144x144 -->
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="<?php echo $tpath; ?>/images/tile-icon.png">

</head>

<body class="<?php echo $pageclass; ?>">

<!-- äußerer Rahmen	-->
<div id="outer-wrapper">
	<?php if ($layout == 'mobile'):?>
	<noscript>
	    <div class="nav-simple-btn" role="navigation" > <a href="#simple-nav">Simple Navigation</a> </div>
	</noscript>
	<?php endif; ?>

    <!--  innerer Rahmen  -->
    <div id="inner-wrapper" class="stickem-container">
        <!-- header -->
        <header id="top" role="banner" >
            <?php if ($layout == 'mobile'):?>
                <div role="navigation" >
				    <button class="btn btn-inverse nav-btn" id="nav-open-btn" >
				        <a href="#nav"><?php echo JText::_('TPL_JF3_NAVOPEN'); ?></a>
				    </button>
			    </div>
            <?php endif;?>

            <!-- seitliches logobild  -->
            <?php if ($headerlogo): ?>
                <?php if ($layout != 'mobile'):?>
                    <div class="headerlogo"> <a href="<?php echo $this->baseurl ?>"> <img src="<?php echo $this->baseurl ?>/<?php echo htmlspecialchars($headerlogo); ?>"  alt="<?php echo htmlspecialchars($sitetitle); ?>" /> </a> </div>
                <?php endif;?>
            <?php endif;?>

            <!-- logotext  -->
            <div class="logotext stickem"> <a href="<?php echo $this->baseurl ?>"><h1 class="logotext-top"><?php echo htmlspecialchars($maintitle); ?></h1><h1 class="logotext-sub"><?php echo htmlspecialchars($subtitle); ?></h1> </a> </div>

            <!-- slideshow -->
            <?php if ($layout != 'mobile'):?>
                <?php if ($this->countModules('slideshow')): ?>
                    <div class="slideshow-pad flexslider">
                        <jdoc:include type="modules" name="slideshow" />
                    </div>
                <?php endif;?>
            <?php endif;?>

            <nav id="nav" role="navigation" >
                <div class="nav-close-pad stickem" >
                    <jdoc:include type="modules" name="nav" />
                    <?php if ($layout == 'mobile'):?>
                        <jdoc:include type="modules" name="nav_mobile" />
                    <?php endif;?>
                    <button class="btn btn-inverse close-btn" id="nav-close-btn" >
                        <a href="#top"><?php echo JText::_('TPL_JF3_NAVCLOSE'); ?></a>
                    </button>
                </div>

                <!-- module pos inside nav  -->
                <?php if ($this->countModules('nav_module')): ?>
                    <div class="nav-module-pad stickem" role="search" >
                        <jdoc:include type="modules" name="nav_module" style="joomskeleton" />
                    </div>
                <?php endif;?>
            </nav>
        </header>

        <!-- head row -->
        <?php if ($layout != 'mobile'):?>
            <?php if ($this->countModules('head_row')): ?>
                <section class="head-row row-fluid" role="complementary" >
			        <jdoc:include type="modules" name="head_row" style="joomskeleton" />
                </section>
		    <?php endif; ?>
        <?php endif; ?>

        <!-- content Rahmen-->
        <section class="block-group" id="main-pad" >

            <jdoc:include type="message" />

            <!-- old browser info -->
            <!--[if lt IE 9]> <p class="box alert">You are using an outdated browser. Please <a href="http://browsehappy.com/" target="_blank">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true" target="_blank">activate Google Chrome Frame</a> to improve your experience.</p> <![endif]-->

            <!-- 2 columns: content + message above content | sidebar -->
		    <section class="block" id="main" role="main" >
                <jdoc:include type="modules" name="head_tabs" style="beezTabs" headerLevel="2"  id="1" />
				<jdoc:include type="component" />
				<jdoc:include type="modules" name="bottom_tabs" style="beezTabs" headerLevel="2"  id="2" />
                <?php if ($this->countModules('breadcrumbs')): ?>
                    <div class="breadcrumbs-pad" role="navigation" >
                        <jdoc:include type="modules" name="breadcrumbs" />
                    </div>
                <?php endif; ?>
            </section>
		    <aside class="block" id="sidebar" role="complementary" >
                <?php if ($layout != 'mobile'):?>
                    <!-- typeresizer -->
                    <?php if ($typesize == 1): ?>
                        <div class="textresizer-pad" >
                            <ul class="textresizer" id="textsizer-embed">
                                <li><a href="#nogo" class="small-text" title="<?php echo JText::_('TPL_JF3_SMALL'); ?>"><?php echo JText::_('TPL_JF3_SMALL'); ?></a></li>
                                <li><a href="#nogo" class="default-text" title="<?php echo JText::_('TPL_JF3_DEFAULT'); ?>"><?php echo JText::_('TPL_JF3_DEFAULT'); ?></a></li>
                                <li><a href="#nogo" class="large-text" title="<?php echo JText::_('TPL_JF3_LARGE'); ?>"><?php echo JText::_('TPL_JF3_LARGE'); ?></a></li>
                                <li><a href="#nogo" class="x-large-text" title="<?php echo JText::_('TPL_JF3_XLARGE'); ?>"><?php echo JText::_('TPL_JF3_XLARGE'); ?></a></li>
                            </ul>
                        </div>
                    <?php endif;?>
                    <jdoc:include type="modules" name="nav_mobile" style="joomskeleton" />
                <?php endif;?>
                <jdoc:include type="modules" name="sidebar" style="joomskeleton"  />
                <jdoc:include type="modules" name="sidebar_tabs" style="beezTabs" headerLevel="2"  id="3" />
		    </aside>
		</section> <!-- content Rahmen -->

        <?php if ($layout == 'mobile'):?>
            <!-- head  content first in mobile mode -->
			<?php if ($this->countModules('head_row')): ?>
		        <section class="head-row row-fluid" role="complementary" >
			        <jdoc:include type="modules" name="head_row" style="joomskeleton" />
		        </section>
		    <?php endif; ?>
        <?php endif; ?>

        <!-- bottom -->
		<?php if ($this->countModules('bottom_row')): ?>
		    <section class="bottom-row row-fluid" role="complementary" >
			    <jdoc:include type="modules" name="bottom_row" style="joomskeleton" />
		    </section>
		<?php endif; ?>

        <!-- footer -->
        <footer role="contentinfo" >
            <?php if ($this->countModules('footer')): ?>
			    <jdoc:include type="modules" name="footer" style="joomskeleton" />
		    <?php endif; ?>
            <!--	simple navi alternative-->
		    <?php if ($layout == 'mobile'):?>
		        <noscript>
		            <div id="simple-nav">
			            <jdoc:include type="modules" name="nav" />
		            </div>
		           </noscript>
		    <?php endif; ?>
            <!--  just go to top  -->
		    <div class="gototop-pad">
			    <ul class="mynav">
				    <li><a href="#top"><span class="icon-chevron-up"></span><p hidden>go to top</p></a></li>
			    </ul>
		    </div>
            <!-- delete me - if you don't like me -->
            <div class="copy-pad">
                <a href="http://www.adhocgrafx.de" target="_blank">adhocgraFX &copy; Johannes Hock, 2014</a>
            </div>
        </footer>

    </div> <!-- innerer Rahmen-->

</div> <!-- äußerer Rahmen-->

<!-- debug -->
<jdoc:include type="modules" name="debug" />

<!--  load scripts -->
<?php if ($layout != 'mobile'):?>
<script type="text/javascript" src="<?php echo $tpath.'/js/template.desktop.js';?>"></script>
<?php elseif ($layout == 'mobile'):?>
<script type="text/javascript" src="<?php echo $tpath.'/js/template.mobile.js';?>"></script>
<?php endif; ?>

<!-- load plugin scripts -->
<script type="text/javascript">

//  Avoid `console` errors in browsers that lack a console.
    (function() {
        var method;
        var noop = function () {};
        var methods = [
            'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
            'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
            'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
            'timeStamp', 'trace', 'warn'
        ];
        var length = methods.length;
        var console = (window.console = window.console || {});

        while (length--) {
            method = methods[length];

            // Only stub undefined methods.
            if (!console[method]) {
                console[method] = noop;
            }
        }
    }());

//  smooth scroll
	jQuery(document).ready(function() {
		jQuery('ul.mynav a').smoothScroll({
			speed: 600
		});
	});

<?php if ($layout != 'mobile'):?>
<?php if ($this->countModules('head_row') or $this->countModules('bottom_row')): ?>
//  für gleiche modulhöhen - nun mit window load
    jQuery(window).load(function(){
        jQuery('.equal-1 .module-body').syncHeight({ 'updateOnResize': true});
        jQuery(window).resize(function(){
            if(jQuery(window).width() < 753){
                jQuery('.equal-1 .module-body').unSyncHeight();
            }
        });
    });
    jQuery(window).load(function(){
        jQuery('.equal-2 .module-body').syncHeight({ 'updateOnResize': true});
        jQuery(window).resize(function(){
            if(jQuery(window).width() < 753){
                jQuery('.equal-2 .module-body').unSyncHeight();
            }
        });
    });
jQuery(window).load(function(){
    jQuery('.equal-3 .module-body').syncHeight({ 'updateOnResize': true});
    jQuery(window).resize(function(){
        if(jQuery(window).width() < 753){
            jQuery('.equal-3 .module-body').unSyncHeight();
        }
    });
});
jQuery(window).load(function(){
    jQuery('.equal-4 .module-body').syncHeight({ 'updateOnResize': true});
    jQuery(window).resize(function(){
        if(jQuery(window).width() < 753){
            jQuery('.equal-4 .module-body').unSyncHeight();
        }
    });
});
<?php endif; ?>

//  text resizer
    <?php if ($typesize == 1):?>
	jQuery(document).ready( function() {
        jQuery( "#textsizer-embed a" ).textresizer({
		target: "#main",
		type: "css",
		sizes: [
            // Small. Index 0
            { "font-size" : "87.5%",
              "line-height" : "1.4"
            },
            // Default. Index 1
            { "font-size" : "100%",
              "line-height" : "1.5"
            },
            // Large. Index 2
            { "font-size" : "112.5%",
              "line-height" : "1.5"
            },
            // X-Large. Index 3
            { "font-size" : "125%",
              "line-height" : "1.6"
            }
        ],
		selectedIndex: 1
		});
	});
    <?php endif; ?>

// flexslider
    <?php if ($this->countModules('slideshow')): ?>
    jQuery(window).load(function() {
        jQuery('.flexslider').flexslider({
        animation: "fade",
        controlNav: true,
        directionNav: true
        });
    });
    <?php endif; ?>

// slabtext experiment
// momentan nicht
<?php endif; ?>

<?php if ($layout == 'desktop'):?>
// jquery stickem nur für desktop
jQuery(document).ready(function() {
    jQuery('.stickem-container').stickem({
            <?php if ($this->countModules('slideshow')): ?>
            start: 900
            <?php else: ?>
            start: 400
            <?php endif; ?>
        }
    );
});
<?php endif; ?>

<?php if ($layout != 'desktop'):?>
//  Add this event to your JS to enable active states on all of your elements.
//  This can be a bit slow on huge pages so it might be worth restricting it to certain elements instead of document
    document.addEventListener("touchstart", function(){}, true)
<?php endif; ?>

<?php if ($layout == 'tablet'):?>
//  doubletaptogo by Osvaldas Valutis
    jQuery(function()
    {
        jQuery( '#nav li:has(ul)' ).doubleTapToGo();
    });
<?php endif; ?>

//  google analytics id
<?php if ($analytics != "UA-XXXXX-X"): ?>
    var _gaq=[['_setAccount','<?php echo htmlspecialchars($analytics); ?>'],['_trackPageview']];
    <?php if ($anonym == 1):?>
        _gaq.push (['_gat._anonymizeIp']);
    <?php endif; ?>
    (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';s.parentNode.insertBefore(g,s)}(document,'script'));
<?php endif; ?>

//  footable responsive tables
  jQuery(window).load(function() {
    jQuery('.footable').footable({
            phone: 480,
            tablet: 767
        }
    );
  });

<?php if ($textindent == 1):?>
//  text indent for bookstyle blogs
jQuery(document).ready( function() {
    jQuery("p").has("img").css({
        "margin-top": ".75em",
        "margin-bottom": "1.5em",
        "text-indent": "0px"});
    jQuery("p").has("button").css({
        "margin-top": ".75em",
        "margin-bottom": ".75em",
        "text-indent": "0px"});
    jQuery("p").has("img").addClass("bild");
})
<?php endif; ?>

</script>

</body>
</html>