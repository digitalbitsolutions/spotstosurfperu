<?php
// Script para importar medios a la biblioteca de WordPress desde CLI
// Uso: php import-media.php /ruta/al/archivo.webp

if (php_sapi_name() !== 'cli') {
    die("Solo accesible desde CLI");
}

if (!isset($argv[1])) {
    die("Falta el argumento de ruta al archivo");
}

$file_path = $argv[1];

if (!file_exists($file_path)) {
    die("El archivo no existe: $file_path");
}

// Cargar WordPress
require_once('wp-load.php');
require_once(ABSPATH . 'wp-admin/includes/image.php');
require_once(ABSPATH . 'wp-admin/includes/file.php');
require_once(ABSPATH . 'wp-admin/includes/media.php');

$filename = basename($file_path);
$file_content = file_get_contents($file_path);

// Simular subida usando wp_upload_bits
$upload = wp_upload_bits($filename, null, $file_content);

if (!empty($upload['error'])) {
    die("Error al subir archivo: " . $upload['error']);
}

$wp_filetype = wp_check_filetype($filename, null);
$attachment = array(
    'post_mime_type' => $wp_filetype['type'],
    'post_title'     => preg_replace('/\.[^.]+$/', '', $filename),
    'post_content'   => '',
    'post_status'    => 'inherit'
);

$attach_id = wp_insert_attachment($attachment, $upload['file']);

if (is_wp_error($attach_id)) {
    die("Error al insertar attachment: " . $attach_id->get_error_message());
}

$attach_data = wp_generate_attachment_metadata($attach_id, $upload['file']);
wp_update_attachment_metadata($attach_id, $attach_data);

echo wp_get_attachment_url($attach_id);
?>
