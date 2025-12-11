# Deploy to Render - Complete Guide

## Prerequisites
- Render account (https://render.com)
- GitHub repository with your Laravel project
- GitHub account connected to Render

## Step-by-Step Deployment

### Step 1: Prepare Your Repository

1. **Commit all changes**
```bash
git add .
git commit -m "Prepare for Render deployment"
git push origin main
```

2. **Ensure `.gitignore` is correct** - Make sure these are ignored:
```
node_modules/
vendor/
.env
.env.*.local
storage/logs/*
bootstrap/cache/*
.phpunit.cache
```

3. **Create `.env.example`** if not exists (Render uses this as template):
```bash
cp .env .env.example
```

Edit `.env.example` to remove sensitive values:
```
APP_NAME="E-Commerce"
APP_ENV=production
APP_KEY=
APP_DEBUG=false
APP_URL=https://your-app.onrender.com

DB_CONNECTION=mysql
DB_HOST=
DB_PORT=3306
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=

STRIPE_PUBLIC_KEY=
STRIPE_SECRET_KEY=
```

### Step 2: Create Render Web Service

1. Go to [Render Dashboard](https://dashboard.render.com)
2. Click **"New +"** → **"Web Service"**
3. Connect your GitHub repository
4. Select the repository containing your Laravel app

### Step 3: Configure Web Service Settings

**Basic Settings:**
- **Name**: `ecommerce-app` (or your preferred name)
- **Environment**: `Docker`
- **Region**: Choose closest to your users
- **Branch**: `main`

**Build Settings:**
- **Build Command**: Leave empty (uses Dockerfile)
- **Start Command**: Leave empty (uses Dockerfile)

### Step 4: Add Environment Variables

Click **"Advanced"** and add these environment variables:

```
APP_KEY=base64:YOUR_APP_KEY_HERE
APP_ENV=production
APP_DEBUG=false
APP_URL=https://your-app-name.onrender.com

DB_CONNECTION=mysql
DB_HOST=your-db-host.render.com
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_db_user
DB_PASSWORD=your_secure_password

STRIPE_PUBLIC_KEY=pk_live_your_key
STRIPE_SECRET_KEY=sk_live_your_key

LOG_CHANNEL=single
CACHE_DRIVER=file
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
```

### Step 5: Create MySQL Database on Render

1. In Render Dashboard, click **"New +"** → **"MySQL"**
2. Configure:
   - **Name**: `ecommerce-db`
   - **Database Name**: `ecommerce`
   - **User**: `ecommerce_user`
   - **Region**: Same as web service
   - **Billing Plan**: Choose appropriate plan

3. Copy the connection details and update your Web Service environment variables

### Step 6: Deploy

1. Click **"Create Web Service"**
2. Render will automatically build and deploy
3. Monitor the deployment in the **"Logs"** tab
4. Once deployed, you'll get a URL like `https://ecommerce-app.onrender.com`

### Step 7: Run Migrations

After first deployment:

1. Go to your Render Web Service
2. Click **"Shell"** tab to access the container terminal
3. Run:
```bash
php artisan migrate --force
php artisan db:seed --force
```

4. Or create a custom build command in your Dockerfile to auto-run migrations:

**Update Dockerfile** (add before `CMD ["apache2-foreground"]`):
```dockerfile
# Run migrations on startup if needed
RUN echo '#!/bin/bash' > /usr/local/bin/docker-entrypoint.sh && \
    echo 'php artisan migrate --force || true' >> /usr/local/bin/docker-entrypoint.sh && \
    echo 'apache2-foreground' >> /usr/local/bin/docker-entrypoint.sh && \
    chmod +x /usr/local/bin/docker-entrypoint.sh

ENTRYPOINT ["/usr/local/bin/docker-entrypoint.sh"]
```

## Troubleshooting

### Application Won't Start

Check logs:
1. Go to Render Dashboard → Your Service
2. Click **"Logs"** tab
3. Look for error messages

Common issues:
- **APP_KEY not set**: Generate with `php artisan key:generate`
- **Database connection failed**: Verify DB credentials and host
- **Migration errors**: Check database permissions

### Database Connection Issues

1. Verify database is running in Render
2. Check `DB_HOST` format (should be MySQL service hostname)
3. Ensure firewall allows connections from Web Service
4. Test connection in Web Service shell:
```bash
mysql -h $DB_HOST -u $DB_USERNAME -p$DB_PASSWORD -e "SELECT 1;"
```

### Out of Memory

Increase plan resources:
1. Service Settings → Instance Type
2. Choose higher tier plan

### Timeout During Deployment

If build takes too long:
1. Optimize Docker build in Dockerfile
2. Consider Multi-stage build (already implemented)
3. Remove unnecessary dependencies

## Continuous Deployment

Render automatically deploys when you push to your connected branch:

```bash
# Push to trigger automatic deployment
git push origin main
```

To disable auto-deploy:
1. Service Settings → Auto-Deploy → Toggle OFF
2. Deploy manually via **"Manual Deploy"** button

## Database Backups

### Backup from Render

1. Go to MySQL Database service
2. Click **"Backups"** tab
3. Click **"Create Backup"**

### Restore Backup

1. Click restore button next to backup
2. Choose destination database
3. Confirm (this will replace current data)

### Manual Backup via Shell

```bash
# From Web Service shell
mysqldump -h $DB_HOST -u $DB_USERNAME -p$DB_PASSWORD $DB_DATABASE > backup.sql

# Download the file through Render file manager
```

## Custom Domain Setup

1. Go to Web Service settings
2. Under **"Custom Domains"** → **"Add Custom Domain"**
3. Enter your domain (e.g., `shop.yourdomain.com`)
4. Add DNS records as shown by Render
5. Wait for SSL certificate (automatic)

## Performance Tips

### 1. Enable Caching
Update `.env` on Render:
```
CACHE_DRIVER=redis
SESSION_DRIVER=redis
```

Add Redis service and connect (requires higher tier)

### 2. Optimize Images
- Compress product images before upload
- Use CDN for static assets (Cloudinary, AWS S3)

### 3. Database Optimization
- Add indexes on frequently queried columns
- Use pagination for product lists
- Cache database queries

### 4. Asset Optimization
In `docker-compose.yml` or Dockerfile, ensure:
```bash
npm run build  # Minify JS/CSS
php artisan optimize
php artisan config:cache
php artisan route:cache
```

## SSL/HTTPS

Render automatically provides:
- Free SSL certificate
- Auto-renewal
- HTTPS by default

No additional configuration needed.

## Environment Variables Security

**Never commit `.env` file**

Use Render's environment variable management:
1. Service Settings → Environment
2. Add variables one by one
3. Use for sensitive data only

## Monitoring

### View Logs
```bash
# In Render dashboard → Logs
```

### Enable Application Logging
Update `config/logging.php` or `.env`:
```
LOG_CHANNEL=single
LOG_LEVEL=debug
```

### Monitor Performance
- Check instance metrics in Service Settings
- Monitor database usage in MySQL service
- Set up alerts for high resource usage

## Scaling

As traffic grows:

1. **Vertical Scaling**: Increase instance size
   - Service Settings → Instance Type
   - Choose Pro/Premium plan

2. **Database Scaling**: Upgrade MySQL plan
   - Database Settings → Change Plan

3. **Add Redis Cache**: For session/cache layer
   - Separate Redis service
   - Update configuration

## Deployment Checklist

- [ ] GitHub repository is public or Render has access
- [ ] `.env.example` is updated and committed
- [ ] `.gitignore` includes sensitive files
- [ ] Dockerfile builds successfully locally
- [ ] Database migrations are tested
- [ ] APP_KEY is generated and unique
- [ ] All environment variables are set in Render
- [ ] MySQL database is created and accessible
- [ ] First migration runs successfully
- [ ] Application loads at the Render URL
- [ ] SSL/HTTPS is working
- [ ] Email notifications are configured (if needed)
- [ ] File uploads are tested

## Rollback to Previous Version

1. Go to Render Dashboard
2. Click on your Web Service
3. Go to **"Deployments"** tab
4. Find previous deployment
5. Click **"Redeploy"**

## Support & Resources

- [Render Documentation](https://render.com/docs)
- [Render Pricing](https://render.com/pricing)
- [Laravel Deployment Guide](https://laravel.com/docs/deployment)
- [Docker on Render](https://render.com/docs/docker)

## Cost Estimation

**Free Tier**:
- Limited to one service
- Services spin down after inactivity
- 0.5GB RAM

**Paid Plans**:
- Web Service: $7+/month
- MySQL Database: $7+/month
- Total estimated: $14+/month for production

## Next Steps

1. Create Render account
2. Connect GitHub repository
3. Set up Web Service with Dockerfile
4. Create MySQL database
5. Configure environment variables
6. Deploy and test
7. Run migrations
8. Set up custom domain
9. Monitor logs
10. Set up alerts

## Useful Commands

```bash
# Generate app key for production
php artisan key:generate

# Optimize application
php artisan optimize

# Clear all caches
php artisan cache:clear

# Compile production assets
npm run build

# Check application status (via shell)
php artisan status
```

Happy deploying! 🚀
