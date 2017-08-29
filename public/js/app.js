Vue.component('grid', {
    template: '#grid-template',
    props: {
        data: Array,
        columns: Array,
        filterKey: String
    },
    data: function () {
        var sortOrders = {}
        this.columns.forEach(function (key) {
            sortOrders[key] = 1
        });
        return {
            sortKey: '',
            sortOrders: sortOrders
        }
    },
    computed: {
        filteredData: function () {
            var sortKey = this.sortKey
            var filterKey = this.filterKey && this.filterKey.toLowerCase()
            var order = this.sortOrders[sortKey] || 1
            var data = this.data
            if (filterKey) {
                data = data.filter(function (row) {
                    return Object.keys(row).some(function (key) {
                        return String(row[key]).toLowerCase().indexOf(filterKey) > -1
                    })
                })
            }
            if (sortKey) {
                data = data.slice().sort(function (a, b) {
                    a = a[sortKey]
                    b = b[sortKey]
                    return (a === b ? 0 : a > b ? 1 : -1) * order
                })
            }
            return data
        }
    },
    filters: {
        capitalize: function (str) {
            return str.charAt(0).toUpperCase() + str.slice(1)
        }
    },
    methods: {
        sortBy: function (key) {
            this.sortKey = key
            this.sortOrders[key] = this.sortOrders[key] * -1
        },
        convertMinutesToHoursAndMinutes: function (mins){
            var hours = Math.trunc(mins/60);
            var minutes = mins % 60;
            if (minutes < 10){
                minutes = '0' + minutes.toString();
            }
            if (hours === 0){
                return minutes + " m";
            }
            return hours + " hr " + minutes + " m";
        },
        deleteMovie: function (index, id) {
            var self = this;
            axios.delete('api/movies/' + id)
                .then(function (response) {
                    self.data.splice(index, 1);
                })
                .catch(function (error) {
                    console.log(error);
                });
        }
    }
})

var app = new Vue({
    el: '#app',
    data: {
        searchQuery: '',
        gridColumns: ['title', 'format', 'length', 'releaseYear', 'rating'],
        gridData: [],
        movie: {}
    },
    mounted: function() {
        var self = this;
        axios.get('/api/movies').then(function (response) {
            self.gridData = response.data;
        });
    },
    methods: {
        addMovie: function () {
            var self = this;
            axios.post('/api/movies', self.movie)
                .then(function (response) {
                    self.gridData.push({
                        title: self.movie.title,
                        format: self.movie.format,
                        length: self.movie.length,
                        releaseYear: self.movie.releaseYear,
                        rating: self.movie.rating,
                    })
                    self.movie = {};
                })
                .catch(function (error) {
                    console.log(error);
                });
        }
    }
});
