<?php
get_header();
while ( have_posts() ) {
	the_post();
	?>
	<div class="page-banner">
	  <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri( "images/ocean.jpg" ) ?>)"></div>
	  <div class="page-banner__content container container--narrow">
		<h1 class="page-banner__title"><?php the_title() ?></h1>
		<div class="page-banner__intro">
		  <p>DON'T FORGET TO ADD TAGLINE LATER!</p>
		</div>
	  </div>
	</div>

	<div class="container container--narrow page-section">
		<?php
		$parentPageID = wp_get_post_parent_id( get_the_ID() );
		// if a child page (i.e has a parent page);
	
		if ( $parentPageID ) {
			?>
			<div class="metabox metabox--position-up metabox--with-home-link">
			  <p>
				  <a class="metabox__blog-home-link" href="<?php echo get_permalink( $parentPageID ); ?>">
					  <i class="fa fa-home" aria-hidden="true"></i> Back to <?php echo get_the_title( $parentPageID ); ?>
				  </a>
				  <span class="metabox__main"><?php echo the_title(); ?></span>
			  </p>
			</div>
			
			<?php }
		?>

        <?php 
        $hasChildren = get_pages( array(
            "child_of" => get_the_ID()
        ) );

        // if this page has a parent, display list of child pages for that parent,
        // else display list of child pages for this page (i.e is a parent page itself)
        if ($parentPageID) {
            $childrenOf = $parentPageID;
        } else {
            $childrenOf = get_the_ID();
        }

        // only display if this is a parent or child page. Don't show for standalone pages
        if ($hasChildren or $parentPageID) {
        ?>
		  <div class="page-links">
			<h2 class="page-links__title"><a href="<?php echo get_permalink($parentPageID) ?>"><?php echo get_the_title($parentPageID) ?></a></h2>
			<ul class="min-list">
			  <?php
                wp_list_pages( array(
                    "title_li" => NULL,
                    "child_of" => $childrenOf,
                ))
              ?>
			</ul>
		  </div>
          <?php } ?>
	  <div class="generic-content">
		<p>
			<?php the_content() ?>
		</p>
	  </div>
	</div>

	<?php
}

get_footer();
?>