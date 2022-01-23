<?php if($icon): ?>
    <div class="fzb__testimonial-quote-icon">
        <?php
            $this->attach_icon_attributes('icon', $icon);
            $this->render_tag(
                'span',
                'icon',
                '',
            );
        ?>
    </div>
<?php endif; ?>


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


<div class="fzb__testimonial-content-wrap">
    <?php if( $content ): ?>
        <span class="fzb__testimonial-discription">
            <?php echo fzb_get_meta( $content ); ?>
        </span>
    <?php endif; ?>
</div>





