new Vue({
    el: '#app',

    data: {
        list: [],
        movie: {
            title: '',
            format: '',
            length: '',
            releaseYear: '',
            rating: ''
        }
    },

    created() {
        this.getMovieList();
    },

    methods: {
        getMovieList() {
            axios.get('/api/movies').then((response) => {
                this.list = response.data;
            });
        },

        addMovie: function() {
            var self = this;
            axios.post('/api/movies', this.$data)
            .then(function (response) {
                self.movie.title = '';
                self.movie.format = '';
                self.movie.length = '';
                self.movie.releaseYear = '';
                self.movie.rating = '';
            })
            .catch(function (error) {
                console.log(error);
            });

        }
    }
});