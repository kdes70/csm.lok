<div class="clear"></div>
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
<div id="parent_popup">
  <div id="popup">
<h1>«Заказать звонок специалиста»</h1>
<img src="<?php echo base_url('images/girll_callback.jpg'); ?>" alt="Обратный звонок"> 
<h2>Уважаемые друзья!</h2>
 
<p>Вы можете заказать обратный звонок специалиста службы персонала в удобное для вас время</p>
<p style="text-align: center;"><a class="button" href="<?php echo base_url('callback'); ?>">
<img id="call_bottom" src="<?php echo base_url('images/zvonor.png'); ?>" alt=""></a></p>   
<a class="close_bottom" title="Закрыть" onclick="document.getElementById('parent_popup').style.display='none';">X</a>
  <div class="clear"></div>
  </div>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<!-- <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.1/js/bootstrap.min.js"></script> -->
<?php  if($_SERVER['REQUEST_URI'] == '/'): ?>
<script type="text/javascript">
    var delay_popup = 5000;
     // alert('Hilloy');
    setTimeout("document.getElementById('parent_popup').style.display='block'", delay_popup);
</script>
<?php endif; ?>
</body>
</html>