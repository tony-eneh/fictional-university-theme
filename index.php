<?php get_header() ?>
<h1><?php bloginfo('name') ?></h1>
<p><?php bloginfo('description') ?></p>
<?php
// $names = array('Meowsalot', 'Barksalot', 'Roarsalot');
// $count = 0;
// while ($count < count($names)) {
//     echo "<p>Hi my name is $names[$count]</p>";
//     $count++;
// }
?>

<?php
while (have_posts()) {
    the_post();
    ?>
    <h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>

    <p><?php the_content(); ?></p>
    <?php
}

get_footer()
    ?>