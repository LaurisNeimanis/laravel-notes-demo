# Laravel Notes Demo

A minimal Laravel 12 application demonstrating how to create a simple notes management interface with authentication, Tailwind CSS, and Livewire components. Perfect for showcasing Laravel development skills, UI components, and routing best practices.

## Features

- 🔹 Laravel 12 with Breeze authentication
- 🔹 Dashboard and Notes pages using Blade components
- 🔹 Livewire + Alpine.js integration
- 🔹 Tailwind CSS for responsive UI
- 🔹 Dark mode ready classes
- 🔹 Organized route groups with middleware (`auth`, `verified`)

## Getting Started

### Prerequisites

- PHP 8.2+
- Composer
- Database: MySQL, MariaDB, or SQLite
- Node.js & npm (for front-end build)
- Git

### Installation

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

   This will create a demo user you can use to log in:

   - **Email:** `demo@example.com`  
   - **Password:** `demo123`

5. **Start the development server**
   ```bash
   php artisan serve
   ```

6. **Access the app**
   - Register or log in with the demo credentials above
   - Visit `/dashboard` and `/notes`

---

## Project Structure

```
README.md
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
└── web.php
```

---

## Extend & Customize

- Add full CRUD for notes with Livewire
- Include database persistence
- Add search and filtering functionality
- Implement dark mode toggle with Alpine.js

---

## License

This project is open-source and available under the MIT License.

---

🔗 **Back to portfolio:** [My Portfolio](https://github.com/LaurisNeimanis/my-portfolio)
