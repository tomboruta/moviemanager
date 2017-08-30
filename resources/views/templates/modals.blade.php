<script type="x/template" id="modal-template">
    <transition name="modal">
        <div class="modal-mask" @click="close" v-show="show">
            <div class="modal-container" @click.stop>
                <slot></slot>
            </div>
        </div>
    </transition>
</script>

<script type="x/template" id="new-movie-modal-template">
    <modal :show="show" @close="close">
        <div class="modal-body">
            <a class="float-right" @click.prevent="close">
                X
            </a>
            <h3>Add New Movie</h3>
            <form method="POST" action="/movies" @submit.prevent="saveNewMovie">
                <div class="form-group">
                    <label for="movie-title">Title</label>
                    <input type="text" class="form-control input-alternate" id="movie-title" name="movie-title" v-model="movie.title" required maxlength="50">
                </div>
                <div class="form-group">
                    <label for="movie-format">Format</label><br>
                    <select id="format" name="format" v-model="movie.format" required>
                        <option value="DVD" selected>DVD</option>
                        <option value="Streaming">Streaming</option>
                        <option value="VHS">VHS</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="movie-length">Length</label>
                    <input type="number" id="length" name="length" class="input-alternate" required min="1" max="500" v-model="movie.length">
                </div>
                <div class="form-group">
                    <label for="movie-release">Release</label>
                    <input type="number" id="releaseYear" name="releaseYear" class="input-alternate" required min="1800" max="2100" v-model="movie.releaseYear">
                </div>
                <div class="form-group">
                    <label>Rating</label><br>
                    <input name="rating" type="radio" id="radio1" v-model="movie.rating" value="1">
                    <label for="radio1">1</label>
                    <input name="rating" type="radio" id="radio2" v-model="movie.rating" value="2">
                    <label for="radio2">2</label>
                    <input name="rating" type="radio" id="radio3" v-model="movie.rating" value="3" checked>
                    <label for="radio3">3</label>
                    <input name="rating" type="radio" id="radio4" v-model="movie.rating" value="4">
                    <label for="radio4">4</label>
                    <input name="rating" type="radio" id="radio5" v-model="movie.rating" value="5">
                    <label for="radio5">5</label>
                </div>
                <div class="form-group float-right">
                    <input type="submit" class="btn btn-primary btn-sm" value="Save">
                </div>
                <div class="clearfix"></div>
            </form>
        </div>
    </modal>
</script>

<script type="x/template" id="edit-movie-modal-template">
    <modal :show="show" @close="close">
        <div class="modal-header">
            <h3>Edit Movie</h3>
        </div>
        <div class="modal-body">
            <label class="form-label">
                Comment
                <textarea v-model="comment" rows="5" class="form-control">
                </textarea>
            </label>
        </div>
        <div class="modal-footer text-right">
            <button class="modal-default-button" @click="saveEditMovie()">
                Save
            </button>
        </div>
    </modal>
</script>
