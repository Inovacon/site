window.events = new Vue();

window.Vue.prototype.flash = function (message, type = 'success') {
    window.toastr[type](message);
};

window.Vue.prototype.consoleLog = function (...data) {
    console.log(...data);
};

Vue.mixin({
    methods: {
        route: undefined !== window.route ? window.route : () => {}
    }
});
