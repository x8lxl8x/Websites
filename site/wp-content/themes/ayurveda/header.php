<!doctype html>
<html lang='ru-RU'>
<head>
  <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=1.0'>
  <meta name='theme-color' content='#ffffff'>
  <title><?php wp_title(''); ?></title>
  <link rel='stylesheet' href='https://ayurveda.help/wp-content/themes/ayurveda/style.css' type='text/css' media='screen'>
  <link rel='icon' type='image/x-icon' href='https://ayurveda.help/favicon.ico'>
  <link rel='icon' type='image/png' sizes='32x32' href='https://ayurveda.help/favicon-32.png'>
  <link rel='icon' type='image/png' sizes='120x120' href='https://ayurveda.help/favicon-120.png'>
  <link rel='icon' type='image/png' sizes='128x128' href='https://ayurveda.help/favicon-128.png'>
  <link rel='icon' type='image/png' sizes='152x152' href='https://ayurveda.help/favicon-152.png'>
  <link rel='icon' type='image/png' sizes='167x167' href='https://ayurveda.help/favicon-167.png'>
  <link rel='icon' type='image/png' sizes='180x180' href='https://ayurveda.help/favicon-180.png'>
  <link rel='icon' type='image/png' sizes='192x192' href='https://ayurveda.help/favicon-192.png'>
  <link rel='icon' type='image/png' sizes='196x196' href='https://ayurveda.help/favicon-196.png'>
  <link rel='alternate' type='application/rss+xml' title='RSS 2.0' href='https://ayurveda.help/feed/'>
  <link rel='alternate' type='text/xml' title='RSS .92' href='https://ayurveda.help/feed/rss/'>
  <link rel='alternate' type='application/atom+xml' title='Atom 0.3' href='https://ayurveda.help/feed/atom/'>
  <script src='https://ayurveda.help/wp-content/themes/ayurveda/jquery.min.js'></script>
  <script>$(document).ready(function(){ $("#idButtonMenu").click(function(){ $("#idHeaderLine3").toggle(); $("#idHeaderLine4").hide(); }); });</script>
  <script>$(document).ready(function(){ $("#idButtonSearch").click(function(){ $("#idHeaderLine4").toggle();  $("#idHeaderLine3").hide(); }); });</script>
  <?php wp_head(''); ?>
  <script>
    var prevScrollpos = window.pageYOffset;
    window.onscroll = function()
    {
      var currentScrollPos = window.pageYOffset;

      if (prevScrollpos > currentScrollPos)
      {
        document.getElementById( 'idHeader' ).style.top = '0';
      }
      else
      {
        document.getElementById( 'idHeader' ).style.top = '-06.00em';
      }
      prevScrollpos = currentScrollPos;
    }
  </script>
</head>
<body onload='$(&quot;#idHeaderLine3&quot;).hide(); $(&quot;#idHeaderLine4&quot;).hide();'>
<div id='idPanel'> <!-- idPanel begin -->
  <div id='idHeader'> <!-- idHeader begin -->
    <div id='idHeaderLine1'>
      <div id='idLogo'><a href='https://ayurveda.help'>??????????????</a></div>
      <div id='idButtonSearch'>&#xf002;</div>
      <div id='idButtonMenu'>&#xf0c9;</div>
    </div>
    <div class='clClear'></div>
    <div id='idHeaderLine2'>
      <div id='idHeaderConsultations'><a href='https://ayurveda.help/consultation/'>????????????????????????</a></div>
      <!--noindex-->
      <div id='idSocialL'><a rel='nofollow' target='_blank' href='http://nilulin.livejournal.com/'>&#xf303;</a></div>
      <div id='idSocialF1'><a rel='nofollow' target='_blank' href='https://vk.com/lina.ayurveda'>&#xf189;</a></div>
      <div id='idSocialF2'><a rel='nofollow' target='_blank' href='https://www.facebook.com/lina.ayurveda'>&#xf39e;</a></div>
      <div id='idSocialF3'><a rel='nofollow' target='_blank' href='https://t.me/ayurveda_help'>&#xf3fe;</a></div>
      <!--/noindex-->
    </div>
    <div class='clClear'></div>
    <div id='idHeaderLine3'>
      <div class='clMenuEntry'><a rel='nofollow' href='https://cabinet.ayurveda.help/'>??????????????</a></div>
      <div class='clMenuEntry'><a href='https://ayurveda.help/'>????????</a></div>
      <div class='clMenuEntry'><a href='https://ayurveda.help/index/'>????????????</a></div>
      <div class='clMenuEntry'><a href='https://ayurveda.help/categories/'>????????</a></div>
      <div class='clMenuEntry clMenuEntryLast'><a href='https://ayurveda.help/author/'>??????????</a></div>
    </div>
    <div class='clClear'></div>
    <div id='idHeaderLine4'>
      <div id='idSearchBox'>
        <form method='get' action="<?php bloginfo('url'); ?>/">
          <input id='s' name='s' type='text' value="<?php _e('??????????'); ?>" size="20" onfocus="if (this.value == '<?php _e('??????????'); ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e('??????????'); ?>';}">
          <input id='idSearchSubmit' type='submit' value='&crarr;'>
        </form>
      </div>
    </div>
  </div> <!-- idHeader end -->
  <div class='clClear'></div>
  <div id='idContent' onclick='$(&quot;#idHeaderLine3&quot;).hide();  $(&quot;#idHeaderLine4&quot;).hide();'> <!-- idContent begin -->
    <div id='idCategories'>
      <?php wp_list_categories( array( 'style' => '', 'title_li' => '' ) ); ?>
    </div>
    <div class='clClear'></div>
