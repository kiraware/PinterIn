# PinterIn

[![License](https://img.shields.io/github/license/kiraware/PinterIn)](LICENSE)
[![Issues](https://img.shields.io/github/issues/kiraware/PinterIn)](https://github.com/kiraware/PinterIn/issues)
[![Pull Requests](https://img.shields.io/github/issues-pr/kiraware/PinterIn)](https://github.com/kiraware/PinterIn/pulls)

---

<p align="center">
  <img src="public/images/logo.png" alt="PinterIn Logo" width="120">
</p>

PinterIn is a web-based e-courses platform designed for simplicity and accessibility. Users can browse, purchase, and read lessons directly within the application. The main goal of PinterIn is to provide an intuitive environment for exploring educational content—making learning convenient, engaging, and straightforward.

## ✨ Features

- **Browse Courses**: Users can view a catalog of available e-courses.
- **Purchase Courses**: Secure checkout allows users to buy access to their chosen courses.
- **Read Lessons**: After purchasing, users can read the lesson content directly within the platform.
- **User Accounts**: Register, sign in, and manage your learning profile.
- **Responsive Design**: Enjoy a seamless experience on any device—desktop, tablet, or phone.
- **Simple & Clean Interface**: Focused on usability to make learning as easy as possible.

## 🚀 Demo

> _Coming soon!_

## 🛠️ Getting Started

### Prerequisites

- [PHP](https://www.php.net/) (v8.4+ recommended)
- [Composer](https://getcomposer.org/)
- [Node.js](https://nodejs.org/) (v22+ recommended)
- [npm](https://npmjs.com/)

### Backend Setup (Laravel)

1. **Install Composer dependencies:**

    ```bash
    composer install
    ```

2. **Copy and configure environment variables:**

    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

3. **Run migrations:**

    ```bash
    php artisan migrate
    ```

4. **Start the Laravel development server:**
    ```bash
    php artisan serve
    ```

### Frontend Setup

1. **Install npm dependencies:**

    ```bash
    npm install
    ```

2. **Build assets:**

    ```bash
    npm run dev
    ```

3. **Open in browser:**
    ```
    http://localhost:8000
    ```

## 🧑‍💻 Contributing

We welcome contributions!

1. Fork the repo
2. Create your feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a pull request

## 🗣️ Community & Support

- [Issues](https://github.com/kiraware/PinterIn/issues) — for bug reports and feature requests

## 📄 License

This project is licensed under the [MIT License](LICENSE).

---

## 🙌 Built By

<a href="https://github.com/kiraware">
  <img src="https://avatars.githubusercontent.com/u/117554978?v=4" width="40" alt="kiraware" />
</a>
<a href="https://github.com/iqbalanandra">
  <img src="https://avatars.githubusercontent.com/u/112565226?v=4" width="40" alt="iqbalanandra" />
</a>
<a href="https://github.com/nadhif21">
  <img src="https://avatars.githubusercontent.com/u/112993038?v=4" width="40" alt="nadhif21" />
</a>
<a href="https://github.com/JessenRamadeksaAllen">
  <img src="https://avatars.githubusercontent.com/u/113007701?v=4" width="40" alt="JessenRamadeksaAllen" />
</a>
<a href="https://github.com/FerdinandLauren">
  <img src="https://avatars.githubusercontent.com/u/152312446?v=4" width="40" alt="FerdinandLauren" />
</a>
<a href="https://github.com/apps/dependabot">
  <img src="https://avatars.githubusercontent.com/in/29110?v=4" width="40" alt="dependabot[bot]" />
</a>

> Inspired by community creativity. Built with ❤️ by our contributors.
