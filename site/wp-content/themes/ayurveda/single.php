<?php get_header(); ?>
<!-- Content begin -->
  <div id='idMainHeader'>
    <h4>Аюрведа</h4>
  </div>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <div class='post' id='post-<?php the_ID(); ?>'>
    <div class='post-title'>
      <h1><a href='<?php the_permalink() ?>' rel='bookmark' title='Постоянная ссылка на <?php the_title(); ?>'><?php the_title(); ?></a></h1>
    </div>
    <div class='post-category'>
      Тема: <?php the_category(", ") ?>
    </div>
    <div class='post-time'>
      <?php the_russian_time("j R Y г."); ?>
    </div>
    <div class='clClear'></div>

    <div class='alignright'>
      <?php wp_link_pages('before=<p><span class="">Читать страницу: </span>&after=</p>&next_or_number=number&pagelink=%'); ?>
    </div>
    <div class='clClear'></div>


    <div class='post-content'>
      <?php the_content('Читать дальше...'); ?>
    </div>

    <div class='alignright'>
      <?php wp_link_pages('before=<p><span class="">Читать страницу: </span>&after=</p>&next_or_number=number&pagelink=%'); ?>
    </div>
    <div class='clClear'></div>

    <div id='idShare'>
      <script src='https://yastatic.net/es5-shims/0.0.2/es5-shims.min.js'></script>
      <script src='https://yastatic.net/share2/share.js'></script>
      <div id='idShareIcons' class='ya-share2'  data-curtain data-shape="round" data-services='telegram,vkontakte,facebook,lj,odnoklassniki,viber,whatsapp' data-image='https://ayurveda.help/wp-content/files/2016/09/ayurveda.png'></div>
     </div>

    <div class='clClear'></div>
    <div class='alignleft'>
      <?php if ( function_exists('the_tags') ) : ?><?php the_tags( 'Метки: ', ', ' ); ?><?php endif; ?>
    </div>
    <div class='alignright'>
      <?php edit_post_link('Редактировать', '', ''); ?>
    </div>
    <div class='clClear'></div>
  </div>
  <?php comments_template(); ?>
<?php endwhile; else: ?>
  <h3>По Вашему запросу ничего не найдено.</h3>
  <p>Измените параметры поиска и попробуйте еще раз.</p>
<?php endif; ?>  <br>
<!-- Content end -->
<?php get_footer(); ?>
