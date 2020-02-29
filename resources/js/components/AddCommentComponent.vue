<template>
    <div>
		<div class="input-group mb-3">
			<input type="text" class="form-control" placeholder="Add your comment ..."  v-model="comment.description">
			<div class="input-group-append">
				<button @click="AddComment()" class="btn btn-primary" type="button">Add</button>
			</div>
		</div>
    </div>
</template>

<script>
export default {
	name: "AddComment",

	props: [
		'post'
	],

	data () {
			return {
					comment: {
							description: '',
							post_id: this.post.id,
							user_id: this.$gate.authenticatedUserID()
					}
			}
	},

	methods: {
		AddComment () {
      let newComment = {
        description: this.comment.description,
        post_id: this.comment.post_id,
        user_id: this.comment.user_id
      }

      this.$emit('add-comment', newComment)

      this.comment.description = ''
		}
	}
}
</script>