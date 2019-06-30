<template>
  <div class="white-box">
    <div class="row">
      <div class="col-md-12">
        <button
          data-toggle="modal"
          data-target="#add-attribute"
          class="btn btn-primary btn-sm"
        >Add Product Attribute</button>
      </div>
    </div>

    <div class="modal fade" id="add-attribute" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title">Add Attribute</h4>
          </div>
          <form @submit.prevent="addAttribute">
            <div class="modal-body">
              <div class="form-group">
                <input
                  type="text"
                  class="form-control"
                  placeholder="Attribute Name"
                  required
                  v-model="attribute.name"
                >
              </div>
              <div class="h5">Attribute Options</div>

              <div class="form-group" v-for="(row, index) in rowCount">
                <input
                  type="text"
                  class="form-control with-button"
                  :placeholder="'Option '+(index + 1)"
                  required
                  v-model="attribute.option[index]"
                >
                <button v-if="index === 0" class="btn btn-sm btn-primary" type="button" @click.stop="addRow">+</button>
                <button v-else class="btn btn-sm btn-danger" type="button" @click.stop="remRow(index)">-</button>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">
                <i class="fa fa-spinner fa-spin" v-show="loading"></i> Submit
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data: () => ({
    attribute: {
        option: []
    },
    loading: false,
    rowCount: [1]
  }),
  methods: {
    addAttribute() {
        this.loading = true;
        axios.post(`/admin/product-attributes`, this.attribute).then(response => {
            this.loading = false;
            this.attribute.option = [];
            this.attribute
        });
    },
    addRow() {
      this.rowCount.push(1);
    },
    remRow(index) {
        this.rowCount.splice(index, 1);
        this.attribute.option.splice(index, 1);
    }
  }
};
</script>

<style lang="scss" scoped>
.with-button {
    display: inline-block;
    width: 94%;
}
</style>


