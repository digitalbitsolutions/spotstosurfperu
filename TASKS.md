# Tareas - Spots to Surf Peru

Ultima actualizacion: 2026-02-13

## Estado actual (resumen)

- Arquitectura: monorepo (`/backend` y `/frontend`).
- Backend: WordPress headless con WPGraphQL + WooCommerce + ACF + WooGraphQL.
- Frontend: Astro + Tailwind (sitio estatico) con paginas publicas ya online.
- Checkout: los CTAs van a WooCommerce bajo `/wp` usando `add-to-cart`.
- About gallery: lightbox/modal con navegacion (prev/next) y cerrar (click/Esc).
- Deploy: manual via `npm run build` + `scp` al hosting.

## Prioridad proxima (commerce dinamico)

Objetivo: reemplazar data estatica por datos reales de WooCommerce/WPGraphQL y dejar el sitio listo para vender.

### Backend (WooCommerce / WPGraphQL)

- [ ] Crear/ordenar productos reales en WooCommerce (slugs estables).
- [ ] Completar galerias de producto (featured + gallery) en WP.
- [ ] Categorias/atributos para filtrar packs (destino, duracion, nivel, etc).
- [ ] Validar queries WooGraphQL para: listado + detalle + imagenes + short description.
- [ ] Configurar pagos (PayPal/Stripe) y testear checkout.
- [ ] Descuentos: cupones para grupos/agencias (definir reglas).

### Frontend (Astro)

- [ ] Sustituir `frontend/astro/src/data/packages.ts` por fetch real (SSG) desde WooGraphQL/WPGraphQL.
- [ ] Sustituir `frontend/astro/src/data/experiences.ts` por fetch real (o modelado en WP).
- [ ] Mapear slugs del frontend a slugs/product IDs reales (sin hardcode en varios lugares).
- [ ] Mejoras SEO: OG tags, schema.org, sitemap, robots.
- [ ] Analytics (GA4) + eventos (CTA, add-to-cart, contact).

### Infra / DX

- [ ] Documentar y automatizar backups (DB + wp-content uploads si aplica).
- [ ] Definir CI/CD (build + deploy) o al menos scripts reproducibles.

## Hecho recientemente

- [x] Experiences: `/services` + `/services/[slug]` (copy optimizado + CTA sin precios).
- [x] Packages: `/packages` + `/packages/[slug]` con CTA a checkout WooCommerce.
- [x] About: galeria Mancora agregada.
- [x] Lightbox/modal para imagenes de la galeria (prev/next/cerrar, teclado).
- [x] Produccion: deploy actualizado en `https://spotstosurfperu.com/`.

## Notas

- En produccion WordPress esta montado bajo `/wp` (checkout/product).
- Variables usadas en frontend para enlaces a WP:
  - `PUBLIC_WP_CHECKOUT_BASE`
  - `PUBLIC_WP_PRODUCT_BASE`
  - `WP_GRAPHQL_URL`

