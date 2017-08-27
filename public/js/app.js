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
            axios.post('/api/movies', this.$data)
            .then(function (response) {
                this.movie = response.data;
                console.log(this.movie);
            })
            .catch(function (error) {
                console.log(error);
            });

        }
    }
});