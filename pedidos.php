<?php
require 'styles.php';

$pdo = new PDO("mysql:host=localhost;dbname=meu_banco", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

echo "<h2>Pedidos</h2>";

$stmt = $pdo->query("
    SELECT pedidos.id, usuarios.nome AS cliente, produtos.nome AS produto, pedidos.quantidade 
    FROM pedidos 
    JOIN usuarios ON pedidos.usuario_id = usuarios.id
    JOIN produtos ON pedidos.produto_id = produtos.id
");

echo "<table>
        <tr>
            <th>ID Pedido</th><th>Cliente</th><th>Produto</th><th>Quantidade</th>
        </tr>";
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['cliente']}</td>
            <td>{$row['produto']}</td>
            <td>{$row['quantidade']}</td>
        </tr>";
}
echo "</table>";
?>
