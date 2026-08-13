<?php
wp_enqueue_style( 'daktravel-native-hebrew-fonts', 'https://fonts.googleapis.com/css2?family=Noto+Sans+Hebrew:wght@400..800&family=Noto+Serif+Hebrew:wght@400..700&display=swap', array(), null );
wp_enqueue_style( 'daktravel-native-hebrew', get_template_directory_uri() . '/assets/css/native-hebrew.css', array( 'daktravel-multilingual', 'daktravel-native-hebrew-fonts' ), null );
get_header( 'hebrew-path' );
?>
<main>
<?php include get_template_directory() . '/templates/hebrew/sars.php'; ?>
</main>
<?php get_footer( 'hebrew-path' ); ?>
