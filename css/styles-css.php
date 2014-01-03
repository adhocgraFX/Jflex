<?php 

/**
 * @copyright	© 2011 adhocgraFX Johannes Hock 2011 - All Rights Reserved.
 * @copyright	JFlex responsive template ©
 * @license		GNU/GPL
**/

	header('Content-type: text/css');
	// get params
	$headlineColor = $this->params->get('headcolor');
	$fontColor = $this->params->get('fontcolor');
	$bodyColor = $this->params->get('bodycolor');
	$linkColor = $this->params->get('linkcolor');
	$hoverColor = $this->params->get('hovercolor');
	$bodybackground = $this->params->get('bodybackground');
	$tabbackground = $this->params->get('tabcolor');
	$tabtext = $this->params->get('tabtextcolor');
    $headerColor = $this->params->get('headercolor');
    $headerborderColor = $this->params->get('headerbordercolor');
    $headerlogo = $this->params->get('headerlogo');
    $headerbackimage = $this->params->get('headerbackimage');
    $maintitleColor = $this->params->get('mtcolor');
    $subtitleColor = $this->params->get('stcolor');
    $maxwidth = $this->params->get('maxwidth');
    $wunit = $this->params->get('wunit');
	$modulor = $this->params->get('modulor');
	$fontmobile = $this->params->get('fontmobile');
	$headfont = $this->params->get('headfont');
	$bodyfont = $this->params->get('bodyfont');
    $basefontsize = $this->params->get('basefontsize');
    $textindent = $this->params->get('textindent');
    $jugfulda = $this->params->get('jugfulda');
?>
<?php if ($headfont != "default"): ?>
	<script src="http://use.edgefonts.net/<?php echo htmlspecialchars($headfont); ?>.js"></script>
<?php endif;?>
<?php if ($bodyfont != "default"): ?>
	<script src="http://use.edgefonts.net/<?php echo htmlspecialchars($bodyfont); ?>.js"></script>
<?php endif;?>
<style type="text/css">
h1, h2, h3, h4, h5, h6, p.lead, p.bildlegende, p.autor, blockquote {
 	color: <?php echo $headlineColor;?> !important;
}	
	<?php if ($headfont != "default"):?>
		h1, h2, h3, h4, h5, h6 {
			font-family: <?php echo htmlspecialchars($headfont); ?>, Helvetica, Arial, sans-serif; }
	<?php endif;?>
@media screen and (min-width: 767px) {
    body {font-size: <?php echo $basefontsize;?>%;}
}
@media screen and (min-width: 1280px) {
    body {font-size: <?php echo $basefontsize * 1.125;?>%;}
}
body  {
    color: <?php echo $fontColor;?>;
 	<?php if ($bodyfont != "default"): ?>
		font-family: <?php echo htmlspecialchars($bodyfont); ?>, Helvetica, Arial, sans-serif;
	<?php endif;?>

    <?php if ($layout != 'mobile'):?>
        <?php if ($bodybackground): ?>
            background: url(<?php echo $this->baseurl ?>/<?php echo htmlspecialchars($bodybackground);?>) center top no-repeat fixed;
 	    <?php else : ?>
		    background: <?php echo $bodyColor;?>;
	    <?php endif;?>
    <?php endif;?>
}
<?php if ($bodyfont != "default"): ?>
	.btn, dl.tabs h3, .panel h3.title  {
		font-family: <?php echo htmlspecialchars($bodyfont); ?>, Helvetica, Arial, sans-serif;
	}
<?php endif;?>
<?php if ($modulor == 1):?>	   /* Modulor de Le Corbusier */
@media screen and (min-width: 1280px) {
    h1 { font-size: 3.4231em;  /* 62px  */ }
    h1.subheader { font-size: 3.08079em;}
    h2 { font-size: 2.6154em;  /* 47px  */ }
    h2.subheader { font-size: 2.35386em;}
    h3 { font-size: 2.1154em;  /* 38px  */ }
    h3.subheader { font-size: 1.90386em;}
    h4 { font-size: 1.6154em;  /* 29px  */ }
    h4.subheader { font-size: 1.45386em;}
    h5 { font-size: 1.3077em;  /* 24px  */ }
    h5.subheader { font-size: 1.17693em;}
    h6, h6.subheader { font-size: 1em; 	   /* 18px  */ }
}
<?php endif;?>
<?php if ($fontmobile == 1):?>	/*	small mobile fonts	*/
@media screen and (max-width: 767px) {
    /*  - hier: bei body = 100% = 16px for paragraph - lazy font scaling - */
    /*  - sehr flache Schrift-Skalierung - für mobile Ansichten geeignet - */
    h1, h1.subheader { font-size: 2em;     /*  32px */ }
    h2, h2.subheader { font-size: 1.6666em;  /*  28px */ }
    h3, h3.subheader { font-size: 1.5em;     /*  24px */ }
    h4, h4.subheader { font-size: 1.3333em;  /*  21px */ }
    h5, h5.subheader { font-size: 1.1667em;  /*  19px */ }
    h6, h6.subheader { font-size: 1em;     /*  16px */ }
}
<?php endif;?>

#main-pad {
 	background: <?php echo $bodyColor;?>;
    /* background: rgba(245,245,245,.9); */
}
footer, .footer-pad, .copy-pad, .gototop-pad {
   background: <?php echo $headerColor;?>;
}
header {
    background-color: <?php echo $headerColor;?>;

    <?php if ($headerbackimage): ?>
        background-image: url("<?php echo $this->baseurl ?>/<?php echo htmlspecialchars($headerlogo); ?>"), url("<?php echo $this->baseurl ?>/<?php echo htmlspecialchars($headerbackimage); ?>");
        background-position: left bottom, center center;
        background-repeat: no-repeat, no-repeat;

        <?php if ($this->countModules('slideshow')):?>
            -webkit-background-size: auto 240px, 100% 100%;
            -moz-background-size: auto 240px, 100% 100%;
            -o-background-size: auto 240px, 100% 100%;
            background-size: auto 240px, 100% 100%;
        <?php else : ?>
            -webkit-background-size: auto 75%, 100% 100%;
            -moz-background-size: auto 75%, 100% 100%;
            -o-background-size: auto 75%, 100% 100%;
            background-size: auto 75%, 100% 100%;
        <?php endif; ?>

    <?php else : ?>
        background-image: url("<?php echo $this->baseurl ?>/<?php echo htmlspecialchars($headerlogo); ?>");
        background-position: left bottom;
        background-repeat: no-repeat;

        <?php if ($this->countModules('slideshow')):?>
            -webkit-background-size: auto 240px;
            -moz-background-size: auto 240px;
            -o-background-size: auto 240px;
            background-size: auto 240px;
        <?php else : ?>
            -webkit-background-size: auto 75%;
            -moz-background-size: auto 75%;
            -o-background-size: auto 75%;
            background-size: auto 75%;
        <?php endif; ?>
    <?php endif; ?>

    border-bottom: .5em solid <?php echo $headerborderColor;?>;
}

h1.logotext-top {
    color: <?php echo $maintitleColor;?> !important;
}
h1.logotext-sub {
    color: <?php echo $subtitleColor;?> !important;
}
@media screen and (max-width: 767px) {
    <?php if ($jugfulda == '1'): ?>
        h1.logotext-top {
            color: #2C4D91 !important;
        }
    <?php endif;?>
}

<?php if ($bodybackground): ?>
	#outer-wrapper { background: transparent; }
	@media screen and (max-width: 767px) {
		#outer-wrapper, #main-pad { background: <?php echo $bodyColor;?>; }
	}
<?php else : ?>
	#outer-wrapper, #main-pad { background: <?php echo $bodyColor;?>; }
<?php endif;?>

.grid-container {
	max-width: <?php echo $maxwidth;?><?php echo $wunit;?>;
}

.tabcontent, ul.tabs li a.linkopen, ul.tabs li a.linkopen:link, ul.tabs li a.linkopen:visited,
div.current, dl.tabs dt.open, .panel .pane-down {
 	background: <?php echo $tabbackground;?>;
}
div.current, .tabopen {
 	color: <?php echo $tabtext;?>;
}
a, a:visited {
 	color: <?php echo $linkColor;?>;
}
a:hover, a:focus {
 	color: <?php echo $hoverColor;?>;
}

/* text indent for bookstyle blogs */
<?php if ($textindent == 1):?>
    article p + p {
        text-indent: 1.5em;
        margin-top: -.75em;
    }
    article p.bild + p,
    article p.lead + p,
    article p.img_caption + p,
    article p.bildlegende + p,
    article p.autor + p {
        text-indent: 0 !important;
    }
    article p.readmore {
        text-indent: 0 !important;
        display: block;
        margin: 1em 0 !important;
    }
    article p.readmore a {
        margin: 0 !important;
    }
<?php endif;?>

/* jquery stickem */
<?php if ($layout == 'desktop'):?>
    @media screen and (min-width: 767px) {
        .stickem-container {
            position: relative;
        }
        .stickit {
            position: fixed;
            top: 0;
            margin: 0;
        }
        .headerlogo.stickem.stickit {
            z-index: 9999;
            width: 200px;
        }
        .headerlogo.stickem.stickit a h1.logotext-top {
            font-size: 1.7em;
        }
        .headerlogo.stickem.stickit a h1.logotext-sub {
            font-size: .82em;
        }

        .headerlogo.stickem.stickit a img{
            padding-top: 0px;
            width: 80%;
            height: auto;
            left: 5px;
            float: left;
        }

        .nav-close-pad.stickem.stickit {
            left: 50%;
            margin-left: -50%;
            height: 3.33em;
            z-index: 99999;
            background: <?php echo $headerColor;?>;
            -moz-box-shadow: 0px 3px 6px 1px rgba(0,0,0,.2);
            -webkit-box-shadow: 0px 3px 6px 1px rgba(0,0,0,.2);
            box-shadow: 0px 3px 6px 1px rgba(0,0,0,.2);
        }

        .module.stickem.stickit {
            z-index: 999999;
            right: 0;
            top: 3.5em;
            width: 12em;
        }

        .nav-module-pad.stickem.stickit {
            z-index: 999999;
            right: 0;
            top: .3em;
            width: 12em;
        }

        .stickit-end {
            bottom: 0;
            position: absolute;
            right: 0;
        }

    }

    @media screen and (min-width: 1280px) {
        .headerlogo.stickem.stickit {
            width: 220px;
        }
        .nav-module-pad.stickem.stickit {
            top: .4em;
        }
    }
<?php endif; ?>

</style>

<!--[if lt IE 9 ]> 
	<style type="text/css"> 
		.no-flexbox {}
		.no-canvas {} 
		.no-canvastext {} 
		.no-websqldatabase {} 
		.no-indexeddb {} 
		.no-history {} 
		.no-websockets {} 
		.no-rgba {}
		.no-hsla {}
		.no-multiplebgs {}
		.no-backgroundsize {}
		.no-borderimage {}
		.no-borderradius {}
		.no-boxshadow {}
		.no-textshadow {}
		.no-opacity {}
		.no-cssanimations {}
		.no-csscolumns {}
		.no-cssgradients {}
		.no-cssreflections {}
		.no-csstransforms {}
		.no-csstransforms3d {}
		.no-csstransitions {}
		.no-video {} 
		.no-audio {} 
		.no-webworkers {} 
		.no-applicationcache {}
	</style> 
<![endif]-->
		
<!--[if lt IE 8 ]> 
	<style type="text/css"> 
		.no-hashchange {} 
		.no-generatedcontent {} 
	</style> 
<![endif]-->