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