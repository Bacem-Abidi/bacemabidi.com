# bacemabidi<span>.com</span>

![License](https://img.shields.io/badge/license-MIT-blue.svg)
![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=flat&logo=laravel&logoColor=white)
![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=flat&logo=tailwind-css&logoColor=white)

Welcome to my **Portfolio** repository! This project is built using **Laravel** and **Tailwind CSS**. It serves as a showcase of my skills, projects, and professional journey.

---

## ✨ Features

-   **Responsive Design**: Built with Tailwind CSS for a fully responsive and modern UI.
-   **Dynamic Content**: Powered by Laravel for dynamic content management.
-   **More Coming...**: Stay tuned for additional features like a project showcase, blog section, and contact form.
    <!-- - **Project Showcase**: Display my projects with details like descriptions, technologies used, and live demos. -->
    <!-- - **Blog Section**: A blog to share insights, tutorials, and updates. -->
    <!-- - **Contact Form**: Integrated contact form for easy communication. -->
    <!-- - **SEO Optimized**: Meta tags, Open Graph, and structured data for better search engine visibility. -->

---

## 📚 Tech Stack

-   **Framework**: Laravel (PHP)
-   **Styling**: Tailwind CSS
-   **Database**: MySQL
    <!-- - **Version Control**: Git -->
    <!-- - **Deployment**: Vercel, Netlify, or any Laravel-compatible hosting -->

---

## 🚀 How to Run

Follow these steps to set up the project locally:

### Prerequisites

-   **PHP** >= 8.0
-   **Composer**
-   **Node.js** and **npm**
-   **MySQL** or any other supported database
-   **XAMPP** Installed and running _(ensure PHP is added to your system PATH)_.

### Steps

1. **Clone the repository into the `htdocs` folder**:

    - Navigate to the `htdocs` directory in your XAMPP installation _(usually located at `C:\xampp\htdocs` on Windows or `/opt/lampp/htdocs` on Linux/Mac)_.
    - Clone the repository:

    ```bash
    git clone https://github.com/Bacem-Abidi/bacemabidi.com.git
    cd bacemabidi.com
    ```

2. **Install dependencies**:
    ```bash
    composer install
    npm install
    ```
3. **Create a new database in MySQL**:

    Open phpMyAdmin _(usually accessible at http://localhost/phpmyadmin)_.

    Create a new database _(e.g., abidibacem)_.

4. **Configure the .env file**:

    - **Copy the `.env.example` file to `.env`**:

    ```bash
    cp .env.example .env
    ```

    - **Open the `.env` file and update the database configuration**:

    ```php
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=bacemabidi
    DB_USERNAME=root
    DB_PASSWORD=
    ```

5. **php artisan key:generate**:
    ```bash
    php artisan key:generate
    ```
6. **php artisan key:generate**:
    ```bash
    php artisan migrate
    ```
7. **Run the Tailwind development server**:
    ```bash
    npm run dev
    ```
8. **Start the Laravel development server**:
    ```bash
    php artisan serve
    ```
9. **Start the server from xampp and navigate to** http://localhost/bacemabidi.com/public
