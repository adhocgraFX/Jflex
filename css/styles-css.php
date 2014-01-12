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
    $footerColor = $this->params->get('footercolor');
    $hrowColor = $this->params->get('headrowcolor');
    $browColor = $this->params->get('bottomrowcolor');
    $headerlogo = $this->params->get('headerlogo');
    $headerbackimage = $this->params->get('headerbackimage');
    $maintitleColor = $this->params->get('mtcolor');
    $subtitleColor = $this->params->get('stcolor');
    $maxwidth = $this->params->get('maxwidth');
    $wunit = $this->params->get('wunit');
	$headfont = $this->params->get('headfont');
	$bodyfont = $this->params->get('bodyfont');
    $basefontsize = $this->params->get('basefontsize');
    $textindent = $this->params->get('textindent');
?>

<style type="text/css">
h1, h2, h3, h4, h5, h6, p.lead, p.bildlegende, p.autor, blockquote {
 	color: <?php echo $headlineColor;?> !important;
}
	<?php if ($headfont != "default"):?>
		h1, h2, h3, h4, h5, h6 {
			font-family: <?php echo htmlspecialchars($headfont); ?>, Helvetica, Arial, sans-serif; }
	<?php endif;?>

    body {font-size: <?php echo $basefontsize;?>%;}
@media screen and (min-width: 48em) {
    body {font-size: <?php echo $basefontsize * 1.125;?>%;}
}
@media screen and (min-width: 80em) {
    body {font-size: <?php echo $basefontsize * 1.25;?>%;}
}
body  {
    color: <?php echo $fontColor;?> !important;
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

#main-pad {
    max-width: <?php echo $maxwidth;?><?php echo $wunit;?>;
 	background: <?php echo $bodyColor;?>;
}

section.head-row {
    background: <?php echo $hrowColor;?>;
}

section.bottom-row {
    background: <?php echo $browColor;?>;
}

footer {
   background: <?php echo $footerColor;?>;
}

header {
    background-color: <?php echo $headerColor;?>;
    border-bottom: .5em solid <?php echo $headerborderColor;?>;
}

@media screen and (min-width: 48em) {
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
}

h1.logotext-top {
    color: <?php echo $maintitleColor;?> !important;
}
h1.logotext-sub {
    color: <?php echo $subtitleColor;?> !important;
}

<?php if ($bodybackground): ?>
	#outer-wrapper { background: transparent; }
	@media screen and (max-width: 48em) {
	#outer-wrapper, #main-pad { background: <?php echo $bodyColor;?>; }
	}
<?php else : ?>
	#outer-wrapper, #main-pad { background: <?php echo $bodyColor;?>; }
<?php endif;?>

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

/* nav button > in less keine calc machbar?! */
a.button.nav-btn, button.nav-btn, input[type="submit"].nav-btn, input[type="reset"].nav-btn, input[type="button"].nav-btn {
    width: -webkit-calc(100% - 2em);
    width: -moz-calc(100% - 2em);
    width: calc(100% - 2em);
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
    @media screen and (min-width: 48em) {
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
            left: 0;
            margin-left: -1px;
            height: 3.33em;
            width: 100%;
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
            right: .25em;
            top: .15em;
            width: 12em;
        }

        .stickit-end {
            bottom: 0;
            position: absolute;
            right: 0;
        }

    }

    @media screen and (min-width: 80em) {
        .headerlogo.stickem.stickit {
            width: 220px;
        }
        .nav-module-pad.stickem.stickit {
            top: .2em;
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