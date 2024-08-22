Тестовое задание для компании SocialMediaHolding

I. Для того, чтобы добавить iPhone на сервер dummyJSON, следует использовать Postman:

1) Поставить POST-запрос.
2) Поставить роут 0.0.0.0:8080/addIPhone.
3) В body поставить raw и вписать любые данные, например:
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
4) Отправить (send).

II. Для того, чтобы получить все продукты iPhone и сохранить их в базу данных, следует также использовать Postman.

1) Поставить GET-запрос.
2) Поставить роут 0.0.0.0:8080/getIPhones.
3) Отправить (send).
