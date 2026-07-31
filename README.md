# 🗳️ VoteSecure — Online Voting System

A secure, web-based online voting system built with **Laravel** (backend), 
**Tailwind CSS** (styling), and **HTML/JavaScript** (frontend interactivity). 
Developed as a university project to demonstrate full-stack web development, 
authentication, and database-driven application design.

## ✨ Features
- 🔐 User authentication (register, login, logout) with session management
- 👤 Candidate listing with profiles
- ✅ Secure voting — one vote per authenticated user
- 📊 Live results page with vote counts
- 🎨 Clean, modern interface styled with Tailwind CSS
- ℹ️ About page explaining the voting process

## 🛠️ Built With
- **Backend:** Laravel (PHP)
- **Frontend:** Blade templates, HTML5, JavaScript
- **Styling:** Tailwind CSS
- **Database:** MySQL
- **Icons:** Font Awesome

## 🚀 Getting Started

### Prerequisites
- PHP 8.1+
- Composer
- Node.js & npm
- MySQL

### Installation
```bash
git clone https://github.com/YOUR_USERNAME/votesecure.git
cd votesecure

# Install PHP dependencies
composer install

# Install frontend dependencies
npm install

# Copy environment file and configure database
cp .env.example .env
php artisan key:generate
```

Update your `.env` file with database credentials:

### Run migrations and seed data
```bash
php artisan migrate --seed
```

### Build frontend assets
```bash
npm run dev
```

### Start the development server
```bash
php artisan serve
```

Visit `http://localhost:8000` in your browser.

## 📁 Project Structure

votesecure/
├── app/Http/Controllers/ # Auth, Candidate, Vote, Result controllers
├── resources/views/ # Blade templates (home, candidates, vote, results)
├── routes/web.php # Application routes
├── database/migrations/ # Users, candidates, votes tables
└── public/ # Compiled assets

## 🎓 Academic Context
This project was developed as part of a university coursework/final year 
project to demonstrate practical skills in:
- Full-stack web development with the MVC pattern
- User authentication and session handling
- CRUD operations with a relational database


## ⚠️ Disclaimer
This is an educational project and is **not intended for use in real, 
official elections**. It does not implement production-grade security 
measures (e.g. end-to-end encryption, blockchain verification, or 
formal election-integrity auditing) required for real-world voting systems.

## 📌 Future Improvements
- Email verification on registration
- Admin dashboard for managing candidates/elections
- Vote result charts/graphs
- Multi-election support

## 📄 License
This project is open source and available for educational purposes.




<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

