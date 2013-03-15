<?php
/** content-page.php
 *
 * The template for displaying page content in the page.php template
 *
 * @author		Konstantin Obenland
 * @package		The Bootstrap
 * @since		1.0.0 - 07.02.2012
 */


tha_entry_before(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php tha_entry_top(); ?>

	<div class="entry-content clearfix">
		<?php
		the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'the-bootstrap' ) );
		the_bootstrap_link_pages(); ?>
	</div><!-- .entry-content -->

    <?php
       $posts = get_posts( array( 'numberposts' => 1,
                                  'tag'         => 'front-page',
                                  'orderby'     => 'post_date',
                                  'order'       => 'DESC' ) );

       foreach ($posts as $post) {
           setup_postdata($post);

           echo '<h2>' . get_the_title() . '</h2>';
           echo '<p class="byline">Posted on ' . get_the_date() . ' by ' . get_the_author() . '</p>';
           echo '<p>' . get_the_excerpt() . '</p>';
       }
    ?>

    <h2>Next Event</h2>

    <p>
      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ac magna
      odio, sed egestas libero. Praesent magna dui, vulputate a eleifend ac,
      sodales at orci. Nullam vel nisl erat. Sed congue, metus at semper
      interdum, purus nibh volutpat dolor, eget iaculis magna est non
      nulla. Integer eu vestibulum nisl. Nulla velit velit, semper quis varius
      rhoncus, aliquam vulputate neque.
    </p>

    <h2>Why?</h2>

    <p>
      Most of us would like to think that the meat, milk, and eggs we buy come
      from animals who have lived happy, healthy
      lives. Unfortunately, <a href="/issues/">nothing could be further from
      the truth</a>. Like cats and dogs, the animals we eat have complex
      emotions including the ability to suffer. Yet on modern farms, they are
      treated with such disregard that similar treatment to a cat or dog would
      be grounds for felony cruelty charges in Minnesota.
    </p>

    <p>
      We need your participation!
      Please <a href="/volunteer">volunteer</a>, <a href="/donate">donate</a>,
      or <a href="/events">come to an event</a>. With your voice to advocate
      for animals, we can make a huge difference.
    </p>

    <p>
      Check out our <a href="/resources">vegetarian resources section</a> for
      all your vegetarian and vegan needs, including
      our <a href="/resources/recipes">tasty
      recipes</a>, <a href="http://www.vegguide.org/">online restaurant
      guide</a>, <a href="/resources/vsk">free Veg Starter Kit</a>,
      and <a href="/resources/veg-study-abroad-guide">veg traveling and study
      abroad guide</a>.
    </p>

	<?php edit_post_link( __( 'Edit', 'the-bootstrap' ), '<footer class="entry-meta"><span class="edit-link label">', '</span></footer>' );
	
	tha_entry_bottom(); ?>
</article><!-- #post-<?php the_ID(); ?> -->
<?php tha_entry_after();


/* End of file content-page.php */
/* Location: ./wp-content/themes/the-bootstrap/partials/content-page.php */
