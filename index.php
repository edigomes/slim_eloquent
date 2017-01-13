<?php

require 'vendor/autoload.php';
require 'config.php';

use Illuminate\Database\Capsule\Manager as Capsule;
$capsule = new Capsule;
$capsule->addConnection([
  'driver' => 'mysql',
  'host' => DB_HOST, 
  'port' => DB_PORT,
  'database' => DB_NAME,
  'username' => DB_USER,
  'password' => DB_PASSWORD,
  'charset' => 'utf8',
  'collation' => 'utf8_unicode_ci',
]);
$capsule->bootEloquent();
$capsule->setAsGlobal();

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model {

    use SoftDeletes;

    protected $fillable = [
        'id',
        'text',
    ];

}

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app = new \Slim\App;

$app->get('/post', function (Request $request, Response $response) {
    $posts = Post::all();
    return $response->withJson($posts);
});

$app->delete('/post/{id}', function (Request $request, Response $response, $args) {
    $id = $args['id'];
    return Post::destroy($id);
});

$app->run();

// TESTE NOVA BRANCH