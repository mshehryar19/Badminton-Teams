# 🏸 Badminton Teams Manager (v1.0)

A simple Laravel web application to manage badminton teams, players, and coaches.  
The project is fully Dockerized using **Nginx, PHP-FPM, MySQL**, and follows clean development practices.

---

## 🚀 Features

- User Authentication (Register / Login)
- Dashboard (Protected)
- Team Management (CRUD)
- Max 2 players per team
- Optional coach name
- Upload images:
  - Team logo
  - Player images
- Teams listing in table view
- Clean landing (welcome) page
- Dockerized development environment

---

## 🛠 Tech Stack

- **Backend:** Laravel
- **Frontend:** Blade + Bootstrap
- **Authentication:** Laravel Auth (Sanctum ready)
- **Database:** MySQL
- **Web Server:** Nginx
- **Containerization:** Docker & Docker Compose

---

## 📂 Project Structure

# 🏸 Badminton Teams Manager (v1.0)

A simple Laravel web application to manage badminton teams, players, and coaches.  
The project is fully Dockerized using **Nginx, PHP-FPM, MySQL**, and follows clean development practices.

---

## 🚀 Features

- User Authentication (Register / Login)
- Dashboard (Protected)
- Team Management (CRUD)
- Max 2 players per team
- Optional coach name
- Upload images:
  - Team logo
  - Player images
- Teams listing in table view
- Clean landing (welcome) page
- Dockerized development environment

---

## 🛠 Tech Stack

- **Backend:** Laravel
- **Frontend:** Blade + Bootstrap
- **Authentication:** Laravel Auth (Sanctum ready)
- **Database:** MySQL
- **Web Server:** Nginx
- **Containerization:** Docker & Docker Compose

---

## 📂 Project Structure

# 🏸 Badminton Teams Manager (v1.0)

A simple Laravel web application to manage badminton teams, players, and coaches.  
The project is fully Dockerized using **Nginx, PHP-FPM, MySQL**, and follows clean development practices.

---

## 🚀 Features

- User Authentication (Register / Login)
- Dashboard (Protected)
- Team Management (CRUD)
- Max 2 players per team
- Optional coach name
- Upload images:
  - Team logo
  - Player images
- Teams listing in table view
- Clean landing (welcome) page
- Dockerized development environment

---

## 🛠 Tech Stack

- **Backend:** Laravel
- **Frontend:** Blade + Bootstrap
- **Authentication:** Laravel Auth (Sanctum ready)
- **Database:** MySQL
- **Web Server:** Nginx
- **Containerization:** Docker & Docker Compose

---

## 📂 Project Structure

badminton-teams/
├── app/
├── database/
├── docker/
│ ├── nginx/
│ └── php/
├── resources/
├── routes/
├── storage/
├── docker-compose.yml
├── Dockerfile
└── README.md


---

## 🐳 Docker Setup

### 1️⃣ Clone Repository

```bash
git clone https://github.com/mshehryar19/Badminton-Teams.git
cd badminton-teams

2️⃣ Start Containers

docker compose up -d --build


3️⃣ Enter PHP Container

docker exec -it laravel_app bash

4️⃣ Install Dependencies & Setup App

composer install
php artisan key:generate
php artisan migrate
php artisan storage:link


Exit container:

exit

5️⃣ Access Application

http://localhost:8000


🔐 Default Environment Notes

Recommended .env values for local development:

SESSION_DRIVER=file
CACHE_STORE=file
QUEUE_CONNECTION=sync


🧠 Data Storage (Important)

Database data is stored in a Docker volume:

badminton-teams_dbdata


Uploaded images are stored in:

storage/app/public

📌 Versioning

Current version: v1.0

Planned next versions:

v1.1 → Roles & Permissions (Spatie)

v1.2 → API + Sanctum Tokens

v1.3 → Production Docker setup

👨‍💻 Author

Shehryar Hussain
Laravel & Docker Learner
🇵🇰 Pakistan

📜 License

This project is open-source and available for learning purposes.


