<!-- blog posts home page -->
<?php
get_header();
?>
<div class="page-banner">
  <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri( "images/ocean.jpg" ) ?>)"></div>
  <div class="page-banner__content container container--narrow">
    <h1 class="page-banner__title">Welcome to our Blog</h1>
    <div class="page-banner__intro">
      <p>Beautiful stories everyday!</p>
    </div>
  </div>
</div>
<?php
    while ( have_posts() ) {
        the_post();
        ?>

        <div class="container container--narrow page-section">	
            <h2><a href="<?php the_permalink(  ) ?>"><?php the_title() ?></a></h2>
            <div class="metabox">
                <p>Posted by <?php the_author_posts_link( )?> on <?php the_time('M d, Y') ?> in <?php the_category( ', ' ) ?></p>
            </div>
            <p>
                <?php echo wp_trim_words( get_the_content( ), 50 ) ?>
            </p>
            <a href="<?php the_permalink(  ) ?>">Continue reading...</a>
        </div>

        <?php
    }
    
?>
<div class="container container--narrow page-section"><?php echo paginate_links(  ); ?></div>

<?php
get_footer();
?>