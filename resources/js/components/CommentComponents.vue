<template>
    <div>
        <div v-for="comment in comments" v-bind:key="comment.id">
            <ul
            class="list-group list-group-flush"
            >
                <li class="list-group-item">
                    {{ comment.description }}
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
export default {
    name: "Comment",
    props: [
        'comments'
    ]
}
</script>