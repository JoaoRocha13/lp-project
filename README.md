<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

# Site do Clube - Laravel Project

Este projeto é um site para um clube desportivo, desenvolvido em Laravel, com funcionalidades tanto para utilizadores gerais como para administradores. O objetivo é criar uma experiência intuitiva para os membros do clube enquanto facilita a gestão do mesmo por parte da equipa administrativa.

---

## Funcionalidades Principais

### **USERS (Utilizadores)**
- **Registo:** Permite que novos utilizadores se registem no site.
- **Login:** Acesso à conta de utilizador.
- **Confirmação de E-mail:** Verificação de conta através de e-mail.
- **Recuperar Password:** Recurso para redefinir a senha de acesso.

### **PROFILE (Perfil)**
- **Visualizar Perfil:** Mostra as informações do utilizador.
- **Atualizar Foto de Perfil:** Possibilidade de alterar a imagem de perfil.
- **Logout:** Encerrar sessão de forma segura.

### **HOME (Página Principal)**
- **Bilhetes:** Adicionar bilhetes ao carrinho de compras.
- **Comentários:** Publicar comentários e interagir com outros utilizadores.

### **ABOUT (Sobre)**
- **Jogos Anteriores:** Visualizar informações sobre jogos passados.
- **Notícias:** Acompanhar as últimas novidades do clube.

### **LOJA (Store)**
- **Produtos:** Exibir produtos disponíveis para compra.
- **Carrinho:** Adicionar produtos ao carrinho para posterior checkout.

### **CHECKOUT**
- **Carrinho:** Visualizar os itens no carrinho.
- **Compra:** Finalizar o processo de compra.
- **Fatura:** Gerar fatura e enviá-la por e-mail.

### **ADMIN (Administração)**
- **Gestão de Utilizadores:**
  - Listar utilizadores.
  - Promover utilizadores a administradores.
- **Notícias:**
  - Publicar, listar e remover notícias.
- **Jogos e Bilhetes:**
  - Publicar, listar e remover jogos e bilhetes.
  - Gerir jogos anteriores.
- **Loja:**
  - Publicar, listar e remover produtos.
- **Gestão de Compras:**
  - Visualizar e gerir as compras realizadas.
- **Stripe:** Integração para pagamentos seguros.

---

## Tecnologias e Ferramentas
- **Backend:** Laravel Framework.
- **Frontend:** Blade Templating e HTML5.
- **Base de Dados:** MySQL ou PostgreSQL.
- **Pagamentos:** Stripe API.

---

## Requisitos para Execução
1. **Servidor Local:** XAMPP, WAMP ou Laravel Sail.
2. **PHP:** Versão 8.0 ou superior.
3. **Composer:** Gerenciador de dependências para PHP.
4. **Base de Dados:** MySQL ou PostgreSQL.
5. **Node.js:** Para gerenciamento de pacotes front-end (opcional).

---

## Como Configurar
1. Clone o repositório:
   ```bash
   git clone <URL_DO_REPOSITORIO>
