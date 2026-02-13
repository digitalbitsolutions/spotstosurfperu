# Spots to Surf Peru - Headless (WordPress + Astro)

Arquitectura headless:

- Backend: WordPress (CMS) + WPGraphQL + WooCommerce (+ WooGraphQL)
- Frontend: Astro (build estatico) + Tailwind

## Estructura

- `backend/wordpress/`: WordPress (local/dev) usado como CMS/API.
- `frontend/astro/`: sitio publico en Astro.
- `docker-compose.yml`: contenedores para el backend local.

## Inicio rapido (local)

1. Levantar backend (WordPress + DB):
   ```bash
   docker-compose up -d
   ```
   Admin: `http://localhost:8081/wp-admin/`  
   GraphQL: `http://localhost:8081/graphql`

2. Levantar frontend (Astro):
   ```bash
   cd frontend/astro
   npm install
   npm run dev
   ```
   Web: `http://localhost:4321/`

## Rutas principales

- `/services` (Experiences)
- `/packages` (Packages)
- `/destinations`
- `/about#gallery`
- `/contact`
- `/custom-trip`

## Variables de entorno (frontend)

En `frontend/astro`:

- `WP_GRAPHQL_URL` (default: `http://localhost:8081/graphql`)
- `PUBLIC_WP_CHECKOUT_BASE`
- `PUBLIC_WP_PRODUCT_BASE`

Notas:

- En local (WP en `localhost:8081`): normalmente
  - `PUBLIC_WP_CHECKOUT_BASE=/checkout/?add-to-cart=`
  - `PUBLIC_WP_PRODUCT_BASE=/product/`
- En produccion (WP montado bajo `/wp`):
  - `PUBLIC_WP_CHECKOUT_BASE=/wp/checkout/?add-to-cart=`
  - `PUBLIC_WP_PRODUCT_BASE=/wp/product/`

## STSP Logistic (Backoffice)

- `Services` = catalogo (CPT `stsp_service`)
- `Providers` = proveedores (CPT `stsp_provider`) con select de Service

