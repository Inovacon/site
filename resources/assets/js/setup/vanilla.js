if (window.hasOwnProperty('oldInput')) {
    let oldInput = window.oldInput;

    window.old = function (key, defaultValue) {
        if (0 === arguments.length) {
            return oldInput;
        }

        return oldInput.hasOwnProperty(key) ? oldInput[key] : defaultValue;
    };
}
