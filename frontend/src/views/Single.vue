<template>
  <div class="booklist container">
    <book-details :book="book" />
  </div>
</template>

<script>
import axios from "axios";
import BookDetails from "@/components/Books/BookDetails.vue";

export default {
  name: "single",
  components: {
    BookDetails
  },
  data() {
    return {
      book: [],
      id: 0
    };
  },
  async created() {
    this.id = this.$route.params.id;
    const response = await axios.get(`/api/books/${this.id}`);
    this.book = response.data;
  }
};
</script>
