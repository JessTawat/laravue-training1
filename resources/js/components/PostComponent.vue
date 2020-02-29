<template>
   <div class="container">
       <div class="row justify-content-center">
            <div class="col-md-8">
                <AddPost v-on:add-post="addNewPost"/>
                <div v-for="post in posts" v-bind:key="post.id"
                class="card">
                    <div class="float-right p-1">
                        <button type="button" class="close" @click=deletePost(post.id)>
                            <span>&times;</span>
                        </button>
                    </div>
                    <div class="card-body">
                        {{ post.description }}
                        <footer class="blockquote-footer">
                             {{ post.user.name }} {{post.created_at}}
                        </footer>
                    </div>
                     <div class="card-footer text-muted">
                         <Comment
                         :comments="post.comments"
                         />
                         <AddComment
                         :post="post"
                         v-on:add-comment="AddNewComment"
                         />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import AddPost from './AddPostComponent'
import AddComment from './AddCommentComponent'
import Comment from './CommentComponents'

export default {
    components: {
        AddPost,
        AddComment,
        Comment
    },

    data() {
        return {
            posts: []
        }
    },

    created () {
        console.log('this is from post component')
        this.fetchPost()
    },

    methods: {
        fetchPost () {
            axios.get('http://laravue-training1.local/api/posts')
            .then(res => (this.posts = res.data))
            .catch(err => console.log(err))
        },

        addNewPost (newPost) {
            axios.post('http://laravue-training1.local/api/post', newPost)
            .then((res) => {
                this.fetchPost()
                alert('Saved!')
            }).catch(err => console.log(err))
        },
        
        deletePost (id) {
            if (confirm('Are you sure to delete this post?')) {
                axios.delete(`http://laravue-training1.local/api/post/${id}`)
                .then((res) => {
                    this.fetchPost()
                }).catch(err => console.log(err))
            }
        },

        AddNewComment (newComment) {
            axios.post('http://laravue-training1.local/api/comments', newComment)
            .then((res) => {
                this.fetchPost();
            }).catch(err => console.log(err))
        }
    }
}
</script>