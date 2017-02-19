<?php get_header(); ?>
    <div class="section">
        <div class="row post-card-list">
            <?php
            if ( have_posts() ) : while ( have_posts() ) : the_post();
                get_template_part( 'content', get_post_format() );
            endwhile; ?>
            <?php endif; ?>
        </div> 	<!-- /.row -->
        <div class="center">
            <ul class="pagination">
                <li class="waves-effect"><?php previous_posts_link('<i class="material-icons">chevron_left</i> Prev'); ?></li>
                <li class="waves-effect"><?php next_posts_link('<i class="material-icons">chevron_right</i> Next'); ?></li>
            </ul>
        </div>
    </div>
<?php get_footer(); ?>
