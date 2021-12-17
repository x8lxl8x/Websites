<?php get_header(); ?>
<!-- Content begin -->
  <div id='idMainHeader'>
    <h4>Аюрведа</h4>
  </div>
<?php if (have_posts()) : ?>
  <div class='post'>
    <div class='post-title'>
      <h1>Результаты поиска</h1>
    </div>
    <?php while (have_posts()) : the_post(); if ( strcmp( get_the_title(), "Индекс" ) != 0 ) : ?>
      <div class='post-title'>
        <h2><a href='<?php the_permalink() ?>' rel='bookmark' title='Постоянная ссылка на <?php the_title(); ?>'><?php the_title(); ?></a></h2>
      </div>
      <div class='post-category'>
        Тема: <?php the_category(', ') ?>
      </div>
    <div class='post-time'>
      <?php the_russian_time('j R Y г.'); ?>
    </div>
    <div class='clClear'></div>
    <div class='post-content'>
      <?php the_content("Читать дальше...", true); ?>
    </div>
    <div class='alignleft'>
      <?php if ( function_exists('the_tags') ) : ?><?php the_tags( 'Метки: ', ', ' ); ?><?php endif; ?>
    </div>
    <div class='clClear'></div>
      <div class='clClear'></div>
    <?php endif; endwhile; ?>
  </div>
  <div id='idPagerBox'>
    <?php wp_pagenavi(); ?>
  </div>
  <div class='clClear'></div>
<?php else : ?>
  <h3>По Вашему запросу ничего не найдено.</h3>
  <p>Измените параметры поиска и попробуйте еще раз.</p>
  <?php get_search_form(); ?>
<?php endif; ?>
<!-- Content end -->
<?php get_footer(); ?>
