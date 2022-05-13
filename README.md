## Asset Tracker

A simple MVC project to familiarize myself with the Laravel framework.

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Setup and Use

1. Clone the repository: `$ git clone "https://github.com/patrick-verbs/asset-tracker`
2. Install and run [Docker](https://docs.docker.com/get-docker/)
3. Navigate to the `asset-tracker` directory on your computer
4. Open with your preferred text editor to view the code base
5. To serve the local web app:
   - Run the following commands in a CLI:
     - `cd "[your file path]/asset-tracker"`
     - `./vendor/bin/sail up`
     - `docker ps`
     - From the table of containers shown in the command line, locate the container (row) that lists the image `sail-8.1/app` and the command `"start-container"`
       - Once you've located that row, copy the hash listed under `CONTAINER ID` to your clipboard
       - Run the command `docker exec -it [container ID from clipboard] bash`
6. Visit the application via web browser at: `http://localhost/`

## Known Bugs

_No known bugs_ :bug:

## Whiteboarding

### Data Structure

This will be a many-to-many model where __users__ are associated with __assets__ and vice versa.

__Asset__ model:

* ID | `int` | __MVP__
* Asset full name | `string` | __MVP__
* Asset short name | `string` (optional) | __Stretch__
* Asset parents (e.g. if asset is part of a collection/archive) | `int` (ID) | __Stretch__
* Asset children (e.g. if asset is an archive containing files) | `int` (ID) | __Stretch__
* Asset owners (many to many)
  * __Users__ | `int` (ID via __UsersAssets__ join table) | __MVP__
  * __Groups__ | `int` (ID via join) | __Stretch__
* Asset deployments | __Stretch__
  * __Projects__ | `int` (ID via join)
* Asset license
  * Actual license | `string` | __MVP__
  * Usage description/limitations if no actual license | `string` | __Stretch__

__User__ model:

* ID | `int` | __MVP__
* User name | `string` | __MVP__
* User email | `string` (optional) | __Stretch__
* User full name | `string` (optional) | __Stretch__
* User's assets (many to many)
  * Owned | `int` (__Asset__ ID via __UsersAssets__ join table) | __MVP__
  * Provisional | `int` (__Asset__ ID populated via __Groups__) | __Stretch__
* User's projects | __Stretch__
  * Projects | `int` (ID via join)

__UsersAssets__ model:

* User ID | `int` | __MVP__
* Asset ID | `int` | __MVP__
* Asset location | `string` (short description, like a nickname, e.g. "Ada's MacBook") | __MVP__
* Asset address | `string` (URL or file system address) | __Stretch__
* Asset license
  * Actual license | `string` | __MVP__
  * Usage description/limitations if no actual license | `string` | __Stretch__
* Source | __Stretch__
  * Source name | `string` (e.g. "Unity Asset Store")
  * Source address | `string` (e.g. URL)
  * File checksum(s) | `array` of `string`s (SHA-256)
  * Invoice | `string` (URL or file address)
* Provenance | __Stretch__
  * Ordered list | nested `array` of key-value pairs showing chain of custody (__User__ or __Group__ IDs nested from a __Source__)
* Public (visible to all users) | `boolean` | __Stretch__
* Visibility | `array` of `string`s (__User__ and __Group__ IDs) | __Stretch__

__Group__ model | __Stretch__

* Groups can be associated with many users
* Users can be associated with many groups

__Project__ model | __Stretch__

* Projects can be associated with many users
* Users can be associated with many projects

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## License

<details>
<summary><a href="https://opensource.org/licenses/MIT"><strong>MIT</strong></a></summary>
<pre>
MIT License

Copyright (c) 2022 Patrick Lee

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.

</pre>
</details>