
    <?php if ( ( $stars !== 'no_stars' ) ) : ?>
        <div class="fzb__testimonial-rating">
            <?php
                for ( $x = 1; $x <= $stars; $x ++ ) {
                    $this->attach_icon_attributes( 'icon', $stars_full );
                    $this->render_tag( 'span', 'icon', '', [ 'class' => 'fzb__testimonial-stars-full' ] );
                }
                ?>
                <?php
                for ( $x = 1; $x <= ( 5 - $stars ); $x ++ ) {
                    $this->attach_icon_attributes( 'icon', $stars_empty );
                    $this->render_tag( 'span', 'icon' );
                }
            ?>
        </div>
    <?php endif; ?>

<div class="fzb__testimonial-content-wrap">
    <?php if( $content ): ?>
        <span class="fzb__testimonial-discription">
            <?php echo fzb_get_meta( $content ); ?>
        </span>
    <?php endif; ?>
</div>

<div class="fzb__testimonial-user-info-wrap">
    <div class="fzb__testimonial-image">
        <img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_html( $name ); ?>">
    </div>

    <div class="fzb-testimonial-user-info">
        <?php if( $name ): ?>
            <h4 class="fzb__testimonial-name">
                <?php echo esc_html( $name ); ?>
            </h4>
        <?php endif; ?>

        <?php if( $designation ): ?>
            <span class="fzb__testimonial-designation">
                <?php echo esc_html( $designation ); ?>
            </span>
        <?php endif; ?>
    </div>
</div>
