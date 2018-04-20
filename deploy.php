<?php
namespace Deployer;

require 'recipe/common.php';

// Project name
set('application', 'app');

// Project repository
set('repository', 'git@github.com:ludviglundgren/larry-deploy-example.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true);

// Shared files/dirs between deploys
set('shared_files', []);
set('shared_dirs', []);

// Writable dirs by web server
set('writable_dirs', []);
set('allow_anonymous_stats', false);

// Hosts

host('yourdomain.xyz')
	->user('web')
	->identityFile('~/.ssh/id_rsa')
	->stage('dev')
	->set('branch', 'master')
	->set('deploy_path', '/var/www/yourdomain.xyz');

// Tasks
desc('Deploy your project');
task('deploy', [
	'deploy:info',
	'deploy:prepare',
	'deploy:lock',
	'deploy:release',
	'deploy:update_code',
	'deploy:shared',
	'deploy:writable',
	'deploy:vendors',
	'deploy:clear_paths',
	'deploy:symlink',
	'deploy:unlock',
	'cleanup',
	'success'
]);

desc('Restart PHP-FPM service');
task('php-fpm:restart', function () {
	run('sudo service php7.2-fpm reload');
});
after('deploy:symlink', 'php-fpm:restart');

# If deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');
