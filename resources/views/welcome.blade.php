<!DOCTYPE html>
<html lang="en" class="full-height">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Tom's Movie Manager</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/mdb.min.css" rel="stylesheet">
    <link href="css/app.css" rel="stylesheet">

</head>

<body>

<header>

    <nav class="navbar navbar-expand-lg navbar-dark elegant-color-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">Tom's Movie Manager</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Movies</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

</header>

<!-- Main container-->
<div class="container">

    <div id="app">
        <table class="table">
            <thead>
            <tr>
                <th>Title</th>
                <th>Format</th>
                <th>Length</th>
                <th>Release Year</th>
                <th>Rating</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="movie in list">
                <td>@{{ movie.title }}</td>
                <td>@{{ movie.format }}</td>
                <td>@{{ movie.length }}</td>
                <td>@{{ movie.releaseYear }}</td>
                <td>@{{ movie.rating }}</td>
                <td><button @click="deleteMovie(movie.id)" class="btn btn-danger btn-xs pull-right">Delete</button></td>
            </tr>
            </tbody>
        </table>

        <h3>Add New Movie</h3>

        <form method="POST" action="/movies" @submit.prevent="addMovie">
            <table class="table">
                <tbody>
                <tr>
                    <td>
                        <input type="text" id="title" name="title" class="input" placeholder="Movie Title" v-model="movie.title">
                    </td>
                    <td>
                        <input type="text" id="format" name="format" class="input" placeholder="Format" v-model="movie.format">
                    </td>
                    <td>
                        <input type="text" id="length" name="length" class="input" placeholder="Length" v-model="movie.length">
                    </td>
                    <td>
                        <input type="text" id="releaseYear" name="releaseYear" class="input" placeholder="Release Year" v-model="movie.releaseYear">
                    </td>
                    <td>
                        <input type="text" id="rating" name="rating" class="input" placeholder="Rating" v-model="movie.rating">
                    </td>
                    <td>
                        <input type="submit" class="btn btn-primary" value="Add">
                    </td>
                </tr>
                </tbody>

            </table>
        </form>
    </div>

</div>
<!--/ Main container-->

<!-- SCRIPTS -->
<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="js/popper.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/vue.js"></script>
<script type="text/javascript" src="js/axios.js"></script>
<script type="text/javascript" src="js/app.js"></script>

</body>

</html>