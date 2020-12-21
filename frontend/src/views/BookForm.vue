<template>
  <div class="container pt-4">
    <div class="row">
      <div class="col-6">
        <form id="frmbook" class="frmbook">
          <p class="response">{{ responseText }}</p>
          <p class="responseHtml" v-html="theresponse"></p>
          <div class="form-group">
            <label for="book_title">Title</label>
            <input
              type="text"
              class="form-control"
              id="book_title"
              v-model="book_title"
            />
          </div>

          <div class="form-group">
            <label for="book_author">Author</label>
            <input
              type="text"
              class="form-control"
              id="book_author"
              v-model="book_author"
            />
          </div>

          <div class="form-group">
            <label for="book_price">Price</label>
            <input
              type="text"
              class="form-control"
              id="book_price"
              v-model="book_price"
            />
          </div>

          <div class="form-group">
            <label for="book_status">Book's Status</label>
            <select
              class="form-control"
              id="book_status"
              v-model="book_status"
              placeholder="Book's Status"
            >
              <option value="0">Sold</option>
              <option value="1">In Stock</option>
            </select>
          </div>

          <div class="form-group">
            <label for="book_cover">Book's Cover</label>
            <input
              type="file"
              class="form-control border-0"
              id="book_cover"
              placeholder="Book's cover"
              accept="image/*"
              @change="onFileUpload"
            />
          </div>

          <div class="form-group">
            <label for="book_description">Book's Description</label>
            <textarea
              class="form-control description"
              id="book_description"
              v-model="book_description"
            ></textarea>
          </div>
          <button class="btn btn-primary" @click.prevent="submitted">
            Save Book
          </button>
        </form>
      </div>
    </div>
  </div>
</template>
<script>
import axios from "axios";
export default {
  name: "bookform",
  data() {
    return {
      book_title: "",
      book_author: "",
      book_price: "",
      book_status: "",
      book_cover: "",
      book_description: "",
      responseText: "",
      theresponse: "",
      error: []
    };
  },
  methods: {
    onFileUpload(event) {
      this.book_cover = event.target.files[0];
    },
    validateForm() {
      if (!this.book_title) {
        this.error.push("Book Title is required");
      }
      if (!this.book_author) {
        this.error.push("Book Author is required");
      }
      if (!this.book_price) {
        this.error.push("Book Price is required");
      }
      if (!this.book_status) {
        this.error.push("Book Status is required");
      }
      if (!this.book_cover) {
        this.error.push("Book Cover image is required");
      }
      if (!this.book_description) {
        this.error.push("Book Description is required");
      }
      if (this.error.length == 0) {
        return true;
      }
      return false;
    },
    async submitted() {
      if (this.validateForm()) {
        const formData = new FormData();
        formData.append("book_title", this.book_title);
        formData.append("book_author", this.book_author);
        formData.append("book_price", this.book_price);
        formData.append("book_status", this.book_status);
        formData.append("book_cover", this.book_cover);
        formData.append("book_description", this.book_description);

        const res = await axios.post("/api/books", formData, {
          headers: {
            "Content-Type": "multipart/form-data"
          }
        });
        if (res.status == 201) {
          this.responseText = "Record successfully saved";
        } else {
          this.responseText =
            "Could not saved record, make sure there is no empty field";
        }
      } else {
        this.theresponse = this.error.join("<br/> ");
      }
    }
  }
};
</script>
<style lang="scss">
.container {
  .row {
    .col-6 {
      .frmbook {
        .response {
          font-size: 11px;
          color: #f20;
        }
        .responseHtml {
          font-size: 11px;
          color: #f20;
          text-align: left;
        }
        .form-group {
          label {
            width: 100%;
            text-align: left !important;
            font-size: 12px;
          }
          .form-control {
            font-size: 11px;
            padding: 15px 15px;
            height: 45px;
          }
          .description {
            height: 200px;
          }
        }
      }
    }
  }
}
</style>
