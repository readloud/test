### **1. Setup Project**

```bash
composer create-project laravel/laravel hp-service
cd hp-service
composer require laravel/breeze
php artisan breeze:install blade
npm install
npm install tailwindcss postcss autoprefixer alpinejs

### **2. Install & Run**

```bash
# Install dependencies
composer install
npm install

# Setup environment
cp .env.example .env
php artisan key:generate

# Configure database in .env file
php artisan migrate --seed

# Create storage link
php artisan storage:link

# Create admin user
php artisan make:filament-user
# or use default breeze registration

# Build assets
npm run build

# Run server
php artisan serve
```

### **Fitur Lengkap Yang Tersedia:**

✅ **Frontend:**
- Hero section dinamis
- Galeri dengan tab (HP, Aksesoris, Sparepart, Alat Kerja, Proses)
- Testimoni dengan rating
- Form kontak
- WhatsApp floating button
- Responsive design
- Smooth scroll navigation

✅ **Admin Dashboard:**
- CRUD Galeri (upload foto)
- CRUD Testimoni (approve/pending)
- Pengaturan website (kontak, sosmed, hero text)
- Dashboard statistik

✅ **Database:**
- Gallery table (dengan kategori device type)
- Testimonial table (dengan rating & approval)
- Settings table
- Categories table

✅ **Keamanan:**
- Authentication middleware
- CSRF protection
- Input validation