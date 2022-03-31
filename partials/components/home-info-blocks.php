<?php
$info_blocks = carbon_get_the_post_meta('stashed_out_info_blocks');
?>

<div class="uk-grid-small uk-child-width-1-4@s uk-flex-center uk-text-center" uk-grid uk-grid uk-scrollspy="cls: uk-animation-slide-bottom; target: .uk-padding-small; delay: 300; repeat: false">
    <?php
    foreach ($info_blocks as $info_block) {
        echo '<div class="uk-padding-small uk-card uk-card-body">';
        echo wp_get_attachment_image($info_block['info_image'], ' uk-text-center');
        echo '<div class="info">';
        echo '<h3>' . $info_block['info_title'] . '</h3>';
        echo '<span>' . $info_block['info_description'] . '</span>';
        echo '</div>';
        echo '</div>';
    }
    ?>
</div>