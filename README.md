# English

## About The Project

This project is a complete blog platform developed using the Laravel framework. It functions as a Content Management System (CMS) where administrators can manage posts, categories, users, and access levels, while the public can read articles and interact with them.

The main goal is to provide a robust, secure, and scalable foundation for a modern blog, featuring:
*   A public-facing front-end for readers.
*   A secure administration panel for content creators and managers.
*   A role-based permission system to define different levels of user access.

---

## Features

-   **Admin Panel:** A complete dashboard to manage all aspects of the blog.
-   **User Management:** Full CRUD for users.
-   **Roles and Permissions:** Granular control over user actions using the `spatie/laravel-permission` package.
-   **Post Management:** Full CRUD for blog posts, including associations with categories and tags.
-   **Category Management:** Full CRUD for content categories.
-   **Image Uploads:** Support for uploading images with automatic background resizing.
-   **Comments:** Functionality for users to comment on posts.
-   **Authentication:** Secure authentication system provided by Laravel Fortify.
-   **Frontend:** Asset bundling handled by Vite.

---

## Prerequisites

-   PHP >= 8.1
-   Composer
-   Node.js & npm
-   A database (e.g., MySQL, MariaDB)
-   A web server (e.g., Apache, Nginx) or use the local Laravel server.

---

## Installation

1.  **Clone the repository:**
    ```bash
    git clone <your-repository-url>
    cd blog
    ```

2.  **Install PHP dependencies:**
    ```bash
    composer install
    ```

3.  **Install JavaScript dependencies:**
    ```bash
    npm install
    ```

4.  **Create the environment file:**
    ```bash
    cp .env.example .env
    ```

5.  **Generate the application key:**
    ```bash
    php artisan key:generate
    ```

6.  **Configure your `.env` file:**
    Update the database connection details (`DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`, etc.).

7.  **Run database migrations and seeders:**
    This will create the necessary tables and populate the initial data (roles, permissions, etc.).
    ```bash
    php artisan migrate --seed
    ```

8.  **Create the storage link:**
    This makes the `storage/app/public` directory accessible from the web.
    ```bash
    php artisan storage:link
    ```

---

## Running the Application

1.  **Start the development server:**
    ```bash
    php artisan serve
    ```

2.  **Compile frontend assets:**
    In a separate terminal, run the Vite development server for hot-reloading.
    ```bash
    npm run dev
    ```

The application will be available at `http://127.0.0.1:8000`.

---

## Running Tests

To run the test suite, execute the following command:

```bash
php artisan test
```

---

## Built With

-   [Laravel](https://laravel.com/)
-   [PHP](https://www.php.net/)
-   [MySQL](https://www.mysql.com/)
-   [Vite](https://vitejs.dev/)
-   [Tailwind CSS](https://tailwindcss.com/)
-   [Livewire](https://laravel-livewire.com/)
-   [Spatie Laravel Permission](https://spatie.be/docs/laravel-permission/v6/introduction)

---
---

# Español

## Sobre el Proyecto

Este proyecto es una plataforma de blog completa desarrollada con el framework Laravel. Funciona como un Sistema de Gestión de Contenidos (CMS) donde los administradores pueden gestionar publicaciones, categorías, usuarios y niveles de acceso, mientras que los usuarios públicos pueden leer los artículos e interactuar con ellos.

El objetivo principal es proporcionar una base sólida, segura y escalable para un blog moderno, incluyendo:
*   Un sitio público para los lectores.
*   Un panel de administración seguro para los creadores y gestores de contenido.
*   Un sistema de permisos basado en roles para definir diferentes niveles de acceso de usuario.

---

## Características

-   **Panel de Administración:** Un dashboard completo para gestionar todos los aspectos del blog.
-   **Gestión de Usuarios:** CRUD completo para los usuarios.
-   **Roles y Permisos:** Control granular sobre las acciones de los usuarios utilizando el paquete `spatie/laravel-permission`.
-   **Gestión de Posts:** CRUD completo para las entradas del blog, incluyendo asociaciones con categorías y etiquetas.
-   **Gestión de Categorías:** CRUD completo para las categorías de contenido.
-   **Subida de Imágenes:** Soporte para subir imágenes con redimensionamiento automático en segundo plano.
-   **Comentarios:** Funcionalidad para que los usuarios comenten en las publicaciones.
-   **Autenticación:** Sistema de autenticación seguro proporcionado por Laravel Fortify.
-   **Frontend:** Compilación de assets gestionada por Vite.

---

## Requisitos Previos

-   PHP >= 8.1
-   Composer
-   Node.js & npm
-   Una base de datos (ej. MySQL, MariaDB)
-   Un servidor web (ej. Apache, Nginx) o usar el servidor local de Laravel.

---

## Instalación

1.  **Clona el repositorio:**
    ```bash
    git clone <url-de-tu-repositorio>
    cd blog
    ```

2.  **Instala las dependencias de PHP:**
    ```bash
    composer install
    ```

3.  **Instala las dependencias de JavaScript:**
    ```bash
    npm install
    ```

4.  **Crea el archivo de entorno:**
    ```bash
    cp .env.example .env
    ```

5.  **Genera la clave de la aplicación:**
    ```bash
    php artisan key:generate
    ```

6.  **Configura tu archivo `.env`:**
    Actualiza los detalles de la conexión a la base de datos (`DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`, etc.).

7.  **Ejecuta las migraciones y los seeders de la base de datos:**
    Esto creará las tablas necesarias y poblará los datos iniciales (roles, permisos, etc.).
    ```bash
    php artisan migrate --seed
    ```

8.  **Crea el enlace simbólico del almacenamiento:**
    Esto hace que el directorio `storage/app/public` sea accesible desde la web.
    ```bash
    php artisan storage:link
    ```

---

## Ejecutar la Aplicación

1.  **Inicia el servidor de desarrollo:**
    ```bash
    php artisan serve
    ```

2.  **Compila los assets del frontend:**
    En una terminal separada, ejecuta el servidor de desarrollo de Vite para hot-reloading.
    ```bash
    npm run dev
    ```

La aplicación estará disponible en `http://127.0.0.1:8000`.

---

## Ejecutar Pruebas

Para ejecutar la suite de pruebas, ejecuta el siguiente comando:

```bash
php artisan test
```

---

## Construido Con

-   [Laravel](https://laravel.com/)
-   [PHP](https://www.php.net/)
-   [MySQL](https://www.mysql.com/)
-   [Vite](https://vitejs.dev/)
-   [Tailwind CSS](https://tailwindcss.com/)
-   [Livewire](https://laravel-livewire.com/)
-   [Spatie Laravel Permission](https://spatie.be/docs/laravel-permission/v6/introduction)
