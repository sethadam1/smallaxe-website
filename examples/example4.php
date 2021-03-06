<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">		
		<style>
			body {
				padding:20px 5%;
			}
			code { padding:2px; font-family:'courier new'; }	
			.contentBox { padding-top:15px; }	 
		</style>
		<title>Small Axe Templating</title>
		<script src="https://cdn.jsdelivr.net/remarkable/1.7.1/remarkable.min.js"></script>
	</head>
	<body>
		
<?php 
	$page = 4; 
	include '../navbar.php'; 
?>	
		<br>	
		
		<div class='card card-body bg-light'>
			<h1>Nested Templates</h1>
			<p>Automate population of templates within templates: Inception style</p>
		</div><br>
		
		<ul class="nav nav-tabs">
			<li class="nav-item">
				<a class="nav-link disabled sourceToggle" rel="#void" href="#void"><b>Example 4</b></a>
			</li>
			<li class="nav-item">
				<a class="nav-link active sourceToggle" rel="#compiledBox" href="#">Rendered</a>
			</li>
			<li class="nav-item">
				<a class="nav-link sourceToggle" rel="#sourceBox" href="#">Source</a>
			</li>
			<li class="nav-item">
				<a class="nav-link sourceToggle" rel="#tmpl41Box" href="#">demo4-1.tmpl</a>
			</li>
			<li class="nav-item">
				<a class="nav-link sourceToggle" rel="#tmpl42Box" href="#">demo4-2.tpl</a>
			</li>
			<li class="nav-item">
				<a class="nav-link sourceToggle" rel="#tmpl43Box" href="#">demo4-3.tpl</a>
			</li>
		</ul>
		<div id='compiledBox' class='contentBox'>
<?php
# require the templating library 
require 'example4-php.php'; 
?>
		</div>
		<div id='sourceBox' class='contentBox'>
<?php
# highlight the templating library 
highlight_file('example4-php.php'); 
?>
		</div>		
		<div id='tmpl41Box' class='contentBox'>
<?php
# highlight the template  
highlight_file('../templates/demo4-1.tmpl'); 
?>
		</div>		
		<div id='tmpl42Box' class='contentBox'>
<?php
# highlight the template  
highlight_file('../templates/demo4-2.tmpl'); 
?>
		</div>	
		<div id='tmpl43Box' class='contentBox'>
<?php
# highlight the template  
highlight_file('../templates/demo4-3.tmpl'); 
?>
		</div>							
		
		<script   src="https://code.jquery.com/jquery-3.5.1.min.js"   integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="   crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
		<script>
		$(function() {
			$('.contentBox').hide();
			$('#compiledBox').show();
			$('.sourceToggle').click(function() { 
				var whichBox = $(this).attr('rel'); 
				$('.contentBox').hide(); 
				$('.sourceToggle').removeClass('active'); 
				$(whichBox).show(); 
				$(this).addClass('active');
			});
		}); 
		</script>	
	</body>
</html>