v-for="(row, index) in rows" :row-data="row" v-on:delete-row="deleteThisRow(index)
<template>
  <div class="books container">
    <h1 class="title">
     Books
    </h1>
    <div class="row">
      <book-item v-for="(book, index) in mybooks" :key="index" :book="book" />
    </div>
  </div>
</template>

<script>
import axios from "axios";
import BookItem from "./Books/BookItem.vue";

export default {
  components: { BookItem },
  name: "BookList",
  data() {
    return {
      mybooks: []
    };
  },
  async created() {
    const response = await axios.get("/api/books");
    this.mybooks = response.data.data;
  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">
.books {
  .title {
    color: red;
  }
  .message {
    font-size: 2rem;
  }
}
</style>
