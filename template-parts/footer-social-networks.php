
    <?php if ( ! empty( get_field( 'instagram', 'option' ) ) ) : ?>
        <a href="<?php the_field( 'instagram', 'option' ); ?>" title="Instagram">Instagram</a>
    <?php endif; ?>
    <?php if ( ! empty( get_field( 'facebook', 'option' ) ) ) : ?>
        <a href="<?php the_field( 'facebook', 'option' ); ?>" title="Facebook">Facebook</a>
    <?php endif; ?>
