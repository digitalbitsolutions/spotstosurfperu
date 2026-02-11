---
description: Iniciar el entorno de desarrollo WordPress Headless
---

# Workflow: Iniciar Desarrollo

Este workflow inicia todos los servicios necesarios para trabajar con el backend WordPress Headless.

## Pasos

// turbo-all

1. Navegar al directorio del proyecto
```bash
cd d:\spotstosurfperu.com
```

2. Levantar los contenedores de Docker
```bash
docker-compose up -d
```

3. Esperar a que los servicios estén listos (15 segundos)
```bash
Start-Sleep -Seconds 15
```

4. Verificar que los contenedores están corriendo
```bash
docker ps --filter name=spotstosurfperu
```

5. Mostrar información de acceso
```bash
echo "✅ WordPress Admin: http://localhost:8081/wp-admin"
echo "✅ GraphQL Endpoint: http://localhost:8081/graphql"
echo "✅ Usuario: admin | Contraseña: adminpass"
```

## Verificación

- Los contenedores deben estar en estado "Up"
- Deberías poder acceder a http://localhost:8081/wp-admin
