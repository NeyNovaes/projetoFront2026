CREATE DATABASE sistema_produtos;

USE sistema_produtos;

CREATE TABLE produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    descricao TEXT,
    preco DECIMAL(10,2) NOT NULL,
    estoque INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO produtos (nome, descricao, preco, estoque)
VALUES
('Notebook Dell', 'Notebook i5 16GB RAM', 3500.00, 10),
('Mouse Gamer', 'Mouse RGB', 120.00, 25),
('Teclado Mecânico', 'Switch Blue', 250.00, 15);
