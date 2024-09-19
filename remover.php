<?php
$id = $_POST['id'];

$conn = mysqli_connect('localhost', 'root', '');
mysqli_select_db($conn, 'clinica2');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$remove = "DELETE FROM marcacoes WHERE Id_Marcacao = $id";
$result = mysqli_query($conn, $remove);

$mensagem_cancelamento = ($result) ? "Consulta cancelada com sucesso!" : "Erro ao cancelar a consulta: " . mysqli_error($conn);

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            margin: 0;
            padding: 0;
            background: linear-gradient(to right, #d0d0d0, #1565c0);
            font-family: Arial, sans-serif;
            position: relative;
            color: #000000;
            font-weight: bold;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .message-container {
            width: 100%;
            max-width: 400px;
            margin: auto; 
            text-align: center;
        }

        .success-message {
            color: #4CAF50;
            background-color: #dff0d8;
            border: 1px solid #4CAF50;
            padding: 10px;
            border-radius: 5px;
        }

        .error-message {
            color: #d9534f;
            background-color: #f2dede;
            border: 1px solid #d9534f;
            padding: 10px;
            border-radius: 5px;
        }

        p {
            margin: 0;
            font-weight: bold;
        }

        img.logo {
            max-width: 70px;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <div class="message-container <?php echo ($result) ? 'success-message' : 'error-message'; ?>">
        <img src="assets/img/apple-touch-icon.png" alt="logotipo" class="logo">
        <p><?php echo $mensagem_cancelamento; ?></p>
        <?php if ($result) : ?>
            <p>Esperamos que possa desfrutar dos nossos serviços brevemente.</p>
        <?php endif; ?>
    </div>
</body>
</html>