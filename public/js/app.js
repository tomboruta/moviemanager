new Vue({
    el: '#app',

    data: {
        movie: {
            title: '',
            format: '',
            length: '',
            releaseYear: '',
            rating: ''
        }
    },

    methods: {
        onSubmit: function() {
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