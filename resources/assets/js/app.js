import './dependencies';
import './setup';

Vue.mixin({
    methods: {
        route: undefined !== window.route ? window.route : () => {}
    }
});

Vue.component('flash', require('./components/Flash'));
Vue.component('add-button', require('./components/AddButton'));
Vue.component('activate-button', require('./components/ActivateButton'));

Vue.component('course-details-view', require('./pages/Dashboard/CourseDetails'));

new Vue({
    el: '#root'
});
