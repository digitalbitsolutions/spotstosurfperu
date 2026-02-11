# Arquitectura del Proyecto: Spots to Surf Peru (Headless + Astro)

## 1. VisiÃ³n General
Este documento define la arquitectura tÃ©cnica para la plataforma de turismo "Spots to Surf Peru".
El sistema separa completamente la gestiÃ³n de contenidos (Backend/CMS) de la presentaciÃ³n (Frontend), utilizando WordPress como Headless CMS y Astro como framework de frontend estÃ¡tico/hÃ­brido.

### Objetivos Principales
- **Escalabilidad**: Estructura preparada para crecer en nÃºmero de paquetes y servicios sin deuda tÃ©cnica.
- **Rendimiento**: Frontend en Astro para mÃ¡xima velocidad e interactividad mÃ­nima necesaria.
- **Claridad**: SeparaciÃ³n estricta entre "Producto TurÃ­stico" (pÃºblico) y "Proveedor/Operativa" (interno).
- **Flexibilidad**: Soporte para paquetes fijos y viajes a medida (Custom Trips).

---

## 2. Arquitectura de Negocio (Backend - WordPress)

La lÃ³gica de negocio se modela a travÃ©s de Custom Post Types (CPT) y TaxonomÃ­as personalizadas. No utilizamos las Entradas estÃ¡ndar de WP para productos.

### Custom Post Types (CPT)

#### A. `stsp_service` (Interno - Privado)
Catalogo interno de servicios logisticos.
- **Visibilidad**: Privado (no accesible via URL publica).
- **Campos**: `title` (nombre).
- **Relaciones**: Referenciado por `stsp_provider`.

#### B. `stsp_provider` (Interno - Privado)
Proveedores internos con relacion a un servicio.
- **Visibilidad**: Privado (no accesible via URL publica).
- **Campos**: `title` (nombre) + `stsp_service_id` (select de `stsp_service`).
- **Notas**: El select se alimenta desde STSP Logistic -> Services.

#### C. `package` (PÃºblico - Comercial)
El producto principal vendible. Paquetes turÃ­sticos estructurados.
- **Visibilidad**: PÃºblico (`/packages/{slug}`).
- **TaxonomÃ­as**:
  - `package_category`: Premium, Backpacker
  - `destination`: Lima, North Shore, Mancora, etc.
- **Campos (ACF)**:
  - `duration_days` (NÃºmero)
  - `duration_nights` (NÃºmero)
  - `included_services` (RelaciÃ³n: Post Object -> `stsp_provider` Ã³ `service`) -> Array de servicios incluidos.
  - `is_featured` (Booleano)
  - `price_starting_at` (NÃºmero - Precio pÃºblico desde)
  - `commercial_copy` (Wysiwyg/Bloques)
  - `itinerary` (Repeater: DÃ­a 1, DÃ­a 2, etc.)

#### D. `service` (PÃºblico - Adicional)
Servicios individuales que se pueden contratar sueltos o aÃ±adir a un paquete.
- **Visibilidad**: PÃºblico (`/services/{slug}`).
- **Campos (ACF)**:
  - `service_type` (Select: Lesson, Rental, Transport, Meal, Guide)
  - `related_provider` (RelaciÃ³n: Post Object -> `stsp_provider` [1:1 opcional])
  - `base_price` (NÃºmero - Precio pÃºblico)
  - `duration` (Texto - Ej: "2 hours", "Full Day")

#### E. `custom_trip_request` (Interno - Leads)
Almacena las solicitudes de viajes a medida enviadas desde el frontend.
- **Visibilidad**: Privado (capabilites de admin).
- **Campos (ACF/Meta)**:
  - `pax_count` (NÃºmero)
  - `trip_duration_days` (NÃºmero)
  - `trip_type` (Select: Surf Focused, Chill, Adventure, Family)
  - `surf_level` (Select: Beginner, Intermediate, Advanced, Pro)
  - `selected_services` (Checkbox/RelaciÃ³n -> `service`)
  - `budget_tier` (Select: Premium, Backpacker, Flexible)
  - `customer_notes` (Textarea)
  - `contact_info` (Grupo: Nombre, Email, WhatsApp)

---

## 3. Arquitectura Frontend (Astro)

El frontend se estructura para consumir estos datos vÃ­a GraphQL (WPGraphQL) o REST API.

### Estructura de Carpetas (`src/`)

```
src/
â”œâ”€â”€ components/
â”‚   â”œâ”€â”€ common/           # Componentes UI base (Header, Footer, Buttons)
â”‚   â”œâ”€â”€ home/             # Componentes especÃ­ficos del Home
â”‚   â”œâ”€â”€ packages/         # Componentes de ficha de paquete (Card, Grid)
â”‚   â”œâ”€â”€ services/         # Componentes de servicios
â”‚   â””â”€â”€ forms/            # Formularios (Custom Trip, Contacto)
â”œâ”€â”€ layouts/
â”‚   â”œâ”€â”€ BaseLayout.astro  # Layout principal (Meta tags, SEO, Estilos globales)
â”‚   â””â”€â”€ PageLayout.astro  # Layout con sidebar o estructuras de pÃ¡gina estÃ¡ndar
â”œâ”€â”€ pages/
â”‚   â”œâ”€â”€ index.astro       # Home
â”‚   â”œâ”€â”€ packages/
â”‚   â”‚   â”œâ”€â”€ index.astro   # Listado de paquetes
â”‚   â”‚   â””â”€â”€ [slug].astro  # Detalle de paquete (DinÃ¡mico)
â”‚   â”œâ”€â”€ services/
â”‚   â”‚   â”œâ”€â”€ index.astro   # Listado de servicios
â”‚   â”‚   â””â”€â”€ [slug].astro  # Detalle de servicio (DinÃ¡mico)
â”‚   â”œâ”€â”€ custom-trip.astro # Landing y Formulario de custom trip
â”‚   â”œâ”€â”€ about.astro       # PÃ¡gina estÃ¡tica
â”‚   â””â”€â”€ contact.astro     # PÃ¡gina de contacto
â”œâ”€â”€ lib/
â”‚   â”œâ”€â”€ api.js            # Cliente cliente API (WordPress Fetcher)
â”‚   â””â”€â”€ utils.js          # Helpers
â””â”€â”€ styles/
    â””â”€â”€ global.css        # Variables CSS, Tailwind base (si aplica), Reset
```

### Responsabilidades clave

1.  **Layouts (`BaseLayout`)**:
    *   Manejar `<head>`, SEO Tags (`title`, `description`, `og:image`).
    *   Importar tipografÃ­as y estilos globales.
    *   Estructura semÃ¡ntica base (`<header>`, `<main>`, `<footer>`).

2.  **PÃ¡ginas (`pages/`)**:
    *   Hacer el fetch de datos en `getStaticPaths` (para generaciÃ³n estÃ¡tica) o en el frontmatter (para SSR).
    *   Pasar datos a los componentes.
    *   No contener lÃ³gica de negocio compleja, solo orquestaciÃ³n.

3.  **Componentes (`components/`)**:
    *   Puros y reutilizables.
    *   Reciben props, renderizan UI.
    *   "Dumb components" en su mayorÃ­a.

---

## 4. Estrategia de Desarrollo (Siguientes Pasos)

1.  **Fase 1 (Arquitectura - ACTUAL)**: Definir estructuras de carpetas y CPTs (este documento).
2.  **Fase 2 (Backend Implementation)**: Registrar CPTs y campos ACF en WordPress (vÃ­a plugin o cÃ³digo).
3.  **Fase 3 (Frontend Skeleton)**: Crear archivos Astro vacÃ­os con estructura HTML base.
4.  **Fase 4 (Data Connection)**: Conectar Astro con WPGraphQL para traer datos reales de prueba.
5.  **Fase 5 (UI/Styles)**: Aplicar diseÃ±o "Wow" y estilos finales.

## 5. Notas Importantes
- **ImÃ¡genes**: Se servirÃ¡n desde WordPress, optimizadas. Astro usarÃ¡ `<Image />` component si es posible para optimizaciÃ³n local o CDN.
- **i18n**: La estructura de URLs actual es para inglÃ©s. Para futuro i18n, se sugiere ruta `/es/` o subdominio, manteniendo esta misma estructura de archivos.

### STSP Logistic (Backoffice)
- **CPTs internos**:
  - `stsp_service`: catalogo de servicios (solo nombre).
  - `stsp_provider`: proveedores con nombre y referencia a `stsp_service`.
- **UI**: Menu "STSP Logistic" con subitems Services y Providers.

