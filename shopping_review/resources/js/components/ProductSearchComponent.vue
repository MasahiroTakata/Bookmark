<template>
  <div>
    <input type="text" v-model="keyword">
    テストです
    <div class="result-view">
      <ul>
        <li v-for = "product in products" :key="product.name">
          {{ product.name }}
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
  export default {
    data() {
        return {
            keyword: "",
            products: {}
        }
    },
    methods: {
        search() {
            axios.get('/search?keyword=' + this.keyword)
                .then(res => {
                    this.products = res.data;
                })
                .catch(error => {
                    console.log('データの取得に失敗しました。');
                });
        }
    },
    watch: {
        keyword() {
            this.search();
        }
    }
  }
</script>