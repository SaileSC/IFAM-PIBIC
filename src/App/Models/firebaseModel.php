<?php

namespace App\Models;
use GuzzleHttp\Client;

class FirebaseModel
{
    private $firebaseURL; // url do firebase
    private $firebaseSecret; // api
    private $httpClient; //cliente

    public function __construct($firebaseURL,$firebaseSecret)
    {
        $this->firebaseURL = $firebaseURL;
        $this->firebaseSecret = $firebaseSecret;
        $this->httpClient = new Client();
    }

    public function sendData($data){ //envio para a tabela usuário
        $response = $this->httpClient->post("$this->firebaseURL/Usuário.json",[
            'json'=>$data,
            'query'=>['auth'=>$this->firebaseSecret],
        ]);
        return json_decode($response->getBody(),true);
    }

    public function getUserId($user)
    {
        $response = $this->httpClient->get("$this->firebaseURL/Usuário.json", [
            'query' => ['auth' => $this->firebaseSecret],
        ]);

        $dadosUsuarios = json_decode($response->getBody(), true);

        foreach ($dadosUsuarios as $usuarioId => $usuario) {
            if (isset($usuario['email']) && $usuario['email'] === $user) {
                return $usuarioId;
            }
        }

        return null; // Usuário não encontrado
    }
    public function getdados() {
        $response = $this->httpClient->get("$this->firebaseURL/Usuário.json", [
            'query' => ['auth' => $this->firebaseSecret],
        ]);
    
        $dadosUsuarios = json_decode($response->getBody(), true);


        return $dadosUsuarios;
    }

    
    //Model para exxecutivo
    public function sendData_Executivo($data){ 
        $response = $this->httpClient->post("$this->firebaseURL/Executivo.json",[
            'json'=>$data,
            'query'=>['auth'=>$this->firebaseSecret],
        ]);
        return json_decode($response->getBody(),true);
    }
    // retorna dados para executivo
    public function getdados_Executivo() {
        $response = $this->httpClient->get("$this->firebaseURL//Executivo.json", [
            'query' => ['auth' => $this->firebaseSecret],
        ]);
    
        $dadosUsuarios = json_decode($response->getBody(), true);


        return $dadosUsuarios;
    }
    
    //envio do analise de mercado
    public function sendData_Mercado($data){ 
        $response = $this->httpClient->post("$this->firebaseURL/Mercado.json",[
            'json'=>$data,
            'query'=>['auth'=>$this->firebaseSecret],
        ]);
        return json_decode($response->getBody(),true);
    }

    // envio do plano de marketing
    public function send_Marketing($data)
    {
        $response = $this->httpClient->post("$this->firebaseURL/Marketing.json",[
            'json'=>$data,
            'query'=>['auth'=>$this->firebaseSecret],
        ]);
        return json_decode($response->getBody(),true);
    }

    //envio do plano operacional

    public function send_Operacion($data)
    {
        $response = $this->httpClient->post("$this->firebaseURL/Operacional.json",[
            'json'=>$data,
            'query'=>['auth'=>$this->firebaseSecret],
        ]);
        return json_decode($response->getBody(),true);
    }

    // Envio do Investimento Fixo
    public function send_Investimento_fixo($data)
    {
        $response = $this->httpClient->post("$this->firebaseURL/Investimento-Fixo.json",[
            'json'=>$data,
            'query'=>['auth'=>$this->firebaseSecret],
        ]);
        return json_decode($response->getBody(),true);
    }

    //Envio do Estoque 
    public function send_Estoque($data)
    {
        $response = $this->httpClient->post("$this->firebaseURL/Estoque.json",[
            'json'=>$data,
            'query'=>['auth'=>$this->firebaseSecret],
        ]);
        return json_decode($response->getBody(),true);
    }


    //sessão do usuário
    public function createSession($userId)
    {
        $data = ['userId' => $userId];
        
        $response = $this->httpClient->post("$this->firebaseURL/Sessão.json", [
            'json' => $data,
            'query' => ['auth' => $this->firebaseSecret],
        ]);

        return json_decode($response->getBody(), true);
    }

    //envio para plano de negócio teste

    public function send_plano($data)
    {
        $response = $this->httpClient->post("$this->firebaseURL/Projeto_Plano/Executivo.json",[
            'json'=>$data,
            'query'=>['auth'=>$this->firebaseSecret],
        ]);
        return json_decode($response->getBody(),true);
    }
}
