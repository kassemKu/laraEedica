
require('./bootstrap');

window.Vue = require('vue');
import { VueEditor } from "vue2-editor";

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app',
    data() {
        return {
            // Users Cretae Roles
            rolesSelected: [],
            // User Edite Password
            passwordOptions: 'oldPass',

            // Role Create Permissions
            permissionsSelected: [],

            // Permission Create Permission
            permissionType: 'basic',
            resource: '',
            crudSelected: ['create', 'read', 'update', 'delete'],

            // Permission Name Slug Create
            permissionName: '',

            // Course Create title
            courseTitle: '',
            // Course Free
            checkPrice: {},

            editorText: ''
        }
    },

    components: {
        VueEditor
    },

    methods: {
        // Permissions
        crudName: function(item) {
        return item.substr(0,1).toUpperCase() + item.substr(1) + " " + app.resource.substr(0,1).toUpperCase() + app.resource.substr(1);
        },
        crudSlug: function(item) {
        return item.toLowerCase() + "-" + app.resource.toLowerCase();
        },
        crudDescription: function(item) {
        return "Allow a User to " + item.toUpperCase() + " a " + app.resource.substr(0,1).toUpperCase() + app.resource.substr(1);
        },

        // Slug Course Create
        courseSlug(item) {
            return item.toLowerCase().replace(/ /g, (x) => x = "-");
        },
        // Slug Course Edit
        courseEditSlug() {
            var courseEditTitle = document.getElementById('title');
            return courseEditTitle.value.toLowerCase().replace(/ /g, (x) => x = "-");
        },

        // Permission Slug Create
        permissionSlug(item) {
            return item.toLowerCase().replace(/ /g, (x) => x = "-");
        },

    },
});