import './dependencies';
import './setup';
import './components';

Vue.component('d-input', require('./components/Dashboard/Form/Input'));
Vue.component('d-button', require('./components/Dashboard/Form/Button'));
Vue.component('d-select', require('./components/Dashboard/Form/Select'));
Vue.component('d-textarea', require('./components/Dashboard/Form/TextArea'));
Vue.component('d-file-input', require('./components/Dashboard/Form/FileInput'));

Vue.component('course-details-view', require('./pages/Dashboard/CourseDetails'));

new Vue({
    el: '#root'
});
