# Docker Setup Guide for E-Commerce Application

## Prerequisites
- Docker Desktop installed and running
- Docker Compose v2.0+

## Quick Start

### 1. Build and Run Containers
```bash
docker-compose up -d --build
```

This will:
- Build the PHP/Apache application container
- Start MySQL database
- Start phpMyAdmin for database management
- Build and compile frontend assets with Vite

### 2. Setup Application
```bash
# Enter the app container
docker-compose exec app bash

# Generate app key (if not already set)
php artisan key:generate

# Run migrations
php artisan migrate --force

# Seed database (optional)
php artisan db:seed

# Exit container
exit
```

### 3. Access Services
- **Application**: http://localhost
- **phpMyAdmin**: http://localhost:8080
  - Username: `ecommerce_user`
  - Password: `secret123`
  - Database: `ecommerce`

## Common Commands

### View logs
```bash
docker-compose logs -f app
```

### Run Artisan commands
```bash
docker-compose exec app php artisan {command}
```

### Stop containers
```bash
docker-compose down
```

### Stop and remove all volumes
```bash
docker-compose down -v
```

### Rebuild containers
```bash
docker-compose down
docker-compose up -d --build
```

### Clear cache
```bash
docker-compose exec app php artisan cache:clear
docker-compose exec app php artisan config:clear
docker-compose exec app php artisan view:clear
docker-compose exec app php artisan route:clear
```

## Project Structure

```
├── Dockerfile          # Multi-stage build for production
├── docker-compose.yml  # Development environment setup
├── .dockerignore       # Files to exclude from Docker build
├── .dockerenv          # Example environment variables
└── app/               # Laravel application
```

## Environment Variables

Copy `.dockerenv` to `.env` and update with your configuration:
```bash
cp .dockerenv .env
```

Key variables:
- `DB_HOST=mysql` - Must match service name in docker-compose
- `DB_DATABASE=ecommerce` - Must match MYSQL_DATABASE
- `STRIPE_PUBLIC_KEY` / `STRIPE_SECRET_KEY` - Update with your Stripe keys

## Database Backups

### Backup database
```bash
docker-compose exec mysql mysqldump -u ecommerce_user -psecret123 ecommerce > backup.sql
```

### Restore database
```bash
docker-compose exec -T mysql mysql -u ecommerce_user -psecret123 ecommerce < backup.sql
```

## Production Deployment

For production, update the following in `docker-compose.yml`:
1. Change `APP_ENV=production` and `APP_DEBUG=false`
2. Generate a strong `APP_KEY`
3. Use environment-specific `.env` file
4. Configure external database if needed
5. Set up proper logging and monitoring
6. Use a reverse proxy (nginx/traefik) in front of Apache

## Troubleshooting

### Container fails to start
```bash
docker-compose logs app
```

### Database connection errors
- Ensure MySQL is running: `docker-compose ps`
- Check environment variables match docker-compose.yml
- Verify DB_HOST=mysql (not localhost)

### Permission errors
```bash
docker-compose exec app chmod -R 775 storage bootstrap/cache
```

### Asset compilation issues
```bash
docker-compose down
docker-compose up -d --build
```

## Development with Hot Reload

To enable Vite hot reload during development:
```bash
docker-compose exec app npm run dev
```

## Health Check

The container includes a health check that monitors the `/health` endpoint. View status:
```bash
docker-compose ps
```

## Security Notes

- Change default database passwords in `docker-compose.yml`
- Never commit `.env` with sensitive keys
- Keep Docker images updated
- Use secrets management for production
- Don't run containers with `--privileged` flag unless necessary
