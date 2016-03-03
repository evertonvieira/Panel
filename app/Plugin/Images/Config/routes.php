<?php

  // para listar images de qualquer modelo em questão
  Router::connect(
    '/admin/:parent/images/:id',
    array(
      'plugin'=>'images',
      'controller'=>'images',
      'prefix'=>'admin',
    ),
    array('named'=>'parent', 'pass'=>array('id'))
  );

  // Para o post em ajax para adicionar imagens
  Router::connect(
    '/admin/:parent/images/:id/add',
    array(
      'plugin'=>'images',
      'controller'=>'images',
      //'prefix'=>'admin',
      'action'=>'add',
    ),
    array('named'=>'parent', 'pass'=>array('id'))
  );

  // Para deletar todas as imagens selecionadas
  // /admin/pages/images/7/delete/delete_all
  Router::connect(
    '/admin/:parent/images/:id/delete_all',
    array(
      'plugin'=>'images',
      'controller'=>'images',
      'prefix'=>'admin',
      'action'=>'delete_all',
    ),
    array('named'=>'parent', 'pass'=>array('id', 'image_id'))
  );

  // Para deletar uma imagem específica de um modelo
  // /admin/pages/images/7/delete/1
  Router::connect(
    '/admin/:parent/images/:id/delete/:image_id',
    array(
      'plugin'=>'images',
      'controller'=>'images',
      'prefix'=>'admin',
      'action'=>'delete',
    ),
    array('named'=>'parent', 'pass'=>array('id', 'image_id'))
  );