````markdown
# TESTE 1 - PHP LARAVEL - TO DO LIST

Criar uma API RESTful em Laravel para que cada usuário possa criar e gerenciar suas tarefas. A
API deve permitir:
    1. Criar
    2. Listar
    3. Atualizar status
    4. Deletar
    5. filtrar tarefas por status.

## ✅ Pré-requisitos

Antes de começar, certifique-se de ter instalado:

- [PHP](https://www.php.net/) (>= 8.x)
- [Composer](https://getcomposer.org/)
- [MySQL](https://www.mysql.com/) 
- [Node.js](https://nodejs.org/) e [npm](https://www.npmjs.com/)
- [Postman](https://www.postman.com/) ou `curl` para testar a API



## Como configurar o projeto ⚙️

1. Clone o repositório:

   ```bash
   git clone https://github.com/aja-silason/nome-do-projeto.git
   cd nome-do-projeto
````

2. Instale as dependências PHP:

   ```bash
   composer install
   ```

3. Copie o arquivo `.env.example` para `.env`:

   ```bash
   cp .env.example .env
   ```

4. Gere a chave da aplicação:

   ```bash
   php artisan key:generate
   ```
5. Rode o docker, docker-compose, certifique-se que tem o Docker instalado na máquina:

   ```bash
    docker-compose up -d
   ```

6. Configure as variáveis de ambiente no `.env` (ex: conexão com o banco de dados):

   ```dotenv
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3308
   DB_DATABASE=laravel_challenge
   DB_USERNAME=laravel
   DB_PASSWORD=laravel
   ```

---

## Rodar as migrations 🗃️

```bash
php artisan migrate
```

Popular o banco de dados com o primeiro user :

```bash
php artisan db:seed
```

---

##  Executar o servidor local ▶️

```bash
php artisan serve
```

O projeto estará disponível em:

```bash
http://127.0.0.1:8000/
```

---

##  Como testar a API 🧪

### Testando o Controller

Todos os testes do Projecto
```bash
php artisan test
```

Os testes do controller Task(Tarefas)
```bash
php artisan test --filter=TaskControllerTest
```

### Usando Postman

1. Importe o arquivo de coleção (se houver) ou crie requisições manuais:
2. Exemplo de requisição `GET`:

```
GET http://127.0.0.1:8000/api/user
```

3. Exemplo de requisição `POST` com JSON:

```
POST http://127.0.0.1:8000/api/user
Content-Type: application/json

{
  "nome": "João",
  "email": "joao@email.com",
  "senha": "123456"
}
```

### Usando curl

```bash
curl -X GET http://127.0.0.1:8000/api/user

curl -X POST http://127.0.0.1:8000/api/user \
  -H "Content-Type: application/json" \
  -d '{"nome": "João", "email": "joao@email.com", "senha": "123456"}'
```

### Rotas da aplicação

Rotas Públicas
```bash
   POST '/sign-up'
   POST '/login'
```
Rotas privadas
```bash
   GET    '/user'
   POST   '/tasks'
   GET    '/tasks'
   GET    '/tasks/find/{id}'
   PATCH  '/task/{id}/status'
   PATCH  '/task/{id}'
   DELETE '/task/{id}'
   GET    '/tasks/status/{status}'
```

---

## Observações 📌

* Certifique-se de que o banco de dados esteja rodando antes de executar as migrations.

---

## 📄 Licença




### Rodar a app:

```
php arisan serve
url: localhost/8000/api/
```
### Rodar o docker-composer

```
docker-compose up -d
```

### Rodar uma migration
```
php artisan serve migrate
php artisan serve migration
```
