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
                            <input type="checbox" class="toggle">
                            <label for="">{{person.name}}</label>
                            <div class="d-flex flex-row justify-content-between align-items-center">
                                <router-link :to="{ name: 'view', params: {idName: person.id}}">View</router-link>
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
                </ul>
            </footer>
        </section>
        <Modal v-if="isModal" @closedModal="showModal()"/>
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
            people: null,
            err: ''
        }
    },
     created ()  {
       let self = this;
       axios.get('http://laravel-vue-todo.com/person')
        .then(res => self.people = res.data)
        .catch(err => this.err = err)
    },
    methods: {
        showModal: function () {
            this.isModal = !this.isModal
        },
        deletePerson: function (id) {
            axios.delete(`http://laravel-vue-todo.com/person/${id}`)
                .then(res => console.log(res))
            this.people = this.people.filter(x => x.id !== id)
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
