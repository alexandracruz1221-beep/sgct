# Despliegue en Render

1. Subir este repositorio a GitHub.
2. En Render, crear un servicio Web con Docker.
3. Usar el archivo Dockerfile incluido.
4. Añadir variables de entorno:
   - APP_ENV=production
   - APP_DEBUG=false
   - APP_KEY=<generar>
   - DB_CONNECTION=pgsql
   - DB_HOST=<host de Postgres>
   - DB_PORT=5432
   - DB_DATABASE=<nombre>
   - DB_USERNAME=<usuario>
   - DB_PASSWORD=<password>

El contenedor ejecuta migraciones automáticamente al iniciar.
