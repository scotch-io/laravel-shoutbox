## Scotchbox

Scotchbox is a simple shoutbox built for [https://scotch.io](Scotch.io) which demonstrates the use of Laravel's event system.

## Setup

Create <code>.env</code> file and add the required basic configurations

```
APP_ENV=local
APP_DEBUG=true
APP_KEY=SomeRandomKey!!!

DB_HOST=db_host
DB_DATABASE=db_name
DB_USERNAME=db_user
DB_PASSWORD=db_password

PUSHER_KEY=pusher_key
PUSHER_SECRET=pusher_secret
PUSHER_APP_ID=pusher_app_id

```

After that, run the following artisan commands

```
php artisan migrate
```

Finally serve the application and view from your web browser at the specified host and port

```
php artisan serve
```

![application locked and loaded](http://i.imgur.com/L3ei3BV.png)

Enjoy.
