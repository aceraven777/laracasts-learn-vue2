import Errors from './Errors';

class Form {
    /**
     * Create a new Form instance.
     * 
     * @param {object} data 
     */
    constructor(data) {
        this.originalData = data;

        for (let field in this.originalData) {
            this[field] = data[field];
        }

        this.errors = new Errors();
    }

    /**
     * Fetch all relevant data for one form.
     */
    data() {
        let data = {};

        for (let field in this.originalData) {
            data[field] = this[field];
        }

        return data;
    }

    /**
     * Reset the form fields.
     */
    reset() {
        for (let field in this.originalData) {
            this[field] = '';
        }

        this.errors.clear();
    }

    /**
     * Submit the form.
     * 
     * @param {string} requestType 
     * @param {string} url 
     */
    submit(requestType, url) {
        return new Promise ((resolve, reject) => {
            return axios[requestType.toLowerCase()](url, this.data())
                .then((response) => {
                    this.onSuccess(response.data);

                    resolve(response.data);
                })
                .catch((error) => {
                    this.onFail(error.response.data.errors);

                    reject(error.response.data.errors);
                });
        });
    }

    /**
     * Handle a successful form submission.
     * 
     * @param {object} data 
     */
    onSuccess(data) {
        alert(data.message);

        this.reset();
    }

    /** 
     * Handle a failed form submission.
     * 
     * @param {object} errors 
     */
    onFail(errors) {
        this.errors.record(errors);
    }
}

export default Form;