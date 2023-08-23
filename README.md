<h1 align="center">
  <p align="center">Teste Laravel - Capital Consig</p>
  <img src="https://imgur.com/fbwPu3A.jpg" alt="Capital Consig">
</h1>

<p align="center">
  <a href="#license"><img src="https://img.shields.io/github/license/sourcerer-io/hall-of-fame.svg?colorB=ff0000"></a>
  <a href="https://imgur.com/fbwPu3A.jpg"><img src="https://img.shields.io/badge/cardapio-working-brightgreen?color=green" alt="Cardapio Online"></a>
  <a href="CONTRIBUTING.md#pull-requests"><img src="https://img.shields.io/badge/PRs-welcome-brightgreen.svg" alt="PRs Welcome with Admins"></a>
</p>

## Introduction/Introdução

O projeto se baseia-se no teste `Laravel` da [Capital Consig](https://www.capitalconsig.com.br/home.html) onde é possível encontrar **"A melhor experiência em crédito"**.

## Installation/Instalação

1. Verifique se o Docker e o Docker Composer estão instalados na sua maquina.
2. Execute o comando `cp .env.example .env` para gerar o arquivo contendo as variáveis de ambiente.
3. Execute o comando `docker-compose build` para gerar os containers.
4. Execute o comando `docker-compose up -d` para subir a estrutura da aplicação.
5. Execute o comando `docker exec capital-laravel composer install` para instalar as dependências da aplicação.
6. Execute o comando `docker exec capital-laravel php artisan key:generate` para gerar a chave da aplicação.
7. Execute o comando `php artisan migrate:fresh --seed` para criar as tabelas necessárias e popular os dados do banco de dados.
8. Acesse: [localhost:80](http://localhost/).

Para acessar o container principal do projeto utilize o comando: `docker exec -it capital-laravel bash`.

## Versioning/Versionamento

O projeto está sendo versionado utilizando o padrão [Git Flow](https://medium.com/trainingcenter/utilizando-o-fluxo-git-flow-e63d5e0d5e04).

## Contributing/Contribuir

Quer contribuir com o projeto? [Veja como contribuir por aqui](./CONTRIBUTING.md).

## Code of Conduct/Código de Conduta

Veja o nosso [Código de Conduta](./CODE_OF_CONDUCT.md).

## License/Licença do Projeto

[MIT License](./LICENSE.md).
