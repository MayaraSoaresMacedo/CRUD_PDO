<?php
require 'styles.php';

$pdo = new PDO("mysql:host=localhost;dbname=meu_banco", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

echo "<h2>Produtos</h2>";

$stmt = $pdo->query("SELECT * FROM produtos");
echo "<table>
        <tr>
            <th>ID</th><th>Nome</th><th>Preço (R$)</th>
        </tr>";
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['nome']}</td>
            <td>{$row['preco']}</td>
        </tr>";
}
echo "</table>";
?>
