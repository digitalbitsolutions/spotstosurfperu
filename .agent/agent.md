# Agent Configuration - Spots to Surf Peru Backend

Este directorio contiene workflows automatizados para facilitar el desarrollo y mantenimiento del backend WordPress Headless.

## ðŸ¤– Workflows Disponibles

### Desarrollo Diario

- **`start-dev.md`** - Iniciar el entorno de desarrollo
  - Levanta todos los contenedores de Docker
  - Verifica que los servicios estÃ©n corriendo
  - Muestra las URLs de acceso

- **`stop-dev.md`** - Detener el entorno de desarrollo
  - Detiene todos los contenedores de forma segura
  - Conserva los datos en los volÃºmenes

- **`restart.md`** - Reiniciar todos los servicios
  - Ãštil cuando algo no funciona correctamente
  - Reinicia WordPress y MySQL

### Testing y VerificaciÃ³n

- **`test-graphql.md`** - Verificar el endpoint GraphQL
  - Ejecuta una consulta de prueba
  - Verifica que los productos se devuelven correctamente

- **`list-plugins.md`** - Listar plugins instalados
  - Muestra todos los plugins y su estado
  - Ãštil para verificar la configuraciÃ³n

### GestiÃ³n de Contenido

- **`create-product.md`** - Crear un nuevo producto de tour
  - Crea productos con campos ACF
  - Configura precio y stock de WooCommerce

### Mantenimiento

- **`backup-db.md`** - Crear backup de la base de datos
  - Genera un backup con timestamp
  - Guarda en el directorio `backups/`

- **`view-logs.md`** - Ver logs de WordPress
  - Muestra logs en tiempo real
  - Ãštil para debugging

## ðŸš€ CÃ³mo Usar los Workflows

### Desde el chat con el agente:

Simplemente menciona el nombre del workflow:

```
"Ejecuta start-dev"
"Corre el workflow de backup"
"Necesito ver los logs"
```

### Manualmente:

Cada workflow contiene los comandos exactos que puedes copiar y pegar en tu terminal.

## ðŸ“‹ Workflows Recomendados por SituaciÃ³n

### Al iniciar el dÃ­a
1. `start-dev.md` - Levantar el entorno

### Antes de hacer cambios importantes
1. `backup-db.md` - Crear backup de seguridad

### Al terminar el dÃ­a
1. `stop-dev.md` - Detener servicios

### Si algo no funciona
1. `view-logs.md` - Ver quÃ© estÃ¡ pasando
2. `restart.md` - Reiniciar servicios

### Antes de deploy
1. `backup-db.md` - Backup final
2. `test-graphql.md` - Verificar que todo funciona

## ðŸ”§ PersonalizaciÃ³n

Puedes crear tus propios workflows siguiendo este formato:

```markdown
---
description: DescripciÃ³n breve del workflow
---

# Workflow: Nombre del Workflow

DescripciÃ³n detallada.

## Pasos

1. Primer paso
\`\`\`bash
comando
\`\`\`

2. Segundo paso
\`\`\`bash
otro comando
\`\`\`
```

## STSP Logistic
- Plugin: `backend/wordpress/wp-content/plugins/stsp-logistic/stsp-logistic.php`.
- CPTs: `stsp_service` (Services) y `stsp_provider` (Providers).

## ðŸ“ Notas

- Los workflows con `// turbo-all` se ejecutan automÃ¡ticamente sin confirmaciÃ³n
- Los workflows sin esta anotaciÃ³n requieren confirmaciÃ³n para cada paso
- Todos los comandos estÃ¡n optimizados para PowerShell en Windows

## ðŸ†˜ Soporte

Si un workflow falla:
1. Verifica que Docker Desktop estÃ¡ corriendo
2. Revisa los logs con `view-logs.md`
3. Intenta reiniciar con `restart.md`
4. Si persiste, consulta `MIGRATION.md` para troubleshooting

## ðŸ”— Recursos Relacionados

- `README.md` - DocumentaciÃ³n principal del proyecto
- `ROADMAP.md` - Hoja de ruta del proyecto
- `TASKS.md` - Tareas pendientes
- `MIGRATION.md` - GuÃ­a de migraciÃ³n


