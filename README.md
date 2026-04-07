<div align="center">

# ⚖️ El-Bably Law Firm

### البابلي للمحاماه والإستشارات القانونية

A professional bilingual (Arabic/English) law firm website with a full-featured admin panel for content management.

[![PHP](https://img.shields.io/badge/PHP-8.x-777BB4?logo=php&logoColor=white)](https://php.net)
[![MySQL](https://img.shields.io/badge/MySQL-8.0-4479A1?logo=mysql&logoColor=white)](https://mysql.com)
[![Bootstrap](https://img.shields.io/badge/Bootstrap-4.4-7952B3?logo=bootstrap&logoColor=white)](https://getbootstrap.com)
[![License](https://img.shields.io/badge/License-Private-red)]()

</div>

---

## 📋 Overview

El-Bably Law Firm website is a dynamic PHP/MySQL web application built for **Samir Abdel Rahman El-Bably** — Attorney at the Court of Cassation and the Supreme Constitutional Court. The firm was established in 1995 and has since represented major corporations, public figures, and high-profile legal cases across Egypt.

### ✨ Key Features

| Feature | Description |
|---------|-------------|
| 🏠 **Dynamic Homepage** | Carousel, team showcase, famous cases slider, and latest articles |
| 👥 **Team Management** | Add, edit, show/hide team members with photos and social links |
| 📂 **Case Portfolio** | Filterable case portfolio with isotope grid (Criminal, Commercial, State Council) |
| 📝 **Articles & Blog** | Publish legal articles with rich content and images |
| 📚 **Legal Library** | Categorized legal documents, cassation rulings, and defense rulings |
| 💬 **Contact & Messages** | Contact form with message management in admin panel |
| 🔐 **Admin Panel** | Secure dashboard for managing all site content |
| 📱 **Responsive Design** | Mobile-first design using Bootstrap 4 |

---

## 🛠️ Tech Stack

- **Backend:** PHP 8.x with MySQLi (OOP)
- **Database:** MySQL 8.0
- **Frontend:** HTML5, CSS3, JavaScript (jQuery)
- **UI Framework:** Bootstrap 4.4
- **Libraries:** Owl Carousel, Isotope.js, Font Awesome 5, Animate.css
- **Architecture:** MVC Pattern (Model → View → Controller)

---

## 📁 Project Structure

```
elbablylawfirm/
├── Admin/
│   ├── Controller/          # Request handlers (CRUD operations)
│   │   ├── ArticleController.php
│   │   ├── CaseController.php
│   │   ├── MemberController.php
│   │   ├── MessageController.php
│   │   └── loginController.php
│   ├── Model/               # Data access layer (MySQLi)
│   │   ├── Database.php     # Singleton DB connection
│   │   ├── Article.php
│   │   ├── Case.php
│   │   ├── Member.php
│   │   ├── Message.php
│   │   ├── Library.php
│   │   └── User.php
│   └── View/                # HTML rendering helpers
│       ├── ArticleView.php
│       ├── CaseView.php
│       └── MemberView.php
├── css/                     # Stylesheets
├── js/                      # JavaScript (main.js)
├── img/                     # Static images
├── lib/                     # Third-party libraries
│   ├── animate/
│   ├── easing/
│   ├── isotope/
│   └── owlcarousel/
├── uploads/                 # User-uploaded content
│   ├── emps/                # Team member photos
│   └── cases/               # Case images
├── index.php                # Homepage
├── portfolio.php            # Case portfolio with filtering
├── contact.php              # Contact page with form
├── about.php                # About the firm
├── team.php                 # Full team page
├── login.php                # Admin login
├── adminIndex.php           # Admin dashboard
├── config.php               # Database connection config
├── final.sql                # Database schema & seed data
└── README.md
```

---

## 🚀 Getting Started

### Prerequisites

- **PHP** 8.0 or higher
- **MySQL** 8.0 or higher
- **Web Server** (Apache, Nginx, or PHP built-in server)

### Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/rrazek/elbablylawfirm.git
   cd elbablylawfirm
   ```

2. **Create the database**
   ```bash
   mysql -u root -p -e "CREATE DATABASE final CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"
   mysql -u root -p final < final.sql
   ```

3. **Configure database credentials**
   
   Edit `Admin/Model/Database.php` and update the password:
   ```php
   private $PASSWORD = "your_mysql_password";
   ```

4. **Start the development server**
   ```bash
   php -S localhost:9000
   ```

5. **Open in browser**
   ```
   http://localhost:9000
   ```

---

## 🔑 Admin Panel

Access the admin panel at `/login.php` to manage:

- **Articles** — Create, edit, publish/unpublish, and delete legal articles
- **Cases** — Manage case portfolio with categories and images
- **Team Members** — Add/remove team members with bios and social links
- **Messages** — View and manage contact form submissions
- **Legal Library** — Upload and organize legal documents

---

## 📊 Database Schema

| Table | Purpose |
|-------|---------|
| `articles` | Legal blog articles |
| `cases` | Famous case portfolio |
| `members` | Team members |
| `messages` | Contact form submissions |
| `library` | Legal document library |
| `users` | Admin accounts |
| `state` | Status lookup (active/hidden) |
| `Case_Category` | Case type categories |
| `law_cat` | Law categories for library |

---

## 🌐 Pages

| Page | Route | Description |
|------|-------|-------------|
| Homepage | `/index.php` | Main landing page with all sections |
| About | `/about.php` | About the firm |
| Team | `/team.php` | Full team showcase |
| Portfolio | `/portfolio.php` | Filterable case portfolio |
| Services | `/services.php` | Legal services offered |
| Articles | `/blog.php` | All published articles |
| Contact | `/contact.php` | Contact info & form |
| Consultation | `/consult.php` | Free consultation request |

---

## 🤝 About the Firm

**El-Bably Law Firm** was founded in 1995 by **Samir Abdel Rahman Ahmed El-Bably**, Attorney at the Court of Cassation, Administrative and Supreme Constitutional Courts. Since 2002, the firm adopted an institutional structure by incorporating legal experts across multiple legal disciplines.

The firm has represented major corporations (both Egyptian and international), public figures, and prominent businessmen. Notable cases include the **"Battle of the Camel"** case and the **"Duweiqa"** disaster case.

**📍 Address:** 1 Mostafa Mahmoud Square, Giza, Egypt  
**📞 Phone:** (+02) 3305 9992  
**📱 Mobile:** (+20) 114 444 8781  
**📧 Email:** samir@elbablylawfirm.com

---

<div align="center">

**Built with ❤️ for El-Bably Law Firm**

</div>
