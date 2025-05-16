<?php
try {
    // Conexão com o banco
    $pdo = new PDO("mysql:host=localhost", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Criando o banco
    $pdo->exec("CREATE DATABASE IF NOT EXISTS meu_banco");
    $pdo->exec("USE meu_banco");

    // Criando as tabelas
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS usuarios (
            id INT AUTO_INCREMENT PRIMARY KEY,
            nome VARCHAR(100),
            email VARCHAR(100)
        );

        CREATE TABLE IF NOT EXISTS produtos (
            id INT AUTO_INCREMENT PRIMARY KEY,
            nome VARCHAR(100),
            preco DECIMAL(10,2)
        );

        CREATE TABLE IF NOT EXISTS pedidos (
            id INT AUTO_INCREMENT PRIMARY KEY,
            usuario_id INT,
            produto_id INT,
            quantidade INT,
            FOREIGN KEY (usuario_id) REFERENCES usuarios(id),
            FOREIGN KEY (produto_id) REFERENCES produtos(id)
        );
    ");

    // Dados do banco
    $pdo->exec("
        INSERT INTO usuarios (nome, email) VALUES
        ('Ana Paula', 'anapaula@email.com'),
        ('Edilene Silva', 'edilenesilva@email.com'),
        ('Mayara Macedo', 'mayara@email.com'),
        ('Gustavo Henrique', 'gustavo@email.com')
    ");

    $pdo->exec("
        INSERT INTO produtos (nome, preco) VALUES
        ('Notebook', 3500.00),
        ('Celular', 2000.00),
        ('Teclado', 150.00),
        ('Mouse', 80.00)
    ");

    $pdo->exec("
        INSERT INTO pedidos (usuario_id, produto_id, quantidade) VALUES
        (1, 1, 1),
        (2, 2, 2),
        (3, 3, 1),
        (4, 4, 3)
    ");

    echo "✅ Banco de dados e tabelas criados com sucesso!";
} catch (PDOException $e) {
    die("Erro ao configurar o banco de dados: " . $e->getMessage());
}
