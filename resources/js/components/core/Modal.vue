<template>
    <transition name="modal">
        <div class="modal-mask">
            <div class="modal-wrapper">
                <div class="modal-container">
                    <div ref="form">
                        <div class="form-group">
                            <label for="exampleInputEmail1">{{view ? "Title" : "Name"}}</label>
                            <input v-if="view" v-model="title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <label for="exampleInputEmail1">{{view ? "Posts" : "Name"}}</label>
                            <input v-if="view" v-model="posts" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <input v-if="!view" v-model="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <small id="emailHelp" class="form-text text-muted">Input your {{view ? "Posts" : "Name"}}</small>
                        </div>
                        <button type="submit" class="btn btn-primary" id="add" @click="submit()">Submit</button>
                        <button class="btn btn-danger" id="close-btn"  @click="closeModal()">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </transition>
</template>

<script>
import axios from 'axios'
export default {
    props: {
      view: Boolean,
      idParams: Number
    },
    data() {
        return {
            name: '',
            posts: '',
            title: '',
            checked: false,
            person: null
        }
    },

    mounted () {
        console.log(this.idParams)
    },

    methods: {
        closeModal () {
            console.log('closing modal')
            this.$emit('closedModal', false)
        },
        async submit () {
            if(this.view) {
                axios.post(`http://laravel-vue-todo.com/posts`, {
                    title: this.title,
                    post: this.posts,
                    person_id: this.idParams
                })
                .then(res => console.log(res))
                .catch(err => console.log(err))
                this.posts = ''
                this.title = ''
                this.person_id = ''
                this.$emit('closedModal', false)
            } else {
                try {
                    axios.post('http://laravel-vue-todo.com/person', {
                        name: this.name
                    })
                        .then(res => this.person = res.data)
                        .then(res => {
                            this.$emit('closedModal', this.person)
                        })
                } catch (err) {
                    console.log(er)
                }



            }

        }
    }
}
</script>

<style scoped>
    .modal-mask {
        position: fixed;
        z-index: 9998;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        display: table;
        transition: opacity 0.3s ease;
    }

    .modal-wrapper {
        display: table-cell;
        vertical-align: middle;
    }

    .modal-container {
        width: 300px;
        margin: 0px auto;
        padding: 50px 30px;
        background-color: #fff;
        border-radius: 2px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.33);
        transition: all 0.3s ease;
        font-family: Helvetica, Arial, sans-serif;
    }

    .modal-header h3 {
        margin-top: 0;
        color: #42b983;
    }

    .modal-body {
        margin: 20px 0;
    }

    .modal-default-button {
        float: right;
    }

    /*
     * The following styles are auto-applied to elements with
     * transition="modal" when their visibility is toggled
     * by Vue.js.
     *
     * You can easily play with the modal transition by editing
     * these styles.
     */

    .modal-enter {
        opacity: 0;
    }

    .modal-leave-active {
        opacity: 0;
    }

    .modal-enter .modal-container,
    .modal-leave-active .modal-container {
        -webkit-transform: scale(1.1);
        transform: scale(1.1);
    }

    #close-btn, #add {
        float: right;
        margin: 0px 10px;
    }

</style>
