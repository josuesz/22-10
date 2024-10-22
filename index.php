<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Indústria</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Lista de Funcionários</h1>
    <table>
        <tr>
            <th>Número</th>
            <th>Salário</th>
            <th>Telefone</th>
            <th>Departamento</th>
            <th>Ações</th>
        </tr>
        <?php
        $stmt = $pdo->query("SELECT Funcionario.Numero, Funcionario.Salario, Funcionario.Telefone, Departamento.Setor FROM Funcionario LEFT JOIN Departamento ON Funcionario.Departamento_ID = Departamento.Numero");
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>
                    <td>{$row['Numero']}</td>
                    <td>{$row['Salario']}</td>
                    <td>{$row['Telefone']}</td>
                    <td>{$row['Setor']}</td>
                    <td>
                        <a href='edit.php?id={$row['Numero']}'>Alterar</a> |
                        <a href='delete.php?id={$row['Numero']}'>Excluir</a>
                    </td>
                </tr>";
        }
        ?>
    </table>
</body>
</html>
