<?php

namespace Controllers;

use Classes\Paginacion;
use Model\Ponente;
use MVC\Router;
use Intervention\Image\ImageManagerStatic as Image;

class PonentesController
{
    public static function index(Router $router)
    {
        $pagina_actual = $_GET['page'];
        $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);
        if (!$pagina_actual || $pagina_actual < 1) {
            header('Location: /admin/ponentes?page=1');
        }


        $registros_por_pagina = 4; // aqui ponemos el total de regitros a mostrar en la tabla
        $total = Ponente::total();

        $paginacion = new Paginacion($pagina_actual, $registros_por_pagina, $total);

        if ($paginacion->total_paginas() < $pagina_actual) {
            header('Location: /admin/ponentes?page=1');
        }
        $ponentes = Ponente::paginar($registros_por_pagina, $paginacion->offSet());


        if (!es_admin()) {
            header('Location: /login');
        }
        $router->render('admin/ponentes/index', [
            'titulo' => 'Ponentes / Conferencistas',
            'ponentes' => $ponentes,
            'paginacion' => $paginacion->paginacion(),
        ]);
    }

    public static function crear(Router $router)
    {

        if (!es_admin()) {
            header('Location: /login');
        }
        $alertas = [];

        $ponente = new Ponente;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!es_admin()) {
                header('Location: /login');
            }
            //leer Imagen
            if (!empty($_FILES['imagen']['tmp_name'])) {
                $carpeta_imagenes = '../public/img/speakers';

                // Crear la carpeta si no existe
                if (!is_dir($carpeta_imagenes)) {
                    mkdir($carpeta_imagenes, 0755, true);
                }

                $imagen_png = Image::make($_FILES['imagen']['tmp_name'])->fit(800, 800)->encode('png', 80);
                $imagen_webp = Image::make($_FILES['imagen']['tmp_name'])->fit(800, 800)->encode('webp', 80);
                // $imagen_avif = Image::make($_FILES['imagen']['tmp_name'])->fit(800, 800)->encode('avif', 80);

                $nombre_imagen = md5(uniqid(rand(), true));

                $_POST['imagen'] = $nombre_imagen;
            }

            // Convertir a strring el arreglo redes
            $_POST['redes'] = json_encode($_POST['redes'], JSON_UNESCAPED_SLASHES); // -> lo convierte a areglo


            $ponente->sincronizar($_POST);

            //validar
            $alertas = $ponente->validar();

            // Guardar el registro
            if (empty($alertas)) {
                // Guardar las imagenes
                $imagen_png->save($carpeta_imagenes . '/' . $nombre_imagen . '.png');
                $imagen_webp->save($carpeta_imagenes . '/' . $nombre_imagen . '.webp');
                // $imagen_avif->save($carpeta_imagenes . '/' . $nombre_imagen . '.avif');

                // Guardar en la base de datos
                $resultado = $ponente->guardar();
                if ($resultado) {
                    header('Location: /admin/ponentes');
                }
            }
        }
        $router->render('admin/ponentes/crear', [
            'titulo' => 'Registrar Ponente',
            'alertas' => $alertas,
            'ponente' => $ponente,
            'redes' => json_decode($ponente->redes),
        ]);
    }

    public static function editar(Router $router): void
    {
        if (!es_admin()) {
            header('Location: /login');
        }
        $alertas = [];
        $idPonente = $_GET['id'];
        $idPonente = filter_var($idPonente, FILTER_VALIDATE_INT);
        if (!$idPonente) {
            //redireccionear en caso de qu eno sea un entero
            header('Location: /admin/ponentes');
        }

        // Onterner ponente a editar
        $ponente = Ponente::find($idPonente);

        // si no existe el ponente; redireccionar
        if (!$ponente) {
            header('Location: /admin/ponentes');
        }

        $redes = json_decode($ponente->redes);
        // var_dump($redes['twitter']);

        $ponente->imagen_actual = $ponente->imagen;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!es_admin()) {
                header('Location: /login');
            }
            if (!empty($_FILES['imagen']['tmp_name'])) {
                $carpeta_imagenes = '../public/img/speakers';

                // Eliminar la imagen previa
                unlink($carpeta_imagenes . '/' . $ponente->imagen_actual . ".png");
                unlink($carpeta_imagenes . '/' . $ponente->imagen_actual . ".webp");

                // Crear la carpeta si no existe
                if (!is_dir($carpeta_imagenes)) {
                    mkdir($carpeta_imagenes, 0755, true);
                }

                $imagen_png = Image::make($_FILES['imagen']['tmp_name'])->fit(800, 800)->encode('png', 80);
                $imagen_webp = Image::make($_FILES['imagen']['tmp_name'])->fit(800, 800)->encode('webp', 80);
                // $imagen_avif = Image::make($_FILES['imagen']['tmp_name'])->fit(800, 800)->encode('avif', 80);

                $nombre_imagen = md5(uniqid(rand(), true));

                $_POST['imagen'] = $nombre_imagen;
            } else {
                $_POST['imagen'] = $ponente->imagen_actual;
            }

            $_POST['redes'] = json_encode($_POST['redes'], JSON_UNESCAPED_SLASHES);
            $ponente->sincronizar($_POST);

            $alertas = $ponente->validar();
            if (empty($alertas)) {
                if (isset($nombre_imagen)) {
                    $imagen_png->save($carpeta_imagenes . '/' . $nombre_imagen . '.png');
                    $imagen_webp->save($carpeta_imagenes . '/' . $nombre_imagen . '.webp');
                }
                $resultado = $ponente->guardar();

                if ($resultado) {
                    header('Location: /admin/ponentes');
                }
            }
        }
        $router->render('admin/ponentes/editar', [
            'titulo' => 'Actualizar Ponente',
            'alertas' => $alertas,
            'ponente' => $ponente,
            'redes' => $redes,
        ]);
    }

    public static function eliminar()
    {
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') 
        {

            if (!es_admin()) {
                header('Location: /login');
            }
            
            $idPonente = $_POST['id'];

            $ponente = Ponente::find($idPonente);

            if (!isset($ponente)) {
                header('Location: /admin/ponentes');
            }

            if ($ponente->imagen) {
                $carpeta_imagenes = '../public/img/speakers';
                unlink($carpeta_imagenes . '/' . $ponente->imagen . ".png");
                unlink($carpeta_imagenes . '/' . $ponente->imagen . ".webp");
            }
            // $carpeta_imagenes = '../public/img/speakers';
            // // Eliminar la imagen previa
            // unlink($carpeta_imagenes . '/' . $ponente->imagen . ".png");
            // unlink($carpeta_imagenes . '/' . $ponente->imagen . ".webp");
            $resultado = $ponente->eliminar();
            if ($resultado) {
                header('Location: /admin/ponentes');
            }
            // debuguear()
        }
    }
}
