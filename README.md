# Dedicated worker
Symfony based system (by async jobs) is supposed to check what kind of status code is being returned by any url passed to its API.

# Usage
There is a need to fire a POST request to your-server-ip/api/urls and in body paste array of urls. E.g.:

curl -X POST \
  http://127.0.0.1:8001/api/urls \
  -H 'cache-control: no-cache' \
  -H 'content-type: application/x-www-form-urlencoded' \
  -H 'postman-token: 5bafb76d-1547-fd96-4933-52b7f02e87a2' \
  -d 'urls%5B0%5D=https%3A%2F%2Fwww.google.com&urls%5B1%5D=https%3A%2F%2Fwww.facebook.com&urls%5B2%5D=https%3A%2F%2Fwww.twitter.com&urls%5B3%5D=www.notexisting.com'
  
There is a need to run locally messenger for async jobs. Either set create a conf file for supervisor https://symfony.com/doc/current/messenger.html#supervisor-configuration where you can adjust also numprocs settings or run from root directory command bin/console messenger:consume -vv and choose option 0.
  
# Installation
1. composer install (add dependencies)
2. bin/console doctrine:database:create (create empty database)
3. bin/console messenger:setup-transports (create messenger queues)
4. bin/console doctrine:migrations:migrate (migrate database)
5. symfony serve (start server)
