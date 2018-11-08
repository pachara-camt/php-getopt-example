# php-getopt-example

### For help:
```sh
php multab.php -h
php multab.php --help
```

### Normal:
```sh
php multab.php 6
php multab.php 12
```

### With options:
```sh
php multab.php -s6 -- 6
php multab.php -e24 -- 12
php multab.php --start=6 --end=24 -- 12
```

### Without delimiter:
```sh
php multab.php -s6 6
php multab.php -e24 12
php multab.php -s6 --end=24 12
```
