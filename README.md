<p align="center"><a href="https://codejr.com.br/" target="_blank"><img src="https://codejr.com.br/wp-content/uploads/elementor/thumbs/Da-uma-olhada-no-design-que-eu-fiz-no-Canva-e1631206678162-pcvbl6lcx3mwo97eg0q4yn4zchcokysbd7aoauowe8.png" width="750" alt="Code"></a></p>

<h1 align="center">
    Desafio Laravel 2023.2
</h1>

## Sobre o desafio

O desafio tem como intuito treinar os novos membros da Code Jr., afim de familiarizarem melhor com o framework desenvolvendo um sitema de gerenciamento interno de uma clínica veterinária, com as funcionalidades definidas no documento de requisitos disponibilizado.

## Como executar o projeto

Para executar o projeto você deve seguir os seguintes passos:

- Copie o arquivo `.env.example` e renomeie sua cópia para `.env`
- Crie um banco 'MySql' com o nome de `desafio_laravel_code`
- execute o comando: ```composer install```
- execute o comando: ```php artisan key:generate``` 
- execute o comando: ```npm install```
- execute o comando: ```npm run build```

Além dos comandos acima, você deve utilizar o comando ```php artisan migrate``` para criar as tabelas no banco de dados e ```php artisan db:seed``` para popular as tabelas com dados fictícios. Para rodar o projeto, execute o comando ```php artisan serve``` junto com o comando ```npm run watch```.

## Resultado

|                               |                               |
| ----------------------------- | ----------------------------- |
| ![Dark mode login](public/img/readme/dark-login.png)        | ![Light mode login](public/img/readme/light-login.png)      |
| ![Dark mode index](public/img/readme/dark-owners-index.png)  | ![Light mode index](public/img/readme/light-users-index.png)|  |
| ![Dark mode show](public/img/readme/dark-modal-show.png)     | ![Light mode modal](public/img/readme/light-modal.png)|
| ![Dark mode create](public/img/readme/dark-modal-create.png)     | ![Template PDF Invoice](public/img/readme/template-invoicepdf.png) |

### Observações

O PDF atualiza de acordo com as consultas adicionadas ao banco.

