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
        new_date: ""
    },
    mounted() {
        axios.get('/index/firstSearch')
        .then((res) => {
            this.targets = res.data
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
        complete: function(target, event) {
            event.preventDefault();
            axios.get('/index/complete/' + target.id)
            .then((res) => {
                target.state = true
            })
        }
    }
});
