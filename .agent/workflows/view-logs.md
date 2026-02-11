---
description: Ver logs de WordPress en tiempo real
---

# Workflow: Ver Logs

Muestra los logs del contenedor de WordPress en tiempo real.

## Pasos

1. Navegar al directorio del proyecto
```bash
cd d:\spotstosurfperu.com
```

2. Ver logs en tiempo real
```bash
docker logs -f spotstosurfperu
```

## Notas

- Presiona `Ctrl+C` para salir
- Útil para debugging
- Para ver solo las últimas 50 líneas:
  ```bash
  docker logs --tail 50 spotstosurfperu
  ```
