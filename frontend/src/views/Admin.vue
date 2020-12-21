<template>
  <div class="listBooks container pt-4">
    <table class="table table-md table-bordered">
      <thead class="thead-light">
        <tr>
          <th class="text-center">Title</th>
          <th class="text-center">Author</th>
          <th class="text-center">Price</th>
          <th class="text-center">Status</th>
          <th class="text-center" colspan="2">Action</th>
        </tr>
      </thead>
      <list-books
        v-for="(book, index) in mybooks"
        :key="index"
        :book="book"
        v-on:delete-item="deleteThisItem(index)"
        v-on:mark-item="markStatus(index)"
      />
    </table>
  </div>
</template>

<script>
import axios from "axios";
import ListBooks from "@/components/Books/ListBooks.vue";

export default {
  components: { ListBooks },
  name: "admin",
  data() {
    return {
      mybooks: [],
      counter: 0
    };
  },
  async created() {
    // Retrieve all books using axios get method
    const response = await axios.get("/api/books");
    this.mybooks = response.data.data;
  },
  methods: {
    deleteThisItem: async function(index) {
      //call axios delete to remove the record from database
      const response = await axios.delete(
        "/api/books/" + this.mybooks[index].id
      );
      //remove the deleted item from the list of books.
      if (response.statusText.trim() === "OK") {
        this.mybooks.splice(index, 1);
      }
    },
    markStatus: async function(index) {
      const response = await axios.put("/api/books/" + this.mybooks[index].id, {
        book_status: !this.mybooks[index].book_status
      });
      this.mybooks[index].book_status = response.data.book_status;
    }
  }
};
</script>
