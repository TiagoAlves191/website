<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta</title>
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
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        #formBusca {
            background-color: #3498db;
            border: solid 2px #2980b9;
            border-radius: 15px;
            width: 350px;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        }

        #divBusca {
            display: flex;
            align-items: center;
            width: 100%;
            margin-bottom: 20px;
        }

        #txtBusca {
            flex: 1;
            background-color: #ecf0f1;
            padding: 10px;
            font-size: 16px;
            border: none;
            height: 100%;
            color: #2c3e50;
            border-radius: 5px;
            outline: none;
        }

        #btnBusca {
            border: none;
            padding: 10px;
            border-radius: 5px;
            font-weight: bold;
            background: #2c3e50;
            color: #ecf0f1;
            cursor: pointer;
            transition: background 0.3s;
        }

        #btnBusca:hover {
            background: #1d2c3e;
        }

        #divBusca img {
            width: 25px;
            margin-right: 10px;
        }

        #titulo {
            font-size: 28px;
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 15px;
        }

        #instrucao {
            font-size: 18px;
            color: white;
            text-align: center;
            margin-bottom: 20px;
        }
        .borda-superior {
            background-color: #ffffff;
            text-align: center;
            padding: 10px 0;
        }

        .logo {
            max-width: 70px;
        }
    </style>
</head>
<body>
<div class="borda-superior">
        <img src="assets/img/apple-touch-icon.png" alt="logotipo" class="logo">
    </div>
    <div class="container">
        <form id="formBusca" method="post" action="alterar.php">
            <div id="titulo">Consulta de Marcações</div>
            <div id="instrucao">Informe o número da marcação para obter detalhes</div>
            <div id="divBusca">
                <img src="loupe.png" alt="Buscar..."/>
                <input type="search" id="txtBusca" name="procura" placeholder="Número da Marcação"/>
            </div>
            <button type="submit" id="btnBusca">Procurar</button>
        </form>
    </div>
</body>
</html>