# 🧪 Laravel API Tester + Simple JSON Storage

Простой REST API на Laravel с готовым HTML/JS тестером. Данные сохраняются в локальный JSON-файл, что позволяет тестировать эндпоинты без настройки базы данных.

## ✨ Особенности
- ✅ Полноценный REST API (`GET`, `POST`, `DELETE`)
- 💾 Файловое хранилище (`storage/app/users.json`) — работает "из коробки"
- 🌐 Встроенный веб-интерфейс для отправки запросов
- 🛡️ Валидация данных и настроенный CORS
- 📦 Запуск за 2 минуты

## 🛠 Технологический стек
- **Backend:** Laravel 10/11, PHP 8.1+
- **Frontend:** Чистый HTML5, CSS3, Vanilla JS (Fetch API)
- **Хранение:** Локальный JSON-файл (без БД, для тестов)

## 📋 Требования
- PHP 8.1 или выше
- Composer
- Современный браузер

## 🚀 Установка и запуск

 **Установите зависимости и запустите:**
   ```bash
   composer install
   cp .env.example .env
   php artisan key:generate
   php artisan serve
   http://127.0.0.1:8000/api-test.html
   ```

