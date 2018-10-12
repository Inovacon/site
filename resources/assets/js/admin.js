import './dependencies';
import './setup';
import './components';

Vue.component('d-select', require('./components/Dashboard/Form/Select'));
Vue.component('d-date-input', require('./components/Dashboard/Form/DateInput'));
Vue.component('secure-delete-button', require('./components/Dashboard/SecureDeleteButton'));

Vue.component('course-details-view', require('./pages/Dashboard/CourseDetails'));
Vue.component('lesson-special-form', require('./pages/Dashboard/LessonSpecialForm'));

Vue.component('text-editor', require('./components/Dashboard/Form/TextEditor'))

new Vue({
    el: '#root'
});
