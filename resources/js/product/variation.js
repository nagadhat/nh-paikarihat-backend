import { createApp } from "vue";
import axios from "axios";

// create app
const app = createApp({
    data() {
        return {
            loopcounter: 1,
            variations: [],
            variation_price: [],
            variation_quantity: [],
            variation_size: [],
            variation_color: [],
            variation_weight: [],
        }
    },
    mounted() {
        // update variation
        this.totalVariation();

        // get variations
        this.getVariations();
    },
    methods: {
        // function to increase form group
        increaseForm() {
            this.loopcounter++;
        },

        // function to decrease form group
        decreaseForm() {
            this.loopcounter--;
        },

        // function to update variation
        totalVariation() {
            let variation = document.getElementById('total-variation');
            this.loopcounter = parseInt(variation.value);
        },

        // function to get variations
        getVariations() {
            let variation = document.getElementById('variation-id');
            if (this.loopcounter > 0 && variation.value > 0) {
                axios
                    .get(`/user/edit-variation/${variation.value}`, {
                        params: {
                            is_from: 'vue'
                        }
                    })
                    .then(res => {
                        console.log(res.data.variations, 'shihab');
                        this.variations = res.data.variations;
                        this.variation_price = JSON.parse(this.variations.price);
                        this.variation_quantity = JSON.parse(this.variations.quantity);
                        this.variation_size = (this.variations.size != null) ? JSON.parse(this.variations.size) : 0;
                        this.variation_color = (this.variations.color != null) ? JSON.parse(this.variations.color) : 0;
                        this.variation_weight = (this.variations.weight != null) ? JSON.parse(this.variations.weight) : 0;
                    });

                console.log('shihab2');
            }

            // console.log('shihab1');
        }
    }
});

// mount app
app.mount('#app');
