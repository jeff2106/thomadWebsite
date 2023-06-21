<?php

/**
 * Fichier contenant la configuration de l'application
 */
const CONFIG = [
    'db' => [
        'DB_HOST' => '127.0.0.1',
        'DB_PORT' => '8889',
        'DB_NAME' => 'LadThomasDB',
        'DB_USER' => 'root',
        'DB_PSWD' => 'root',
    ],
    'app' => [
        'name' => 'mvc',
        'projectBaseUrl' => 'http://localhost:3002/'
    ]
];

/**
 * Constantes pour accéder rapidement aux dossiers importants du MVC
 */
const BASE_DIR = __DIR__ . '/../';
const BASE_PATH = CONFIG['app']['projectBaseUrl'] . '/public/index.php/';
const BASE_PATH_ = CONFIG['app']['projectBaseUrl'] . '/public/index.php';
const PUBLIC_FOLDER = BASE_DIR . 'public/';
const VIEWS = BASE_DIR . 'views/';
const MODELS = BASE_DIR . 'src/models/';
const CONTROLLERS = BASE_DIR . 'src/controllers/';
const PHOTO = '/Users/jeanphilippesara/Documents/Documents_MacBook_Pro_de_Jean/LEARNWORKFOLDER/WEB/LADTHOMAS/mvc/public/assets/';
const COVER = '../../public/upload/';
const init_model = "/Users/jeanphilippesara/Documents/Documents_MacBook_Pro_de_Jean/LEARNWORKFOLDER/WEB/LADTHOMAS/mvc/src/modele";
const INIT_CFG = "/Users/jeanphilippesara/Documents/Documents_MacBook_Pro_de_Jean/LEARNWORKFOLDER/WEB/LADTHOMAS/mvc/config/";

/**
 * Liste des actions/méthodes possibles (les routes du routeur)
 */
$routes = [
    ''                  =>  ['AppController', 'index'],
    '/ajout-voiture'     => ['VoitureController', 'ajout_voiture'],
    '/ajout-client'     => ['CustomersController', 'addClientPage'],
    '/connexion'     => ['ConnexionClientController', 'ConnexionClient'],
    '/inscription'     => ['InscriptionClientController', 'InscriptionClient'],
    '/panier'     => ['PanierController', 'Panier'],
    '/detailArticle'     => ['DetailArticleController', 'DetailArticle'],
    '/apropos'     => ['AproposController', 'Apropos'],
    '/articles'     => ['ArticlesController', 'Articles'],
    '/admin'     => ['AdminInterfaceController', 'index'],
    '/admin-commande'     => ['CommandeAdminController', 'index'],
    '/admin-categorie'     => ['CategorieAdminController', 'index'],
    '/admin-articles'     => ['ArticlesAdminController', 'index'],
    '/admin-nl'     => ['NewsLettersController', 'index'],

];
