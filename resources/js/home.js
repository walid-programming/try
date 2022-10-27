console.log('test');
const app = Vue.createApp({
    data() {
        return {
            categories: [],
            products: [],
            minPrice: 0,
            maxPrice: 0
        }
    },
    mounted() {
        fetch('http://127.0.0.1:8000/api/products')
            .then(res => res.json())
            .then(data => this.products = data.products)
            .catch(err => console.log(err.message))
        fetch('http://127.0.0.1:8000/api/categories')
            .then(res => res.json())
            .then(data => this.categories = data.categories)
            .catch(err => console.log(err.message))
    },
    methods: {
        filterByCategory(catId) {
            fetch('http://127.0.0.1:8000/api/products/filter?catId=' + catId)
            .then(res => res.json())
            .then(data => this.products = data.products)
            .catch(err => console.log(err.message))
        },
        filterByPrice() {
            fetch(`http://127.0.0.1:8000/api/products/filterByPrice?min=${this.minPrice}&max=${this.maxPrice}`)
            .then(res => res.json())
            .then(data => this.products = data.products)
            .catch(err => console.log(err.message))
        }
    }
})
app.mount("#app")
