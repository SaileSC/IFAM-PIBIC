<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Investimento Fixo</title>

    <!-- Inclusão do Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="src\App\view\css\inve_fixo.css">
    <script src="src\App\view\js\inve.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-custom">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <h1 class="m-0">
                    <img class="d-block w-60" src="src\App\view\img\logo.png" alt="Logo da loja">
                </h1>
            </a>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="/src/App/view/html/home.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Perfil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Configurações</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <h2 class="text-center text-white">Plano Financeiro</h2>
    <h3 class="text-center text-white p-4 mt-5">Investimento Fixo</h3>
    <div class="container mt-5">
        <form action="/Investimento-Fixo" method="post">
            <h4 class="text-white">Máquina e Equipamentos</h4>
            <table class="table table-dark table-striped-columns text-center" id="Tabela_01">
                <thead>
                    <tr>
                        <th><button type="button" class="btn btn-success" style="text-align: center;" onclick="adicionarLinha()">+</button></th>
                        <th>Descrição</th>
                        <th>Quantidade</th>
                        <th>Valor Unitário</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="table table-dark table-striped-columns text-center">
                        <td><button type="button" class="btn btn-danger" onclick="deletarLinha(this)">Deleta</button></td>
                        <td><input type="text" name="descricao[]" id="descricao_1"></td>
                        <td><input type="number" name="quantidade[]" id="quantidade_1" oninput="calcularTotal(1)"></td>
                        <td><input type="number" name="valor_unitario[]" id="valor_unitario_1" oninput="calcularTotal(1)"></td>
                        <td><input type="number" name="total[]" id="total_1" readonly></td>
                    </tr>
                </tbody>
                <tr class="table-subtotal">
                    <th>Subtotal(A)</th>
                    <td class="d-none"></td>
                    <td class="d-none"></td>
                    <td class="d-none"></td>
                    <td><input type="number" name="subtotal" id="subtotal" readonly></td>
                </tr>
            </table>

            <br>
            <h4 class="text-white">Móveis e utensílios</h4>
            <table class="table table-dark table-striped-columns text-center" id="Tabela_02">
                <thead>
                    <tr>
                        <th><button type="button" class="btn btn-success" style="text-align: center;" onclick="adicionarLinha_2()">+</button></th>
                        <th>Descrição</th>
                        <th>Quantidade</th>
                        <th>Valor Unitário</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="table table-dark table-striped-columns text-center">
                        <td><button type="button" class="btn btn-danger" onclick="deletarLinha_2(this)">Deletar</button></td>
                        <td><input type="text" name="descricao_2[]" id="descricao_2_1"></td>
                        <td><input type="number" name="quantidade_2[]" id="quantidade_2_1" oninput="calcularTotal_2(1)"></td>
                        <td><input type="number" name="valor_unitario_2[]" id="valor_unitario_2_1" oninput="calcularTotal_2(1)"></td>
                        <td><input type="number" name="total_2[]" id="total_2_1" readonly></td>
                    </tr>
                </tbody>
                <tr class="table-subtotal">
                    <th>Subtotal(B)</th>
                    <td class="d-none"></td>
                    <td class="d-none"></td>
                    <td class="d-none"></td>
                    <td><input type="number" name="subtotal_2" id="subtotal_2" readonly></td>
                </tr>
            </table>

            <br>
            <h4 class="text-white">Veículos</h4>
            <table class="table table-dark table-striped-columns text-center" id="Tabela_03">
                <thead>
                    <tr>
                        <th><button type="button" class="btn btn-success" style="text-align: center;" onclick="adicionarLinha_3()">+</button></th>
                        <th>Descrição</th>
                        <th>Quantidade</th>
                        <th>Valor Unitário</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="table-data">
                        <td><button type="button" class="btn btn-danger" onclick="deletarLinha_3(this)">Deletar</button></td>
                        <td><input type="text" name="descricao_3[]" id="descricao_3"></td>
                        <td><input type="number" name="quantidade_3[]" id="quantidade_3" oninput="calcularTotal_3(1)"></td>
                        <td><input type="number" name="valor_unitario_3[]" id="valor_unitario_3" oninput="calcularTotal_3(1)"></td>
                        <td><input type="number" name="total_3[]" id="total_3" readonly></td>
                    </tr>
                </tbody>
                <tr class="table-subtotal">
                    <th>Subtotal(C)</th>
                    <td class="d-none"></td>
                    <td class="d-none"></td>
                    <td class="d-none"></td>
                    <td><input type="number" name="subtotal_3" id="subtotal_3" readonly></td>
                </tr>
            </table>

            <table class="table table-dark table-striped-columns text-center">
                <thead>
                    <tr>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="table-data">
                        <td>Resultado</td>
                    </tr>
                </tbody>
            </table>
    </div>
    <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
    </form>
</body>
</html>
