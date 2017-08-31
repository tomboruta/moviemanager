@extends('app')

@section('content')

    @include('templates.modals')
    @include('templates.grid')

    <div class="container">

        <div id="app" class="list-page">
            <form class="float-right" id="search" v-if="gridData.length > 0">
                Search <input name="query" v-model="searchQuery">
            </form>
            <div class="float-left">
                <button class="btn btn-default btn-lgd pull-right" @click="showNewMovieModal = true">Add New Movie</button>
            </div>
            <grid
                :data="gridData"
                :columns="gridColumns"
                :filter-key="searchQuery">
            </grid>

            <div v-if="gridData.length > 0">
                <button class="btn btn-default btn-lgd" @click="showNewMovieModal = true">Add New Movie</button>
            </div>

            <new-movie-modal :show="showNewMovieModal" @close="showNewMovieModal = false"></new-movie-modal>

        </div>

    </div>

@endsection
