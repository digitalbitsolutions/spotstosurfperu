---
description: Detener el entorno de desarrollo
---

# Workflow: Detener Desarrollo

Detiene todos los contenedores de Docker de forma segura.

## Pasos

// turbo-all

1. Navegar al directorio del proyecto
```bash
cd d:\spotstosurfperu.com
```

2. Detener los contenedores
```bash
docker-compose down
```

3. Verificar que se detuvieron
```bash
docker ps --filter name=spotstosurfperu
```

## Notas

- Los datos se conservan en los volúmenes de Docker
- Para eliminar también los volúmenes (⚠️ BORRA LA BASE DE DATOS):
  ```bash
  docker-compose down -v
  ```
