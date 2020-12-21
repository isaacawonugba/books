<template>
  <tr>
    <td>{{ book.book_title }}</td>
    <td>{{ book.book_author }}</td>
    <td>{{ book.book_price }}</td>
    <td>{{ book.book_status ? "In Stock" : "Sold" }}</td>
    <td>
      <button
        class="btn btn-small btn-outline-primary"
        @click="$emit('delete-item')"
      >
        Delete
      </button>
    </td>
    <td>
      <button
        class="btn btn-small btn-outline-primary"
        @click="$emit('mark-item')"
      >
        Mark Status
      </button>
    </td>
  </tr>
</template>
<script>
export default {
  name: "ListBooks",
  props: ["book"]
};
</script>
<style lang="scss">
tr {
  padding: 1px;

  td {
    padding: 0px;
    font-size: 0.6rem;
    text-align: left;

    .btn {
      padding: 4px 8px;
      font-size: 0.6rem;
    }
  }
}
</style>
