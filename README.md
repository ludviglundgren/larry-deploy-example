# Larry deploy example

This deployer config works with [Larry - a LEMP stack](https://github.com/ludviglundgren/larry).
This example is a plain php file, but a Laravel project would work the same.

Uses deployer to deploy to server.

## Install deployer

In your terminal run

```
curl -LO https://deployer.org/deployer.phar
mv deployer.phar /usr/local/bin/dep
chmod +x /usr/local/bin/dep
```

Now you should be able to run dep, so check which version

    dep --version

## Prepare to deploy

In `deploy.php` replace `yourdomain.xyz` with your domain, and change repo to your own.

```diff
...

// Project repository
+set('repository', 'git@github.com:youruser/yourproject.git');

...

// Hosts
+host('yourdomain.xyz')
	->user('web')
	->identityFile('~/.ssh/id_rsa')
	->stage('dev')
	->set('branch', 'master')
+	->set('deploy_path', '/var/www/yourdomain.xyz');

// Tasks
desc('Deploy your project');

...
```

## Deploy

Then to deploy, simply run:

    dep deploy dev

