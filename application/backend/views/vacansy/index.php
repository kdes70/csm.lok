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
<div class="line_top"></div>
<div id="wrepper">
    <header id="header" class="">
    <div id="logo_block">
       <a href="/"><img src="<?php echo site_url('images/logo.jpg'); ?>" alt=""></a>
    </div>
    <div id="menu_block">
       <nav>
            <ul>
                <li><a href="">Главная цсм</a></li>
                <li><a href="">Вакансии</a></li>
                <li><a href="">Подать резюме</a></li>
                <li class="tel"><img src="<?php echo site_url('images/tel2.png'); ?>" alt=""></li>
            </ul>
        </nav>
        
    </div>
   
    </header><!-- /header -->
<aside id="left_block">
    <div class="title_left">Вакансии</div>
    <div class="left_content">
    <div class="left_section">
        <h3>Выберите ваш город</h3>
        <p><?php echo anchor('vacansy/city/tomsk', 'Томск'); ?></p>
        <p><?php echo anchor('vacansy/city/novosibirsk', 'Новосибирск'); ?></p>
    </div>
    <div class="left_section" style="font-size: 14px">
        <h3>Категории</h3>
        <p><?php echo anchor('vacansy/', 'Старший мед-персонал(10)'); ?></p>
        <p><?php echo anchor('vacansy/', 'Средний мед-персонал(10)'); ?></p>
        <p><?php echo anchor('vacansy/', 'Младший мед-персонал(10)'); ?></p>
        <p><?php echo anchor('vacansy/', 'Административная часть(10)'); ?></p>
    </div>
    </div>
</aside>
<section id="content" class="">

    <h3>Страница вокансий цсм</h3>
    <div>
    <ul >
        <li class="row_vacansy"><a href=""><h3>название вакансии</h3></a>
            <p>краткое описание вакансии</p>
            <p class="price">20 000 руб.</p>
        </li>
       <li class="row_vacansy"><a href=""><h3>название вакансии</h3></a>
            <p>краткое описание вакансии</p>
            <p class="price">Заработная  плата по результатам собеседования</p>
         </li>
         <li class="row_vacansy"><a href=""><h3>название вакансии</h3></a>
            <p>краткое описание вакансии</p>
            <p class="price">Заработная  плата по результатам собеседования</p>
         </li>
    </ul>
	
      

    </div>
</section><!-- /content -->
	
</div>
<footer id="footer">
	<div id="copyrights"> &#169; ЦСМ - <?php echo date('Y'); ?>&nbsp;|&nbsp;<a href="http://0370.ru/" target="_blank">ООО ЦСМ</a>
        <div id="auth">
           <a href="<?php echo site_url('admin/auth/login'); ?>">
            <img src="<?php echo site_url('images/key.png'); ?>" alt="">
           </a>
        </div>
    </div>

</footer>

</body>
</html>