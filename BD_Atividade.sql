CREATE DATABASE agenda;

USE agenda;

-- Contatos
CREATE TABLE contatos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    telefone VARCHAR(14) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Clientes
CREATE TABLE clientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    cpf VARCHAR(14) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL,
    telefone VARCHAR(14) NOT NULL,
    endereco VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Produtos
CREATE TABLE produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    descricao TEXT,
    preco DECIMAL(10,2) NOT NULL,
    estoque INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert Contatos
INSERT INTO contatos (nome, email, telefone)
VALUES
('Ana Silva', 'ana@email.com', '11999990001'),
('Carlos Souza', 'carlos@email.com', '11999990002'),
('Mariana Lima', 'mariana@email.com', '11999990003');

-- Insert Clientes
INSERT INTO clientes (nome, cpf, email, telefone, endereco)
VALUES
('João Pedro', '123.456.789-00', 'joao@email.com', '11988880001', 'Rua A, 100'),
('Fernanda Costa', '987.654.321-00', 'fernanda@email.com', '11988880002', 'Rua B, 200'),
('Lucas Martins', '456.789.123-00', 'lucas@email.com', '11988880003', 'Rua C, 300');

-- Insert Produtos
INSERT INTO produtos (nome, descricao, preco, estoque)
VALUES
('Notebook Gamer', 'Notebook com RTX 4060', 5999.90, 10),
('Mouse Gamer', 'Mouse RGB 7200 DPI', 149.90, 50),
('Teclado Mecânico', 'Teclado ABNT2 Switch Blue', 299.90, 25);

-- Consultas
SELECT * FROM contatos;

SELECT * FROM clientes;

SELECT * FROM produtos;

ALTER TABLE produtos
ADD imagem VARCHAR(255) NULL;