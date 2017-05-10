<?php 
define('data',__DIR__.'/data');
is_dir(data) or mkdir(data);
is_dir('php') or mkdir('php');
spl_autoload_register(function($class){
	require __DIR__.'/'.str_replace('\\','/',$class).'.php';
});