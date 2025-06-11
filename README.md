````markdown
# TESTE 1 - PHP LARAVEL - TO DO LIST

Criar uma API RESTful em Laravel para que cada usuário possa criar e gerenciar suas tarefas. A
API deve permitir criar, listar, atualizar status, deletar e filtrar tarefas por status.

## ✅ Pré-requisitos

Antes de começar, certifique-se de ter instalado:

- [PHP](https://www.php.net/) (>= 8.x) *(caso esteja usando Laravel)*
- [Composer](https://getcomposer.org/)
- [MySQL](https://www.mysql.com/) ou outro banco de dados compatível
- [Node.js](https://nodejs.org/) e [npm](https://www.npmjs.com/) (se usar frontend ou mix)
- [Postman](https://www.postman.com/) ou `curl` para testar a API

---

## ⚙️ Como configurar o projeto

1. Clone o repositório:

   ```bash
   git clone https://github.com/seu-usuario/nome-do-projeto.git
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

5. Configure as variáveis de ambiente no `.env` (ex: conexão com o banco de dados):

   ```dotenv
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=nome_do_banco
   DB_USERNAME=seu_usuario
   DB_PASSWORD=sua_senha
   ```

---

## 🗃️ Como rodar as migrations

```bash
php artisan migrate
```

Se quiser também popular com dados fictícios (caso tenha seeders):

```bash
php artisan db:seed
```

---

## ▶️ Como executar o servidor local

```bash
php artisan serve
```

O projeto estará disponível em:

```
http://127.0.0.1:8000
```

---

## 🧪 Como testar a API

### Usando Postman

1. Importe o arquivo de coleção (se houver) ou crie requisições manuais:
2. Exemplo de requisição `GET`:

```
GET http://127.0.0.1:8000/api/usuarios
```

3. Exemplo de requisição `POST` com JSON:

```
POST http://127.0.0.1:8000/api/usuarios
Content-Type: application/json

{
  "nome": "João",
  "email": "joao@email.com",
  "senha": "123456"
}
```

### Usando curl

```bash
curl -X GET http://127.0.0.1:8000/api/usuarios

curl -X POST http://127.0.0.1:8000/api/usuarios \
  -H "Content-Type: application/json" \
  -d '{"nome": "João", "email": "joao@email.com", "senha": "123456"}'
```

---

## 📂 Estrutura do Projeto

```
├── app/
├── bootstrap/
├── config/
├── database/
│   ├── factories/
│   ├── migrations/
│   └── seeders/
├── public/
├── routes/
│   └── api.php
├── .env
└── README.md
```

---

## 📌 Observações

* Certifique-se de que o banco de dados esteja rodando antes de executar as migrations.
* Você pode usar o Laravel Tinker para testes rápidos: `php artisan tinker`.

---

## 📄 Licença

Este projeto está licenciado sob a MIT License.

```

---

Se você estiver usando outra stack (Node.js, Django, Flask etc.), posso adaptar o conteúdo. Deseja que eu gere uma versão específica para alguma tecnologia?
```



### Rodar a app:

```
php arisan serve
url: localhost/8000/api/
```
### Rodar o docker-cmposer

```
docker-compose up -d
```

### Rodar uma migration
```
php artisan serve migrate
php artisan serve migration
```
### Rodar teste Geral:
```
php artisan test
```
### Rodar teste Em um Controller(Task):

```
php artisan test --filter=TaskControllerTest
```