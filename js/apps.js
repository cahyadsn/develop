$(document).ready(function(){
  $("#msg-flash").delay(2000).fadeOut();
  $('a.color').on('click',function() {
      var a = $(this).attr('data-value');
      $('#apps_css').attr('href','css/w3-theme-' + a + '.css');
      $.post('inc/change.color.php', {
          'c': a
      })
  });
});