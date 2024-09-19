<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = $_POST["nome"];
    $servico = $_POST["servico"];
    $especialista = $_POST["especialista"];
    $horas = $_POST["horas"];


    switch ($especialista) {
        case "Rodrigo Ronaldo":
            $especialistaNumero = 1;
            break;
        case "Sara Soares":
            $especialistaNumero = 2;
            break;
        case "Pedro Magalhães":
            $especialistaNumero = 3;
            break;
        case "Maria Eduarda":
            $especialistaNumero = 4;
            break;
        default:
            $especialistaNumero = 0;
    }

    switch ($servico) {
        case "Limpeza Oral":
            $NumeroServico = 1;
            break;
        case "Raspagem dentária":
            $NumeroServico = 2;
            break;
        case "Aparelho dentário":
            $NumeroServico = 3;
            break;
        case "Branqueamento":
            $NumeroServico = 4;
            break;
        default:
            $NumeroServico = 0;
    }

    $conn = mysqli_connect('localhost', 'root', '');
    mysqli_select_db($conn, 'clinica2');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    $sql = "INSERT INTO marcacoes (Nome, Numero_Funcionario, Numero_servico, Horario ) VALUES ('$nome', '$especialistaNumero', '$NumeroServico', '$horas')";
    $result = mysqli_query($conn, $sql);
    $ultimoIdInserido = $conn->insert_id;
}

?>
<script>
   function alterar() {
        window.location.href = "index.html";
    }
</script>
<style>
    body {
        margin: 0;
        padding: 0;
        background: linear-gradient(to right, #d0d0d0, #1565c0);
        font-family: Arial, sans-serif;
        position: relative;
        color: #000000;
        font-weight: bold;
        }

.container {
    display: grid;
    height: 100vh;
}

.centralizado {
    margin: auto;
    text-align: center;
}
.appointment-btn {
        margin-left: 25px;
        background: #000000;
        color: #fff;
        border-radius: 4px;
        padding: 8px 25px;
        white-space: nowrap;
        transition: 0.3s;
        font-size: 14px;
        display: inline-block;
                    }

    .appointment-btn:hover {
        background: #ffffff;
        color: #fff;
                            }
    .borda-superior {
        background-color: #ffffff;
        text-align: center;
        padding: 5px 0;
        display: flex;
        justify-content: center;
        align-items: center;
                   }
    .logo {
        max-width: 70px;
        }

    table {
        width: 80%;
        margin: 20px auto;
        border-collapse: collapse;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        background-color: #ffffff;
    }

    th, td {
        padding: 15px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #3fbbc0;
        color: #fff;
    }

    tbody tr:hover {
        background-color: #f5f5f5;
    }
    .agradecimento {
        margin-top: 20px;
        font-size: 18px;
        color: #000;
        text-align: center;
        padding: 10px;
        background-color: #f7f7f7;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .agradecimento p {
        margin: 0;
        font-weight: bold;
    }

</style>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
        <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
        <link href="assets/vendor/aos/aos.css" rel="stylesheet">
        <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
        <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
        <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
        <link href="assets/css/style.css" rel="stylesheet">
    </head>
    <body>
    <div class="borda-superior">
        <img src="assets/img/apple-touch-icon.png" alt="logotipo" class="logo">
    </div>
        <div class="container">
            <div class="centralizado">
            <div class="agradecimento">
                <p>Obrigado por marcar a consulta conosco!</p>
            </div>
            <table class="table table-dark" border="2">
                <thead>
                    <tr>
                        <th scope="col">Numero marcação</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Serviço</th>
                        <th scope="col">Especialista</th>
                        <th scope="col">Data e Horário</th>
                     </tr>
                </thead>
            <tbody>
                <tr>
                    <th scope="row">
                        <?php 
                             $sql2 = "SELECT Id_Marcacao FROM marcacoes WHERE Id_Marcacao = $ultimoIdInserido";
                             $result2 = mysqli_query($conn, $sql2);
                                while ($row = $result2->fetch_assoc()) {
                                    echo $row['Id_Marcacao'] ;
                                                                        }
                            ?>  
                    </th>
                <td>
                    <?php 
                         $sql3 = "SELECT Nome FROM marcacoes WHERE Id_Marcacao = $ultimoIdInserido";
                        $result3 = mysqli_query($conn, $sql3);
                            while ($row = $result3->fetch_assoc()) {
                                echo $row['Nome'];
                                                                    } 
                        ?> 
                </td>

                <td>
                    <?php 
                        echo $servico;
                    ?> 
                </td>
                <td>
                    <?php 
                        echo $especialista;
                    ?>
                </td>
                <td>
                    <?php 
                        $sql4 = "SELECT Horario FROM marcacoes WHERE Id_Marcacao = $ultimoIdInserido";
                        $result4 = mysqli_query($conn, $sql4);
                            while ($row = $result4->fetch_assoc()) {
                                echo $row['Horario'];
                                                                    } 
                        ?> 
                </td>
                </tr>
            </tbody>
             </table>
             <br>
             <button type="submit" id="btnBusca" onclick="alterar()" class="appointment-btn">Voltar à página inicial</button>

        </div>
        </div>
    </body>
</html>