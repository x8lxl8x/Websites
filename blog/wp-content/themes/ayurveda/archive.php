<?php get_header(); ?>
<!-- Content begin -->
  <div id='idMainHeader'>
    <h3>Аюрведа</h3>
  </div>
<?php if (have_posts()) : ?>
  <div class='archive-title'>
    <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
        <?php /* If this is a category archive */ if (is_category()) { ?>
        <h1>Статьи по теме: &laquo;<?php single_cat_title(); ?>&raquo;</h1>
        <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
        <h1>Заметки с метками &laquo;<?php single_tag_title(); ?>&raquo;</h1>
        <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
        <h1>Архив <?php the_russian_time('j R Y г.'); ?></h1>
        <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
        <h1>Архив <?php the_russian_time('R Y г.'); ?></h1>
        <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
        <h1>Архив <?php the_time('Y года'); ?></h1>
        <?php /* If this is an author archive */ } elseif (is_author()) { ?>
        <h1>Архив авторa</h1>
        <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
        <h1>Архив заметок</h1>
    <?php } ?>
  </div>
  <?php while ( have_posts() ) : the_post(); ?>
    <div <?php post_class() ?> id="post-<?php the_ID(); ?>">
      <div class='post-title'>
        <h2><a href='<?php the_permalink() ?>' rel='bookmark' title='Постоянная ссылка на <?php the_title(); ?>'><?php the_title(); ?></a></h2>
      </div>
      <div class='post-category'>
        Тема: <?php the_category(", ") ?>
      </div>
      <div class='post-time'>
        <?php the_russian_time('j R Y г.'); ?>
      </div>
      <div class='clClear'></div>
      <div class='post-content'>
        <?php the_content('Читать дальше...', true); ?>
        <?php # echo $post->post_content; ?>
<!--        <a href='<?php #the_permalink() ?>' rel='bookmark' title='Постоянная ссылка на <?php #the_title(); ?>'>Читать дальше...</a> -->
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
<?php else :
  if ( is_category() ) { // If this is a category archive
    printf("<h3 class='center'>Нет ни одной заметки от автора по теме %s.</h3>", single_cat_title('',false));
  } else if ( is_date() ) { // If this is a date archive
    echo("<h3>Нет ни одной заметки с этой датой.</h3>");
  } else if ( is_author() ) { // If this is a category archive
    $userdata = get_userdatabylogin(get_query_var('author_name'));
    printf("<h3 class='center'>Нет ни одной заметки от автора %s.</h3>", $userdata->display_name);
  } else {
    echo("<h3 class='center'>Нет ни одной заметки.</h3>");
  }
  get_search_form();
endif; ?>
<!-- Content end -->
<?php get_footer(); ?>
