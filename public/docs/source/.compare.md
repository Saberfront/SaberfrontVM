---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://0.0.0.0/docs/collection.json)
<!-- END_INFO -->

#general
<!-- START_003e21d791de26c3b2eb48a7e484f364 -->
## api/inventories

> Example request:

```bash
curl -X GET "http://0.0.0.0/saberfrontdb2/api/inventories" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://0.0.0.0/saberfrontdb2/api/inventories",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "data": [
        {
            "id": 2,
            "userId": "120227522",
            "ammo": "{\"laser\":20,\"particle\":30,\"heat_missile\":40,\"smoke_missile\":50}"
        }
    ],
    "meta": {
        "pagination": {
            "total": 1,
            "count": 1,
            "per_page": 15,
            "current_page": 1,
            "total_pages": 1,
            "links": []
        }
    }
}
```

### HTTP Request
`GET api/inventories`

`HEAD api/inventories`


<!-- END_003e21d791de26c3b2eb48a7e484f364 -->

<!-- START_961d22af5e80fd5f11e7725d7e066a69 -->
## api/inventory/{id}

> Example request:

```bash
curl -X GET "http://0.0.0.0/saberfrontdb2/api/inventory/{id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://0.0.0.0/saberfrontdb2/api/inventory/{id}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET api/inventory/{id}`

`HEAD api/inventory/{id}`


<!-- END_961d22af5e80fd5f11e7725d7e066a69 -->

<!-- START_9591459742ca02faa1eca7d11d03c3fd -->
## api/inventory/{id}

> Example request:

```bash
curl -X DELETE "http://0.0.0.0/saberfrontdb2/api/inventory/{id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://0.0.0.0/saberfrontdb2/api/inventory/{id}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE api/inventory/{id}`


<!-- END_9591459742ca02faa1eca7d11d03c3fd -->

<!-- START_9289bb08b4ddbd1789151a65b084501f -->
## api/inventory

> Example request:

```bash
curl -X POST "http://0.0.0.0/saberfrontdb2/api/inventory" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://0.0.0.0/saberfrontdb2/api/inventory",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/inventory`


<!-- END_9289bb08b4ddbd1789151a65b084501f -->

