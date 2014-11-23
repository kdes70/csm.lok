<header id="header" class="">
    <div id="logo_block">
       <a href="/"><img src="<?php echo site_url('images/logo.jpg'); ?>" alt=""></a>
    </div>
    <div id="menu_block">
       <nav>
            <ul>
                <?php if($this->session->userdata('loggedin') == TRUE): ?>
                <li><?php echo anchor('admin/vacansy/read', 'Вакансии'); ?></li>
                 <li><a href="">Резюме</a></li>
                 <li><?php echo anchor('admin/auth/logout', 'Выйти') ?></li>
            <?php else: ?>
                <li><a href="">Главная цсм</a></li>
                <li><a href="">Вакансии</a></li>
                <li><a href="">Подать резюме</a></li>
            <?php endif; ?>
                <li class="tel"><img src="<?php echo site_url('images/tel2.png'); ?>" alt=""></li>
            </ul>
        </nav>
        
    </div>
   
    </header><!-- /header -->