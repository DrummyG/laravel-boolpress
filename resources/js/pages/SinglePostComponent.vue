<template>
    <section>
        <div v-if="post">
            <h1 >{{post.title}}</h1>
            <p>{{post.description}}</p>
            <img :src="`/storage/${post.image}`" alt="">
        </div>
        <div v-if="post.comments">
            <p v-for="(comment) in post.comments" :key="comment.id">{{comment.comment}}</p>
        </div>
        <form @submit.prevent="CommentSend()">
            <input type="text" v-model="nuovoMessaggio.comment" name="scritto">
            <button type="submit">Invia</button>
        </form>



    </section>
</template>
<script>
export default {
    name: 'SinglePostComponent',
    data(){
        return{
            post: null,
            nuovoMessaggio: {
                comment: '',
                post_id: null
            }
        }
    },
    methods:{
        CommentSend(){
            this.nuovoMessaggio.post_id = this.post.id
            axios.post('/api/comments', this.nuovoMessaggio).then((response)=>{
                this.post.comments.push(response.data)
            })
        }
    },
    mounted(){
        const slug = this.$route.params.slug;
        axios.get(`/api/posts/${slug}`).then((response) => {
            this.post = response.data;
            console.log(this.post)
        }).catch((error) => {
            this.$router.push({name: 'page-404'});
        })
    }
}
</script>