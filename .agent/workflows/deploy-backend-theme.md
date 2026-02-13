---
description: Deploy del tema headless de WordPress a produccion (scp)
---

# Workflow: Deploy Backend Theme (WordPress)

Sube el tema headless desde `backend/wordpress/wp-content/themes/headless` al WordPress de produccion.

## Pasos

1. (Opcional) Validar conexion SSH
```bash
cd d:\spotstosurfperu.com
ssh -i .secrets\id_rsa -p 9505 spots2surfperu@104.194.9.236 "echo ok"
```

2. Limpiar tema remoto
```bash
ssh -i .secrets\id_rsa -p 9505 spots2surfperu@104.194.9.236 "rm -rf /home/spots2surfperu/public_html/wp/wp-content/themes/headless/*"
```

3. Subir tema
```bash
cd d:\spotstosurfperu.com
scp -i .secrets\id_rsa -P 9505 -r backend/wordpress/wp-content/themes/headless/* spots2surfperu@104.194.9.236:/home/spots2surfperu/public_html/wp/wp-content/themes/headless/
```

