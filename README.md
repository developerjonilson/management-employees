# API REST Laravel 5.4 e Front-end Angular

API REST desenvolvida em Laravel 5.4, para ser consumido por um Front-end desenvolvido com Angular.

## Dependências

A princípio é necessário ter instalado o [Composer](https://getcomposer.org/)(gerenciador de pacotes do PHP) em sua máquina, além do git instalado para clone deste código e também o NodeJS e o NPM para instalar as dependências do Frontend que foi desenvolvido com Angular.

Para confirmar se as dependências estão instaladas, use os comandos `$ composer` e `$ git --version` no terminal.

## Instalação do Backend (Laravel 5.4)

1. Primeiro clone o repositório:

```
$ git clone https://github.com/jonilsondeveloper/management-employees/.git
```

2. Acesse a pasta 'api-rest-laravel' do projeto no terminal:

```
$ cd management-employees/api-rest-laravel
```

3. Execute o seguinte comando para instalar as dependências:

```
$ composer install
```

## Uso do projeto Laravel (api-rest-laravel)

1. Renomei o arquivo `env.example` para `.env`, e insira as informações referentes ao banco de dados nos campos `DB_DATABASE`, `DB_USERNAME` e `DB_PASSWORD`.

2. Agora execute o seguinte comando para gerar a chave JWT Authentication Secret, que será usada para criar os tokens com segurança:

```
$ php artisan jwt:generate
```

3. Agora execute o seguinte comando para executar as migrations e semear o banco de dados com os seeder:

```
$ php artisan migrate --seed
```
4. Com isso tudo já está pronto na API rest. E já está criado um conta de usuário master com o email:
```
Email: master@mail.com
Senha: 123456
```

## Uso do projeto Angular

