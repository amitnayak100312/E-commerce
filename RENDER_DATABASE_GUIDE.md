# How to Connect a Database in Render

## Overview

Render offers managed MySQL databases that integrate seamlessly with your applications. This guide covers creating, configuring, and connecting to a MySQL database on Render.

## Step 1: Create a MySQL Database on Render

### Create New Database Service

1. Go to [Render Dashboard](https://dashboard.render.com)
2. Click **"New +"** button in top-right
3. Select **"MySQL"** from the dropdown

### Configure Database Settings

Fill in the following details:

| Setting | Value | Example |
|---------|-------|---------|
| **Name** | Service name | `ecommerce-db` |
| **Database** | Database name | `ecommerce` |
| **User** | Database username | `ecommerce_user` |
| **Password** | Strong password | Generate random |
| **Region** | Same as your app | `Oregon (us-west)` |
| **IPV4** | Enable if needed | Leave default |
| **Billing Plan** | Free or Starter | Start with Starter ($15/mo) |

### Save Configuration

Click **"Create Database"**

The database will be created in 2-3 minutes. You'll see a status page with connection details.

## Step 2: Get Database Connection Details

Once created, you'll see the **"Connections"** section with these details:

```
Host: mysql-xxxxxxxxxxxx.render.com
Port: 3306
Database: ecommerce
User: ecommerce_user
Password: your_secure_password
```

### Connection String Examples

**MySQL Connection String:**
```
mysql://ecommerce_user:your_secure_password@mysql-xxxxxxxxxxxx.render.com:3306/ecommerce
```

**For Laravel (.env):**
```
DB_CONNECTION=mysql
DB_HOST=mysql-xxxxxxxxxxxx.render.com
DB_PORT=3306
DB_DATABASE=ecommerce
DB_USERNAME=ecommerce_user
DB_PASSWORD=your_secure_password
```

## Step 3: Connect Your Web Service to Database

### Option A: Via Render Dashboard (Recommended)

1. Go to your **Web Service**
2. Click **"Environment"** tab
3. Add these environment variables:

```
DB_CONNECTION=mysql
DB_HOST=mysql-xxxxxxxxxxxx.render.com
DB_PORT=3306
DB_DATABASE=ecommerce
DB_USERNAME=ecommerce_user
DB_PASSWORD=your_secure_password
```

4. Click **"Save Changes"**
5. Your service will redeploy automatically

### Option B: Via .env File

Create/update `.env` in your Laravel root:

```env
DB_CONNECTION=mysql
DB_HOST=mysql-xxxxxxxxxxxx.render.com
DB_PORT=3306
DB_DATABASE=ecommerce
DB_USERNAME=ecommerce_user
DB_PASSWORD=your_secure_password
```

**Important**: Never commit `.env` to Git. Use Render's environment variable system instead.

## Step 4: Run Database Migrations

After connecting, you need to set up your database schema.

### Method 1: Via Render Web Service Shell (Easiest)

1. Go to your Web Service dashboard
2. Click **"Shell"** tab at the top
3. Run the following commands:

```bash
# Run migrations
php artisan migrate --force

# Seed database (optional)
php artisan db:seed --force

# Check status
php artisan db:show
```

### Method 2: Add to Dockerfile (Auto-run on Deploy)

Update your `Dockerfile` to run migrations automatically:

```dockerfile
# Add this before the final CMD line
RUN echo '#!/bin/bash' > /start-server.sh && \
    echo 'php artisan migrate --force || true' >> /start-server.sh && \
    echo 'php artisan db:seed --force || true' >> /start-server.sh && \
    echo 'apache2-foreground' >> /start-server.sh && \
    chmod +x /start-server.sh

CMD ["/start-server.sh"]
```

### Method 3: Manual via SSH/Remote Access

```bash
# From your local machine
mysql -h mysql-xxxxxxxxxxxx.render.com \
      -u ecommerce_user \
      -p your_secure_password \
      ecommerce < migrations.sql
```

## Step 5: Verify Database Connection

### Test Connection via Web Service Shell

1. Open Web Service **"Shell"**
2. Test the connection:

```bash
# Test MySQL connection
mysql -h $DB_HOST -u $DB_USERNAME -p$DB_PASSWORD -e "SELECT 1;"

# Output should show:
# +---+
# | 1 |
# +---+
# | 1 |
# +---+
```

### Check Database in Laravel

```bash
# Via Render shell
php artisan tinker

# Inside tinker
>>> DB::connection()->getPdo();
// Should return a PDO object without error

>>> DB::table('users')->count();
// Should return number of users
```

## Connect to Database Locally (For Testing)

### Using MySQL Workbench

1. Download [MySQL Workbench](https://www.mysql.com/products/workbench/)
2. Create new connection:
   - **Connection Name**: `Render-Ecommerce`
   - **Hostname**: `mysql-xxxxxxxxxxxx.render.com`
   - **Port**: `3306`
   - **Username**: `ecommerce_user`
   - **Password**: Click "Store in Vault" → enter your password
3. Click **"Test Connection"**
4. Click **"OK"**

### Using Command Line (Windows)

```bash
# Install MySQL client for Windows if needed
mysql -h mysql-xxxxxxxxxxxx.render.com -u ecommerce_user -p

# Enter password when prompted
# You should see: mysql>

# List databases
SHOW DATABASES;

# Use database
USE ecommerce;

# Show tables
SHOW TABLES;

# Exit
EXIT;
```

### Using VS Code

1. Install **MySQL Extension** by cweijan
2. Click **"MySQL"** icon in sidebar
3. Click **"+"** to add connection
4. Fill in:
   - **Host**: `mysql-xxxxxxxxxxxx.render.com`
   - **User**: `ecommerce_user`
   - **Password**: Your password
   - **Port**: `3306`
5. Right-click connection → **"Open in Terminal"**

## Important Security Notes

### 1. Strong Passwords

Render generates strong passwords. Use them as-is:
- Minimum 16 characters
- Mix of letters, numbers, special characters
- Change only if compromised

### 2. Environment Variables

**NEVER hardcode credentials in code**

Always use:
```php
// ✅ CORRECT - Use env()
$host = env('DB_HOST');
$password = env('DB_PASSWORD');

// ❌ WRONG - Never hardcode
$host = 'mysql-xxxxxxxxxxxx.render.com';
$password = 'my-password';
```

### 3. IP Whitelisting

By default, Render databases accept connections from:
- Your Web Service (same account)
- Any IP address

To restrict access:
1. Database Settings → **"Connections"**
2. Add IP whitelist (if available on your plan)

### 4. Backup Strategy

Render provides automatic backups:
- **Free Tier**: Minimal backups
- **Paid Plans**: Daily backups, 7-day retention

Enable automatic backups:
1. Database Settings → **"Backups"**
2. Enable automatic backups
3. Adjust retention period

## Troubleshooting Connection Issues

### Error: "Access Denied for user 'ecommerce_user'"

**Solution:**
```bash
# Check credentials in environment variables
# Render Dashboard → Web Service → Environment

# Verify format: mysql://user:pass@host:port/database
# Make sure @ is not in password (if it is, URL encode as %40)
```

### Error: "Connection Timeout"

**Solutions:**
1. **Check database is running**: Database dashboard should show "Available"
2. **Verify hostname**: Copy-paste exact hostname from Render
3. **Check network**: Ensure web service and database in same region
4. **Wait for database**: Sometimes takes 2-3 minutes to be ready

### Error: "Unknown Database 'ecommerce'"

**Solution:**
```bash
# Database name is case-sensitive
# In Laravel .env, use exact database name:
DB_DATABASE=ecommerce  # Lowercase, matches what you entered
```

### Intermittent Connection Issues

**Solutions:**
1. Add connection pooling to Laravel:
```php
// config/database.php
'mysql' => [
    'driver' => 'mysql',
    'host' => env('DB_HOST'),
    'database' => env('DB_DATABASE'),
    'username' => env('DB_USERNAME'),
    'password' => env('DB_PASSWORD'),
    'charset' => 'utf8mb4',
    'collation' => 'utf8mb4_unicode_ci',
    'options' => [
        PDO::ATTR_PERSISTENT => false,
        PDO::ATTR_TIMEOUT => 5,
    ],
],
```

2. Increase web service plan (more resources)
3. Contact Render support if persists

### "MySQL Server has gone away"

This usually means idle connection was closed.

**Fix in Laravel:**
```php
// config/database.php
'mysql' => [
    // ... other config ...
    'strict' => true,
    'engine' => null,
],

// OR use connection retry middleware
```

## Database Management

### Create Tables (Migrations)

```bash
# Via Web Service shell
php artisan make:migration create_products_table
php artisan migrate --force
```

### Backup Database

### Method 1: Via Render Dashboard

1. Go to MySQL Database service
2. Click **"Backups"** tab
3. Click **"Create Backup"**
4. Wait for completion
5. Download backup file

### Method 2: Via Command Line

```bash
# From your local machine
mysqldump -h mysql-xxxxxxxxxxxx.render.com \
          -u ecommerce_user \
          -p your_secure_password \
          ecommerce > ecommerce_backup.sql

# File size will show after download completes
```

### Restore Database

```bash
# Restore from SQL file
mysql -h mysql-xxxxxxxxxxxx.render.com \
      -u ecommerce_user \
      -p your_secure_password \
      ecommerce < ecommerce_backup.sql
```

### Delete Database

⚠️ **WARNING: This cannot be undone**

1. Go to MySQL Database service
2. Click **"Settings"** tab
3. Scroll to bottom → **"Delete Service"**
4. Type service name to confirm
5. Click **"Delete"**

## Monitor Database Performance

### View Database Metrics

1. Go to MySQL Database service dashboard
2. Check **"Metrics"** tab:
   - **CPU Usage**: Should be < 80%
   - **Memory Usage**: Should be < 80%
   - **Disk Usage**: Monitor for growth
   - **Connections**: Current active connections

### Optimize for Performance

```bash
# Add indexes for faster queries
php artisan tinker

>>> DB::statement('ALTER TABLE products ADD INDEX idx_category_id (category_id)');
>>> DB::statement('ALTER TABLE orders ADD INDEX idx_user_id (user_id)');
```

### View Slow Queries

```bash
# In Web Service shell
mysql -h $DB_HOST -u $DB_USERNAME -p$DB_PASSWORD -e "
  SELECT * FROM mysql.slow_log WHERE query_time > 1;
"
```

## Upgrade/Downgrade Database Plan

1. Go to MySQL Database service
2. Click **"Settings"** tab
3. Under **"Billing"** → **"Plan"**
4. Select new plan
5. Click **"Upgrade/Downgrade"**
6. Confirm changes

**Note**: May cause brief downtime (30 seconds - 2 minutes)

## Database Replication (Advanced)

For high availability, create read replicas:

1. Main Database → **"Settings"**
2. Click **"Create Replica"**
3. Configure replica settings
4. Update Laravel config to use read replicas:

```php
// config/database.php
'mysql' => [
    'write' => [
        'host' => env('DB_WRITE_HOST'),
    ],
    'read' => [
        ['host' => env('DB_READ_HOST_1')],
        ['host' => env('DB_READ_HOST_2')],
    ],
],
```

## Useful MySQL Commands

```sql
-- Show all databases
SHOW DATABASES;

-- Use specific database
USE ecommerce;

-- Show all tables
SHOW TABLES;

-- Show table structure
DESCRIBE products;
SHOW COLUMNS FROM products;

-- Show table size
SELECT 
  TABLE_NAME, 
  (DATA_LENGTH + INDEX_LENGTH) / 1024 / 1024 AS SIZE_MB
FROM INFORMATION_SCHEMA.TABLES
WHERE TABLE_SCHEMA = 'ecommerce';

-- Show current connections
SHOW PROCESSLIST;

-- Kill long-running query
KILL QUERY [query_id];

-- Check database size
SELECT 
  SUM(DATA_LENGTH + INDEX_LENGTH) / 1024 / 1024 AS DATABASE_SIZE_MB
FROM INFORMATION_SCHEMA.TABLES
WHERE TABLE_SCHEMA = 'ecommerce';
```

## Summary Checklist

- [ ] MySQL database created on Render
- [ ] Connection details copied (host, user, password, database)
- [ ] Environment variables added to Web Service
- [ ] Migrations run successfully
- [ ] Connection tested via Web Service shell
- [ ] Data seeded (if applicable)
- [ ] Backups configured
- [ ] Local connection tested (optional)
- [ ] Security settings reviewed
- [ ] Monitoring alerts set up

## Next Steps

1. Create MySQL database on Render
2. Copy connection details
3. Add to Web Service environment variables
4. Deploy or redeploy service
5. Run migrations
6. Verify connection
7. Test application features

## Resources

- [Render MySQL Documentation](https://render.com/docs/mysql)
- [MySQL Manual](https://dev.mysql.com/doc/)
- [Laravel Database Configuration](https://laravel.com/docs/database)
- [MySQL Workbench Download](https://www.mysql.com/products/workbench/)

Need help? Contact Render support or check the [Render Community](https://render.com/community).
