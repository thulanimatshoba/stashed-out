<?php

/**
 * GA Tracking
 */

function stashed_out_google_analytics() { ?>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-136376312-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-136376312-1');
    </script>
<?php }
add_action( 'wp_head', 'stashed_out_google_analytics' );
