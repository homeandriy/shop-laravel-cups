<?php
namespace Deployer;

require 'recipe/laravel.php';

// Config

set('repository', 'homeandriy/laravel-test');

add('shared_files', []);
add('shared_dirs', []);
add('writable_dirs', []);

// Hosts

host('185.185.126.143')
    ->set('remote_user', 'root')
    ->set('deploy_path', '/www/wwwroot/web-utilities.pp.ua');

// Hooks

after('deploy:failed', 'deploy:unlock');
