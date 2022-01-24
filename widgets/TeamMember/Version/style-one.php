<div class="fzb__member-image">
	<img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_html( $name ); ?>">

    <?php if( $show_member_social_links) : ?>
        <div class="fzb__member-social-links">
            <?php
                foreach ( $icons as $key => $config ) {
                    $icon_html        = '';
                    $text_html        = '';
                    $html_tag         = 'span';
                    $link             = ! empty( $config['link'] ) ? $config['link'] : false;

                    $item_index_class = sprintf( 'fzb__member-item fzb__member-item--%s', $key);

                    $combined_icon_attr = $this->render_attributes->get_combined_attributes( 'icon_styles', [ 'class' => 'fzb__member-itemIcon' ] );
                    $combined_text_attr = $this->render_attributes->get_combined_attributes( 'text_styles', [ 'class' => 'fzb__member-itemText' ] );
                    $combined_item_attr = $this->render_attributes->get_combined_attributes( 'item_styles', [ 'class' => $item_index_class ] );
                    if ( ! empty( $link['link'] ) ) {
                        $this->attach_link_attributes( 'item' . $index, $link );
                        $html_tag = 'a';
                    }
                    if ( ! empty( $config['icon'] ) ) {
                        $this->attach_icon_attributes( 'icon', $config['icon'] );
                        $icon_html = $this->get_render_tag(
                            'span',
                            'icon',
                            '',
                            $combined_icon_attr
                        );
                    }
                    $this->render_tag(
                        $html_tag,
                        'item' . $index, [ $icon_html, $text_html ],
                        $combined_item_attr
                    );

                };
            ?>
        </div>
    <?php endif; ?>
</div>

<div class="fzb-member-info">
    <?php if( $name ): ?>
        <h3 class="fzb__member-name">
            <?php echo esc_html( $name ); ?>
        </h3>
    <?php endif; ?>

    <?php if( $designation ): ?>
        <span class="fzb__member-designation">
            <?php echo esc_html( $designation ); ?>
        </span>
    <?php endif; ?>

</div>