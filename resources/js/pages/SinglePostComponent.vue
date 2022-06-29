<template>
    <section>
        <div v-if="post">
            <h1 >{{post.title}}</h1>
            <p>{{post.description}}</p>
            <img :src="`/storage/${post.image}`" alt="">
        </div>
        <div v-if="comments">
            <p v-for="(comment) in comments" :key="comment.id">{{comment}}</p>
        </div>



    </section>
</template>
<script>
export default {
    name: 'SinglePostComponent',
    data(){
        return{
            post: null,
            comments: null
        }
    },
    mounted(){
        const slug = this.$route.params.slug;
        axios.get(`/api/posts/${slug}`).then((response) => {
            this.post = response.data;
        }).catch((error) => {
            this.$router.push({name: 'page-404'});
        })

        const comments = this.$route.params.id;
        axios.get(`/api/comments/${post_id}`).then((response) => {
            this.comments = response.data;
        })
    }
}
</script>