<template>
    <section>
        <h1> Posts</h1>
        <ul v-if="posts.length > 0">
            <li v-for="(post,index) in posts" :key="post.id">
                <div class="col-3">
                    <h3>{{post.title}}</h3>
                    <p>{{post.description}}</p>
                    <img :src="post.image" alt="">
            </div>
            <router-link :to="{ name: 'single-post', params: { slug: post.slug } }">Visualizza Post</router-link>
            </li>
        </ul>
    </section>
</template>
<script>
export default {
    name: 'PostsComponent',
    data(){
        return {
            posts: []
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