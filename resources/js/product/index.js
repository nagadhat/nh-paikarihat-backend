import { createApp } from "vue";
import axios from "axios";

// create app
const app = createApp({
    data() {
        return {
            brands: [],
            brand_logo: '',
            brand_title: '',
            brand_desc: '',
            brand_error: '',
            categories: [],
            category_title: '',
            category_desc: '',
            category_error: ''
        }
    },
    mounted() {
        // get brands
        this.getBrands();

        // get categories
        this.getCategories();
    },
    methods: {
        // get brands
        getBrands() {
            axios
                .get(`${ window.location.origin }/user/brands`, {
                    params: {
                        is_from: 'vue',
                    }
                })
                .then(res => {
                    // console.log(res.data);

                    // set brands
                    this.brands = res.data.brands;
                });

        },

        // upload brand logo
        uploadBrandLogo(event) {
            let file = event.targer.files[0];
            if (file != '') {
                this.brand_logo = file;
            }
        },

        // save brand
        saveBrand() {
            // data validation
            if (this.brand_title.length == 0) {
                this.brand_error = 'Brand title is empty.';
                return false;
            }

            // set error data
            this.brand_error = '';

            // send to back-end
            let formData = new FormData();
            this.brand_logo.length == 0 ? formData.append('logo', this.brand_logo) : null;
            (this.brand_desc.length > 0) ? formData.append('description', this.brand_desc) : null;
            formData.append('title', this.brand_title);
            formData.append('is_from', 'vue');

            axios
                .post(`${ window.location.origin }/user/brands`, formData)
                .then(res => {
                    // console.log(res.data);

                    if (res.status == 200) {
                        // set data's
                        this.brand_logo = '',
                        this.brand_title = '',
                        this.brand_desc = ''

                        // check brand add or not
                        if (res.data.brands.length > this.brands.length) {
                            this.brands = res.data.brands;
                            this.brand_error = 'Brand added sucessfully.';
                        } else {
                            this.brand_error = 'Something went wrong.';
                        }
                    }
                });
        },

        // get categories
        getCategories() {
            axios
                .get(`${ window.location.origin }/user/categories`, {
                    params: {
                        is_from: 'vue'
                    }
                })
                .then(res => {
                    // console.log(res.data);

                    // set categories
                    this.categories = res.data.categories;
                });
        },

        // save category
        saveCategory() {
            // data validation
            if (this.category_title.length == 0) {
                this.category_error = 'Category title is empty.';
                return false;
            }

            // set error data
            this.category_error = '';

            // send to back-end
            let formData = new FormData();
            (this.category_desc.length > 0) ? formData.append('description', this.category_desc) : null;
            formData.append('title', this.category_title);
            formData.append('is_from', 'vue');

            axios
                .post(`${ window.location.origin }/user/categories`, formData)
                .then(res => {
                    // console.log(res.data);

                    if (res.status == 200) {
                        // set data's
                        this.category_logo = '',
                        this.category_title = '',
                        this.category_desc = ''

                        // check brand add or not
                        if (res.data.categories.length > this.categories.length) {
                            this.categories = res.data.categories;
                            this.category_error = 'Category added sucessfully.';
                        } else {
                            this.category_error = 'Something went wrong.';
                        }
                    }
                });
        },
    }
});

// mount app
app.mount('#app');
