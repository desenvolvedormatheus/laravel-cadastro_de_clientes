### Como rodar o projeto na sua máquina?

### 1. Clonar o Repositório
Primeiro, clone o repositório do projeto para a nova máquina:

```sh
git clone https://github.com/desenvolvedormatheus/laravel-cadastro_de_clientes.git
cd laravel-cadastro_de_clientes
```

### 2. Instalar PHP e Composer
Garanta que o PHP e o Composer estejam instalados na máquina.

### 3. Instalar Dependências do PHP
Depois de instalar o PHP e o Composer, instale as dependências do projeto Laravel:

```sh
composer install
```

### 4. Configurar o Ambiente
Crie um arquivo `.env` copiando o arquivo de exemplo `.env.example` e configure-o conforme necessário para seu ambiente de desenvolvimento:

```sh
cp .env.example .env
```

### 5. Gerar Chave da Aplicação
Gere uma nova chave para a aplicação Laravel:

```sh
php artisan key:generate
```

### 6. Instalar NPM e Dependências do Node.js
Garanta que o Node.js e o npm estão instalados.

#### Instalar Dependências do Node.js
Instale as dependências do projeto usando npm:

```sh
npm install
```

### 7. Compilar os Assets
Compile os assets do front-end:

```sh
npm run dev
```

### 8. Configurar Banco de Dados
Configure seu banco de dados no arquivo `.env` e execute as migrações para criar as tabelas:

```sh
php artisan migrate
```

### 9. Servir a Aplicação
Inicie o servidor de desenvolvimento do Laravel:

```sh
php artisan serve
```

### Dependências Laravel e Livewire
Certifique-se de que as seguintes dependências estão presentes em seu `composer.json` e `package.json`:

#### `composer.json`
```json
"require": {
    "php": "^8.2",
    "laravel/framework": "^11.9",
    "laravel/tinker": "^2.9",
    "livewire/livewire": "^3.4",
    "livewire/volt": "^1.0"
},
```

#### `package.json`
```json
"devDependencies": {
    "@tailwindcss/forms": "^0.5.2",
    "autoprefixer": "^10.4.2",
    "axios": "^1.6.4",
    "laravel-vite-plugin": "^1.0",
    "postcss": "^8.4.31",
    "tailwindcss": "^3.1.0",
    "vite": "^5.0"
}
```
