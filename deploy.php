<?php
namespace Deployer;

require 'deploy/tasks/laravel.php';
require 'deploy/utils.php';
//require 'vendor/deployer/deployer/recipe/slack.php';

// Project name
set('application', 'translate-api');

// Project repository
//set('repository', 'git@github.com:nguyenhuutuananh/paybackfx.git');
set('repository', 'git@github.com:taducloc0603/paybackFX.git');

// [Optional] Allocate tty for git clone. Default value is false.
//set('git_tty', true);

// Set keep releases
set('keep_releases', 3);

// Shared files/dirs between deploys
add('shared_files', []);
add('shared_dirs', []);

// Writable dirs by web server
add('writable_dirs', []);

// Hosts
inventory('hosts.yml');

// Tasks
//require_all('deploy/tasks/*.php');

// Migrate database before symlink new release
//before('deploy:symlink', 'artisan:migrate');

// [Optional] if deploy fails automatically unlock.
// after('deploy:update_code', 'deploy:env');

after('deploy:failed', 'deploy:unlock');

///* SLACK NOTICE */
//set('slack_webhook', 'https://hooks.slack.com/services/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');
//set('slack_title', '{{application}}');

//after('success', 'slack:notify:success');
//set('slack_success_text', 'Robert Deploy successfully: `{{target}}` (enviroment)');
