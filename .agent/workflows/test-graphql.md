---
description: Verificar que el GraphQL endpoint funciona correctamente
---

# Workflow: Test GraphQL

Verifica que el endpoint GraphQL está funcionando y devuelve datos correctamente.

## Pasos

// turbo

1. Navegar al directorio del proyecto
```bash
cd d:\spotstosurfperu.com
```

2. Verificar que el contenedor está corriendo
```bash
docker ps --filter name=spotstosurfperu --format "table {{.Names}}\t{{.Status}}"
```

3. Crear archivo de consulta temporal
```bash
@"
{
  "query": "{ products { nodes { name price } } }"
}
"@ | Out-File -FilePath query-test.json -Encoding utf8
```

4. Ejecutar consulta GraphQL
```bash
curl -X POST -H "Content-Type: application/json" -d "@query-test.json" http://localhost:8081/graphql
```

5. Limpiar archivo temporal
```bash
Remove-Item query-test.json
```

## Verificación

- Deberías ver una respuesta JSON con productos
- Si hay error, verifica que WordPress esté corriendo
