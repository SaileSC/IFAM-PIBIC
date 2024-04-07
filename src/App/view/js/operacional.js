function adicionarCargoFuncao() {
    var tabela = document.getElementById("tabelaNecessidadePessoal");
    var novoCargo = document.getElementById("novoCargo").value;
    var novaFuncao = document.getElementById("novaFuncao").value;

    if (novoCargo !== "" && novaFuncao !== "") {
        var newRow = tabela.insertRow(tabela.rows.length - 1);
        var cell1 = newRow.insertCell(0);
        var cell2 = newRow.insertCell(1);
        var cell3 = newRow.insertCell(2);

        cell1.innerHTML = novoCargo;
        cell2.innerHTML = novaFuncao;
        cell3.innerHTML = '<button type="button" class="btn btn-danger" onclick="removerLinha(this)">Remover</button>';

        // Atualizar o campo oculto com os dados da tabela
        document.getElementById("tabelaNecessidadePessoalHidden").value = JSON.stringify(obterDadosTabela());
        
        // Limpar campos de entrada
        document.getElementById("novoCargo").value = "";
        document.getElementById("novaFuncao").value = "";
    } else {
        alert("Por favor, preencha ambos os campos.");
    }
}

function removerLinha(button) {
    var row = button.parentNode.parentNode;
    row.parentNode.removeChild(row);

    // Atualizar o campo oculto com os dados da tabela após remover uma linha
    document.getElementById("tabelaNecessidadePessoalHidden").value = JSON.stringify(obterDadosTabela());
}

function obterDadosTabela() {
    var tabela = document.getElementById("tabelaNecessidadePessoal");
    var dadosTabela = [];

    for (var i = 1; i < tabela.rows.length - 1; i++) {
        var cargo = tabela.rows[i].cells[0].innerHTML;
        var qualificacoes = tabela.rows[i].cells[1].innerHTML;

        dadosTabela.push({
            'cargo': cargo,
            'qualificacoes': qualificacoes
        });
    }

    return dadosTabela;
}