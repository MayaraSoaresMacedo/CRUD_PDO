<?php
require 'styles.php';

$pdo = new PDO("mysql:host=localhost;dbname=meu_banco", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

echo "<h2>Usuários</h2>";

$stmt = $pdo->query("SELECT * FROM usuarios");
echo "<table>
        <tr>
            <th>ID</th><th>Nome</th><th>Email</th>
        </tr>";
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['nome']}</td>
            <td>{$row['email']}</td>
        </tr>";
}
echo "</table>";
?>
