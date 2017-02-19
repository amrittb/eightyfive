<div class="col s12 m4 post-card">
    <a href="<?php the_permalink(); ?>" class="card hoverable waves-effect wave-light">
        <div class="card-image">
            <?php if(has_post_thumbnail()) { the_post_thumbnail('thumbnail'); } else { ?>
                <img src="<?php echo get_template_directory_uri()?>/img/notes.png">
            <?php } ?>
        </div>
        <div class="card-content">
            <h5 class="text--light"><?php echo the_title(); ?></h5>
        </div>
        <div class="card-action">
            <span><?php echo get_the_date('M j, Y'); ?></span>
        </div>
    </a>
</div>
