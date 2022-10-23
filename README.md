# Microblog
For posting stuff.

### Testo tema - "Mikroblogas" (blog):

* Pagrindinis langas su atvaizduojamais blog įrašais;
* Vartotojai gali kurti ir redaguoti savo įrašus (turinys, kas sukūrė ir kada);
* Vartotojai gali komentuoti viešus įrašus.
* Įrašo kūrėjas gali pažymėti, kad įrašas privatus (matomas tik jam pačiam) – panaudoti Policy metodą;
* Padaryti API endpointus (trečiai šaliai duomenų paėmimui) – taip pat su Policy:
	1. visų įrašų atvaizdavimui
	2. konkretaus vartotojo visų įrašų atvaizdavimui
	3. atskiro įrašo ir jo komentarų atvaizdavimui

* Use tailwind css through npm
* Back-end in Laravel and Livewire
* Use a database

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
* `sail npm install && sail npm run build && sail npm run dev`
* `sail artisan migrate --seed`
