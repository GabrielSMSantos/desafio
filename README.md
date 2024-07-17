
![Logo](https://conta.ip4y.com.br/image/for_documents/1.png)


# Desafio iP4y

Projeto do desafio proposto para vaga iP4y


## Como Iniciar

Primeiramente instale as dependências do composer.

```bash
  composer install
```

Após instalado dependências do composer, instalar dependências do npm.
```bash
  npm install
```

Copiar .env.example para um arquivo chamado .env
```bash
  cp .env.example .env
```

Após criado o arquivo .env rodar as migrations
```bash
  php artisan migrate
```

Gere o app_key, caso já tenha criado pule esta etapa
```bash
  php artisan key:generate
```

Por Fim inicialize o projeto
```bash
  php artisan serve
  npm run dev
```
## Documentação da API
Api fazendo envio para endpoint de exemplo

#### Cadastra um cliente

```http
  POST /api/customer
```

| Parâmetro   | Tipo       | Descrição                           |
| :---------- | :--------- | :---------------------------------- |
| `cpf` | `string` | **Obrigatório**. Deve informar um CPF válido e único |
| `name` | `string` | **Obrigatório**. |
| `lastname` | `string` | **Obrigatório**. |
| `birth_date` | `string` | **Obrigatório**. Deve informar uma data válida e que seja menor ou igual a 31/12/2009 |
| `email` | `string` | **Obrigatório**. Deve informar um E-mail válido |
| `gender` | `string` | **Obrigatório**. Deve informar um Gênero M ou F |

