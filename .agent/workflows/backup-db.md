---
description: Crear backup de la base de datos
---

# Workflow: Backup de Base de Datos

Crea un backup de la base de datos MySQL con timestamp.

## Pasos

1. Navegar al directorio del proyecto
```bash
cd d:\spotstosurfperu.com
```

2. Crear directorio de backups si no existe
```bash
mkdir -p backups
```

3. Crear backup con timestamp
```bash
$timestamp = Get-Date -Format "yyyyMMdd_HHmmss"
docker exec spotstosurfperucom-db-1 mysqldump -u wpuser -pwppassword spotstosurfperu_db > "backups/backup_$timestamp.sql"
```

4. Verificar que se creó el backup
```bash
ls backups | Sort-Object LastWriteTime -Descending | Select-Object -First 5
```

## Notas

- Los backups se guardan en `backups/backup_YYYYMMDD_HHMMSS.sql`
- Para restaurar un backup:
  ```bash
  docker exec -i spotstosurfperucom-db-1 mysql -u wpuser -pwppassword spotstosurfperu_db < backups/backup_YYYYMMDD_HHMMSS.sql
  ```
