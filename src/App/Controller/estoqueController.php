<?php
namespace App\Controller;
use App\Models\FirebaseModel;
class estoqueController
{

    private $firebase;

    public function __construct(FirebaseModel $firebase)
    {
        $this->firebase = $firebase;
    }

    public function index()
    {
        require_once __DIR__.'/../view/estoque.php';
    }

    public function store()
    {
        //dados estoque 

        $Tabela_estoque = isset($_POST['tabelajson']) ? json_decode($_POST['tabelajson'],true): [];

        //dados tabela
        $dados_tbela = [];
        foreach ($Tabela_estoque as $linha) {
            $descricao = $linha['Descrição'] ?? '';
            $quantidade = $linha['Quantidade'] ?? '';
            $valor = $linha['valor'] ?? '';
            $subtotal = ['sub_total'] ?? '';
        
            $dados_tbela[] = [
                'descrição' =>$descricao,
                'quantidade'=>$quantidade,
                'valor' => $valor,
                'subtotal' =>$subtotal
            ];
        }        

        $data = [
            'tabela_estoque'=>$dados_tbela
        ];

        $response = $this->firebase->send_Estoque($data);

        if($response['name'])
        {
            exit;
        }
    }
}