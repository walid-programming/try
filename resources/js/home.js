console.log('test');
const app = Vue.createApp({
  data() {
    return {
      categories: [
        {id: 1,title: 'cat1'},
        {id: 2,title: 'cat2'},
        {id: 3,title: 'cat3'}
      ],
      products: [
        {id: 1, name: 'product1', description: 'sisinfisin',price: 11,image:'/storage/products/utjqBnMawb7uIh2NlxAnlBCS6qRncafx5S07p9Tf.jpg'},
        {id: 2, name: 'product2', description: 'sisinfisin',price: 221,image:'/storage/products/utjqBnMawb7uIh2NlxAnlBCS6qRncafx5S07p9Tf.jpg'},
        {id: 3, name: 'product3', description: 'sisinfisin',price: 22,image:'/storage/products/utjqBnMawb7uIh2NlxAnlBCS6qRncafx5S07p9Tf.jpg'}
      ]
    }
  },
  mounted() {
    fetch('http://127.0.0.1:8000/api/products')
    .then(res => res.json())
    .then(data => this.products = data)
    .catch(err => console.log(err.message))
  },
  methods: {
    filterByCategory() {
      console.log("filter category");
    },
    filterByPrice() {
      console.log("filter price");
    }
  }
})
app.mount("#app")