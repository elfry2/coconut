# Coconut
An expert system aimed to help diagnose diseases found in coconut trees, which I wrote for a group assignment. Supports case-based reasoning.

![image](https://user-images.githubusercontent.com/47256917/224546034-1a22768e-c1f7-46f5-9cf4-d662617e8cc5.png)
# Installation
Create a database, edit the ```.env``` file to match your environment configuration, then run ```composer update && php artisan migrate:fresh --seed```.
# Usage
Run ```php artisan serve``` and visit http://localhost:8000 (or whichever port ```artisan``` serves on) on your browser.
