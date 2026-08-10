# 🗳️ Online Voting System

A secure, responsive, and user-friendly **Online Voting System** built with **Laravel, Tailwind CSS, JavaScript, and MySQL**. The system is designed for **universities, colleges, and student unions** to manage digital elections efficiently, transparently, and securely.

## 🚀 Features

* 🔐 **Secure Authentication & Authorization**
* 👨‍💼 **Admin Dashboard**
* 🧑‍🎓 **Voter Registration & Management**
* 🗳️ **Online Voting**
* 👤 **Candidate Registration**
* ✅ **Candidate Approval by Admin**
* 🏫 **University/College Election Management**
* 🎓 **Student Union Elections**
* 📊 **Automatic Vote Counting**
* 📈 **Election Results**
* 🖼️ **Candidate Profile & Party Logo**
* 🛡️ **Middleware-Based Access Control**
* 📱 **Fully Responsive Design**
* 🎨 **Modern UI with Tailwind CSS**
* ⚡ **JavaScript-Based Interactive Components**
* 🔤 **Font Icons Integration**
* 🗄️ **MySQL Database**
* 🔒 **Validation and Session Management**

## 👥 User Roles

### 👨‍💼 Admin

* Manage voters and candidates
* Review candidate applications
* Approve or reject candidates
* Manage election information
* Monitor voting activities
* View and publish election results

### 🧑‍🎓 Candidate

* Register as a candidate
* Submit required information and documents
* Add party information and logo
* Check application status
* Participate in the election after admin approval

### 🗳️ Voter

* Create an account
* Login securely
* View eligible candidates
* View candidate profiles
* Cast a vote
* View election results

## 🛠️ Technologies Used

| Technology       | Purpose                            |
| ---------------- | ---------------------------------- |
| **Laravel**      | Backend framework                  |
| **PHP**          | Server-side programming            |
| **MySQL**        | Database management                |
| **Tailwind CSS** | Responsive UI design               |
| **JavaScript**   | Interactive functionality          |
| **Font Icons**   | UI icons                           |
| **Blade**        | Laravel templating                 |
| **Middleware**   | Authentication & role-based access |

## 🏗️ System Architecture

```text
                    ONLINE VOTING SYSTEM
                            │
             ┌──────────────┼──────────────┐
             │              │              │
           Admin         Candidate        Voter
             │              │              │
             └──────────────┼──────────────┘
                            │
                       Laravel Backend
                            │
                    Authentication
                     & Middleware
                            │
                       MySQL Database
                            │
                    Election Results
```

## 🔄 Election Workflow

```text
Voter/Candidate Registration
            ↓
     Candidate Applies
            ↓
       Admin Review
            ↓
    Candidate Approved
            ↓
      Election Begins
            ↓
        Voter Votes
            ↓
   Automatic Vote Counting
            ↓
     Election Results
```

## 📁 Project Structure

```text
online-voting-system/
│
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   └── Middleware/
│   └── Models/
│
├── database/
│   ├── migrations/
│   └── seeders/
│
├── resources/
│   ├── views/
│   ├── css/
│   └── js/
│
├── routes/
│   └── web.php
│
├── public/
│   └── uploads/
│
├── .env.example
├── composer.json
├── package.json
└── README.md
```

## ⚙️ Installation

### 1. Clone the Repository

```bash
git clone https://github.com/your-username/online-voting-system.git
cd online-voting-system
```

### 2. Install Laravel Dependencies

```bash
composer install
```

### 3. Install Frontend Dependencies

```bash
npm install
```

### 4. Create Environment File

```bash
cp .env.example .env
```

For Windows:

```bash
copy .env.example .env
```

### 5. Generate Application Key

```bash
php artisan key:generate
```

### 6. Configure Database

Update your `.env` file:

```env
DB_DATABASE=online_voting
DB_USERNAME=root
DB_PASSWORD=
```

Create the database in MySQL before running migrations.

### 7. Run Migrations

```bash
php artisan migrate
```

If seeders are available:

```bash
php artisan db:seed
```

### 8. Build Frontend Assets

```bash
npm run build
```

For development:

```bash
npm run dev
```

### 9. Start Laravel Server

```bash
php artisan serve
```

Open:

```text
http://127.0.0.1:8000
```

## 🔐 Security

The system uses Laravel's built-in security features and application-level controls, including:

* Authentication
* Authorization
* Middleware
* CSRF Protection
* Server-side Validation
* Password Hashing
* Session Management
* Role-Based Access Control

## 📱 Responsive Design

The interface is designed to work across:

* 💻 Desktop
* 💻 Laptop
* 📱 Mobile
* 📟 Tablet

Tailwind CSS is used to create a clean and responsive user interface.

## 🎯 Intended Use

This project can be adapted for:

* 🏫 Universities
* 🎓 Colleges
* 🧑‍🎓 Student Unions
* 🏛️ Campus Organizations
* 📚 Department-Level Elections
* 🗳️ Student Representative Elections

## 🔮 Future Improvements

* Email/SMS notifications
* Election scheduling
* Advanced analytics and charts
* Audit logs
* Two-factor authentication
* Digital voter verification
* Export election reports as PDF/Excel
* Multiple election support
* Improved accessibility
* Deployment with production-grade security

## 👨‍💻 Developer

**Bikesh Sutihar**

Laravel Developer | BCA Student

Developed as an academic/project-based **Online Voting System** for university, college, and student union elections.

## ⭐ Contributing

Contributions, suggestions, and improvements are welcome.

1. Fork the repository
2. Create a new branch
3. Make your changes
4. Commit your changes
5. Push to your branch
6. Create a Pull Request

## 📄 License

This project is developed for **educational and academic purposes**. You may modify and extend it according to your institution's requirements.
