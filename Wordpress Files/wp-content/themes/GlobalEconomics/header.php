<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black" />
	<meta content="yes" name="apple-mobile-web-app-capable" />
	<title><?php wp_title(' | ', true, 'right'); ?><?php bloginfo('name'); ?></title>
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/all.css" />
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/form.css" type="text/css" media="screen" />
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/iphone.css" media="only screen and (max-device-width: 480px)" />
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/form.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/clear-form-fields.js"></script>
	<script type="text/javascript">
	//<![CDATA[
	if ((navigator.userAgent.indexOf('iPad') != -1)) {
			document.write('<link rel="stylesheet" href="wp-content/themes/GlobalEconomics/css/ipad.css" type="text/css"/>');
		} 
	//]]>
	</script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery-1.4.4.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.main.js"></script>
	<!--[if lt IE 9]><link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/ie.css" media="screen"/><![endif]-->
	<?php wp_head(); ?>


<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-1746196-11']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>



</head>
<body>
	<div id="wrapper">
		<a class="hidden" href="#nav">Skip to navigation</a>
		<div id="header">
			<div class="header-holder">
			<!--	<a href="/international/" class="international">international</a>    -->
				<?php wp_nav_menu(array( 'container_class' => '', 'theme_location' => 'top', 'menu_id' => '','menu_class'=>'add-nav'));?>
				<div class="logo">
					<h1><a href="<?php bloginfo('url'); ?>">Global Economics Group</a></h1>
					<div class="tooltip">HOME</div>
				</div>
			</div>
		</div>