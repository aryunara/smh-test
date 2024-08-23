## Тестовое задание для компании SocialMediaHolding

### I. Для того, чтобы подготовить проект к работе:

1) Отредактируйте файл .env.example и переименуйте его в .env:

DB_CONNECTION=pgsql
DB_HOST=db
DB_PORT=5432
DB_DATABASE=db
DB_USERNAME=user
DB_PASSWORD=user

2) Установите пакеты:

composer install

3) Сбилдите контейнеры:

docker compose build

4) Поднимите контейнеры:

docker compose up -d

5) Подключитесь к базе данных, используя данные из .env файла.

6) Войдите в bash:

docker compose exec php bash

7) Выполните миграции:

php artisan migrate

### II. Для того, чтобы добавить iPhone на сервер dummyJSON, следует использовать Postman:

1) Поставьте POST-запрос.

2) Поставьте роут 0.0.0.0:8080/api/addIPhone.

3) В body raw впишите данные, например:
   {
   "title": "IPhone 8",
   "description": "8th model",
   "brand": "Apple",
   "category": "smartphones",
   "price": 200,
   "discountPercentage": 12,
   "stock": 30,
   "rating": 4.5,
   "images": [
   "https://cdn.dummyjson.com/products/images/smartphones/iPhone%208s/1.png",
   "https://cdn.dummyjson.com/products/images/smartphones/iPhone%208s/2.png",
   "https://cdn.dummyjson.com/products/images/smartphones/iPhone%208s/3.png"
   ],
   "thumbnail":"https://cdn.dummyjson.com/products/images/smartphones/iPhone%208s/thumbnail.png"
   }

4) Отправьте запрос (send).

### III. Для того, чтобы получить все продукты iPhone и сохранить их в базу данных, следует также использовать Postman.

1) Поставьте POST-запрос.

2) Поставьте роут 0.0.0.0:8080/api/getIPhones.

3) Отправьте запрос (send).
