      </div>
    </div>
    <footer class="w3-bottom">
  		<div class="w3-bar w3-theme-d4 w3-center">
  			<?php echo $apps_name.' v'.$apps_version;?> copyright &copy; 2017<?php echo (date('Y')>2017?date('-Y'):'');?> by <a href='mailto:cahyadsn@gmail.com'>cahya dsn</a><br />
  		</div>
  	</footer>
    <?php if(!isset($_SESSION['login_id'])):?>
	  <div id="modal_login" class="w3-modal">
      <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
        <div class="w3-center w3-theme-d1 w3-padding-16"><br>
        <span class="w3-button w3-xlarge w3-hover-red w3-display-topright btn_login_cancel" title="Close Modal">&times;</span>
        </div>
        <div class="w3-container">
        <div class="w3-section">
          <label><b>Username</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Username" id="usrnm" required autocomplete="off">
          <label><b>Password</b></label>
          <input class="w3-input w3-border" type="password" placeholder="Enter Password" id="passwd" required autocomplete="off">
        </div>
        </div>
        <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
          <button type="button" class="w3-button w3-red btn_login_cancel">Cancel</button>
          <button type="submit" class="w3-button w3-theme-d3" id="btn_login_ok">Login</button>
        </div>
      </div>
	  </div>
    <?php endif;?>
    <script src="js/apps.js"></script>
    <?php echo isset($foot_js)?$foot_js:'';?>
    <script>
    $(function(){
      $('button#nav_open').on('click',function(e){
        e.preventDefault();
        $('#sidebar').show();
        $('#main').addClass('main_min');
      });
      $('#nav_close').on('click',function(e){
        e.preventDefault();
        $('#main').removeClass('main_min');
        $('#sidebar').hide();
      });
      $('.nav_acc').on('click',function() {
          $(this).next().toggle();
      });
      $('#mn_logout').on('click',function(e){
        e.preventDefault();
        location.href='mod/auth/logout.php';
      });
      <?php if(!isset($_SESSION['login_id'])):?>
      $('.mn_login').on('click',function(e){
        e.preventDefault();
        $('#modal_login').show();
      });
      $('.btn_login_cancel').on('click',function(e){
        e.preventDefault();
        $('#modal_login').hide();
      });
      $('#btn_login_ok').on('click',function(e){
        e.preventDefault();
        $.post(
          'mod/auth/login.php',
          {usrnm:$('#usrnm').val(),passwd:$('#passwd').val()},
          function(data){
            location.href='index.php';
          }
        );
        $('#modal_login').hide();
      });
      <?php endif;?>
      <?php echo (isset($block_js)?$block_js:'');?>
    });
    </script>
  </body>
</html>