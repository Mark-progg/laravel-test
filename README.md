# Laravel Test project

## Описание
Тестовое задание по созданию мини-бэкенда для админ панели Filament, в проекте используются seeder-ы lkz для заполнения Company, User, Role. Приложение доерезировано.

## Стек
- Laravel 13
- PHP 8.3
- Filament 5.4.1
- PostgrsSQL 18
- Docker

### Инструкция по запуску

```bash
git clone https://github.com/Mark-progg/laravel-test.git
cd laravel-test
make up
make init
make migrate
```

- Для входа в админку нужно перейти в бразере по 
http://localhost:8080/admin
И воспользоваться этими учетными данными:

| Email             | Пароль     |
|-------------------|------------|
| admin@test.com | `password123` |
