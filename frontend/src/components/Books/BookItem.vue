<template>
  <div class="col-12 col-sm-6 col-md-4">
    <div class="card mt-2 mb-2">
      <div class="row no-gutters">
        <div class="col-5">
          <img
            v-bind:src="'http://localhost:8088/' + book.book_cover"
            class="card-img"
            alt="book cover"
          />
        </div>
        <div class="col-7 no-gutters pl-0 pr-0 pt-0 pb-0">
          <span class="badge badge-danger pull-right" v-if="!book.book_status">
            {{ status }}
          </span>
          <div class="card-body">
            <h5 class="card-title text-primary">{{ book.book_title }}</h5>
            <p class="card-text">{{ book.book_author }}</p>
            <p class="card-text money text-primary">
              &#163;{{ book.book_price }}
            </p>
            <button class="btn btn-outline-primary" @click="shareData(book.id)">
              View Details
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: "BookItem",
  props: ["book"],
  data() {
    return {
      status: "Sold"
    };
  },
  methods: {
    shareData(id) {
      this.$router.push({
        path: "/single",
        name: "single",
        params: { id: id }
      });
    }
  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">
.row {
  .col-12 {
    .card {
      overflow: hidden;

      .row {
        .col-5 {
          .card-img {
            height: 200px;
          }
        }
        .col-7 {
          .card-body {
            .card-title {
              font-size: 0.5rem;
              font-weight: bold;
              line-height: 0.9rem;
            }
            .card-text {
              font-size: 0.6rem;
              font-weight: 400;
              line-height: 0.6rem;
            }
            .money {
              font-size: 0.6rem;
              font-weight: bold;
              line-height: 0.7rem;
            }
            .btn {
              font-size: 0.6rem;
            }
          }
        }
      }
    }
  }
}
</style>
