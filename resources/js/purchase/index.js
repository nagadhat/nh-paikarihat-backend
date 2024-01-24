import { createApp } from "vue";
import axios from "axios";


const app = createApp({
    data() {
        return {
            suppliers: [],
            name: '',
            phone: '',
            email: '',
            company: '',
            address: '',
            error: ''
        }
    },
    mounted() {
        // get suppliers
        this.getSuppliers();
    },
    methods: {
        // get suppliers
        getSuppliers() {
            axios
                .get(`${ window.location.origin }/user/suppliers`, {
                    params: {
                        is_from: 'vue'
                    }
                })
                .then(res => {
                    this.suppliers = res.data.suppliers;
                });
        },

        // save supplier
        saveSupplier() {
            // data validation
            if (this.name.length > 0) {
                if (this.phone.length > 0) {
                    if (this.company.length > 0) {
                        // send to back-end
                        let formData = new FormData();
                        formData.append('name', this.name);
                        formData.append('phone', this.phone);
                        formData.append('company', this.company);
                        (this.email.length > 0) ? formData.append('email', this.email) : null;
                        (this.address.length > 0) ? formData.append('address', this.address) : null;
                        formData.append('is_from', 'vue');

                        axios
                            .post(`${ window.location.origin }/user/suppliers`, formData)
                            .then(res => {
                                // console.log(res.data);

                                if (res.status == 200) {
                                    // set data's
                                    this.name = '',
                                    this.phone = '',
                                    this.email = ''
                                    this.company = ''
                                    this.address = ''

                                    // check supplier add or not
                                    if (res.data.suppliers.length > this.suppliers.length) {
                                        this.suppliers = res.data.suppliers;
                                        this.error = 'Supplier added sucessfully.';
                                    } else {
                                        this.brand_error = 'Something went wrong.';
                                    }
                                }
                            });
                    } else {
                        this.error = 'Company is empty';
                    }
                } else {
                    this.error = 'Phone is empty';
                }
            } else {
                this.error = 'Name is empty.';
            }
        }
    }
});

app.mount('#app');
