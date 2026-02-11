---
description: Reiniciar todos los contenedores
---

# Workflow: Reiniciar Servicios

Reinicia todos los contenedores de Docker (útil cuando algo no funciona).

## Pasos

// turbo-all

1. Navegar al directorio del proyecto
```bash
cd d:\spotstosurfperu.com
```

2. Detener contenedores
```bash
docker-compose down
```

3. Esperar 5 segundos
```bash
Start-Sleep -Seconds 5
```

4. Levantar contenedores
```bash
docker-compose up -d
```

5. Esperar a que estén listos
```bash
Start-Sleep -Seconds 15
```

6. Verificar estado
```bash
docker ps --filter name=spotstosurfperu
```

## Cuándo usar este workflow

- Cuando WordPress no responde
- Después de cambios en docker-compose.yml
- Si hay errores de conexión a la base de datos
