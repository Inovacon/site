import './dependencies';
import './setup';

Vue.component('flash', require('./components/Flash'));
Vue.component('activate-button', require('./components/ActivateButton'));

Vue.component('course-details-view', require('./pages/CourseDetails'));

new Vue({
    el: '#root'
});
