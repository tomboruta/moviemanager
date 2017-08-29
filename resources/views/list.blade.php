@extends('app')

@section('content')
    <script type="text/x-template" id="grid-template">
        <table class="table" v-if="filteredData.length > 0">
            <thead>
            <tr>
                <th v-for="key in columns"
                    @click="sortBy(key)"
                    :class="{ active: sortKey == key }"
                    class="sort-by-headers"
                >
                    @{{ key | capitalize }}
                    <span class="arrow" :class="sortOrders[key] > 0 ? 'asc' : 'dsc'"></span>
                </th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(entry,index) in filteredData">
                <td v-for="key in columns">
                    <span v-if="key === 'length'">@{{convertMinutesToHoursAndMinutes(entry[key])}}</span>
                    <span v-else>@{{entry[key]}}</span>
                </td>
                <td>
                    <button @click="deleteMovie(index,entry.id)" class="btn btn-danger btn-xs pull-right">Delete</button>
                </td>
            </tr>
            </tbody>
        </table>
    </script>

    <div class="container">

        <div id="app">
            <form id="search" v-if="gridData.length > 0">
                Search <input name="query" v-model="searchQuery">
            </form>
            <grid
                :data="gridData"
                :columns="gridColumns"
                :filter-key="searchQuery">
            </grid>

            <h3>Add New Movie</h3>

            <form class="form-inline" method="POST" action="/movies" @submit.prevent="addMovie">
                <div class="md-form form-group">
                    <input type="text" id="title" name="title" class="input" placeholder="Title" v-model="movie.title" required maxlength="50">
                </div>
                <div class="md-form form-group">
                    <select id="format" name="format" class="input" v-model="movie.format" required>
                        <option value="DVD" selected>DVD</option>
                        <option value="Streaming">Streaming</option>
                        <option value="VHS">VHS</option>
                    </select>
                    <label for="format">Format</label>
                </div>
                <div class="md-form form-group">
                    <input type="number" id="length" name="length" class="input" required min="1" max="500" placeholder="Length" v-model="movie.length">
                </div>
                <div class="md-form form-group">
                    <input type="number" id="releaseYear" name="releaseYear" class="input" required min="1800" max="2100" placeholder="Release Year" v-model="movie.releaseYear">
                </div>
                <div class="md-form form-group">
                    <input id="rating" name="rating" type="radio" id="radio1" v-model="movie.rating" value="1" selected>
                    <label for="radio1">1</label>
                </div>
                <div class="md-form form-group">
                    <input id="rating" name="rating" type="radio" id="radio2" v-model="movie.rating" value="2">
                    <label for="radio2">2</label>
                </div>
                <div class="md-form form-group">
                    <input id="rating" name="rating" type="radio" id="radio3" v-model="movie.rating" value="3">
                    <label for="radio3">3</label>
                </div>
                <div class="md-form form-group">
                    <input id="rating" name="rating" type="radio" id="radio4" v-model="movie.rating" value="4">
                    <label for="radio4">4</label>
                </div>
                <div class="md-form form-group">
                    <input id="rating" name="rating" type="radio" id="radio5" v-model="movie.rating" value="5">
                    <label for="radio5">5</label>
                </div>
                <div class="md-form form-group">
                    <input type="submit" class="btn btn-indigo" value="Add">
                </div>
            </form>
        </div>

    </div>
@endsection
