# ðŸ„â€â™‚ï¸ Tareas - Spots to Surf Peru

## ðŸŸ¢ Estado Actual
- **Arquitectura:** Monorepo profesional (`/backend` y `/frontend`).
- **Backend:** WordPress Headless configurado con WPGraphQL, WooCommerce y ACF. Limpio de contenido de ejemplo.
- **Frontend:** Astro + Tailwind v4 con Sistema de DiseÃ±o "Costa Sagrada" (Mockup Home estÃ¡tico completado).
- **Conectividad:** `wpFetch` helper configurado para consumir GraphQL.

---

## ðŸ”¥ Prioridad PrÃ³xima: Venta Online & Packs
*Objetivo: Modelar y exponer los productos para que el frontend pueda consumirlos dinÃ¡micamente.*

### ðŸ› ï¸ Backend (Modelado de Datos)
- [x] **STSP Logistic (Backoffice):**
  - Services (CPT `stsp_service`) con nombre unicamente.
  - Providers (CPT `stsp_provider`) con select de Service.
  - Mostrar ambos como subitems bajo STSP Logistic.
- [ ] **Ampliar formulario de Providers (STSP Logistic):**
  - Definir campos adicionales por tipo de servicio.
  - Validar flujo de alta y edicion de proveedores en admin.
- [ ] **Modelar "Surf Packs" con ACF:**
  - Crear Field Group para Tours/Packs (Nivel de surf, DuraciÃ³n, Incluye, GalerÃ­a especÃ­fica).
  - Asegurar que los campos estÃ©n expuestos en `show_in_graphql`.
- [ ] **Configurar WooCommerce para Headless:**
  - Crear categorÃ­as: `Tours`, `Packs de Alojamiento`, `Clases`.
  - Crear los primeros 3 productos reales (ej. "Pack MÃ¡ncora 7 dÃ­as").
- [ ] **OptimizaciÃ³n GraphQL:**
  - Probar queries para obtener productos + campos ACF vinculados.

### ðŸŽ¨ Frontend (Desarrollo DinÃ¡mico)
- [ ] **Componente `PackCard.astro`:** Crear versiÃ³n dinÃ¡mica que reciba datos de WP.
- [ ] **SecciÃ³n de Packs en Home:** Sustituir los destinos estÃ¡ticos por una query real de productos/packs.
- [ ] **PÃ¡ginas de Producto (SSG/SSR):** Crear ruta dinÃ¡mica `src/pages/packs/[slug].astro`.
- [ ] **IntegraciÃ³n de Reservas:** BotÃ³n que enlace al carrito de WooCommerce o a un formulario de reserva pre-llenado.

---

## ðŸ“ Tareas Pendientes Generales

### ðŸ“¦ Contenido & SEO
- [ ] Subir imÃ¡genes reales de alta calidad a la librerÃ­a de medios.
- [ ] Configurar SEO bÃ¡sico en WordPress (Yoast/RankMath) y su exposiciÃ³n en la API.
- [ ] Escribir los textos "Sobre Nosotros" definitivos.

### ðŸ’³ E-commerce & Checkout
- [ ] Configurar pasarela de pagos (Sandbox de PayPal/Stripe).
- [ ] Definir flujo de checkout (Â¿Directo en WP admin o embebido en Astro?).

### ðŸ”§ Infraestructura & DX
- [ ] **Script de Backup:** Automatizar el backup de la DB del contenedor.
- [ ] **Deployment:** Definir hosting (ej. Vercel para Astro, VPS/DigitalOcean para WP).

---

## âœ… Checklist de Progreso
- [x] ReestructuraciÃ³n de carpetas (Backend/Frontend)
- [x] InstalaciÃ³n Astro + Tailwind v4
- [x] Mockup visual "Costa Sagrada" aplicado
- [x] Limpieza de contenido basura en WP

---

## ðŸ“… Notas
- **Ultima actualizacion:** 2026-02-10
- **Enfoque actual:** Ampliar el formulario de Providers dentro de STSP Logistic.


