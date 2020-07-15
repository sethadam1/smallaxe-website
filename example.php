<?php

# require the templating library 
require 'smallaxe_templating.php'; 


# first, you instanciate a Small Axe object
$T = new Smallaxe\smallaxe_template(__DIR__.'/templates/',$memcache);

# You can feed the Small Axe object a memcached resource for storing uncompiled templates
# a memory cache system is optional
$memcache = new Memcached();
$memcache->addServer("localhost", 11211);
$T->enable_cache($memcache); 

# you can also add functions that the template can parse
# currently, functions are only supported if they can take the value as an argument and return it as a string
# only functions YOU explicitly allow will work in your templates
# for example, this will add the "sha1()" function  
$T->extend(['sha1']); 

# the extend() method will also accept your custom functions
function custom_function($string) { 
	return '&quot;<i>'.ucwords(strtolower($string))."-".strtoupper($string).'&quot;</i>'; 
}
$T->extend(['custom_function']); 

# define our variables
$vars = [
	'software_title' 	=> "Small Axe Templating",
	"author"		  	=> "adam scheinberg", 
	'year'			  	=> date('Y'),
	'language'		 	=> "php",
	'test_text'		 	=> "<i><b>This should be escaped text</b></i>",
	'random'			=> "This is a random string"
];

# load template by passing either the file in the templates folder OR a hard coded path 
# if no file extension is provided and no file is matched without extension, it will assume ".tmpl"
$template	 = $T->load_template("demo1");

# compile the template 
$html		 = $T->render($template,$vars); 

# echo the template 
echo $html; 

# ================================================================
echo "<hr>";
# ================================================================

echo "<h1>REUSING A TEMPLATE</h1><p>You can use a template multiple times.</p>"; 

$members = [
	['firstname'=>'steve', 'lastname'=>'howe', 'instrument'=>'guitar'],
	['firstname'=>'jon', 'lastname'=>'anderson', 'instrument'=>'vocals'],
	['firstname'=>'rick', 'lastname'=>'wakeman', 'instrument'=>'keyboards'],
	['firstname'=>'bill', 'lastname'=>'bruford', 'instrument'=>'drums'],
	['firstname'=>'chris', 'lastname'=>'squire', 'instrument'=>'bass'],
];
$template2	 = $T->load_template("demo2");
echo "<ul>";
$bandlist = '';
foreach($members as $member) {
	$bandlist .= $T->render($template2,$member); 
}
echo $bandlist; 
echo "</ul>";

# ================================================================
echo "<hr>";
# ================================================================

# we can use the output of the template above to feed back into another template
$band = [
	'bandname' => 'yes',
	'year_formed'=>1968,
	'number_albums'=>21,
	'bandlist'=>$bandlist
];
$template3 = $T->load_template("demo3");
echo $T->render($template3,$band); 
	