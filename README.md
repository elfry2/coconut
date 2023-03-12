# Coconut
An expert system aimed to help diagnose diseases found in coconut trees, which I wrote for a group assignment. Supports case-based reasoning.

![Screenshot from 2023-03-12 19-17-01](https://user-images.githubusercontent.com/47256917/224545256-a3ddd9cd-d299-44ec-94a9-8e51cff1601c.png)
# Installation
Create a database, edit the ```.env``` file to match your environment configuration, then run ```composer update && php artisan migrate:fresh --seed```.
# Usage
Run ```php artisan serve``` and visit http://localhost:8000 (or whichever port ```artisan``` serves on) on your browser.
