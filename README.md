# Laravel Notes Demo  
[![Laravel Tests](https://github.com/LaurisNeimanis/laravel-notes-demo/actions/workflows/laravel-tests.yml/badge.svg)](https://github.com/LaurisNeimanis/laravel-notes-demo/actions/workflows/laravel-tests.yml) 
![Laravel](https://img.shields.io/badge/Laravel-12-red?logo=laravel)
![Livewire](https://img.shields.io/badge/Livewire-Volt-blue)
![TailwindCSS](https://img.shields.io/badge/TailwindCSS-3-blue?logo=tailwind-css)
![PHP](https://img.shields.io/badge/PHP-8.2-blue?logo=php)
![MySQL](https://img.shields.io/badge/MySQL-Database-yellow?logo=mysql)

A minimal **Laravel 12** application demonstrating how to create a simple **notes management system** with **authentication**, **Tailwind CSS**, and **Livewire (Volt Class API)**. Perfect for showcasing Laravel development skills, UI components, and modern front-end integrations.

---

## ✅ Features  

🔹 **Laravel 12** with Breeze authentication (email/password)  
🔹 **Notes management** with full CRUD using Livewire (Volt Class API)  
🔹 **Reusable Blade components** for forms and layouts  
🔹 **Tailwind CSS** for responsive design  
🔹 **Modal-based UI** for create/edit actions  
🔹 Organized route groups with `auth` and `verified` middleware  
🔹 **Demo user seeded** for quick testing  
🔹 Dark mode ready classes  
🔹 **Continuous Integration with GitHub Actions** (automated tests)  

---

## 🚀 Getting Started  

### ✅ Prerequisites  
- PHP 8.2+  
- Composer  
- MySQL / MariaDB / SQLite  
- Node.js & npm  
- Git  

---

### 🔧 Installation  

1. **Clone the repository**
   ```bash
   git clone https://github.com/LaurisNeimanis/laravel-notes-demo.git
   cd laravel-notes-demo
   ```

2. **Install dependencies**
   ```bash
   composer install
   npm install
   npm run build
   ```

3. **Configure environment**
   ```bash
   cp .env.example .env
   php artisan key:generate
   # Update .env with DB credentials
   ```

4. **Run migrations & seed demo user**
   ```bash
   php artisan migrate --seed
   ```
   ✅ Demo user credentials:
   ```
   Email: test@example.com
   Password: password123
   ```

   *(For a full reset during development: `php artisan migrate:fresh --seed`)*  

5. **Start development server**
   ```bash
   php artisan serve
   ```

6. **Access the app**
   - Login with demo credentials or register
   - Visit `/dashboard` and `/notes`

---

## ✅ Automated Tests  
- Feature tests for Notes CRUD using **Livewire test utilities**
- Integrated with **GitHub Actions** for continuous integration

Run locally:
```bash
php artisan test
```

---

## 📂 Project Structure 

```
README.md
.env.example
database/
├── seeders/
│   └── DatabaseSeeder.php
└── migrations/
    └── 2025_07_27_162059_create_notes_table.php
app/
├── Models/
│   └── Note.php
├── View/
│   └── Components/
│       └── TextArea.php
└── Livewire/
    └── Notes/
        └── Manager.php
resources/views/
├── notes.blade.php
├── components/
│   └── text-area.blade.php
├── livewire/
│   ├── notes/
│   │   └── manager.blade.php
│   └── layout/
│       └── navigation.blade.php
routes/
├── web.php
tests/Feature/
├──NotesCrudTest.php
.github\workflows\
└──laravel-tests.yml
```

---

## 🔍 Extend & Customize  
- Add **search and filtering** for notes  
- Implement **pagination and sorting**  
- Add **dark mode toggle** with Alpine.js  
- Enhance **form validation and error messages**  

---

## ✅ License  
This project is open-source and available under the **MIT License**.

---

🔗 **Back to portfolio:** [My Portfolio](https://github.com/LaurisNeimanis/my-portfolio)
