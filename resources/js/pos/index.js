import { createApp } from "vue";
import axios from "axios";
import Swal from 'sweetalert2';

const app = createApp({
    data() {
        return {
            input_customer: '',
            customer_info: [],
            customer_name: 'Walk-in Customer',
            input_product: '',
            products: [],
            cart_items: [],
            item: {
                quantity: 0,
            },
            default_photo: `${window.location.origin}/assets/images/others/error.png`,
            original_total: 0,
            total_amount: 0,
            discount_amount: 0,
            amount_received: 0,
            amount_to_return: 0,
        }
    },
    mounted() {
        // cart items
        // this.cartItems();
    },
    methods: {
        // get customer details
        getCustomer(event) {
            let formData = new FormData();
            formData.append('username', this.input_customer);

            axios
                .post(`${window.location.origin}/user/pos/api/get-customer`, formData)
                .then(res => {
                    // console.log(res.data);

                    if (res.data.customer != null) {
                        // set customer data
                        this.customer_info = res.data.customer;
                        this.customer_name = res.data.customer.name;

                        // reset input customer
                        this.input_customer = '';
                    }
                });
        },

        // get products
        getProducts() {
            let formData = new FormData();
            formData.append('query', this.input_product);

            axios
                .post(`${window.location.origin}/user/pos/api/get-products`, formData)
                .then(res => {
                    // console.log(res.data);

                    if (res.data.products != null) {
                        // set products data
                        this.products = res.data.products;

                        // reset input product
                        this.input_product = '';
                    }
                });
        },

        // add to cart
        addToCart(productId, key) {
            let formData = new FormData();
            formData.append('customer_id', (this.customer_info != 0) ? this.customer_info.id : 0);
            formData.append('product_id', productId);

            let quantity = this.cart_items.length > 0 ? this.cart_items[key].quantity + 1 : 1;
            formData.append('quantity', quantity);

            axios
                .post(`${window.location.origin}/user/pos/api/increase-qty`, formData)
                .then(res => {
                    // console.log(res.data);

                    if (res.data == 1) {
                        // reset products
                        this.products = [];
                    } else {
                        Swal.fire({
                            title: 'Warning!',
                            text: 'Stock is not available',
                            icon: 'warning',
                        });
                    }

                    // load cart items
                    this.cartItems();
                });
        },

        // update to cart
        updateToCart(productId, key) {
            let formData = new FormData();
            formData.append('customer_id', (this.customer_info != 0) ? this.customer_info.id : 0);
            formData.append('product_id', productId);
            formData.append('quantity', this.cart_items[key].quantity);

            axios
                .post(`${window.location.origin}/user/pos/api/increase-qty`, formData)
                .then(res => {
                    // console.log(res.data);

                    if (res.data == true) {
                        // reset products
                        this.products = [];
                    } else {
                        Swal.fire({
                            title: 'Warning!',
                            text: 'Stock is not available',
                            icon: 'warning',
                        });
                    }

                    // load cart items
                    this.cartItems();
                });
        },

        // load cart items
        cartItems() {
            let formData = new FormData();
            formData.append('customer_id', (this.customer_info != 0) ? this.customer_info.id : 0);

            axios
                .post(`${window.location.origin}/user/pos/api/cart-products`, formData)
                .then(res => {
                    // console.log(res.data.cart_items[0].quantity);

                    if (res.data.cart_items != '') {
                        // set data
                        this.cart_items = res.data.cart_items;
                        this.original_total = res.data.total_amount;
                        this.total_amount = res.data.total_amount;
                        this.amount_received = res.data.total_amount;
                    } else {
                        // reset data
                        this.cart_items = [];
                        this.total_amount = 0;
                    }
                });
        },

        // get image url
        getImageUrl(photo) {
            return window.location.origin + '/storage/' + photo;
        },

        // decrease cart
        decreaseCart(productId) {
            let formData = new FormData();
            formData.append('customer_id', (this.customer_info != 0) ? this.customer_info.id : 0);
            formData.append('product_id', productId);

            axios
                .post(`${window.location.origin}/user/pos/api/decrease-qty`, formData)
                .then(res => {
                    // console.log(res.data);

                    // load cart items
                    this.cartItems();
                });
        },

        // remove cart
        removeCart(productId) {
            let formData = new FormData();
            formData.append('customer_id', (this.customer_info != 0) ? this.customer_info.id : 0);
            formData.append('product_id', productId);

            axios
                .post(`${window.location.origin}/user/pos/api/remove-product`, formData)
                .then(res => {
                    // console.log(res.data);

                    // load cart items
                    this.cartItems();
                });
        },

        // calculate total
        calculateTotal() {
            // check total
            if (this.total_amount != 0) {
                // check discount
                if (this.discount_amount <= this.total_amount) {
                    this.total_amount = this.original_total - this.discount_amount;
                    this.amount_received = this.total_amount;
                } else {
                    alert('Discount amount is heigher than total amount.');
                    this.total_amount = this.original_total;
                    this.amount_received = this.total_amount;
                    this.discount_amount = 0;
                }
            }
        },

        // amount to return
        amountToReturn() {
            this.amount_to_return = this.total_amount - this.amount_received;
        }
    }
});

app.mount('#app');
