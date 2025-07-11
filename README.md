# EcoGroup Manager

Sistema completo de gerenciamento de grupos econômicos, marcas, unidades e funcionários desenvolvido em Laravel 12+.

## 🚀 Características

- **Gestão Completa**: Grupos Econômicos, Marcas, Unidades e Funcionários
- **Interface Moderna**: Design responsivo com Tailwind CSS e componentes modernos
- **Relatórios Avançados**: Filtros, paginação e exportação CSV
- **Auditoria**: Log de atividades automático
- **Validação Robusta**: CPF, CNPJ e regras de negócio
- **Autenticação**: Sistema completo de login e registro
- **Dashboard Interativo**: Gráficos e estatísticas em tempo real

## 🛠️ Tecnologias

- **Backend**: Laravel 12+
- **Frontend**: Blade Templates + Tailwind CSS
- **Banco de Dados**: MySQL/SQLite
- **Ícones**: FontAwesome 6
- **Gráficos**: Chart.js
- **Validação**: Regras customizadas para CPF/CNPJ

## 📋 Pré-requisitos

- **PHP 8.2+**
- **Composer 2.0+**
- **Node.js 16+ & NPM**
- **MySQL 8.0+** ou SQLite
- **Git**

## ⚡ Instalação Passo a Passo

### 1. Clone o Repositório
```bash
git clone <repository-url>
cd economic-group-management
```

### 2. Instale as Dependências PHP
```bash
composer install
```

### 3. Instale as Dependências Node.js
```bash
npm install
```

### 4. Configure o Arquivo de Ambiente
```bash
# Copie o arquivo de exemplo
cp .env.example .env

# Gere a chave da aplicação (OBRIGATÓRIO)
php artisan key:generate
```

### 5. Configure o Banco de Dados

#### Opção A: MySQL (Recomendado)
```bash
# Crie o banco de dados
mysql -u root -p
CREATE DATABASE ecogroup_manager;
exit;

# Configure o .env com suas credenciais
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ecogroup_manager
DB_USERNAME=root
DB_PASSWORD=sua_senha_aqui
```

#### Opção B: SQLite (Desenvolvimento)
```bash
# Crie o arquivo do banco
touch database/database.sqlite

# Configure o .env
DB_CONNECTION=sqlite
DB_DATABASE=/caminho/completo/para/database/database.sqlite
```

### 6. Execute as Migrações
```bash
# Crie as tabelas no banco
php artisan migrate

# Execute o seeder para criar dados de exemplo
php artisan db:seed
```

### 7. Compile os Assets
```bash
# Para produção
npm run build

# Para desenvolvimento (opcional)
npm run dev
```

### 8. Inicie o Servidor
```bash
# Inicie o servidor Laravel
php artisan serve

# O servidor estará disponível em:
# http://localhost:8000
```

## 🔐 Credenciais de Acesso

Após executar o seeder, você pode acessar o sistema com:

- **URL**: http://localhost:8000
- **Email**: admin@ecogroup.com
- **Senha**: password

### Criar Novo Usuário (Opcional)
```bash
# Acesse: http://localhost:8000/register
# Ou use o formulário de registro na aplicação
```

## 🗄️ Estrutura do Banco de Dados

### Tabelas Criadas:
- `users` - Usuários do sistema
- `economic_groups` - Grupos econômicos
- `brands` - Marcas/Bandeiras
- `units` - Unidades
- `employees` - Funcionários/Colaboradores
- `activity_log` - Log de auditoria
- `jobs` - Filas de processamento
- `failed_jobs` - Jobs que falharam

### Dados de Exemplo Incluídos:
- 3 Grupos Econômicos (Grupo ABC, Grupo XYZ, Grupo 123)
- 4 Marcas (Marca Alpha, Beta, Gamma, Delta)
- 5 Unidades (Central, Norte, Sul, Leste, Oeste)
- 8 Funcionários (João, Maria, Pedro, Ana, Carlos, Lucia, Roberto, Fernanda)
- 1 Usuário administrador

## 📊 Funcionalidades

### 🏢 Grupos Econômicos
- ✅ CRUD completo
- ✅ Validação de CNPJ
- ✅ Relacionamento com marcas
- ✅ Estatísticas integradas

### 🏷️ Marcas
- ✅ Vinculação com grupos econômicos
- ✅ Gestão de unidades
- ✅ Relatórios por marca

### 🏪 Unidades
- ✅ Dados completos (fantasia, razão social, CNPJ)
- ✅ Vinculação com marcas
- ✅ Gestão de funcionários

### 👥 Funcionários
- ✅ Dados pessoais completos
- ✅ Validação de CPF
- ✅ Vinculação com unidades
- ✅ Histórico de atividades

### 📈 Relatórios
- ✅ Filtros avançados
- ✅ Paginação
- ✅ Exportação CSV
- ✅ Estatísticas em tempo real

## 🎨 Interface

- **Design Moderno**: Glass effect, gradientes e animações
- **Responsivo**: Funciona em desktop, tablet e mobile
- **Acessível**: Navegação intuitiva e feedback visual
- **Performance**: Carregamento otimizado

## 🔧 Configuração Avançada

### Variáveis de Ambiente Importantes
```env
APP_NAME="EcoGroup Manager"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost:8000

# Banco de Dados MySQL
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ecogroup_manager
DB_USERNAME=root
DB_PASSWORD=sua_senha_aqui

# Banco de Dados SQLite
# DB_CONNECTION=sqlite
# DB_DATABASE=/caminho/completo/para/database/database.sqlite

# Filas
QUEUE_CONNECTION=database

# Cache
CACHE_DRIVER=file
SESSION_DRIVER=file
```

### Comandos Úteis
```bash
# Limpar cache
php artisan cache:clear
php artisan config:clear
php artisan view:clear

# Recriar banco de dados
php artisan migrate:fresh --seed

# Ver rotas disponíveis
php artisan route:list

# Verificar status do sistema
php artisan about

# Executar testes
php artisan test
```

### Personalização
- **Cores e temas**: `tailwind.config.js`
- **Componentes Blade**: `resources/views/components/`
- **Estilos CSS**: `resources/css/app.css`
- **Validações**: `app/Rules/`

## 🚀 Deploy em Produção

### 1. Configuração de Produção
```bash
# Configure o ambiente
APP_ENV=production
APP_DEBUG=false
APP_URL=https://seudominio.com

# Otimize a aplicação
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### 2. Configuração do Servidor Web
```bash
# Configure o servidor web (Apache/Nginx)
# Aponte para a pasta public/
# Configure as permissões adequadas
```

### 3. Configuração de Filas
```bash
# Configure um supervisor para as filas
# Exemplo de configuração no README completo
```

## 🧪 Testes

```bash
# Executar todos os testes
php artisan test

# Executar testes específicos
php artisan test --filter=AuthenticationTest

# Executar com cobertura
php artisan test --coverage
```

## 📝 Licença

Este projeto está sob a licença MIT. Veja o arquivo [LICENSE](LICENSE) para mais detalhes.

## 🤝 Contribuição

1. Fork o projeto
2. Crie uma branch para sua feature (`git checkout -b feature/AmazingFeature`)
3. Commit suas mudanças (`git commit -m 'Add some AmazingFeature'`)
4. Push para a branch (`git push origin feature/AmazingFeature`)
5. Abra um Pull Request

## 🐛 Solução de Problemas

### Erro de Conexão com Banco
```bash
# Verifique se o MySQL está rodando
sudo service mysql start

# Verifique as credenciais no .env
# Teste a conexão
php artisan tinker
DB::connection()->getPdo();
```

### Erro de Permissões
```bash
# Configure as permissões adequadas
chmod -R 755 storage/
chmod -R 755 bootstrap/cache/
```

### Erro de Dependências
```bash
# Limpe o cache do Composer
composer clear-cache
composer install --no-cache

# Limpe o cache do NPM
npm cache clean --force
npm install
```

## 📞 Suporte

Para suporte, envie um email para soterocaue2@gmail.com ou abra uma issue no GitHub.

---

**EcoGroup Manager** - Gerenciamento inteligente de grupos econômicos 🚀

**Versão**: 1.0.0  
**Laravel**: 12.x  
**PHP**: 8.2+
