<?php

if(PHP_SAPI != 'cli'){
    exit('Rodar via linha de comando!');
}

use DI\ContainerBuilder;

require __DIR__ . '/vendor/autoload.php';

// Instantiate PHP-DI ContainerBuilder
$containerBuilder = new ContainerBuilder();

if (false) { // Should be set to true in production
	$containerBuilder->enableCompilation(__DIR__ . '/var/cache');
}

// Set up settings
$settings = require __DIR__ . '/app/settings.php';
$settings($containerBuilder);

// Set up dependencies
$dependencies = require __DIR__ . '/app/dependencies.php';
$dependencies($containerBuilder);

// Build PHP-DI Container instance
$container = $containerBuilder->build();

$db = $container->get('db');
$table = 'produtos';

$db->schema()->create($table, function($table){
    $table->increments('id');
    $table->string('titulo', 100);
    $table->text('descricao');
    $table->decimal('preco', 11, 2);
    $table->string('fabricante', 60);
    $table->timestamps();
});

$db->table('produtos')->insert([
    'titulo' => 'Smartphone Motorola Moto G20 64GB Grafite',

    'descricao' => 'O novo moto g20 tem o sistema Quad Câmera avançado, tela com nitidez e realismo e bateria de longa duração dos seus sonhos. Tudo o que você sempre quis e muito mais. Quer fotos mais claras e nítidas em qualquer iluminação e ângulo? Com um sistema de câmera de 48 MP1, você tem. Que tal uma tela ultra-wide com atualização super-rápida? Com certeza. Bateria que dura mais de dois dias2? Você tem. Selfies incríveis tanto de dia quanto de noite? Está tudo nas suas mãos. E não vamos esquecer que precisamos de espaço para armazenar tudo isso3. Quer um processador mais veloz para capturar os momentos no seu próprio ritmo? Com o moto g20, você tem.',

    'preco' => 1290.90,

    'fabricante' => 'Motorola',

    'created_at' => '2019-02-12',
    
    'updated_at' => '2020-03-24'
]);


$db->table('produtos')->insert( [
    'titulo' => 'Samsung Galaxy A32 Preto, com Tela Infinita de 6,4", 4G, 128GB e Câmera Quádrupla de 64MP+8MP+5MP+2MP - SM-A325MZKKZTO',

    'descricao' => 'Aproveite a tela FHD+ de 6,4 polegadas para assistir aos seus conteúdos no favoritos. Mergulhe na cena dos seus programas de comédia ou na ação dos seus jogos com o Display Infinito do Galaxy A32.',

    'preco' => 1590.90,

    'fabricante' => 'Samsung',

    'created_at' => '2019-02-12',
    
    'updated_at' => '2020-03-24'

]);
