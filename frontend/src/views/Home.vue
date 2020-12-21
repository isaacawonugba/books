<template>
  <div class="booklist container">
    <book-list />
    <div class="message mt-4">
      <p class="pt-4">
        I can refactor the codes such that all .scss files are in separete files
        and only associated with each components. I wanted to work on pagination 
        also in case the list grows
      </p>
      <p>
        I have only sent this so I don't continue to delay.
      </p>
    </div>
  </div>
</template>

<script>
import BookList from "@/components/BookList.vue";

export default {
  name: "books",
  components: {
    BookList
  }
};
</script>
