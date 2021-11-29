# Практика созданий бэкенд приложений

## Описание проекта

Spa приложение с фронтом на React и бэкендом на Laravel.
Позволяет пользователям регистрироваться, просматривать и загружать квартиры с изображениями.

## Задача
Реализовать апи для готового фронта.

### План

1. Визуализация проекта и задач.
2. Построение моделей
3. Реализация миграций
4. Реализация роутинга и контроллеров.
5. Рефакторинг

### Интерфесы API

*headers*

Content-Type: application/json
Content-Tpe: multipart/form-data 
Accept: application/json
Authorization: Bearer GB9meoGcs3yvwwQ7MY0xKGiNSoJnzh4UYxERJGHXd4AunW5uYnwfwVSWPVTt

*user*

new:
body: {"name":"Alex","surname":"pro","email":"alex@alex.ru","password":"7Tkf3DwSG2xuVBZ-&","password_confirmation":"7Tkf3DwSG2xuVBZ-&"}
response: {"data":{"name":"Alex","surname":"pro","email":"alex@alex.ru","id":7,"api_token":"1L7QKNDkEngTASTENgHZQKiYSfQLcUYiNoQxh6UauVXcC1H8T9geaMKBTWz1"}}

login:
body: {"email":"alex@alex.ru","password":"7Tkf3DwSG2xuVBZ-&"}
reponse: {"data":{"id":7,"name":"Alex","surname":"pro","email":"alex@alex.ru","api_token":"dQAqyYqP7L123MQ9NuoRoDoRpPY4zuV5c1XiMpo8u1u4a0yGhaqqNefZZJpG"}}

update: 
body: {"name":"Alex","surname":"pro","password":"7Tkf3DwSG2xuVBZ-&-","password_confirmation":"7Tkf3DwSG2xuVBZ-&-"}
reponse: {"data":{"id":7,"name":"Alex","surname":"pro","email":"alex@alex.ru","api_token":"YnuGfpsD0ZMWbj26qX9ZqCqCmHKf1TXrKyD6975EVclepWXKyzORi0xYAHlk"}}
