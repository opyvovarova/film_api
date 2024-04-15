# Тестовое задание Keep-Calm PHP

### Условные обозначения
<p>unique - уникальное поле</p>
max_len - максимальная длина строки

### Существующие сущности паттернами GoF

    film {
        id: number # unique
        name: string # unique, max_len:255
        relation: actors[]
    }
    
    actor {
        id: number #unique
        name: string #max_len:1024
    }

У сущности film может быть множество actor.
У нескольких элементов film может быть один и тот же элемент actor

## Условия задачи

- 1 . Реализовать rest api сущности film и actor по правилам раздела Структура rest api.
- 2*. Реализовать регистрацию и авторизацию пользователя
- 3*. Покрыть код тестами


## Требования к задаче

- Потенциальное решение задачи не должно занимать больше 4 часов.
- Задачи под звездочкой не обязательны, их реализация является преимуществом для кандидата.
- Задача должна быть реализована на php 8.3 с использованием фреймворка laravel 10/11.
- Если задача будет решена без использования фреймворка, то это будет отдельный бонус для кандидата.  В таком случае основной файл index.php должен находится в папке public
- В качестве базы данных использовать sqlite. В корне проекта должна быть папка database с файлом базы
- Соблюдение кода и структуры ответа должно строго соблюдаться из ТЗ описанного ниже
- Результат работы необходимо положить в репозиторий и прислать ссылку на него

<p>Тестовое задание будет проверено в автоматическом режиме, поэтому необходимо строго соблюдать требования.</p>
<p>Дополнительно используемые пакеты остаются на выбор разработчика</p>

## Структура rest api

## Методы для сущности film
### get: /api/films

    <p>get: /api/films </p>
    <p>response code: 200</p>
    response:
    [
        {
            id: number,
            name: string,
            actors: [
                {
                    id: number,
                    name: string
                }
            ]
        }
    ]

### get: api/film/{filmId}

    <p>get: api/film/{filmId}</p>
    <p>response code: 200</p>
    response:

### post: api/film

        <p>request body:</p>
        // в actors отправляется массив id сущностей actor
        {
            name: string,
            actors: number[actorId]
        }

        <p>response code: 201 </p>
        response:
        {
            id: number,
            name: string,
            actors: [
                        {
                            id: number,
                            name: string
                        }
                    ]
        }


### patch: api/film/{filmId}
    <p>patch: api/film/{filmId}</p>
    request body:
    // любое из полей может быть не обязательным
    // в actors отправляется массив id сущностей actor
    {
    name?: string,
    actors?: number[actorId]
    }


    response code: 200
    response:
    {
        id: number,
        name: string,
        actors: [
            {
                id: number,
                name: string
            }
        ]
    }

### delete: api/film/{filmId}

    delete: api/film/{filmId}
    response code: 200
    response:

    {}


## Методы для сущности actor
### get: /api/actors

    get: /api/actors
    response code: 200
    response:
    [
        {
            id: number,
            name: string
        }
    ]

### get: /api/actor/{actorId}

    get: /api/actor/{actorId}
    response code: 200

    {
        id: number,
        name: string
    }


### post: /api/actor


    post: /api/actor
    request body:
        {
            name: string
        }


    response code: 201
    response:
    {
        id: number,
        name: string
    }

### patch: /api/actor/{actorId}

    patch: /api/actor/{actorId}
    response code: 200
    request body:
    {
        name: string
    }

    response:

    {
        id: number,
        name: string
    }


### delete: /api/actor/{actorId}

    delete: /api/actor/{actorId}
    response code: 200
    response:
    {}

