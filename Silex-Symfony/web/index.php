<?php
// web/index.php
require_once __DIR__.'/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$app = new Silex\Application();
$app['debug'] = true;


// ... connect to the database
$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'db.options' => array (
            'driver'    => 'pdo_mysql',
            'host'      => '127.0.0.1',
            'dbname'    => 'portfolio',
            'user'      => 'root',
            'password'  => '',
            'charset'   => 'utf8mb4',
    )
));

// home APIs
$app->get('/api/home', function() use ($app){
    $home = $app['db']->fetchAll('SELECT * FROM bodies');
    return json_encode($home);
});

// skill APIs
$app->get('/api/skills', function() use ($app){
    $skills = $app['db']->fetchAll('SELECT * FROM skills ORDER BY category ASC');
    return json_encode($skills);
});

// education APIs
$app->get('/api/education', function() use ($app){
    $edu = $app['db']->fetchAll('SELECT * FROM schools');
    return json_encode($edu);
});

// project APis
$app->get('/api/projects', function() use ($app){
    $work = $app['db']->fetchAll('SELECT * FROM work');
    return json_encode($work);
});

// Job APis
$app->get('/api/jobs', function() use ($app){
    $job = $app['db']->fetchAll('SELECT * FROM jobs');
    return json_encode($job);
});

$app->run();