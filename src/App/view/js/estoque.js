function calcularSubtotal(input) {
    const tr = input.parentElement.parentElement;
    const quantidade = tr.querySelector('input[name="quantidade[]"]').value;
    const valor = tr.querySelector('input[name="valor[]"]').value;
    const subtotal = quantidade * valor;
    tr.querySelector('input[name="subtotal[]"]').value = subtotal.toFixed(2);
    calcularTotal();
}

function calcularTotal() {
    const subtotais = document.getElementsByName('subtotal[]');
    let total = 0;
    for (const subtotal of subtotais) {
        total += parseFloat(subtotal.value);
    }
    document.getElementById('total').textContent = total.toFixed(2);
}

function adicionarLinha() {
    const tabela = document.getElementById('tabela-estoque').getElementsByTagName('tbody')[0];
    const novaLinha = tabela.insertRow(tabela.rows.length);
    const colunaAcoes = novaLinha.insertCell(0);
    const colunaDescricao = novaLinha.insertCell(1);
    const colunaQuantidade = novaLinha.insertCell(2);
    const colunaValor = novaLinha.insertCell(3);
    const colunaSubtotal = novaLinha.insertCell(4);
    colunaAcoes.innerHTML = '<button class="btn btn-danger" onclick="deletarLinha(this)">Remover</button>';
    colunaDescricao.innerHTML = '<input type="text" class="form-control" name="descricao[]">';
    colunaQuantidade.innerHTML = '<input type="number" class="form-control" name="quantidade[]" oninput="calcularSubtotal(this)">';
    colunaValor.innerHTML = '<input type="number" class="form-control" name="valor[]" oninput="calcularSubtotal(this)">';
    colunaSubtotal.innerHTML = '<input type="text" class="form-control" name="subtotal[]" readonly>';
    document.getElementById("tabela_json").value = JSON.stringify(obterdados());

}

function deletarLinha(botao) {
    const indexLinha = botao.parentNode.parentNode.rowIndex;
    document.getElementById('tabela-estoque').deleteRow(indexLinha);
    document.getElementById("tabela_json").value = JSON.stringify(obterdados());
    calcularTotal();
}

function obterdados(){
    var tabela = document.getElementById("tabela-estoque");
    var dados = []
    for (let i = 1; i < tabela.rows.length - 1; i++){
        var descricao = tabela.rows[i].cells[1].querySelector('input').value;
        var quantidade = tabela.rows[i].cells[2].querySelector('input').value;
        var valor = tabela.rows[i].cells[3].querySelector('input').value;
        var sub_total = tabela.rows[i].cells[4].querySelector('input').value;
    
        dados.push({
            'Descrição': descricao,
            'Quantidade': quantidade,
            'valor': valor,
            'sub_total': sub_total
        });
    }    
    return dados;
}
