<?php
$id = $_POST['procura'];

$conn = mysqli_connect('localhost', 'root', '');
mysqli_select_db($conn, 'clinica2');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$altera = "SELECT * FROM marcacoes WHERE Id_Marcacao = $id";
$result = mysqli_query($conn,$altera);

$registo=mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes da Marcação</title>
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

        .container {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            padding: 20px;
            max-width: 400px;
            width: 100%;
            margin: 0 auto;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #000;
            text-align: left; /* Alinha o texto à esquerda */
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            box-sizing: border-box;
            border: none;
            border-radius: 5px;
            background-color: #ecf0f1;
            font-size: 16px;
            text-align: left; /* Alinha o texto à esquerda */
        }

        .appointment-btn {
            background: #3fbbc0;
            color: #fff;
            border-radius: 4px;
            padding: 8px 25px;
            margin: 10px;
            white-space: nowrap;
            transition: 0.3s;
            font-size: 14px;
            display: inline-block;
            border: none;
            cursor: pointer;
        }

        .appointment-btn:hover {
            background: #65c9cd;
        }
    </style>
</head>
<body>
    <div class="container">
        <form method="post">
            <div class="form-group">
                <label for="id">Numero da Marcação</label>
                <input type="text" name="id" value="<?php echo $registo['Id_Marcacao'];?>" readonly/>
            </div>
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" name="nome" value="<?php echo $registo['Nome'];?>" />
            </div>
            <div class="form-group">
                <label for="hora">Horário</label>
                <input type="text" name="hora" value="<?php echo $registo['Horario'];?>" />
            </div>
            <div>
                <input type="submit" name="Submit" value="Alterar" formaction="alterar2.php" class="appointment-btn">
                <input type="submit" name="Submit" value="Cancelar Consulta" formaction="remover.php" class="appointment-btn">
            </div>
        </form>
    </div>
</body>
</html>