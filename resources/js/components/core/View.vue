<template>
    <div class="view-container todo-app">
        <h2>View post</h2>
        <ul class="todo-list">
            <h2>Posts</h2>
            <li class="todo">
                <h1>{{this.posts.title}}</h1>
                <span>{{this.posts.post}}</span>
            </li>
        </ul>

        <button class="btn btn-primary float-right" @click="showModal()">Add post</button>

        <Modal :idParams="idParams" v-if="isModal" :view="true" @closedModal="showModal()"/>
    </div>
</template>

<script>
import Modal from '@/components/core/Modal'
import axios from 'axios'
export default {
    components: {
        Modal,
    },
    data () {
       return {
           isModal: false,
           idParams: '',
           posts: {
               title: '',
               post: ''
           }
       }
    },
    mounted () {
        this.idParams = this.$route.params.idName

        console.log(this.idParams)
        axios.get(`http://laravel-vue-todo.com/posts/${this.idParams}`)
            .then(res => {
                this.posts.title = res.data.title
                this.posts.post = res.data.post
            })
            .catch(err => console.log(err))
    },
    methods: {
        showModal: function () {
            this.isModal = !this.isModal
        }
    }
}
</script>

<style>
    .view-container {
        margin-top: 50px;
        border-radius: 10px;
        background-color: #eee;
    }

</style>
