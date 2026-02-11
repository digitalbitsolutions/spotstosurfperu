---
description: Crear un nuevo producto de tour de surf
---

# Workflow: Crear Producto de Tour

Crea un nuevo producto de tour con campos personalizados ACF.

## Pasos

1. Navegar al directorio del proyecto
```bash
cd d:\spotstosurfperu.com
```

2. Solicitar información del tour
   - Nombre del tour
   - Precio
   - Ubicación
   - Duración
   - Dificultad (baja/media/alta)
   - Qué incluye
   - Qué NO incluye

3. Crear el producto usando WP-CLI
```bash
docker exec -u root spotstosurfperu wp eval-file - --allow-root <<'PHP'
$product_id = wp_insert_post(array(
    'post_title' => 'NOMBRE_DEL_TOUR',
    'post_content' => 'DESCRIPCION_DEL_TOUR',
    'post_status' => 'publish',
    'post_type' => 'product',
));

if ($product_id) {
    // Campos ACF
    update_post_meta($product_id, 'ubicacion', 'UBICACION');
    update_post_meta($product_id, 'duracion', 'DURACION');
    update_post_meta($product_id, 'dificultad', 'DIFICULTAD');
    update_post_meta($product_id, 'incluye', 'INCLUYE');
    update_post_meta($product_id, 'no_incluye', 'NO_INCLUYE');
    
    // Precio WooCommerce
    update_post_meta($product_id, '_price', 'PRECIO');
    update_post_meta($product_id, '_regular_price', 'PRECIO');
    update_post_meta($product_id, '_stock_status', 'instock');
    
    wp_set_object_terms($product_id, 'simple', 'product_type');
    
    echo "✅ Producto creado con ID: $product_id\n";
}
PHP
```

4. Verificar en el admin
```bash
echo "Verifica el producto en: http://localhost:8081/wp-admin/edit.php?post_type=product"
```

## Notas

- Reemplaza los valores en MAYÚSCULAS con los datos reales
- El producto será visible inmediatamente en GraphQL
