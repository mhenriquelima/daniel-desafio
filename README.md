# 🗄️ Banco de Dados — Sistema de Clientes e Produtos

Este projeto cria um banco de dados simples com duas tabelas:  
- `clientes` → guarda informações sobre os clientes  
- `produtos` → guarda informações sobre os produtos  

## 🏗️ Passo 1 — Criar o Banco de Dados

```sql
CREATE DATABASE projeto1;
USE projeto1;
```

---

## 👥 Passo 2 — Criar a Tabela `clientes`

```sql
CREATE TABLE clientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cliente VARCHAR(100) NOT NULL,
    cidade VARCHAR(100),
    estado CHAR(2)
);
```

**Campos:**
- `id` → identificador único do cliente (chave primária)  
- `cliente` → nome do cliente  
- `cidade` → cidade onde o cliente mora  
- `estado` → sigla do estado (ex: “SP”, “RJ”)  

---

## 📦 Passo 3 — Criar a Tabela `produtos`

```sql
CREATE TABLE produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    produto VARCHAR(100) NOT NULL,
    preco DECIMAL(10, 2) NOT NULL,
    estoque INT DEFAULT 0
);
```

**Campos:**
- `id` → identificador único do produto (chave primária)  
- `produto` → nome do produto  
- `preco` → preço unitário do produto  
- `estoque` → quantidade disponível  

---
