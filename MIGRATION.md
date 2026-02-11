# Guía de Migración - Mover el Proyecto

## 📦 Pasos para Mover las Carpetas

### 1. Detener los contenedores
```bash
cd d:\spotstosurfperu.com
docker-compose down
```

### 2. (Opcional) Hacer backup de la base de datos
```bash
docker-compose up -d db
docker exec spotstosurfperucom-db-1 mysqldump -u wpuser -pwppassword spotstosurfperu_db > backup_$(date +%Y%m%d).sql
docker-compose down
```

### 3. Mover la carpeta completa
Puedes mover toda la carpeta `d:\spotstosurfperu.com` a cualquier ubicación, por ejemplo:
- `C:\proyectos\spotstosurfperu-backend`
- `D:\dev\wordpress-headless`
- Etc.

### 4. Actualizar rutas (si es necesario)

Si moviste la carpeta, asegúrate de que las rutas en `docker-compose.yml` sean relativas (ya lo son):

```yaml
volumes:
  - ./html:/var/www/html  # ✅ Ruta relativa, funciona en cualquier ubicación
```

### 5. Levantar los contenedores en la nueva ubicación
```bash
cd [NUEVA_UBICACION]
docker-compose up -d
```

### 6. Verificar que todo funciona
- Accede a http://localhost:8081/wp-admin
- Verifica que el GraphQL endpoint funciona: http://localhost:8081/graphql

## 🔄 Si cambias el puerto

Si `8081` está ocupado en la nueva máquina, edita `docker-compose.yml`:

```yaml
wordpress:
  ports:
    - "8082:80"  # Cambia 8081 por el puerto que quieras
```

Luego actualiza las URLs en WordPress:
```bash
docker exec -u root spotstosurfperu wp option update home 'http://localhost:8082' --allow-root
docker exec -u root spotstosurfperu wp option update siteurl 'http://localhost:8082' --allow-root
```

## 🗂️ Archivos Importantes a Conservar

Asegúrate de mover estos archivos:
- ✅ `docker-compose.yml`
- ✅ `.env`
- ✅ `html/` (carpeta completa con WordPress)
- ✅ `README.md`
- ✅ `ROADMAP.md`
- ✅ `TASKS.md`

## ⚠️ Notas Importantes

1. **No edites archivos dentro de `html/` directamente** - Usa el admin de WordPress
2. **Los datos están en el volumen Docker** - Si eliminas el volumen, pierdes la base de datos
3. **Para backups regulares**, usa el comando de mysqldump del paso 2

## 🆘 Solución de Problemas

### Error: "Port already in use"
Cambia el puerto en `docker-compose.yml` (ver arriba)

### Error: "Cannot connect to database"
```bash
docker-compose down
docker-compose up -d
```

### Perdí los datos
Si hiciste backup:
```bash
docker exec -i spotstosurfperucom-db-1 mysql -u wpuser -pwppassword spotstosurfperu_db < backup_YYYYMMDD.sql
```

## ✅ Checklist Post-Migración

- [ ] Contenedores corriendo: `docker ps`
- [ ] Admin accesible: http://localhost:8081/wp-admin
- [ ] GraphQL funciona: http://localhost:8081/graphql
- [ ] Productos visibles en el admin
- [ ] Plugins activos
