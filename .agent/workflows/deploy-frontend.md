---
description: Deploy del frontend Astro a produccion (scp)
---

# Workflow: Deploy Frontend (Astro)

Este workflow construye el sitio (static) y lo sube al web root del servidor.

## Requisitos

- Acceso SSH a produccion (ver `.agent/agent.md`).
- En `frontend/astro` tener configuradas las variables de entorno para links a WooCommerce:
  - `PUBLIC_WP_CHECKOUT_BASE`
  - `PUBLIC_WP_PRODUCT_BASE`

## Pasos

1. Build local
```bash
cd d:\spotstosurfperu.com\frontend\astro
npm install
npm run build
```

2. Verificar conexion SSH
```bash
cd d:\spotstosurfperu.com
ssh -i .secrets\id_rsa -p 9505 spots2surfperu@104.194.9.236 "echo ok"
```

3. Limpiar web root remoto (preservar WordPress y archivos especiales)
```bash
ssh -i .secrets\id_rsa -p 9505 spots2surfperu@104.194.9.236 "cd /home/spots2surfperu/public_html && find . -maxdepth 1 -mindepth 1 ! -name wp ! -name .htaccess ! -name .well-known ! -name cgi-bin -exec rm -rf {} +"
```

4. Subir `dist/` por scp
```bash
cd d:\spotstosurfperu.com\frontend\astro
scp -i ..\..\.secrets\id_rsa -P 9505 -r dist\* spots2surfperu@104.194.9.236:/home/spots2surfperu/public_html/
```

5. Verificar online
```bash
curl.exe -I https://spotstosurfperu.com/
curl.exe -I https://spotstosurfperu.com/services/
curl.exe -I https://spotstosurfperu.com/packages/
curl.exe -I https://spotstosurfperu.com/about/#gallery
```

