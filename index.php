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
$doc->addStyleSheet($tpath.'/css/template.css.php');

// modernizer mit html5-shiv must be in the head
$doc->addScript($tpath.'/js/modernizr-2.6.2-respond-1.1.0.min.js');

// get my params
$logo = $this->params->get('logo');
$logotype = $this->params->get('logotype');
$sitetitle = $this->params->get('sitetitle');
$analytics = $this->params->get('analytics');
$anonym = $this->params->get('anonym');
$typesize = $this->params->get('typesize');
$rtl = $this->params->get('rtl');
$maintitle = $this->params->get('maintitle');
$subtitle = $this->params->get('subtitle');
// a little grid sort stuff
$gridsort = $this->params->get('gridsort');
// text indent for bookstyle blogs
$textindent = $this->params->get('textindent');
?>

<?php if ($this->countModules('sidebar or sidebar_tabs')): ?>
    <?php if ($gridsort == 'mr'):
	    $mainpos = 'grid-66';
	    $asidepos = 'grid-33'; ?>
    <?php elseif ($gridsort == 'lm'):
	    $mainpos = 'grid-66 push-33';
	    $asidepos = 'grid-33 pull-66'; ?>
    <?php endif; ?>
<?php else :
    $mainpos = 'grid-100'; ?>
<?php endif;

// Add JavaScript Frameworks
JHtml::_('bootstrap.framework');

// Add current user information
 $user = JFactory::getUser();
?>

<!doctype html>

<!-- ...Modernisierungen... -->
<!--[if IEMobile]><html lang="<?php echo $this->language; ?>" class="iemobile"> <![endif]-->
<!--[if lt IE 7 ]> <html lang="<?php echo $this->language; ?>" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="<?php echo $this->language; ?>" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="<?php echo $this->language; ?>" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="<?php echo $this->language; ?>" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="<?php echo $this->language; ?>" class="no-js"><!--<![endif]-->

<head>
<?php if ($layout != 'desktop'):?>
<!-- ...bildverkleinerung über mobify cdn... -->
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

<!--[if lte IE 7]>
	<link rel="stylesheet" href="<?php echo $tpath; ?>/css/font-awesome-ie7.min.css"/>
<![endif]-->

<!-- ie css für neue off canvas navi fehlt noch! -->

<!-- neu unsemantic responsive rtl grid system von Nathan Smith -->
<?php if ($rtl == 1):?>
<link rel="stylesheet" href="<?php echo $tpath; ?>/css/unsemantic-grid-responsive-rtl.min.css" />
<link rel="stylesheet" href="<?php echo $tpath; ?>/css/rtl-layout.css" />
<?php endif; ?>

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
	    <div class="grid-100 hide-on-desktop nav-simple-btn" role="navigation" > <a href="#simple-nav">Simple Navigation</a> </div>
	</noscript>
	<?php endif; ?>

    <!--  innerer Rahmen  -->
    <div id="inner-wrapper" class="container stickem-container">
        <!-- header -->
        <header id="top" class="grid-100" role="banner" >
            <?php if ($layout == 'mobile'):?>
                <div class="grid-100 hide-on-desktop" role="navigation" >
				    <button class="btn btn-inverse nav-btn" id="nav-open-btn" >
				        <a href="#nav"><?php echo JText::_('TPL_JF3_NAVOPEN'); ?></a>
				    </button>
			    </div>
            <?php endif;?>

            <!-- logo  -->
            <?php if ($logotype == '1'): ?>
                <?php if ($logo): ?>
                    <div class="headerlogo stickem"> <a href="<?php echo $this->baseurl ?>"> <img src="<?php echo $this->baseurl ?>/<?php echo htmlspecialchars($logo); ?>"  alt="<?php echo htmlspecialchars($sitetitle); ?>" /> </a> </div>
                <?php else : ?>
                    <div class="headerlogo stickem"> <a href="<?php echo $this->baseurl ?>"> <IMG src="<?php echo $tpath; ?>/images/logo.png" alt="JFlex" /> </a> </div>
                <?php endif;?>
            <?php elseif ($logotype == '0'): ?>
                <div class="headerlogo stickem"> <a href="<?php echo $this->baseurl ?>"><h1 class="logotext-top"><?php echo htmlspecialchars($maintitle); ?></h1><h1 class="logotext-sub"><?php echo htmlspecialchars($subtitle); ?></h1> </a> </div>
            <?php endif;?>
            <!-- slideshow -->
            <?php if ($layout != 'mobile'):?>
                <?php if ($this->countModules('slideshow')): ?>
                    <div class="slideshow-pad flexslider hide-on-mobile">
                        <jdoc:include type="modules" name="slideshow" />
                    </div>
                <?php endif;?>
            <?php endif;?>

            <nav class="grid-100" id="nav" role="navigation" >
                <div class="grid-100 nav-close-pad stickem" >
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
                    <div class="grid-100 nav-module-pad stickem" role="search" >
                        <jdoc:include type="modules" name="nav_module" style="joomskeleton" />
                    </div>
                <?php endif;?>
            </nav>
        </header>

        <!-- content Rahmen-->
        <div id="main-pad" class="grid-container" >
            <!-- old browser info -->
            <!--[if lte IE 8]> <p class="box alert">You are using an outdated browser. Please <a href="http://browsehappy.com/" target="_blank">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true" target="_blank">activate Google Chrome Frame</a> to improve your experience.</p> <![endif]-->
            <?php if ($layout != 'mobile'):?>
            <!-- breadcrumbs -->
            <?php if ($this->countModules('breadcrumbs')): ?>
                <?php if ($typesize == 1): ?>
                    <div class="grid-66 breadcrumbs-pad hide-on-mobile" role="navigation" >
                        <jdoc:include type="modules" name="breadcrumbs" />
                    </div>
                <?php else : ?>
                    <div class="grid-100 breadcrumbs-pad hide-on-mobile" role="navigation" >
                        <jdoc:include type="modules" name="breadcrumbs" />
                    </div>
                <?php endif;?>
            <?php endif;?>

            <!-- typeresizer -->
            <?php if ($typesize == 1): ?>
                <div class="grid-33 textresizer-pad hide-on-mobile" >
                    <ul class="textresizer" id="textsizer-embed">
                        <li><a href="#nogo" class="small-text" title="<?php echo JText::_('TPL_JF3_SMALL'); ?>"><?php echo JText::_('TPL_JF3_SMALL'); ?></a></li>
                        <li><a href="#nogo" class="default-text" title="<?php echo JText::_('TPL_JF3_DEFAULT'); ?>"><?php echo JText::_('TPL_JF3_DEFAULT'); ?></a></li>
                        <li><a href="#nogo" class="large-text" title="<?php echo JText::_('TPL_JF3_LARGE'); ?>"><?php echo JText::_('TPL_JF3_LARGE'); ?></a></li>
                        <li><a href="#nogo" class="x-large-text" title="<?php echo JText::_('TPL_JF3_XLARGE'); ?>"><?php echo JText::_('TPL_JF3_XLARGE'); ?></a></li>
                    </ul>
                </div>
            <?php endif;?>
        <?php endif; ?>

            <!-- head row -->
		<?php if ($layout != 'mobile'):?>
		    <?php if ($this->countModules('head_row')): ?>
		        <section class="grid-100 hide-on-mobile" role"complementary" >
			        <jdoc:include type="modules" name="head_row" style="joomskeleton" />
		        </section>
		    <?php endif; ?>
		<?php endif; ?>

            <!-- 2 columns: content + message above content | sidebar -->
		<section class="grid-100" >
			<section class="<?php echo htmlspecialchars($mainpos); ?>" id="main" role="main" >
				<jdoc:include type="modules" name="head_tabs" style="beezTabs" headerLevel="2"  id="1" />
				<jdoc:include type="message" />
				<jdoc:include type="component" />
				<jdoc:include type="modules" name="bottom_tabs" style="beezTabs" headerLevel="2"  id="2" />
			</section>
			<aside class="<?php echo htmlspecialchars($asidepos); ?>" id="sidebar" role="complementary" >
                <?php if ($layout != 'mobile'):?>
                    <jdoc:include type="modules" name="nav_mobile" style="joomskeleton" />
                <?php endif;?>
                <jdoc:include type="modules" name="sidebar" style="joomskeleton"  />
                <jdoc:include type="modules" name="sidebar_tabs" style="beezTabs" headerLevel="2"  id="3" />
			</aside>
		</section>

        <?php if ($layout == 'mobile'):?>
            <!-- head  content first in mobile mode -->
			<?php if ($this->countModules('head_row')): ?>
		        <section class="grid-100 hide-on-desktop" role"complementary" >
			        <jdoc:include type="modules" name="head_row" style="joomskeleton" />
		        </section>
		    <?php endif; ?>
        <?php endif; ?>

        <!-- bottom -->
		<?php if ($this->countModules('bottom_row')): ?>
		    <section class="grid-100" role"complementary" >
			    <jdoc:include type="modules" name="bottom_row" style="joomskeleton" />
		    </section>
		<?php endif; ?>

		</div> <!-- content Rahmen -->

        <!-- footer -->
		<?php if ($this->countModules('footer')): ?>
		<footer class="grid-100 footer-pad" role="contentinfo" >
			<jdoc:include type="modules" name="footer" style="joomskeleton" />
		</footer>
		<?php endif; ?>

        <!--	simple navi alternative-->
		<?php if ($layout == 'mobile'):?>
		<noscript>
		<div class="grid-100 hide-on-desktop" id="simple-nav">
			<jdoc:include type="modules" name="nav" />
		</div>
		</noscript>
		<?php endif; ?>

        <!--  just go to top  -->
		<div class="grid-100 gototop-pad">
			<ul class="mynav">
				<li><a href="#top"><span class="icon-chevron-up"></span><p hidden>go to top</p></a></li>
			</ul>
		</div>
        <!-- delete me - if you don't like me -->
        <div class="grid-100 copy-pad"> <a href="http://www.adhocgrafx.de" target="_blank" class="btn">adhocgraFX &copy; Johannes Hock, 2013</a> </div>

    </div> <!-- innerer Rahmen-->

</div> <!-- äußerer Rahmen-->

<!-- debug -->
<jdoc:include type="modules" name="debug" />

<!--  load scripts  -->
<?php if ($layout != 'mobile'):?>
    <script type="text/javascript" src="<?php echo $tpath.'/js/template.desktop.js.php';?>"></script>
<?php endif; ?>
<?php if ($layout == 'mobile'):?>
    <script type="text/javascript" src="<?php echo $tpath.'/js/template.mobile.js.php';?>"></script>
<?php endif; ?>

<!-- load plugin scripts -->
<script type="text/javascript">

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
            if(jQuery(window).width() < 760){
                jQuery('.equal-1 .module-body').unSyncHeight();
            }
        });
    });
    jQuery(window).load(function(){
        jQuery('.equal-2 .module-body').syncHeight({ 'updateOnResize': true});
        jQuery(window).resize(function(){
            if(jQuery(window).width() < 760){
                jQuery('.equal-2 .module-body').unSyncHeight();
            }
        });
    });
jQuery(window).load(function(){
    jQuery('.equal-3 .module-body').syncHeight({ 'updateOnResize': true});
    jQuery(window).resize(function(){
        if(jQuery(window).width() < 760){
            jQuery('.equal-3 .module-body').unSyncHeight();
        }
    });
});
jQuery(window).load(function(){
    jQuery('.equal-4 .module-body').syncHeight({ 'updateOnResize': true});
    jQuery(window).resize(function(){
        if(jQuery(window).width() < 760){
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
    jQuery('.container').stickem({
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
    // Add this event to your JS to enable active states on all of your elements.
    // This can be a bit slow on huge pages so it might be worth restricting it to certain elements instead of document
    document.addEventListener("touchstart", function(){}, true)
<?php endif; ?>

<?php if ($layout == 'tablet'):?>
    // doubletaptogo by Osvaldas Valutis
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