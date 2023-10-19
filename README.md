# NostalgiaBook

Arch Linux:
Install dependencies: sudo pacman -S nginx php php-fpm mariadb

Configure your NGINX Config and make the right adjustments to your php.ini file.

Enable & start PHP-FPM, NGINX, and MariaDB. like so:

sudo systemctl start mariadb nginx php-fpm
sudo systemctl enable mariadb nginx php-fpm


General:

Execute this in your MariaDB prompt:

```
CREATE DATABASE nostbook;
```

Then, for the second command, do this!

```
use nostbook;

CREATE TABLE toons (
    id INT,
    username TEXT,
    password TEXT
); 
\q
```

You PROBABLY want to change the default password as the MySQL password is blank by default.
