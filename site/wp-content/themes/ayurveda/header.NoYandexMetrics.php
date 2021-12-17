<!doctype html>
<html lang='ru-RU'>
<head>
  <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=1.0'>
  <title><?php wp_title(''); ?></title>
  <link rel='stylesheet' href='https://ayurveda.help/wp-content/themes/ayurveda/style.css' type='text/css' media='screen'>
  <link rel='shortcut icon' href='https://ayurveda.help/favicon.ico' type='image/x-icon'>
  <link rel='icon' href='https://ayurveda.help/favicon.ico' type='image/x-icon'>
  <link rel='icon' sizes='192x192' href='https://ayurveda.help/favicon-192x192.png'>
  <link rel='icon' sizes='128x128' href='https://ayurveda.help/favicon-128x128.png'>
  <link rel='apple-touch-icon' href='https://ayurveda.help/apple-touch-icon.png'>
  <link rel='apple-touch-icon' sizes='57x57'   href='https://ayurveda.help/apple-touch-icon-57x57.png'>
  <link rel='apple-touch-icon' sizes='57x57'   href='https://ayurveda.help/apple-touch-icon-60x60.png'>
  <link rel='apple-touch-icon' sizes='72x72'   href='https://ayurveda.help/apple-touch-icon-72x72.png'>
  <link rel='apple-touch-icon' sizes='76x76'   href='https://ayurveda.help/apple-touch-icon-76x76.png'>
  <link rel='apple-touch-icon' sizes='114x114' href='https://ayurveda.help/apple-touch-icon-114x114.png'>
  <link rel='apple-touch-icon' sizes='120x120' href='https://ayurveda.help/apple-touch-icon-120x120.png'>
  <link rel='apple-touch-icon' sizes='144x144' href='https://ayurveda.help/apple-touch-icon-144x144.png'>
  <link rel='apple-touch-icon' sizes='152x152' href='https://ayurveda.help/apple-touch-icon-152x152.png'>
  <link rel='apple-touch-icon' sizes='167x167' href='https://ayurveda.help/apple-touch-icon-167x167.png'>
  <link rel='apple-touch-icon' sizes='180x180' href='https://ayurveda.help/apple-touch-icon-180x180.png'>
  <link rel='alternate' type='application/rss+xml' title='RSS 2.0' href='https://ayurveda.help/feed/'>
  <link rel='alternate' type='text/xml' title='RSS .92' href='https://ayurveda.help/feed/rss/'>
  <link rel='alternate' type='application/atom+xml' title='Atom 0.3' href='https://ayurveda.help/feed/atom/'>
  <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
  <script>$(document).ready(function(){ $("#idButtonMenu").click(function(){ $("#idHeaderLine3").toggle(); $("#idHeaderLine4").hide(); }); });</script>
  <script>$(document).ready(function(){ $("#idButtonSearch").click(function(){ $("#idHeaderLine4").toggle();  $("#idHeaderLine3").hide(); }); });</script>
  <?php wp_head(''); ?>
  <?php if (!isset($_SERVER['HTTP_USER_AGENT']) || stripos($_SERVER['HTTP_USER_AGENT'], 'Speed Insights') === false): ?>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
      ga('create', 'UA-83110401-1', 'auto');
      ga('send', 'pageview');
    </script>
  <?php endif; ?>
</head>
<body onload='$(&quot;#idHeaderLine3&quot;).hide(); $(&quot;#idHeaderLine4&quot;).hide();' ondragstart='return false;' onselectstart='return false;'  oncontextmenu='return false;'>
<div id='idPanel'> <!-- idPanel begin -->
  <div id='idHeader'> <!-- idHeader begin -->
    <div id='idHeaderLine1'>
      <div id='idLogo'><a href='https://ayurveda.help'>АЮРВЕДА</a></div>
      <div id='idButtonSearch'>&#xf002;</div>
      <div id='idButtonMenu'>&#xf0c9;</div>
    </div>
    <div class='clClear'></div>
    <div id='idHeaderLine2'>
      <div id='idHeaderConsultations'><a href='https://ayurveda.help/consultation/'>консультации</a></div>
      <!--noindex-->
      <div id='idSocialL'><a rel='nofollow' target='_blank' href='http://nilulin.livejournal.com/'>&#xf040;</a></div>
      <div id='idSocialF1'><a rel='nofollow' target='_blank' href='https://vk.com/lina.ayurveda'>&#xf189;</a></div>
      <div id='idSocialF2'><a rel='nofollow' target='_blank' href='https://www.facebook.com/lina.ayurveda'>&#xf09a;</a></div>
      <!--/noindex-->
    </div>
    <div class='clClear'></div>
    <div id='idHeaderLine3'>
      <div class='clMenuEntry'><a rel='nofollow' href='https://ayurveda.help/cabinet/'>кабинет</a></div>
      <div class='clMenuEntry'><a href='https://ayurveda.help/'>блог</a></div>
      <div class='clMenuEntry'><a href='https://ayurveda.help/index/'>индекс</a></div>
      <div class='clMenuEntry'><a href='https://ayurveda.help/categories/'>темы</a></div>
      <div class='clMenuEntry clMenuEntryLast'><a href='https://ayurveda.help/author/'>автор</a></div>
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
