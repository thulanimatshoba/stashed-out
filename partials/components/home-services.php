<?php
//$services_title = carbon_get_the_post_meta( 'service_title'  );
$services = carbon_get_the_post_meta( 'stashed_out_services' );
?>

<div class="uk-grid-small uk-child-width-1-4@s uk-flex-center uk-text-center" uk-grid uk-grid uk-scrollspy="cls: uk-animation-slide-bottom; target: .uk-padding-small; delay: 300; repeat: false">
    <?php
    foreach ( $services as $service ) {
        echo '<div class="uk-padding-small uk-card uk-card-body">';
        echo wp_get_attachment_image( $service['service_image'], ' uk-text-center' );
        echo '<div class="">';
        echo '<h4>' . $service['service_title'] . '</h4>';
        echo '<span>' . $service['service_description'] . '</span>';
        echo '</div>';
        echo '</div>';
    }
    ?>
</div>