<template>
    <div class="view-container todo-app">
        <h2>View post</h2>

        <div class="tags-container">
           <ul class="tags-list">
               <li class="list">
                  <button class="btn btn-primary">Development</button>
               </li>
               <li class="list">
                   <button class="btn btn-primary">Design</button>
               </li>
           </ul>
        </div>

        <ul class="todo-list">
            <h2>Posts list</h2>
            <li v-for="post in posts" class="todo">
                <form class="form-group post-container">
                    <div class="post-header-title">
                        <div class="dp-placeholder"></div>
                        <h1>List of post</h1>
                    </div>

                    <div class="post-holder">
                        <h2>Title:</h2>
                        <input :placeholder="post.title" class="form-control" >
                    </div>
                    <div class="post-holder">
                        <span>Post:</span>
                        <input  :placeholder="post.post" class="form-control" >
                    </div>

                </form>
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
           posts: []
       }
    },
    mounted () {
        this.idParams = this.$route.params.idName

        console.log(this.idParams)
        axios.get(`http://laravel-vue-todo.com/posts/${this.idParams}`)
            .then(res => {
                this.posts = res.data
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

<style lang='scss' scoped>
    .view-container {
        margin-top: 50px;
        border-radius: 10px;
        background-color: #eee;

        .tags-container {
            display: flex;
            width: 100%;

            .tags-list {
                display: flex;
                align-items: center;
                flex-direction: row;
                list-style: none;
                width: 100%;

                .list {
                    margin-right: 1em;
                }
            }
        }


        .post-container {
            display: flex;
            width: 100%;
            height: 100%;
            border-radius: 10px;
            flex-direction: column;

            .post-header-title {
                display: flex;
                flex-direction: row;
                padding: 20px 10px;

                .dp-placeholder {
                    height: 50px;
                    width: 50px;
                    background-color: #111;
                    border-radius: 50px;
                }

                > h3 {
                    padding: 0 10px;
                }

            }

            .post-holder {
                margin: 20px;
            }
        }
    }

</style>
