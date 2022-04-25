# mytrainer-app-laravel

# start container 
`docker compose up -d`

# cp create .env
`cp .env.example .env`

# install Laravel packages
`composer install`

# migration
`php artisan migrate`

# generate appKey 
`php artisan key:generate`

# setting vscode
* ineffective package below vendor  
command Palette -> user setting -> gitignore -> checkout "User gitignore files"

* php Intelephense ineffective  
downgrade to 1.2.3