<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>


## Article CRM

This is a laravel application that can

- Create / Edit / Delete an article
- Upload an image
- Create JSON API response
- Database structure (migrations)

## Launching

I have not tested running this on other's machines, however, through the magic of Sail it should be as easy as
    sudo ./vendor/bin/sail up
You will need to have docker and docker-compose.
If you get permission denied errors, you can run:
ONLY RUN THIS IN THE REPO
    sudo chmod 777 . -R
A more elegant solution is definetly possible.

## Take aways

The original spec said this should take 2.5 hours. I'm on about the 11th hour.
Some things that made this take awhile

- No existing dev environment for laravel.
- Relearning Laravel since I last used it
- Understanding the laravel 8 way to do things
- file permision headache

Building this app, I wanted to make sure I had a good dev environment to work with.
I decided to use Laravel Sail, which essentially allowed me to use docker.

If I was to rebuild this now, with a working dev environment and after all the documentation I have read, I probably could manage it in a couple of hours.


## Things to improve

I am absolutely open to feedback.

Things I have noted.

- The create/edit forms are two seperate forms and could be one form
- The API does not authenticate, which would be needed if this was in prod
- The UI could be drastically improved.
- The user is able to submit a lot of text in the content section. It would be better to use an existing HTML editor package to allow for better article editor.
