# Agent Configuration - Spots to Surf Peru

Proyecto headless:
- Frontend: Astro (sitio estatico).
- Backend: WordPress minimo (solo headless + WooCommerce).

Este documento guarda la informacion necesaria para conectar y desplegar sin exponer secretos.

## Estructura local
- `frontend/astro`: app Astro (build estatico).
- `backend/wordpress`: WordPress local (tema headless y plugins).
- `.secrets`: llaves SSH locales (no commitear).
- `wp-config-prod.php`: plantilla de config prod (sin credenciales).

## Acceso a produccion (sin secretos)
- Host/IP: `104.194.9.236`
- Puerto SSH: `9505`
- Usuario SSH: `spots2surfperu`
- Home remoto: `/home/spots2surfperu`
- Web root (Astro): `/home/spots2surfperu/public_html`
- WordPress root: `/home/spots2surfperu/backend/wp`
- Dominio: `spotstosurfperu.com`

### SSH
Llave privada local:
- `D:\spotstosurfperu.com\.secrets\id_rsa`

Ejemplo de conexion:
```
ssh -i D:\spotstosurfperu.com\.secrets\id_rsa -p 9505 spots2surfperu@104.194.9.236
```

Nota: la passphrase no se guarda aqui. Usar `ssh-agent` o introducirla manualmente.

## Deploy del frontend (Astro)
1. `cd frontend/astro`
2. `npm install`
3. `npm run build` (salida en `frontend/astro/dist`)
4. Subir `dist/` a `/home/spots2surfperu/public_html` reemplazando el contenido.

Ejemplo con rsync (Windows):
```
rsync -av --delete dist/ spots2surfperu@104.194.9.236:/home/spots2surfperu/public_html/ -e "ssh -p 9505 -i D:\spotstosurfperu.com\.secrets\id_rsa"
```

## Deploy del backend (WordPress headless)
Solo hay cambios en tema y plugins (no hay tema publico).

Rutas:
- Local tema: `backend/wordpress/wp-content/themes/headless`
- Remoto tema: `/home/spots2surfperu/backend/wp/wp-content/themes/headless`
- Local plugins: `backend/wordpress/wp-content/plugins`
- Remoto plugins: `/home/spots2surfperu/backend/wp/wp-content/plugins`

Ejemplo (tema):
```
rsync -av backend/wordpress/wp-content/themes/headless/ spots2surfperu@104.194.9.236:/home/spots2surfperu/backend/wp/wp-content/themes/headless/ -e "ssh -p 9505 -i D:\spotstosurfperu.com\.secrets\id_rsa"
```

## Base de datos
- Las credenciales de DB se guardan fuera del repo (password manager).
- Usar phpMyAdmin en cPanel o WP-CLI si esta disponible.
- Si se cambian URLs, ejecutar search-replace en DB.

## Seguridad
- No commitear `.secrets`, llaves privadas ni passwords.
- Mantener `id_rsa` solo en la maquina local.
