---
description: Listar todos los plugins instalados
---

# Workflow: Listar Plugins

Muestra todos los plugins instalados y su estado.

## Pasos

// turbo-all

1. Navegar al directorio del proyecto
```bash
cd d:\spotstosurfperu.com
```

2. Listar plugins con WP-CLI
```bash
docker exec -u root spotstosurfperu wp plugin list --allow-root
```

## Información

Deberías ver estos plugins activos:
- wp-graphql
- woocommerce
- woo-graphql
- wpgraphql-acf
- wpgraphql-ide
- advanced-custom-fields
- contact-form-7
- classic-editor
- disable-gutenberg
