<template>
    <div class="todo-container">
        <section class="todoapp">
            <header class="header">
                <h1>todos</h1>
                <input @click="showModal()" type="text" autofocus="autofocus" autocomplete="off" placeholder="Please add a person" class="new-todo">
            </header>
            <section class="main">
                <input type="checkbox" class="toggle-all" id="toggle-all">
                <label for="toggle-all">
                    "Mark All as complete"
                </label>
                <ul class="todo-list">
                    <li v-for="person in people" :key="person.id" class="todo">
                        <div class="view d-flex flex-row justify-content-between align-items-center">
                            <input type="checkbox" class="toggle">
                            <label for="">{{person.name}}</label>
                            <div class="d-flex flex-row justify-content-between align-items-center">
                                <button class="btn btn-primary">
                                    <router-link :to="{ name: 'view', params: {idName: person.id}}">View</router-link>
                                </button>
                                <button @click="deletePerson(person.id)" class="btn-danger">delete</button>
                            </div>
                            <input type="text" class="edit">
                        </div>
                    </li>
                </ul>
            </section>
            <footer class="info">
                <span class="todo-count">

                </span>
                <ul class="filters">
                    <li>
                        <a href="#/all" class="selected">All</a>
                    </li>
                    <li>
                        <a href="#/active" >Active</a>
                    </li>
                    <li>
                        <a @click="deleteItems()" href="#/delete" >Delete</a>
                    </li>
                </ul>
            </footer>
        </section>
        <Modal v-if="isModal" @closedModal="showModal" />
    </div>
</template>


<script>
import Modal from '@/components/core/Modal'
import axios from 'axios'
export default {
    components: {
        Modal
    },
    data() {
        return {
            isModal: false,
            people: [],
            err: ''
        }
    },

    mounted () {
        this.fetchApi()
    },

    methods: {
        showModal: function (value) {
            if(value) {
                this.people.push(value)
                this.isModal = !this.isModal
            } else {
                this.isModal = !this.isModal
            }
        },
        deletePerson: function (id) {
            // this.people.forEach((x, index) => console.log(index))
            axios.delete(`http://laravel-vue-todo.com/person/${id}`)
                .then(res => console.log(res))
            this.people = this.people.filter(x => x.id !== id)
        },
        deleteItems: function () {
            console.log('delete items')
        },
        fetchApi: function () {
            console.log('fetching...')
            axios.get('http://laravel-vue-todo.com/person')
                .then(res => {
                    console.log(res)
                    this.people = res.data
                })
                .catch(err => this.err = err)
        }
    }
}
</script>

<style scoped>
    .todo-container {
        display: flex;
        flex-direction: column;
        margin: 50px 0px;
    }
</style>
