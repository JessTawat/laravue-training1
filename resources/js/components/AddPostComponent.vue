<template>
    <div>
		<div class="input-group mb-3">
			<input type="text" class="form-control" placeholder="What's on your mind ..."  v-model="post.description">
			<div class="input-group-append">
				<button @click="AddPost()" class="btn btn-primary" type="button">Post</button>
			</div>
		</div>
    </div>
</template>

<script>
export default {
		name: "AddPost",

		data () {
			return {
				post: {
					description: '',
					user_id: this.$gate.authenticatedUserID()
				}
			}
		},
	
	methods: {
		AddPost () {
			let newPost = {
				description: this.post.description,
				user_id: this.post.user_id
			}
			// Pass this to Parent component
			this.$emit('add-post', newPost)
			// Clear the field
			this.post.description = ''
		}
	}
}
</script>