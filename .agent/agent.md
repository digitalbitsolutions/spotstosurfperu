# Agent Configuration - Spots to Surf Peru

Proyecto headless:

- Frontend: Astro (sitio estatico).
- Backend: WordPress minimo (headless + WooCommerce).

Este documento guarda la informacion necesaria para conectar y desplegar sin exponer secretos.

## Estructura local

- `frontend/astro`: app Astro (build estatico).
- `backend/wordpress`: WordPress local (tema headless y plugins).
- `.secrets`: llaves SSH locales (NO commitear).
- `wp-config-prod.php`: plantilla de config prod (sin credenciales).

## Acceso a produccion (sin secretos)

- Host/IP: `104.194.9.236`
- Puerto SSH: `9505`
- Usuario SSH: `spots2surfperu`
- Home remoto: `/home/spots2surfperu`
- Web root (Astro): `/home/spots2surfperu/public_html`
- WordPress publico (WooCommerce): `/home/spots2surfperu/public_html/wp`
- Dominio: `spotstosurfperu.com`

Nota: En produccion WordPress esta montado bajo `/wp` (checkout/product).

## SSH

Llave privada local (recomendada para deploy, sin passphrase):

- `D:\spotstosurfperu.com\.secrets\id_rsa_for_ssh_nopass`

Ejemplo de conexion:

```bash
ssh -i D:\spotstosurfperu.com\.secrets\id_rsa_for_ssh_nopass -p 9505 spots2surfperu@104.194.9.236
```

Nota: si usas una key con passphrase, usar `ssh-agent` o introducirla manualmente.

### Windows: error "UNPROTECTED PRIVATE KEY FILE"

Si OpenSSH ignora la key por permisos muy abiertos, restringe el ACL (ejemplo):

```powershell
$u = "$env:USERDOMAIN\\$env:USERNAME"
$key = "D:\\spotstosurfperu.com\\.secrets\\id_rsa_for_ssh_nopass"
icacls $key /inheritance:r
icacls $key /grant:r "${u}:(F)"
icacls $key /remove "NT AUTHORITY\\Authenticated Users" "BUILTIN\\Users" "BUILTIN\\Administrators" "NT AUTHORITY\\SYSTEM"
```

## Frontend env vars (Astro)

En `frontend/astro` se usan:

- `WP_GRAPHQL_URL` (default: `http://localhost:8081/graphql`)
- `PUBLIC_WP_CHECKOUT_BASE`
- `PUBLIC_WP_PRODUCT_BASE`

Local tipico:

- `PUBLIC_WP_CHECKOUT_BASE=/checkout/?add-to-cart=`
- `PUBLIC_WP_PRODUCT_BASE=/product/`

Produccion tipica (WP bajo `/wp`):

- `PUBLIC_WP_CHECKOUT_BASE=/wp/checkout/?add-to-cart=`
- `PUBLIC_WP_PRODUCT_BASE=/wp/product/`

## Deploy del frontend (Astro)

1. `cd frontend/astro`
2. `npm install`
3. `npm run build` (sale en `frontend/astro/dist`)
4. Subir `dist/` a `/home/spots2surfperu/public_html` reemplazando el contenido.

Nota: en este host (jailshell) `rsync` no esta disponible. Usar `scp` + limpieza remota.

Ejemplo (Windows):

```bash
ssh -i D:\spotstosurfperu.com\.secrets\id_rsa_for_ssh_nopass -p 9505 spots2surfperu@104.194.9.236 "cd /home/spots2surfperu/public_html && find . -maxdepth 1 -mindepth 1 ! -name wp ! -name .htaccess ! -name .well-known ! -name cgi-bin -exec rm -rf {} +"
scp -i D:\spotstosurfperu.com\.secrets\id_rsa_for_ssh_nopass -P 9505 -r dist/* spots2surfperu@104.194.9.236:/home/spots2surfperu/public_html/
```

## Deploy del backend (WordPress headless)

Solo hay cambios en tema y plugins (no hay tema publico).

Rutas:

- Local tema: `backend/wordpress/wp-content/themes/headless`
- Remoto tema: `/home/spots2surfperu/public_html/wp/wp-content/themes/headless`
- Local plugins: `backend/wordpress/wp-content/plugins`
- Remoto plugins: `/home/spots2surfperu/public_html/wp/wp-content/plugins`

Ejemplo (tema):

```bash
ssh -i D:\spotstosurfperu.com\.secrets\id_rsa_for_ssh_nopass -p 9505 spots2surfperu@104.194.9.236 "rm -rf /home/spots2surfperu/public_html/wp/wp-content/themes/headless/*"
scp -i D:\spotstosurfperu.com\.secrets\id_rsa_for_ssh_nopass -P 9505 -r backend/wordpress/wp-content/themes/headless/* spots2surfperu@104.194.9.236:/home/spots2surfperu/public_html/wp/wp-content/themes/headless/
```

## Base de datos

- Las credenciales de DB se guardan fuera del repo (password manager).
- Usar phpMyAdmin en cPanel o WP-CLI si esta disponible.
- Si se cambian URLs, ejecutar search-replace en DB.

## Seguridad

- No commitear `.secrets`, llaves privadas ni passwords.
- Mantener llaves solo en la maquina local.
