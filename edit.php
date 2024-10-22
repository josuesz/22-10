<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM Funcionario WHERE Numero = ?");
    $stmt->execute([$id]);
    $funcionario = $stmt->fetch(PDO::FETCH_ASSOC);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $salario = $_POST['salario'];
    $telefone = $_POST['telefone'];
    $departamento_id = $_POST['departamento_id'];

    $stmt = $pdo->prepare("UPDATE Funcionario SET Salario = ?, Telefone = ?, Departamento_ID = ? WHERE Numero = ?");
    $stmt->execute([$salario, $telefone, $departamento_id, $id]);

    header("Location: index.php");
    exit;
}

$stmt = $pdo->query("SELECT * FROM Departamento");
$departamentos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Funcionário</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Editar Funcionário</h1>
    <form method="POST">
        <label>Salário:</label>
        <input type="text" name="salario" value="<?= $funcionario['Salario'] ?>" required><br>

        <label>Telefone:</label>
        <input type="text" name="telefone" value="<?= $funcionario['Telefone'] ?>" required><br>

        <label>Departamento:</label>
        <select name="departamento_id" required>
            <?php foreach ($departamentos as $departamento): ?>
                <option value="<?= $departamento['Numero'] ?>" <?= $departamento['Numero'] == $funcionario['Departamento_ID'] ? 'selected' : '' ?>>
                    <?= $departamento['Setor'] ?>
                </option>
            <?php endforeach; ?>
        </select><br>

        <input type="submit" value="Salvar">
    </form>
</body>
</html>
