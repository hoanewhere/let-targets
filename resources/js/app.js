/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('index-component', require('./components/IndexComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#index',
    data: {
        targets: [],
        new_target: "",
        new_date: "",
        user: [],
        search_target: "",
        search_user: 0,
        search_state: 2,
    },
    mounted() {
        axios.get('/index/firstSearch')
        .then((res) => {
            this.targets = res.data

            axios.get('/index/getUser')
            .then((res) => {
                this.user = res.data
            })
        })
    },
    methods: {
        addTarget: function() {
            axios.post('/index/add', {
                target: this.new_target,
                completion_date: this.new_date
            }).then((res) => {
                // TBD: バリデーションチェックしてtargetsを更新する処理を追加する
                console.log("ajaxのレスポンス:")
                console.log(res)
                this.targets = res.data
                this.new_target = ""
                this.new_date = ""
            })
        },
        editTarget: function(target) {
            axios.get('/index/editTarget/' + target.id + '/target/' + target.target)
            .then((res) => {
                console.log("編集完了")
            })
        },
        searchTarget: function() {
            axios.get('/index/search/' + this.search_user + '/' + this.search_state + '/' + this.search_target)
            .then((res) => {
                console.log("ajaxのレスポンス:")
                console.log(res)
                this.targets = res.data
            })
        },
        complete: function(target, event) {
            event.preventDefault();
            axios.get('/index/complete/' + target.id)
            .then((res) => {
                target.state = true
            })
        },
        notComplete: function(target, event) {
            event.preventDefault();
            axios.get('/index/notComplete/' + target.id)
            .then((res) => {
                target.state = false
            })
        },
        deleteTarget: function(target, event) {
            event.preventDefault();
            axios.get('/index/delete/' + target.id)
            .then((res) => {
                target.delete_flg = true
            })
        },
        userJudge: function(target) {
            if (this.user.id != target.user_id ) {
                return true
            } else {
                return false
            }
        }
    }
});
