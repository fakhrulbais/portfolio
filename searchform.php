<form class="search-form" role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
    <label>
        <span class="screen-reader-text"><?php esc_html_e('Search for:', 'watson') ?></span>
        <input type="search" class="search-field" placeholder="<?php esc_attr_e( 'Search...', 'watson' ) ?>" value="" name="s">
    </label>
    <input type="submit" class="search-submit" value="<?php esc_attr_e('Search', 'watson'); ?>">
</form>