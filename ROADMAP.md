# Roadmap - Spots to Surf Peru

Ultima actualizacion: 2026-02-13

## Fase 1: Backend Headless (Completado)

- [x] Docker: WordPress + MySQL
- [x] WPGraphQL instalado y configurado
- [x] WooCommerce instalado y configurado
- [x] WooGraphQL instalado (GraphQL para WooCommerce)
- [x] ACF base configurado (headless-friendly)
- [x] Tema headless minimo
- [x] Seguridad basica

## Fase 1.1: STSP Logistic (En curso)

- [x] Services (CPT `stsp_service`)
- [x] Providers (CPT `stsp_provider`) con select de Service
- [ ] Validar flujo de alta/edicion de proveedores en WP Admin

## Fase 2: Frontend Astro (MVP Completado, Dinamico pendiente)

### 2.1 Setup

- [x] Proyecto Astro creado
- [x] Tailwind configurado (design system en `frontend/astro/src/styles/global.css`)
- [x] Helper GraphQL disponible (`frontend/astro/src/lib/wordpress.ts`)
- [x] Estrategia de variables para URLs de WP (`frontend/astro/src/lib/wpUrls.ts`)

### 2.2 UI base

- [x] Layout principal (`frontend/astro/src/layouts/BaseLayout.astro`)
- [x] Header con navegacion
- [x] Footer
- [x] SEO basico (title/description por pagina)

### 2.3 Paginas core (Online)

- [x] Home
- [x] Destinations
- [x] Experiences: `/services` + `/services/[slug]`
- [x] Packages: `/packages` + `/packages/[slug]`
- [x] About + ancla de galeria (`/about#gallery`)
- [x] Lightbox en galeria About (modal + prev/next + cerrar)
- [x] Contact
- [x] Custom trip
- [ ] Blog

### 2.4 Integracion WooCommerce (Estado actual)

- [x] CTAs "Book now" enlazan al checkout de WooCommerce (add-to-cart) bajo `/wp`
- [ ] Reemplazar data estatica de packages/services por WooGraphQL + WPGraphQL (SSG)
- [ ] UX de carrito dentro de Astro (opcional; hoy usamos checkout WP)
- [ ] Pagos (PayPal/Stripe) y pruebas end-to-end del checkout

### 2.5 Optimizacion

- [ ] Sitemap + robots
- [ ] OG images + datos estructurados
- [ ] Estrategia de imagenes (Astro Image/CDN)
- [ ] Performance pass (Lighthouse, core web vitals)

## Fase 3: Despliegue (Manual listo, Automatizacion pendiente)

### 3.1 Backend (WordPress)

- [x] WordPress en produccion disponible bajo `/wp`
- [x] Dominio + SSL activos
- [ ] CORS documentado/validado para consumidores GraphQL
- [ ] Backups automaticos

### 3.2 Frontend (Astro)

- [x] Deploy a produccion via `scp` a `/home/spots2surfperu/public_html`
- [ ] CI/CD (build + deploy)
- [ ] Monitoring + analytics

## Fase 4: Contenido y Marketing

- [ ] Cargar contenido real en WooCommerce (copy + galerias + SEO)
- [ ] Curacion de fotos profesionales
- [ ] Analytics (GA4) + Meta Pixel
- [ ] Email marketing (opcional)

## Fase 5: Mejoras futuras

- [ ] Multi-idioma (ES/EN)
- [ ] Reviews/testimonios
- [ ] Blog con categorias + workflow editorial
- [ ] Cupones/descuentos (grupos/agencias)
- [ ] Live chat

## Proximo paso inmediato

Conectar Packages/Experiences a WordPress (WooGraphQL/WPGraphQL) para que el contenido sea 100% dinamico y se mantenga sincronizado con WooCommerce.

