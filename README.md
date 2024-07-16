# Título do projeto

Exercicio Prático utilizando Php - Laravel e Vue.Js

## 🚀 Começando

Essas instruções permitirão que você obtenha uma cópia do projeto em operação na sua máquina local para fins de desenvolvimento e teste.


### 📋 Pré-requisitos

Para garantir que a aplicação funcione como desejado, será necessário alguns passos antes de rodarmos o sistema:

Rodar comandos básicos de instalação de dependencias:

composer install
npm install

Para que o back-end funcione corretamente:

Rode as migrations do banco de dados com o comando:

php artisan migrate

Será necessário também que seja executada as Seeders do projeto:

php artisan db:seed

A seed que será executada foi configurada para criação das permissões e criação das Roles no banco de dados. Ao rodar essa seed, também será incluido um usuário admin padrão (caso não exista):
email: admin@gmail.com
senha: 12345678



