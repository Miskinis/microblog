# Microblog

For posting stuff.

* Home page shows snippets of blog posts;
* User can edit its blog posts;
* User can comment on public posts.
* User can set its posts to private (enforced by laravel policies);
* Create endpoint API for collecting data:
	* All public posts.
	* Posts of specific user
	* Specific post and it's comments
* Using Tailwind
* Using Livewire
* Using MySql

# API endpoints 
* `/api/v1/users/comments/1` specific user comments
* `/api/v1/users/posts/1` specific user posts and their comments
* `/api/v1/posts` all posts
* `/api/v1/comments` all comments
* `/api/v1/comments/1` specific comment
* `/api/v1/posts/1` specific post and it's comments

# Run
* `cd microblog`
* `sudo chown -R $USER:www-data .`
* `sudo find . -type f -exec chmod 664 {} \;`
* `sudo find . -type d -exec chmod 775 {} \;`
* `sudo chgrp -R www-data storage bootstrap/cache`
* `sudo chmod -R ug+rwx storage bootstrap/cache`
* `docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs`
* `alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'`
* `sail up -d`
* `sail npm install && sail npm run build && sail npm run dev`
* `sail artisan migrate --seed`

# Testing
If new api key was generated, do not forget to copy it from .env to .env.testing

* `alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'`
* `sail up -d`
* `sail test --env=testing`

