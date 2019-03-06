class Errors {
    constructor() {
        this.errors = {};
    }

    has(field) {
        return this.errors.hasOwnProperty(field);
    }

    any() {
        return Object.keys(this.errors).length > 0;
    }

    get(field) {
        if (this.errors[field]) {
            return this.errors[field][0];
        }
    }

    record(errors) {
        this.errors = errors;
    }

    clear(field) {
        if (field) {
            delete this.errors[field];

            return;
        }

        this.errors = {};
    }
}

class Form {
    constructor(data) {
        this.originalData = data;

        for (let field in this.originalData) {
            this[field] = data[field];
        }

        this.errors = new Errors();
    }

    data() {
        let data = {};

        for (let field in this.originalData) {
            data[field] = this[field];
        }

        return data;
    }

    reset() {
        for (let field in this.originalData) {
            this[field] = '';
        }
    }

    submit(requestType, url) {
        axios[requestType.toLowerCase()](url, this.data())
                .then(this.onSuccess.bind(this))
                .catch(this.onFail.bind(this));
    }

    onSuccess(response) {
        alert(response.data.message);

        this.errors.clear();
        this.reset();
    }

    onFail(error) {
        this.errors.record(error.response.data.errors);
    }
}

new Vue({
    el: '#app',

    data: {
        form: new Form({
            name: '',
            description: '',
        }),
    },

    methods: {
        onSubmit() {
            this.form.submit('POST', '/projects');
        },
    },
});