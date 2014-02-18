<?php
/*------------------------------------------------------------------------
# JoomFlex j3
# author    Johannes Hock | adhocgraFX
# copyright Copyright © 2012 Johannes Hock. All rights reserved.
# @license  http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Website   http://www.adhocgrafx.de
-------------------------------------------------------------------------*/

// initialize ob_gzhandler to send and compress data
ob_start("ob_gzhandler");
// initialize compress function for whitespace removal
ob_start("compress");
// required header info and character set
header("Content-type: application/x-javascript");
// cache control to process
header("Cache-Control: must-revalidate");
// duration of cached content (1 hour)
$offset = 60 * 60;
// expiration header format
$ExpStr = "Expires: " . gmdate("D, d M Y H:i:s", time() + $offset) . " GMT";
// send cache expiration header to broswer
header($ExpStr);

require('jquery.smooth-scroll.min.js');
require('footable-0.1.min.js');
require('jquery.cookie.min.js');
require('jquery.textresizer.min.js');

// nur für desktop laden
require('jquery.syncheight.min.js');
require('jquery.stickem.min.js');
require('jquery.flexslider.min.js');

// experimente: für tablets tap event by Osvaldas Valutis
require('doubletaptogo.min.js');
?>