<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <title>Estoque</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="src\App\view\css\estoque.css">
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-custom">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <h1 class="m-0">
                    <img class="d-block w-60" src="../img/logo.png" alt="Logo da loja">
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

    <div class="container mt-5">
        <h2 class="text-center text-white p-2">Estoque</h2>
        <form action="/Estoque" method="post">
            <table class="table table-dark table-striped-columns text-center pt-2" id="tabela-estoque">
                <thead>
                    <tr>
                        <th><button class="btn btn-primary" type="button" onclick="adicionarLinha()">Adicionar Item</button></th>
                        <th>Descrição</th>
                        <th>Quantidade</th>
                        <th>Valor</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody class="table table-dark table-striped-columns text-center">
                    <tr>
                        <td><button class="btn btn-danger" type="button" onclick="deletarLinha(this)">Remover</button></td>
                        <td><input type="text" class="form-control" name="descricao[]"></td>
                        <td><input type="number" class="form-control" name="quantidade[]" oninput="calcularSubtotal(this)"></td>
                        <td><input type="number" class="form-control" name="valor[]" oninput="calcularSubtotal(this)"></td>
                        <td><input type="text" class="form-control" name="subtotal[]" readonly></td>
                    </tr>
                </tbody>
            </table>
            <div class="mt-3 text-white">
                <label>Total: R$ <span id="total">0.00</span></label>
            </div>
            <input type="hidden" name="tabelajson" id="tabela_json" value="">
            <button type="submit" class="btn btn-primary btn-block">Enviar</button>
        </form>
    </div>
    <script src="src\App\view\js\estoque.js"></script>
</body>
</html>
