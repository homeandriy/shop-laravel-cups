<?php
namespace Deployer;

require 'recipe/laravel.php';

// Config

set('default_stage', 'staging');
set('application', 'Laravel Shop');
set('repository', 'https://github.com/homeandriy/shop-laravel-cups.git');

set('branch', 'main');
set('git_tty', false);

//add('shared_files', []);
//add('shared_dirs', []);
//add('writable_dirs', []);

// Hosts

host('185.185.126.143')
    ->setHostname('185.185.126.143')
    ->setRemoteUser('root')
    ->setDeployPath('/www/wwwroot/web-utilities.pp.ua')
    ->setIdentityFile('/home/homeandriy/id_rsa.pub')
    ->set ('ssh_multiplexing', false);

// Hooks

after('deploy:failed', 'deploy:unlock');
