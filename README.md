# Environment:
* Ubuntu 24.04.2 LTS
* Nginx 1.24.0
* PHP 8.1.32
* Symfony 6.4.19

# Інструкції з налаштування:
## Встановлення та налаштування:

### 1. Склонуйте репозиторій та встановіть залежності:

* composer install
* Створіть .env файл і додайте API-ключ: WEATHER_API_KEY=yourapikey

### 2. Запуск сервера:
* Запустіть вбудований сервер: symfony serve або php bin/console server:start

### 3. Виконання запиту:
Виконайте запит
{protocol}://{your-server-name}/weather/{city} у браузері.
Наприклад:
https://weather-app.loc/weather/Rom
Після успішного виконання запиту має відобразитися щось схоже на:

# Weather in Rome, Italy
Temperature: 11.1°C

Condition: Partly cloudy

Humidity: 94%

Wind Speed: 4.7 km/h

Last updated: 2025-03-25 08:30

# Пояснення:
* Сервіс Weather:
  Відповідає за обробку API-запитів. Використовує Symfony HTTP Client для здійснення запитів.

* Контролер WeatherController:
  Відповідає за отримання даних про погоду через HTTP-запит і передає результат на Twig-шаблон.

* Twig: Використовуємо Twig для відображення даних про погоду на сторінці.
* Логування: Логуємо запити та помилки для кращого контролю за роботою програми.

Це базова реалізація, і ми можем додавати додаткову функціональність,
таку як кешування запитів, обробка більш складних помилок та інші покращення.