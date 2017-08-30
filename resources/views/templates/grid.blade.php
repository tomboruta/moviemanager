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
                <button @click="deleteMovie(index,entry.id)" class="btn btn-danger btn-md pull-right">Delete</button>
                <button class="btn btn-primary btn-md pull-right">Edit</button>
            </td>
        </tr>
        </tbody>
    </table>
</script>
