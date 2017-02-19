<div class="blog-post">
    <?php if(!is_front_page()): ?>
        <p class="blog-post-meta">
            <span class="blog-post-meta__date">
                <?php the_date(); ?>
            </span>
            by <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
                <?php echo get_the_author(); ?>
            </a>
        </p>
        <div class="blog-post-content">
    <?php endif; ?>
    <?php the_content(); ?>
    <?php if(!is_front_page()): ?>
        </div>
    <?php endif; ?>
</div>