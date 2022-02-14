# Telzir
###### Desenvolvido por [Marcelo Jimenes](https://github.com/MarceloJimenes)

## Apresentação
Esse projeto foi desenvolvido com muito carinho e dedicação, como todos que eu busco desenvolver. Através  da situação problema que foi passada, construí uma resolução simples, mas eficiente para atender as suas necessidades. Minha ideia foi que o projeto **não fosse um CRUD**, mas sim um **modelo** para o usuário acessar o site e simular o plano que mais se adequa a sua necessidade.

Tendo isso dito, espero que aproveite e goste do resultado!! 

Abraços.

## Requisitos

É necessário possuir as seguintes ferramentas instaladas no seu ambiente local:

- [Composer](https://getcomposer.org/download/)
- [Docker](https://docs.docker.com/get-docker/)
- [Node](https://nodejs.org/en/)
- [PHP 8](https://www.php.net/downloads)

## Tecnologias

- [Laravel 8](https://laravel.com/)
- [PHP 8](https://www.php.net/)
- [MySQL](https://www.mysql.com/)
- [Javascript](https://developer.mozilla.org/pt-BR/docs/Web/JavaScript)
- [AJAX](https://developer.mozilla.org/pt-BR/docs/Web/Guide/AJAX)
- [Jquery](https://jquery.com/)
- [Docker](https://www.docker.com/)
- [SASS](https://sass-lang.com/documentation)
- [Bootstrap](https://getbootstrap.com/)

## Orientações

### Rodando a aplicação

***Caso tenha feito o download a partir do Google Drive e utilizar o Docker, pule o passo 1, pois é quase certo que o seu .env estará configurado corretamente.**

Após realizar o clone ou download do projeto, é necessário seguir alguns 
passos até ter a aplicação rodando. Vale ressaltar que o Windows não tem 
suporte ao sail do laravel, mas é possível utilizá-lo a partir do [WSL 2](https://docs.microsoft.com/pt-br/windows/wsl/install)

**Passo 1:** Copiar arquivo .env.example para .env e alterar as propriedades de acordo com o projeto.

### Iniciando com o Docker
**Passo 2:** Construir e subir os conteiners necessários. Esse processo pode demorar alguns minutos, pois ele já instala e configura boa parte do projeto em si.

```bash
$ sail build --no-cache
```

**Passo 3:** Construir e popular as tabelas no banco de dados.

```bash
$ sail artisan migrate --seed
```

**Passo 4:** Acessar o projeto através do seu navegador.

```bash
$ xdg-open http://localhost:80
```

### Iniciando com Web Server Local

**Passo 2:** Instalar as dependências de bibliotecas PHP. Necessário ter o composer na máquina.

```bash
$ composer install
```

**Passo 3:** Atualizar as alterações realizadas no seu arquivo .env

```bash
$ php artisan config:cache
```

**Passo 4:** Construir e popular as tabelas no banco de dados.

```bash
$ php artisan migrate --seed
```

**Passo 5:** Instalar as dependências de bibliotecas JavaScript. Necessário ter o node na máquina.

```bash
$ npm install
```

**Passo 7:** Compilar o código que está dentro dos arquivos JavaScript e de Estilização.

```bash
$ npm run prod
```

**Passo 8:** Iniciar servidor do php para acessar o projeto.

```bash
$ php artisan serve
```

