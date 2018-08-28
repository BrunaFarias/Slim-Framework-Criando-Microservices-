<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require './vendor/autoload.php';

$app = new \Slim\App;

/**
 * Inicio do bang :)
 * @var string
 */
/**rota get por meio de uma Clojure */

/** $app->get('/', function (Request $request, Response $response) use ($app) {
    $response->getBody()->write("Hello Word!");
    return $response;
});
$app->run();*/

/**GET /books — Listar todos os livros
GET /books/id — Retorna informações de um livro em específico
POST /books — Cria um novo livro
PUT /books/id — Edita o post informado pelo id
DELETE /books/id — Deleta o post informado pelo id */


/**lista de todos o livros */

$app->get('/book', function (Request $request, Response $response) use ($app){
    $return = $response->withJson(['msg' => 'Lista de Livros'], 200);
    return $return;
});

/**retornando mais informações do livro informado pelo id */

$app->get('/book/{id}', function (Request $request, Response $response) use ($app){
    $route = $request->getAttribute('route');
    $id = $route->getArgument('id');
    $return = $response->withJson(['msg' => 'Exibindo livro'],200);
    return $return;
});

/**Cadastrando novo livro */

$app->post('/book', function (Request $request, Response $response) use ($app){
    $return = $response->withJson(['msg' => "Cadastrando um livro"], 201);
    return $return;
});

/**Atualiza os dados de um livro pelo ID */

$app->put('/book/{id}', function (Request $request, Response $response) use ($app){
    $route = $request->getAttribute('route');
    $id = $route->getArgument('id');
    $return = $response->withJson(['msg' => "Atualizando dados {$id}"], 201);
    return $return;
});

/**Deleta um livro informado pelo ID */

$app->delete('/book/{id}', function (Request $request, Response $response) use ($app){
    $route = $request->getAttribute('route');
    $id = $route->getArgument('id');
    $return = $response->withJson(['msg' => "Deletando Livro {$id}"], 203);
    return $return;
});

$app->run();
