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

#Messages
<!-- START_e7e66262bc1dbae90b2755ba6562aae8 -->
## Creates a new message thread.

> Example request:

```bash
curl -X GET "http://0.0.0.0/saberfrontdb2/messages/create" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://0.0.0.0/saberfrontdb2/messages/create",
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
null
```

### HTTP Request
`GET messages/create`

`HEAD messages/create`


<!-- END_e7e66262bc1dbae90b2755ba6562aae8 -->

<!-- START_edaf19f4085713e0e1149ca773a830e6 -->
## Shows a message thread.

> Example request:

```bash
curl -X GET "http://0.0.0.0/saberfrontdb2/messages/{id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://0.0.0.0/saberfrontdb2/messages/{id}",
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
null
```

### HTTP Request
`GET messages/{id}`

`HEAD messages/{id}`


<!-- END_edaf19f4085713e0e1149ca773a830e6 -->

<!-- START_5418ee46bcd65a23d9f3ab147eaa548a -->
## Adds a new message to a current thread.

> Example request:

```bash
curl -X PUT "http://0.0.0.0/saberfrontdb2/messages/{id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://0.0.0.0/saberfrontdb2/messages/{id}",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT messages/{id}`


<!-- END_5418ee46bcd65a23d9f3ab147eaa548a -->

#general
<!-- START_0acce8c4b6cee0c0863dccdc913b0ce5 -->
## _debugbar/open

> Example request:

```bash
curl -X GET "http://0.0.0.0/saberfrontdb2/_debugbar/open" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://0.0.0.0/saberfrontdb2/_debugbar/open",
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
null
```

### HTTP Request
`GET _debugbar/open`

`HEAD _debugbar/open`


<!-- END_0acce8c4b6cee0c0863dccdc913b0ce5 -->

<!-- START_5f5807046c0317783733a24f83f5a2a5 -->
## Return Clockwork output

> Example request:

```bash
curl -X GET "http://0.0.0.0/saberfrontdb2/_debugbar/clockwork/{id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://0.0.0.0/saberfrontdb2/_debugbar/clockwork/{id}",
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
null
```

### HTTP Request
`GET _debugbar/clockwork/{id}`

`HEAD _debugbar/clockwork/{id}`


<!-- END_5f5807046c0317783733a24f83f5a2a5 -->

<!-- START_2f9359e2dcdcc380f3e8a2bec1b66599 -->
## Return the stylesheets for the Debugbar

> Example request:

```bash
curl -X GET "http://0.0.0.0/saberfrontdb2/_debugbar/assets/stylesheets" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://0.0.0.0/saberfrontdb2/_debugbar/assets/stylesheets",
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
null
```

### HTTP Request
`GET _debugbar/assets/stylesheets`

`HEAD _debugbar/assets/stylesheets`


<!-- END_2f9359e2dcdcc380f3e8a2bec1b66599 -->

<!-- START_c18b6bc464bab9bc47e059bb494bba0c -->
## Return the javascript for the Debugbar

> Example request:

```bash
curl -X GET "http://0.0.0.0/saberfrontdb2/_debugbar/assets/javascript" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://0.0.0.0/saberfrontdb2/_debugbar/assets/javascript",
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
null
```

### HTTP Request
`GET _debugbar/assets/javascript`

`HEAD _debugbar/assets/javascript`


<!-- END_c18b6bc464bab9bc47e059bb494bba0c -->

<!-- START_57011a4e29c6bc1cfec9270de49657bf -->
## Authorize a client to access the user&#039;s account.

> Example request:

```bash
curl -X GET "http://0.0.0.0/saberfrontdb2/oauth/authorize" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://0.0.0.0/saberfrontdb2/oauth/authorize",
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
`GET oauth/authorize`

`HEAD oauth/authorize`


<!-- END_57011a4e29c6bc1cfec9270de49657bf -->

<!-- START_e48cc6a0b45dd21b7076ab2c03908687 -->
## Approve the authorization request.

> Example request:

```bash
curl -X POST "http://0.0.0.0/saberfrontdb2/oauth/authorize" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://0.0.0.0/saberfrontdb2/oauth/authorize",
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
`POST oauth/authorize`


<!-- END_e48cc6a0b45dd21b7076ab2c03908687 -->

<!-- START_de5d7581ef1275fce2a229b6b6eaad9c -->
## Deny the authorization request.

> Example request:

```bash
curl -X DELETE "http://0.0.0.0/saberfrontdb2/oauth/authorize" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://0.0.0.0/saberfrontdb2/oauth/authorize",
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
`DELETE oauth/authorize`


<!-- END_de5d7581ef1275fce2a229b6b6eaad9c -->

<!-- START_a09d20357336aa979ecd8e3972ac9168 -->
## Authorize a client to access the user&#039;s account.

> Example request:

```bash
curl -X POST "http://0.0.0.0/saberfrontdb2/oauth/token" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://0.0.0.0/saberfrontdb2/oauth/token",
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
`POST oauth/token`


<!-- END_a09d20357336aa979ecd8e3972ac9168 -->

<!-- START_e96d5ebaecbbcd30089fa499c8d21792 -->
## Get all of the authorized tokens for the authenticated user.

> Example request:

```bash
curl -X GET "http://0.0.0.0/saberfrontdb2/oauth/tokens" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://0.0.0.0/saberfrontdb2/oauth/tokens",
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
`GET oauth/tokens`

`HEAD oauth/tokens`


<!-- END_e96d5ebaecbbcd30089fa499c8d21792 -->

<!-- START_a9a802c25737cca5324125e5f60b72a5 -->
## Delete the given token.

> Example request:

```bash
curl -X DELETE "http://0.0.0.0/saberfrontdb2/oauth/tokens/{token_id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://0.0.0.0/saberfrontdb2/oauth/tokens/{token_id}",
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
`DELETE oauth/tokens/{token_id}`


<!-- END_a9a802c25737cca5324125e5f60b72a5 -->

<!-- START_abe905e69f5d002aa7d26f433676d623 -->
## Get a fresh transient token cookie for the authenticated user.

> Example request:

```bash
curl -X POST "http://0.0.0.0/saberfrontdb2/oauth/token/refresh" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://0.0.0.0/saberfrontdb2/oauth/token/refresh",
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
`POST oauth/token/refresh`


<!-- END_abe905e69f5d002aa7d26f433676d623 -->

<!-- START_258e7e83c3ea28db7720e63d358b33ff -->
## Get all of the clients for the authenticated user.

> Example request:

```bash
curl -X GET "http://0.0.0.0/saberfrontdb2/oauth/clients" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://0.0.0.0/saberfrontdb2/oauth/clients",
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
`GET oauth/clients`

`HEAD oauth/clients`


<!-- END_258e7e83c3ea28db7720e63d358b33ff -->

<!-- START_9eabf8d6e4ab449c24c503fcb42fba82 -->
## Store a new client.

> Example request:

```bash
curl -X POST "http://0.0.0.0/saberfrontdb2/oauth/clients" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://0.0.0.0/saberfrontdb2/oauth/clients",
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
`POST oauth/clients`


<!-- END_9eabf8d6e4ab449c24c503fcb42fba82 -->

<!-- START_784aec390a455073fc7464335c1defa1 -->
## Update the given client.

> Example request:

```bash
curl -X PUT "http://0.0.0.0/saberfrontdb2/oauth/clients/{client_id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://0.0.0.0/saberfrontdb2/oauth/clients/{client_id}",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT oauth/clients/{client_id}`


<!-- END_784aec390a455073fc7464335c1defa1 -->

<!-- START_1f65a511dd86ba0541d7ba13ca57e364 -->
## Delete the given client.

> Example request:

```bash
curl -X DELETE "http://0.0.0.0/saberfrontdb2/oauth/clients/{client_id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://0.0.0.0/saberfrontdb2/oauth/clients/{client_id}",
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
`DELETE oauth/clients/{client_id}`


<!-- END_1f65a511dd86ba0541d7ba13ca57e364 -->

<!-- START_6eec11382f34d0f08c826d2813b02d04 -->
## Get all of the available scopes for the application.

> Example request:

```bash
curl -X GET "http://0.0.0.0/saberfrontdb2/oauth/scopes" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://0.0.0.0/saberfrontdb2/oauth/scopes",
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
`GET oauth/scopes`

`HEAD oauth/scopes`


<!-- END_6eec11382f34d0f08c826d2813b02d04 -->

<!-- START_b4c3e68afae3c4de78758b62c49ac9a9 -->
## Get all of the personal access tokens for the authenticated user.

> Example request:

```bash
curl -X GET "http://0.0.0.0/saberfrontdb2/oauth/personal-access-tokens" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://0.0.0.0/saberfrontdb2/oauth/personal-access-tokens",
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
`GET oauth/personal-access-tokens`

`HEAD oauth/personal-access-tokens`


<!-- END_b4c3e68afae3c4de78758b62c49ac9a9 -->

<!-- START_a8dd9c0a5583742e671711f9bb3ee406 -->
## Create a new personal access token for the user.

> Example request:

```bash
curl -X POST "http://0.0.0.0/saberfrontdb2/oauth/personal-access-tokens" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://0.0.0.0/saberfrontdb2/oauth/personal-access-tokens",
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
`POST oauth/personal-access-tokens`


<!-- END_a8dd9c0a5583742e671711f9bb3ee406 -->

<!-- START_bae65df80fd9d72a01439241a9ea20d0 -->
## Delete the given token.

> Example request:

```bash
curl -X DELETE "http://0.0.0.0/saberfrontdb2/oauth/personal-access-tokens/{token_id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://0.0.0.0/saberfrontdb2/oauth/personal-access-tokens/{token_id}",
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
`DELETE oauth/personal-access-tokens/{token_id}`


<!-- END_bae65df80fd9d72a01439241a9ea20d0 -->

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
    "error": "Unauthenticated."
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

<!-- START_f9bb43b2d406a133a7646f806a34310b -->
## Display the form to request a password reset link.

> Example request:

```bash
curl -X GET "http://0.0.0.0/saberfrontdb2/password/reset" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://0.0.0.0/saberfrontdb2/password/reset",
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
null
```

### HTTP Request
`GET password/reset`

`HEAD password/reset`


<!-- END_f9bb43b2d406a133a7646f806a34310b -->

<!-- START_feb40f06a93c80d742181b6ffb6b734e -->
## Send a reset link to the given user.

> Example request:

```bash
curl -X POST "http://0.0.0.0/saberfrontdb2/password/email" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://0.0.0.0/saberfrontdb2/password/email",
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
`POST password/email`


<!-- END_feb40f06a93c80d742181b6ffb6b734e -->

<!-- START_5a0014b83f352dff4e16558b63bfd23e -->
## Display the password reset view for the given token.

If no token is present, display the link request form.

> Example request:

```bash
curl -X GET "http://0.0.0.0/saberfrontdb2/password/reset/{token}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://0.0.0.0/saberfrontdb2/password/reset/{token}",
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
null
```

### HTTP Request
`GET password/reset/{token}`

`HEAD password/reset/{token}`


<!-- END_5a0014b83f352dff4e16558b63bfd23e -->

<!-- START_cafb407b7a846b31491f97719bb15aef -->
## Reset the given user&#039;s password.

> Example request:

```bash
curl -X POST "http://0.0.0.0/saberfrontdb2/password/reset" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://0.0.0.0/saberfrontdb2/password/reset",
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
`POST password/reset`


<!-- END_cafb407b7a846b31491f97719bb15aef -->

<!-- START_c849d8d398c06c47842040149a029b8e -->
## register/verify/{token}

> Example request:

```bash
curl -X GET "http://0.0.0.0/saberfrontdb2/register/verify/{token}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://0.0.0.0/saberfrontdb2/register/verify/{token}",
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
null
```

### HTTP Request
`GET register/verify/{token}`

`HEAD register/verify/{token}`


<!-- END_c849d8d398c06c47842040149a029b8e -->

<!-- START_20271aec7d8000fc57e8ef3c2e893ac9 -->
## Display the specified resource.

> Example request:

```bash
curl -X GET "http://0.0.0.0/saberfrontdb2/regimentAttributes/{id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://0.0.0.0/saberfrontdb2/regimentAttributes/{id}",
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
null
```

### HTTP Request
`GET regimentAttributes/{id}`

`HEAD regimentAttributes/{id}`


<!-- END_20271aec7d8000fc57e8ef3c2e893ac9 -->

<!-- START_b05798982c18f8892429acc38029f50b -->
## inventory/{id}

> Example request:

```bash
curl -X GET "http://0.0.0.0/saberfrontdb2/inventory/{id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://0.0.0.0/saberfrontdb2/inventory/{id}",
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
null
```

### HTTP Request
`GET inventory/{id}`

`HEAD inventory/{id}`


<!-- END_b05798982c18f8892429acc38029f50b -->

<!-- START_1561fb08d6d74aa0d99921b38a6ef6cd -->
## Show the application dashboard.

> Example request:

```bash
curl -X GET "http://0.0.0.0/saberfrontdb2/developer/dash" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://0.0.0.0/saberfrontdb2/developer/dash",
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
`GET developer/dash`

`HEAD developer/dash`


<!-- END_1561fb08d6d74aa0d99921b38a6ef6cd -->

<!-- START_3e148f918990fc2200a50b096c663c2f -->
## Display list of all available routes.

> Example request:

```bash
curl -X POST "http://0.0.0.0/saberfrontdb2/api-tester/routes/index" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://0.0.0.0/saberfrontdb2/api-tester/routes/index",
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
`POST api-tester/routes/index`


<!-- END_3e148f918990fc2200a50b096c663c2f -->

<!-- START_47d513f9bf3906dc835a55f9574f4aae -->
## api-tester/requests/index

> Example request:

```bash
curl -X POST "http://0.0.0.0/saberfrontdb2/api-tester/requests/index" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://0.0.0.0/saberfrontdb2/api-tester/requests/index",
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
`POST api-tester/requests/index`


<!-- END_47d513f9bf3906dc835a55f9574f4aae -->

<!-- START_e53bcfad7f64084e0fc53bdd493b030c -->
## api-tester/requests/store

> Example request:

```bash
curl -X POST "http://0.0.0.0/saberfrontdb2/api-tester/requests/store" \
-H "Accept: application/json" \
    -d "method"="HEAD" \
    -d "path"="tempora" \
    -d "headers"="tempora" \
    -d "body"="tempora" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://0.0.0.0/saberfrontdb2/api-tester/requests/store",
    "method": "POST",
    "data": {
        "method": "HEAD",
        "path": "tempora",
        "headers": "tempora",
        "body": "tempora"
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api-tester/requests/store`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    method | string |  required  | `GET`, `HEAD`, `POST`, `PUT`, `PATCH` or `DELETE`
    path | string |  required  | 
    headers | array |  optional  | 
    body | string |  optional  | 

<!-- END_e53bcfad7f64084e0fc53bdd493b030c -->

<!-- START_e4587a0bf8f5e65a54ebaa46faa08ff3 -->
## api-tester/requests/update

> Example request:

```bash
curl -X POST "http://0.0.0.0/saberfrontdb2/api-tester/requests/update" \
-H "Accept: application/json" \
    -d "id"="repellendus" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://0.0.0.0/saberfrontdb2/api-tester/requests/update",
    "method": "POST",
    "data": {
        "id": "repellendus"
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api-tester/requests/update`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    id | string |  required  | 

<!-- END_e4587a0bf8f5e65a54ebaa46faa08ff3 -->

<!-- START_09de70e56f9914aded02eea4fcd6b3a8 -->
## api-tester/requests/destroy

> Example request:

```bash
curl -X POST "http://0.0.0.0/saberfrontdb2/api-tester/requests/destroy" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://0.0.0.0/saberfrontdb2/api-tester/requests/destroy",
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
`POST api-tester/requests/destroy`


<!-- END_09de70e56f9914aded02eea4fcd6b3a8 -->

<!-- START_61448ae0f48abc74a1f0fcc2b38640e3 -->
## api-tester/assets/fonts/{_file}

> Example request:

```bash
curl -X GET "http://0.0.0.0/saberfrontdb2/api-tester/assets/fonts/{_file}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://0.0.0.0/saberfrontdb2/api-tester/assets/fonts/{_file}",
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
null
```

### HTTP Request
`GET api-tester/assets/fonts/{_file}`

`HEAD api-tester/assets/fonts/{_file}`


<!-- END_61448ae0f48abc74a1f0fcc2b38640e3 -->

<!-- START_efa868e4add5bf75fe73b492dd03d929 -->
## api-tester/assets/img/{_file}

> Example request:

```bash
curl -X GET "http://0.0.0.0/saberfrontdb2/api-tester/assets/img/{_file}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://0.0.0.0/saberfrontdb2/api-tester/assets/img/{_file}",
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
null
```

### HTTP Request
`GET api-tester/assets/img/{_file}`

`HEAD api-tester/assets/img/{_file}`


<!-- END_efa868e4add5bf75fe73b492dd03d929 -->

<!-- START_9ab834de6daa80432d0c6a3bfa3b41bd -->
## api-tester/assets/{_file}

> Example request:

```bash
curl -X GET "http://0.0.0.0/saberfrontdb2/api-tester/assets/{_file}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://0.0.0.0/saberfrontdb2/api-tester/assets/{_file}",
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
null
```

### HTTP Request
`GET api-tester/assets/{_file}`

`HEAD api-tester/assets/{_file}`


<!-- END_9ab834de6daa80432d0c6a3bfa3b41bd -->

