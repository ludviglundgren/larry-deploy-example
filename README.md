# Larry deploy example

This deployer config works with [Larry - a LEMP stack](https://github.com/ludviglundgren/larry).

Uses deployer to deploy to server.

## Install deployer

In your terminal run

```
curl -LO https://deployer.org/deployer.phar
mv deployer.phar /usr/local/bin/dep
chmod +x /usr/local/bin/dep
```

Change in file from `yourdomain.xyz` to your domain, and change repo to your own.

## Deploy

Then to deploy, simply run:

    dep deploy dev

