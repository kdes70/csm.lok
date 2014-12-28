<header id="header" class="">
    <div id="logo_block">
       <a href="/"><img src="<?php echo site_url('images/logo.jpg'); ?>" alt=""></a>
    </div>
    <div id="call">
        <a href="<?php echo base_url('callback'); ?>"><img  src="<?php echo base_url('images/ring.png'); ?>" alt=""></a>
    </div>
      <div class="tel"><img src="<?php echo site_url('images/tel_hr.png'); ?>" alt=""></div>
    <div id="menu_block">
       <nav>
            <ul>
                <li><a href="http://0370.ru/csm/">Главная цсм</a></li>
                <li><?php echo anchor('vacansy', 'Вакансии'); ?></li>
                <li><?php echo anchor('resume/add', 'Подать резюме'); ?></li>
                <li><?php echo anchor('page/show/info', 'Информация'); ?></li>
                
            </ul>
          
        </nav>
        
    </div>
   
    </header><!-- /header -->