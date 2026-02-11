# Spots to Surf Peru - Headless Project

Este proyecto utiliza una arquitectura **Headless WordPress** con un frontend moderno en **Astro**.

## ðŸ“ Estructura del Proyecto

- `backend/wordpress/`: InstalaciÃ³n de WordPress que actÃºa como CMS (API GraphQL).
- `frontend/astro/`: AplicaciÃ³n frontend construida con Astro.
- `docker-compose.yml`: ConfiguraciÃ³n de contenedores para la base de datos y el backend.
- `.env`: Variables de entorno compartidas.

## ðŸš€ Inicio RÃ¡pido

1. **Levantar el Backend:**
   ```bash
   docker-compose up -d
   ```
   *Acceso al admin:* [http://localhost:8081/wp-admin/](http://localhost:8081/wp-admin/)

2. **Iniciar el Frontend:**
   ```bash
   cd frontend/astro
   npm install
   npm run dev
   ```
   *Acceso web:* [http://localhost:4321/](http://localhost:4321/)

## STSP Logistic
- Menu de backoffice para logistica interna.
- `Services` = catalogo (CPT `stsp_service`).
- `Providers` = proveedores (CPT `stsp_provider`) con select de Service.

## ðŸ› ï¸ TecnologÃ­as

- **CMS:** WordPress + WPGraphQL + WooCommerce + ACF.
- **Frontend:** Astro + Tailwind CSS.
- **Infraestructura:** Docker & Docker Compose.


