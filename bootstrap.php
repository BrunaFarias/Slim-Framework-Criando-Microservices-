<?php

require './vendor/autoload.php';

// $app = new \Slim\App;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

/**
    * Container Resources do Slim.
    * Aqui dentro dele vamos carregar todas as dependências
    * da nossa aplicação que vão ser consumidas durante a execução
    * da nossa API
 */

 $container = new \Slim\Container();

 $isDevMode = true;

/**
 * Diretório de Entidades e Metadata do Doctrine
 */
$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/src/Models/Entity"), $isDevMode);

 /**array de configurações da conexao com banco */

 $conn = array(
     'driver' => 'pdo_sqlite',
     'path' =>__DIR__ . '/db.sqlite',
 );

 /**instacia o enityManager */

 $entityManager = EntityManager::create($conn, $config);

 /**
 * Coloca o Entity manager dentro do container com o nome de em (Entity Manager)
 */

$container['em'] = $entityManager;

$app = new \Slim\App($container);