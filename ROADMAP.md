# Roadmap - Spots to Surf Peru

## âœ… Fase 1: Backend Headless (COMPLETADO)

- [x] Configurar Docker con WordPress + MySQL
- [x] Instalar y configurar WPGraphQL
- [x] Instalar y configurar WooCommerce
- [x] Instalar WooGraphQL (extensiÃ³n GraphQL para WooCommerce)
- [x] Configurar ACF para paquetes turÃ­sticos
- [x] Exponer ACF vÃ­a GraphQL
- [x] Crear tema headless mÃ­nimo
- [x] Desactivar Gutenberg (editor de bloques)
- [x] Configurar seguridad bÃ¡sica
- [x] Crear producto de ejemplo

## Fase 1.1: STSP Logistic (EN CURSO)
- [x] Crear Services (CPT `stsp_service`)
- [x] Crear Providers (CPT `stsp_provider`) con select de Service
- [ ] Validar flujo de registro de proveedores en admin


## ðŸ”„ Fase 2: Frontend Astro (PRÃ“XIMO)

### 2.1 Setup Inicial
- [ ] Crear proyecto Astro
- [ ] Configurar GraphQL client (Apollo o similar)
- [ ] Crear estructura de carpetas
- [ ] Configurar variables de entorno

### 2.2 Componentes Base
- [ ] Layout principal
- [ ] Header con navegaciÃ³n
- [ ] Footer
- [ ] SEO component

### 2.3 PÃ¡ginas Principales
- [ ] Home page
- [ ] PÃ¡gina de tours (listado)
- [ ] PÃ¡gina de tour individual (detalle)
- [ ] PÃ¡gina de blog
- [ ] Post individual
- [ ] PÃ¡gina de contacto

### 2.4 IntegraciÃ³n WooCommerce
- [ ] Listado de productos/tours
- [ ] Detalle de producto
- [ ] Carrito de compras
- [ ] Checkout (integraciÃ³n con WooCommerce)
- [ ] Pasarela de pago (PayPal, Stripe)

### 2.5 OptimizaciÃ³n
- [ ] ImÃ¡genes optimizadas (Astro Image)
- [ ] SEO metadata dinÃ¡mico
- [ ] Sitemap generado
- [ ] Performance optimization
- [ ] PWA (opcional)

## ðŸš€ Fase 3: Despliegue

### 3.1 Backend (WordPress)
- [ ] Migrar a servidor VPS o hosting WordPress
- [ ] Configurar dominio y SSL
- [ ] Configurar CORS para GraphQL
- [ ] Backups automÃ¡ticos

### 3.2 Frontend (Astro)
- [ ] Deploy en Vercel/Netlify
- [ ] Configurar dominio
- [ ] CI/CD automÃ¡tico
- [ ] Monitoring y analytics

## ðŸ“‹ Fase 4: Contenido y Marketing

- [ ] Crear contenido real de tours
- [ ] Subir imÃ¡genes profesionales
- [ ] Escribir descripciones SEO-optimizadas
- [ ] Configurar Google Analytics
- [ ] Configurar Meta Pixel (Facebook/Instagram)
- [ ] Email marketing (Newsletter)

## ðŸŽ¨ Fase 5: Mejoras Futuras

- [ ] Multi-idioma (EspaÃ±ol/InglÃ©s)
- [ ] Sistema de reservas avanzado
- [ ] Reviews y testimonios
- [ ] GalerÃ­a de fotos de clientes
- [ ] Blog con categorÃ­as
- [ ] IntegraciÃ³n con redes sociales
- [ ] Chat en vivo
- [ ] Sistema de cupones/descuentos

## ðŸ”§ Mantenimiento Continuo

- [ ] Actualizar WordPress y plugins mensualmente
- [ ] Revisar seguridad
- [ ] Optimizar base de datos
- [ ] Monitorear rendimiento
- [ ] Actualizar contenido

---

## ðŸ“… Timeline Estimado

| Fase | DuraciÃ³n Estimada |
|------|-------------------|
| Fase 1 (Backend) | âœ… Completado |
| Fase 2 (Frontend) | 2-3 semanas |
| Fase 3 (Deploy) | 1 semana |
| Fase 4 (Contenido) | Continuo |
| Fase 5 (Mejoras) | Continuo |

## Proximo Paso Inmediato

**Ampliar el formulario de Providers dentro de STSP Logistic**

