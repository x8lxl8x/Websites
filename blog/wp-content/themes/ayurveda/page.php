<?php get_header(); ?>
<!-- Content begin -->
  <div id='idMainHeader'>
    <h4>Блог</h4>
  </div>
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div class='post' id='post-<?php the_ID(); ?>'>
      <div class='post-title'>
        <h1><a href='<?php the_permalink() ?>' rel='bookmark' title='Постоянная ссылка на <?php the_title(); ?>'><?php the_title(); ?></a></h1>
      </div>
      <div class='post-content page-content'>
        <?php the_content('Читать дальше...'); ?>
      </div>
    </div>
  <?php endwhile; endif; ?>
  <br>
<!-- Content end -->
<?php get_footer(); ?>
