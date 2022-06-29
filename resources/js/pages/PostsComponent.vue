<template>
    <section>
        <h1> Posts</h1>
        <div class="container">
            <div class="row" v-if="posts.length > 0">
                <div class="col-3" v-for="post in posts" :key="post.id">
                    <h3>{{post.title}}</h3>
                    <p>{{post.description}}</p>
                </div>
            <router-link :to="{ name: 'single-post', params: { slug: post.slug } }">Visualizza Post</router-link>
            </div>
        </div>
    </section>
</template>
<script>
export default {
    name: 'PostsComponent',
    data(){
        return {
            posts: [],
        }
    },
    created(){
        axios.get('/api/posts').then((response)=>{
            this.posts = response.data;
        }).catch((error)=>{
            console.log(error);
        })
    }
}
</script>

<style lang="scss">

</style>