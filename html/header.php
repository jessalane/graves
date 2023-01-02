<?php 
    require_once('../php/database.php'); 
    require_once('../php/functions.php'); 
    $errors = [];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf8">
        <meta name="description" content="">
        <meta name="author" content="Jessica Lane">
        <title>Final One</title>
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet"> 
        <link href="../css/main.css" rel="stylesheet" type="text/css">
        <link href="../css/normalize.css" rel="stylesheet" type="text/css">
        <link href="../css/w3.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <header>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="FAQ.php">FAQ</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="blog.php">Blog</a></li>
                    <li><a href="#openModal">Login</a></li>
                </ul>
            </nav>
            <div id="openModal" class="modalDialog">
                <div><a href="#close" title="close" class="close">X</a>
                    <!-- content for modal -->
                    <div class="login">
                        <h2>Sign in</h2>
                        <form>
                            <input type="email" name="username" placeholder="username / email">
                            <input type="password" name="password" placeholder="password">
                            <input type="button" value="login">
                        </form>
                    </div><!-- end login -->
                </div><!-- end close -->
            </div><!-- end openModal -->