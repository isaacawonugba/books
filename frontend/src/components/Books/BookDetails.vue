<template>
  <div class="row pt-4">
    <div class="col-4">
      <img
        v-bind:src="'http://localhost:8088/' + book.book_cover"
        class="img-fluid"
        :alt="book.book_title"
      />
    </div>
    <div class="col-8 pl-4">
      <h3 class="text-primary">
        {{ book.book_title }}
        <span class="badge badge-danger" v-if="!book.book_status">{{
          status
        }}</span>
      </h3>
      <p>
        By: <i>{{ book.book_author }}</i>
      </p>
      <p class="money pt-4 pb-4 text-primary">&#163;{{ book.book_price }}</p>
      <p class="text-justify pt-4 pl-4">{{ book.book_description }}</p>
    </div>
  </div>
</template>
<script>
//import axios from "axios";
export default {
  name: "BookDetails",
  props: ["book"],
  data() {
    return {
      status: "Sold"
    };
  }
};
</script>
<style lang="scss">
.row {
  .col-8 {
    .money {
      font-size: 2rem;
      line-height: 2rem;
      font-weight: bold;
    }
  }
}
</style>
