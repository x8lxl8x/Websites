<!doctype html>
<html lang='ru-RU'>
<head>
  <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=1.0'>
  <meta name='theme-color' content='#ffffff'>
  <title><?php wp_title(''); ?></title>
  <link rel='stylesheet' href='https://blog.ayurveda.help/wp-content/themes/ayurveda/style.css' type='text/css' media='screen'>
  <link rel='icon' type='image/x-icon' href='https://blog.ayurveda.help/favicon.ico'>
  <link rel='icon' type='image/png' sizes='32x32' href='https://blog.ayurveda.help/favicon-32.png'>
  <link rel='icon' type='image/png' sizes='120x120' href='https://blog.ayurveda.help/favicon-120.png'>
  <link rel='icon' type='image/png' sizes='128x128' href='https://blog.ayurveda.help/favicon-128.png'>
  <link rel='icon' type='image/png' sizes='152x152' href='https://blog.ayurveda.help/favicon-152.png'>
  <link rel='icon' type='image/png' sizes='167x167' href='https://blog.ayurveda.help/favicon-167.png'>
  <link rel='icon' type='image/png' sizes='180x180' href='https://blog.ayurveda.help/favicon-180.png'>
  <link rel='icon' type='image/png' sizes='192x192' href='https://blog.ayurveda.help/favicon-192.png'>
  <link rel='icon' type='image/png' sizes='196x196' href='https://blog.ayurveda.help/favicon-196.png'>
  <link rel='alternate' type='application/rss+xml' title='RSS 2.0' href='https://blog.ayurveda.help/feed/'>
  <link rel='alternate' type='text/xml' title='RSS .92' href='https://blog.ayurveda.help/feed/rss/'>
  <link rel='alternate' type='application/atom+xml' title='Atom 0.3' href='https://blog.ayurveda.help/feed/atom/'>
  <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
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
      <div id='idLogo'><a href='https://blog.ayurveda.help'>БЛОГ</a></div>
      <div id='idButtonSearch'>&#xf002;</div>
      <div id='idButtonMenu'>&#xf0c9;</div>
    </div>
    <div class='clClear'></div>
    <div id='idHeaderLine2'>
      <div id='idHeaderConsultations'><a href='https://blog.ayurveda.help/index/'>оглавление</a></div>
    </div>
    <div class='clClear'></div>
    <div id='idHeaderLine3'>
      <div class='clMenuEntry'><a href='https://blog.ayurveda.help/categories/'>темы</a></div>
    </div>
    <div class='clClear'></div>
    <div id='idHeaderLine4'>
      <div id='idSearchBox'>
        <form method='get' action="<?php bloginfo('url'); ?>/">
          <input id='s' name='s' type='text' value="<?php _e('Поиск'); ?>" size="20" onfocus="if (this.value == '<?php _e('Поиск'); ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e('Поиск'); ?>';}">
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
