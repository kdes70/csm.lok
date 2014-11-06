<html>
<!Doctype html>
<!--[if IE 7 ]><html class="ie7"> <![endif]-->
<!--[if IE 8 ]><html class="ie8"> <![endif]-->
<!--[if IE 9 ]><html class="ie9"> <![endif]-->
<!--[if (gte IE 10)|!(IE)]><!--><html lang="ru"> <!--<![endif]-->
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--	<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />-->
<link type="text/css" rel="stylesheet" href="<?php echo site_url('css/style.css'); ?>" media="all" />
<link rel="stylesheet" href="<?php echo site_url('css/font-awesome/css/font-awesome.css'); ?>" >
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<script type="text/javascript" src="<?php echo site_url('js/jquery-1.11.0.min.js'); ?>"></script>
    <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
            <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->
<script type="text/javascript" src="<?php echo site_url('js/admin/main.js'); ?>"></script> 

	<title>ЦСМ-центр семейной медецины</title>
</head>
<body>
<div id="wrepper">
<header id="header" class="">
<div id="logo_block">
	logotip
</div>
<div id="auth_block">
	<p>
		<a href=""><i class="fa fa-sign-out"></i>log in</a>
	</p>
	<p>
		
		<?php echo anchor('auth', '<i class="fa fa-newspaper-o"></i>registration', 'attributs'); ?>
	</p>
</div>
	
</header><!-- /header -->
<nav id="top_menu">
		<ul>
			<li><a href="">пункт1</a></li>
			<li><a href="">пункт2</a></li>
			<li><a href="">пункт3</a></li>
			<li><a href="">пункт4</a></li>
			<li><a href="">пункт5</a></li>
		</ul>
	</nav>
<section id="content" class="">

<?php  include 'auth_form.php'; ?>
	
</section><!-- /content -->
	

</div>
<footer id="footer">
	<div id="copyrights"> &#169; ЦСМ - <?php echo date('Y'); ?></div>
</footer>
</body>
</html>