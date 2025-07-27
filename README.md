# AdminClientes

AdminClientes é um sistema web desenvolvido em Laravel para gerenciamento completo de clientes.

## Funcionalidades

- **CRUD de Clientes:** Cadastro, edição, visualização, listagem e exclusão de clientes.
- **Campos do Cliente:**
  - Nome
  - CPF
  - Data de nascimento
  - Data de cadastro
  - Renda familiar
- **Listagem de Clientes:** Exibe todos os clientes cadastrados com filtros.
- **Relatório de Clientes:** Geração de relatórios dos clientes, exibindo cards para cada cliente, facilitando a visualização das informações.
- **Tratamento de Sessões:** Utilização de `try-catch` e logs para capturar e registrar exceções.
- **Layout com Sidebar:** Navegação lateral para facilitar o acesso às funcionalidades.
- **Badge:** Elementos visuais para destaque de informações, implementados apenas com PHP e CSS.

## Instalação e Execução

1. **Instale as dependências:**
   ```bash
   composer install
   ```

2. **Inicie o servidor de desenvolvimento:**
   ```bash
   php artisan serve
   ```

## Módulo Clientes

### Crie o modelo, controller e resource para Cliente

1. **Crie o modelo, controller e resource para Cliente:**
   ```bash
   php artisan make:model Cliente -mc --resource
   ```

2. **Crie a migration de clientes:**
   Edite a migration gerada em `database/migrations` adicionando os campos:
   - `nome` (string)
   - `cpf` (string, único)
   - `data_nascimento` (date)
   - `data_cadastro` (date)
   - `renda_familiar` (decimal)

   Depois execute:
   ```bash
   php artisan migrate
   ```

3. **Crie as views:**
   - `clientes/index.blade.php`: Listagem e filtro de clientes
   - `clientes/create.blade.php`: Cadastro de cliente
   - `clientes/edit.blade.php`: Edição de cliente
   - `clientes/show.blade.php`: Visualização de cliente

4. **Implemente os métodos nos controller:**
   - `index`: Listagem e filtro
   - `create`: Formulário de cadastro
   - `store`: Salvar cliente
   - `edit`: Formulário de edição
   - `show`: Detalhes do cliente
   - `destroy`: Excluir cliente

## Módulo Relatório

### Crie o controller para Relatório

1. **Crie o controller para Relatório:**
   ```bash
   php artisan make:controller RelatorioController
   ```

2. **Crie a view para Relatório:**
   - `relatorios/index.blade.php`: Relatório de clientes exibindo cards

3. **Implemente o método no controller para gerar o relatório:**
   - `index`: Geração do relatório

4. **Implemente a lógica para exibir os cards com as informações dos clientes:**
   - Utilize a view `relatorios/index.blade.php` para exibir os cards com as informações dos clientes

## Tratamento de Exceções

- Utilize `try-catch` nos métodos do controller.
- Registre logs utilizando o sistema de logs do Laravel ou PHP.

## Observações

- Todas as funcionalidades são feitas sem frameworks JS no frontend, apenas PHP e CSS.
- O layout é responsivo e organizado.
- O projeto segue boas práticas de tratamento de exceções e registro de logs.