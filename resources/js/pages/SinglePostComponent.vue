<template>
    <section>
        <div v-if="post">
            <h1 >{{post.title}}</h1>
            <p>{{post.description}}</p>
            <img :src="`/storage/${post.image}`" alt="">
        </div>

    </section>
</template>
<script>
export default {
    name: 'SinglePostComponent',
    data(){
        return{
            post: null
        }
    },
    mounted(){
        const slug = this.$route.params.slug;
        axios.get(`/api/posts/${slug}`).then((response) => {
            this.post = response.data;
        }).catch((error) => {
            this.$router.push({name: 'page-404'});
        })
    }
}
</script>