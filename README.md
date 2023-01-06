# DOCUMENTATION

## PROFILE

- Name : A Farhan Agustiansyah
- University : Sriwijaya University, South Sumatera

## START PROJECT

- Download this project or clone this repo and save to your local
- Run `composer install` to install all dependencies needed
- Open your computer server to run your server, then create new database on your database
- Configure your .env file, go to database section, and configure the database according to the database you are using, the user, and the password you are using as below
  ```
      DB_CONNECTION=mysql
      DB_HOST=your_host
      DB_PORT=your_port
      DB_DATABASE=your_db_name
      DB_USERNAME=your_username
      DB_PASSWORD=your_password
  ```
- Run command `php artisan jwt:secret` to generate JWT key for authentication,
  ```
      JWT_SECRET=xxxx
  ```
  so your jwt secret is generated in .env file
- After that, you can run command `php artisan migrate` to generate all table migrations which is exist in this project
- Then, you can run command `php artisan db:seed` to seed your database with Material to materials table
- Then, you can run command `php artisan serve` to start your laravel server and try the endpoint has been build

## AUTH ENDPOINT

### Register

Request :

- Method : POST
- Endpoint : `/api/register`
- Header :
  - Accept: application/json
- Body :

```json
{
    "name": "string",
    "email": "string, email",
    "password": "string",
    "password_confirmation": "string"
}
```

Response :

```json
{
  "message": "string"
}
```

### Login

Request :

- Method : POST
- Endpoint : `/api/login`
- Header :
  - Accept: application/json
- Body :

```json
{
    "email": "string, email",
    "password": "string",
}
```

Response :

```json
{
  "access_token": "string",
  "token_type": "string",
  "expires_in": "integer",
}
```

### Logout

Request :

- Method : POST
- Endpoint : `/api/logout`
- Header :
  - Accept: application/json
- Query Param :
  - token: "string"

Response :

```json
{
  "message": "string"
}
```

### Me

Request :

- Method : POST
- Endpoint : `/api/register`
- Header :
  - Accept: application/json
  - Autohorization: Bearer token

Response :

```json
{
  "id": "integer",
  "name": "string",
  "email": "string",
  "email_verified_at": "string",
  "created_at": "string",
  "updated_at": "string"
}
```

## API ENDPOINT

### Get Mahasiswa

Request :

- Method : GET
- Endpoint : `/api/mahasiswa`
- Header :
  - Accept: application/json
  - Autohorization: Bearer token

Response :

```json
{
  "status": "boolean",
  "status_code": "integer",
  "message": "string",
  "data": [
    {
      "nama": "string",
      "email": "string, email",
      "NIM": "string, unique",
      "jenis_kelamin": "string",
      "semester": "integer",
      "angkatan": "year",
      "fakultas": [
        {   
            "id": "integer",
            "fakultas": "string",
        },
      ],
      "prodi": [
        {   
            "id": "integer",
            "program_studi": "string",
        },
      ],
      "created_at": "string",
      "updated_at": "string",
    },
    ...
  ]
}
```

### Detail Mahasiswa

Request :

- Method : GET
- Endpoint : `/api/mahasiswa/{nim}`
- Header :
  - Accept: application/json
  - Autohorization: Bearer token

Response :

```json
{
  "status": "boolean",
  "status_code": "integer",
  "message": "string",
  "data": [
    {
      "nama": "string",
      "email": "string, email",
      "NIM": "string, unique",
      "jenis_kelamin": "string",
      "semester": "integer",
      "angkatan": "year",
      "fakultas": [
        {   
            "id": "integer",
            "fakultas": "string",
        },
      ],
      "prodi": [
        {   
            "id": "integer",
            "program_studi": "string",
        },
      ],
      "created_at": "string",
      "updated_at": "string",
    },
  ]
}
```

### Post Mahasiswa

Request :

- Method : POST
- Endpoint : `/api/mahasiswa`
- Header :
  - Accept: application/json
  - Autohorization: Bearer token
- Body :

```json
{
    "nama": "string",
    "email": "string, email",
    "NIM": "string, unique",
    "jenis_kelamin": "string",
    "semester": "integer",
    "angkatan": "year",
}
```

Response :

```json
{
  "status": "boolean",
  "status_code": "integer",
  "message": "string",
  "data": {
     "nama": "string",
     "email": "string, email",
     "NIM": "string, unique",
     "jenis_kelamin": "string",
     "semester": "integer",
     "angkatan": "year",
     "fakultas": [
       {   
           "id": "integer",
           "fakultas": "string",
       },
     ],
     "prodi": [
       {   
           "id": "integer",
           "program_studi": "string",
       },
     ],
     "created_at": "string",
     "updated_at": "string",
   },
}
```

### Update Mahasiswa

Request :

- Method : POST
- Endpoint : `/api/mahasiswa/{nim}`
- Header :
  - Accept: application/json
  - Autohorization: Bearer token
- Body :

```json
{
    "nama": "string",
    "email": "string, email",
    "NIM": "string, unique",
    "jenis_kelamin": "string",
    "semester": "integer",
    "angkatan": "year",
}
```

Response :

```json
{
  "status": "boolean",
  "status_code": "integer",
  "message": "string",
  "data": {
     "nama": "string",
     "email": "string, email",
     "NIM": "string, unique",
     "jenis_kelamin": "string",
     "semester": "integer",
     "angkatan": "year",
     "fakultas": [
       {   
           "id": "integer",
           "fakultas": "string",
       },
     ],
     "prodi": [
       {   
           "id": "integer",
           "program_studi": "string",
       },
     ],
     "created_at": "string",
     "updated_at": "string",
   },
}
```

### Delete Mahasiswa

Request :

- Method : DELETE
- Endpoint : `/api/mahasiswa/{nim}`
- Header :
  - Accept: application/json
  - Autohorization: Bearer token
  - Content-Type: application/json

Response :

```json
{
  "status": "boolean",
  "status_code": "integer",
  "message": "string",
  "data": []
}
```

### Get Prodi

Request :

- Method : GET
- Endpoint : `/api/prodi`
- Header :
  - Accept: application/json
  - Autohorization: Bearer token

Response :

```json
{
  "status": "boolean",
  "status_code": "integer",
  "message": "string",
  "data": [
    {
      "id": "integer",
      "program_studi": "string",
    },
    ...
  ]
}
```

### Post Prodi

Request :

- Method : POST
- Endpoint : `/api/prodi`
- Header :
  - Accept: application/json
  - Autohorization: Bearer token
- Body :

```json
{
    "program_studi": "string",
    "fakultas_id": "integer",
}
```

Response :

```json
{
  "status": "boolean",
  "status_code": "integer",
  "message": "string",
  "data": {
        "id": "integer",
        "program_studi": "string",
   },
}
```

### Get Fakultas

Request :

- Method : GET
- Endpoint : `/api/fakultas`
- Header :
  - Accept: application/json
  - Autohorization: Bearer token

Response :

```json
{
  "status": "boolean",
  "status_code": "integer",
  "message": "string",
  "data": [
    {
      "id": "integer",
      "fakultas": "string",
      "program_studi": [
        {
           "id": "integer",
           "program_studi": "string",
        },
        ...
      ],
    },
    ...
  ]
}
```

### Post Fakultas

Request :

- Method : POST
- Endpoint : `/api/fakultas`
- Header :
  - Accept: application/json
  - Autohorization: Bearer token
- Body :

```json
{
    "fakultas": "string",
}
```

Response :

```json
{
  "status": "boolean",
  "status_code": "integer",
  "message": "string",
  "data": {
      "id": "integer",
      "fakultas": "string",
      "program_studi": [
        {
           "id": "integer",
           "program_studi": "string",
        },
        ...
      ],
  }
}
```
