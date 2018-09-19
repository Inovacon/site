import './dependencies';
import './setup';
import './components';

Vue.component('team-selection-view', require('./pages/TeamSelection'));

new Vue({
    el: '#root'
});
