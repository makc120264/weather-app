# Інструкції з налаштування:
## Встановлення та налаштування:

### 1. Склонуйте репозиторій та встановіть залежності:

* composer install
* Створіть .env файл і додайте API-ключ: WEATHER_API_KEY=yourapikey

### 2. Запуск сервера:
* Запустіть вбудований сервер: symfony serve

# Пояснення:
* Сервіс Weather:
  Відповідає за обробку API-запитів. Використовує Symfony HTTP Client для здійснення запитів.

* Контролер WeatherController:
  Відповідає за отримання даних про погоду через HTTP-запит і передає результат на Twig-шаблон.

* Twig: Використовуємо Twig для відображення даних про погоду на сторінці.
* Логування: Логуємо запити та помилки для кращого контролю за роботою програми.

Це базова реалізація, і ми можем додавати додаткову функціональність,
таку як кешування запитів, обробка більш складних помилок та інші покращення.