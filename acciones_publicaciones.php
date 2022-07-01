<?php 
  require_once ( 'Publicaciones.php' );
  $ Publicaciones = nuevas  Publicaciones ();
  $ datos = $ _SOLICITUD ;

  if (isset( $ _FILES [ 'archivo' ])){

     $ pub_id = $ datos [ 'aux_id' ];      
     $ caracteres_permitidos = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ' ;
     $ longitud = 8 ;
     $ nombre =substr(str_shuffle( $ caracteres_permitidos ), 0 , $ longitud );

     $ img = $ _ARCHIVOS [ 'archivo' ];
     $ ext = pathinfo ( $ img [ 'nombre' ], PATHINFO_EXTENSION ); // obtengo la extensión del archivo
     $ nombre completo = $ nombre ." . ". $ ext ;
     mover_archivo_cargado ( $ img [" tmp_name "]," img/ ". $ nombre completo ); //
     $ Publicaciones -> update_img ( $ pub_id , $ fullname );
     echo  $ nombre completo ;



  } más {

    $ usuario = $ datos [ 'usuario' ];
    $ desc = $ datos [ 'desc' ];
    $ estado = $ datos [ 'estado' ];
    $ img = nulo ;
  //Guardo la publicación
    $ Publicaciones -> tienda ( $ usuario , $ desc , $ estado , $ img );
  //Busco el ultimo ID de registrador
    $ ultimo = $ Publicaciones -> last_id ();
  //Busco el registro completo
    $ registro = $ Publicaciones -> show ( $ last [ 0 ][ 'pub_id' ]);
    echo json_encode( $ registro );
  }   
