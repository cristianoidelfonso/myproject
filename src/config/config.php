<?php

/**
 * Alterar os arquivos abaixo para acesso na rede local: "Require local" para "Require all granted"
 * 
 *  C:\wamp64\bin\apache\apache2.4.39\conf\httpd.conf 
 *  "onlineoffline tag - don't remove
 *   #Require local
 *   Require all granted"
 * 
 *  C:\wamp64\alias\phpmyadmin.conf
 *  "<ifDefine APACHE24>
 *		#Require local
 *		Require all granted
 *	</ifDefine>"
 *
 *  C:\wamp64\bin\apache\apache2.4.39\conf\extra
 *  "Options +Indexes +Includes +FollowSymLinks +MultiViews
 *   AllowOverride All
 *    #Require local
 *    Require all granted
 *  </Directory>
 * </VirtualHost>"
 * 
 */

    header('Content-Type: text/html; charset=utf-8');
    date_default_timezone_set('America/Sao_Paulo');
    setlocale(LC_TIME, 'pt_BR', 'pt_BR.uft-8', 'portuguese');
    
   //  Desabilitando as mensagens de erros
    ini_set('display_errors', 0);
    ini_set('display_startup_errors', 0);
    error_reporting(0);
    
    // Constantes gerais
    define('DAILY_TIME', 60 * 60 * 8);
    
    // Pastas
    define('MODEL_PATH', realpath(dirname(__FILE__) . '/../models'));
    define('VIEW_PATH', realpath(dirname(__FILE__) . '/../views'));
    define('TEMPLATE_PATH', realpath(dirname(__FILE__) . '/../views/template'));
    define('DOMPDF_PATH', realpath(dirname(__FILE__) . '/../views/dompdf/dompdf'));
    define('CONTROLLER_PATH', realpath(dirname(__FILE__) . '/../controllers'));
    define('EXCEPTION_PATH', realpath(dirname(__FILE__) . '/../exceptions'));
    define('BACKUP_PATH', realpath(dirname(__FILE__) . '/../backups'));
    
    // Arquivos
    require_once(realpath(dirname(__FILE__) . '/database.php'));
    require_once(realpath(dirname(__FILE__) . '/loader.php'));
    require_once(realpath(dirname(__FILE__) . '/session.php'));
    require_once(realpath(dirname(__FILE__) . '/date_utils.php'));
    require_once(realpath(dirname(__FILE__) . '/utils.php'));
    require_once(realpath(MODEL_PATH . '/Model.php'));
    require_once(realpath(MODEL_PATH . '/User.php'));
    require_once(realpath(MODEL_PATH . '/Curso.php'));
    require_once(realpath(MODEL_PATH . '/Endereco.php'));
    require_once(realpath(MODEL_PATH . '/Aluno.php'));
    require_once(realpath(MODEL_PATH . '/Matricula.php'));
    require_once(realpath(EXCEPTION_PATH . '/AppException.php'));
    require_once(realpath(EXCEPTION_PATH . '/ValidationException.php'));
    