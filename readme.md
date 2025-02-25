## Instalação e Configuração de Ambiente de Produção

### 1. Clonando o Projeto

```bash
git clone https://github.com/Luis-F-Oliveira/web-facilita.git
cd web-facilita
```

### 2. Instalação Vendor

```bash
chmod +x start.sh
sh start.sh
```

### 3. Configurando Variáveis de Ambiente

1. Copie o exemplo `.env`:
```bash
cp .env.example .env
```

2. Modifique as variáveis de ambiente, especialmente:
- Banco de Dados
```bash
DB_CONNECTION=
DB_HOST=
DB_PORT=
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```

- Redis
```bash
REDIS_CLIENT=phpredis
REDIS_HOST=redis
REDIS_PASSWORD=null
REDIS_PORT=6379
```

- Memcached
```bash
MEMCACHED_HOST=memcached
MEMCACHED_PORT=11211
```

3. Construindo e Inicializando os Containers

Agora com o `.env` configurado e projeto preparado, vamos construir e iniciar os containers Docker.

No diretório raiz do projeto, execute:
```bash
docker-compose build
docker-compose up -d
```

4. Gerar `APP_KEY`:
```bash
docker-compose exec laravel.prod php artisan key:generate
```

5. Rodando as Migrações

Após inicializar os containers, você precisa rodar as migrações para configurar o banco de dados.

```bash
docker-compose exec laravel.prod php artisan migrate --seed
```