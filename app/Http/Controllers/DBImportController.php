<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DBImportController extends Controller
{
    public function insertAll(){
        try {
            $this->insertRoles();
            $this->insertFiles();
            $this->insertUsers();
            $this->insertCategories();
            $this->insertPosts();
            $this->insertComments();
            $this->insertPostViews();
            $this->insertPostLikes();
            $this->insertPostImages();

            return "Insertado correctamente";
        }catch (\Exception $exception){
            return "Hubo un error: ".$exception;
        }

    }

    public function insertRoles(){
        DB::insert("
    INSERT INTO roles (id, name, permission, created_at, updated_at) values 
    (1, 'ADMINISTRADOR', 777, '2020-03-18 05:00:00', '2020-03-18 05:00:00'),
    (2, 'GENERAL', 755, '2020-03-18 05:00:00', '2020-03-18 05:00:00')");
    }

    public function insertUsers(){
        DB::insert("
    INSERT INTO users (id, name, email, role_id, file_id, email_verified_at, password, remember_token, created_at, updated_at) VALUES
    (1, 'Ignacio Raúl', 'ignacioruedaboada@hotmail.com', 1, 2, NULL, '$2y$10"."$"."WxY22RZzYx1Y91H5ib9CjOJ9A8dNQSVWzYpOqDmoFV1FtzABiJx9a', NULL, '2020-03-19 04:48:01', '2020-03-19 04:48:01'),
    (2, 'Jorge Sánchez', 'jorgesanchez@gmail.com', 2, 2,NULL, '$2y$10"."$"."hs.DFhsLj62Rtu5SGNu5au5/nahpmLXPpf980D6vjrpixRHlFjcw2', NULL, '2020-03-19 04:49:17', '2020-03-19 04:49:17')");

    }

    public function insertCategories(){
        DB::insert("
    INSERT INTO categories (id, name, created_at, updated_at) VALUES
(1, 'TECNOLOGÍA', '2020-03-18 05:00:00', '2020-03-18 05:00:00'),
(2, 'DESARROLLO', '2020-03-18 05:00:00', '2020-03-18 05:00:00'),
(3, 'APRENDIZAJE', '2020-03-18 05:00:00', '2020-03-18 05:00:00'),
(4, 'OTRO', '2020-03-18 05:00:00', '2020-03-18 05:00:00')
    ");
    }

    public function insertPosts(){
        DB::insert("
    INSERT INTO posts (id, title, date_time, type, card_type, description, content, user_id,category_id, created_at, updated_at) VALUES
(1, 'BIENVENIDO A MI WEB', '2020-03-18 00:00:00', 'CENTERED', 'NORMAL', 'Descripción', '<div class=\"post-top-area\"><p class=\"para\">Esto es un texto de prueba gaaaaa</p></div><div class=\"post-image\"><img src=\"images/blog-1-1000x600.jpg\" alt=\"Blog Image\"></div><div class=\"post-bottom-area\"><p class=\"para\">Más texto de prueba</p></div>',1, 1, '2020-03-18 05:00:00', '2020-03-18 05:00:00'),
(2, 'HOLA', '2020-03-18 00:00:00', 'SIDEBAR', 'TINY', 'Descripción','<p class=\"para\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore etdolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip exea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiatnulla pariatur. Excepteur sintoccaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p><div class=\"post-image\"><img src=\"images/blog-1-1000x600.jpg\" alt=\"Blog Image\"></div>',1, 1, '2020-03-18 05:00:00', '2020-03-18 05:00:00'),
(3, 'TÍTULO PRUEBA', '2020-03-18 00:00:00', 'LANDING', 'BIG', 'Descripción','<p class=\"para\">Texto de pruebas</p><div class=\"post-image\"><img src=\"images/blog-1-1000x600.jpg\" alt=\"Blog Image\"></div>',1, 1, '2020-03-18 05:00:00', '2020-03-18 05:00:00'),
(4, 'AJÁ', '2020-03-18 00:00:00', 'CENTERED', 'BIG','Descripción', '<div class=\"post-top-area\"><p class=\"para\">Esto es una demo de un post.</p></div>',1, 1, '2020-03-18 05:00:00', '2020-03-18 05:00:00'),
(5, 'BIENVENIDO POR SEGUNDA VEZ', '2020-03-18 00:00:00', 'CENTERED', 'TINY','Descripción', '<div class=\"post-top-area\"><p class=\"para\">Esto es una segunda demo de un post.</p></div>',1, 1, '2020-03-18 05:00:00', '2020-03-18 05:00:00')
");
    }

    public function insertComments(){
        DB::insert("
    INSERT INTO comments (id, content, date_time, thread, user_id, post_id, created_at, updated_at) VALUES
(1, 'Esto es un primer comentario.', '2020-03-18 00:00:00', NULL, 1, 1, '2020-03-18 05:00:00', '2020-03-18 05:00:00'),
(2, 'Esto es un primer reply del primer comentario.', '2020-03-18 00:00:00', 1, 2, 1, '2020-03-18 05:00:00', '2020-03-18 05:00:00'),
(3, 'Esto es un segundo reply del primer comentario.', '2020-03-18 00:00:00', 1, 1, 1, '2020-03-18 05:00:00', '2020-03-18 05:00:00')
");
    }

    public function insertPostViews(){
        DB::insert("
    INSERT INTO posts_views (id, user_id, post_id, created_at, updated_at) VALUES
(1, 1, 1, '2020-03-18 05:00:00', '2020-03-18 05:00:00'),
(2, 2, 1, '2020-03-18 05:00:00', '2020-03-18 05:00:00'),
(3, 1, 2, '2020-03-18 05:00:00', '2020-03-18 05:00:00')
    ");
    }

    public function insertPostLikes(){
        DB::insert("
    INSERT INTO posts_likes (id, user_id, post_id, created_at, updated_at) VALUES
(1, 1, 1, '2020-03-18 05:00:00', '2020-03-18 05:00:00'),
(2, 2, 1, '2020-03-18 05:00:00', '2020-03-18 05:00:00')
    ");
    }

    public function insertFiles(){
        DB::insert("
    INSERT INTO files (id, name, format, path, type, created_at, updated_at) VALUES
(1, 'VALLE', 'PNG', '/files/images/image_1.jpg', 'IMAGEN', '2020-03-18 05:00:00', '2020-03-18 05:00:00'),
(2, 'AVATAR', 'JPG', '/files/images/avatar-default.jpg', 'IMAGEN', '2020-03-18 05:00:00', '2020-03-18 05:00:00')
    ");
    }

    public function insertPostImages(){
        DB::insert("
    INSERT INTO posts_images (id, file_id, post_id, created_at, updated_at) VALUES
(1, 1, 1, '2020-03-18 05:00:00', '2020-03-18 05:00:00'),
(2, 1, 2, '2020-03-18 05:00:00', '2020-03-18 05:00:00'),
(3, 1, 3, '2020-03-18 05:00:00', '2020-03-18 05:00:00'),
(4, 1, 4, '2020-03-18 05:00:00', '2020-03-18 05:00:00')
    ");
    }

}
