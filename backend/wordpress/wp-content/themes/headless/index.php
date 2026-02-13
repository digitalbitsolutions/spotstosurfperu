<?php
$is_wc_page = false;

if (function_exists('is_woocommerce')) {
    $is_wc_page = is_woocommerce() || is_cart() || is_checkout() || is_account_page();
} elseif (function_exists('is_checkout')) {
    $is_wc_page = is_checkout() || is_cart() || is_account_page();
}

$page_title = $is_wc_page ? 'Shop' : 'Headless Mode';
?>

<?php if ($is_wc_page) : ?>
    <!DOCTYPE html>
    <html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php bloginfo('name'); ?> - <?php echo esc_html($page_title); ?></title>
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <main class="stsp-wc__layout">
            <?php
            if (function_exists('woocommerce_content')) {
                woocommerce_content();
            } elseif (have_posts()) {
                while (have_posts()) {
                    the_post();
                    the_content();
                }
            }
            ?>
        </main>
        <?php wp_footer(); ?>
    </body>
    </html>
<?php else : ?>
    <!DOCTYPE html>
    <html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php bloginfo('name'); ?> - Headless Mode</title>
    </head>
    <body>
        <h1>Este sitio funciona en modo Headless</h1>
        <p>El frontend se gestiona desde Astro.</p>
        <p>Accede al panel de administracion: <a href="/wp-admin">/wp-admin</a></p>
        <p>GraphQL Endpoint: <a href="/graphql">/graphql</a></p>
    </body>
    </html>
<?php endif; ?>
