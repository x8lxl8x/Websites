<?php get_header(); ?>
<!-- Content begin -->
<div id='idMainHeader'>
  <h1>Аюрведа</h1>
</div>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <div <?php post_class() ?> id='post-<?php the_ID(); ?>'>
    <div class='post-title'>
      <h2><a href='<?php the_permalink() ?>' rel='bookmark' title='Постоянная ссылка на «<?php the_title(); ?>»'><?php the_title(); ?></a></h2>
    </div>
    <div class='post-category'>
      Тема: <?php the_category(", ") ?>
    </div>
    <div class='post-time'>
      <?php if ( get_the_time('Ymd') != '20090102' ) { the_russian_time('j R Y г.'); } ?>
    </div>
    <div class='clClear'></div>
    <div class='post-content'>
      <?php the_content('Читать дальше...', true); ?>
    </div>
    <div class='alignleft'>
      <?php if ( function_exists('the_tags') ) : ?><?php the_tags( 'Метки: ', ', ' ); ?><?php endif; ?>
    </div>
    <div class='clClear'></div>
  </div>
<?php endwhile; ?>
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
