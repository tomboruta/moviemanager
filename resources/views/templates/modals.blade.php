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
        <div class="modal-header">
            <h3>Add New Movie</h3>
        </div>
        <div class="modal-body">
            <label class="form-label">
                Title
                <input v-model="title" class="form-control">
            </label>
            <label class="form-label">
                Body
                <textarea v-model="body" rows="5" class="form-control">
                </textarea>
            </label>
        </div>
        <div class="modal-footer text-right">
            <button class="modal-default-button" @click="savePost()">
                Save
            </button>
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
            <button class="modal-default-button" @click="savePost()">
                Post
            </button>
        </div>
    </modal>
</script>
