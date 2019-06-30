<template>
  <div>
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
    </div>
    <div class="white-box">
      <div class="table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th width="10%">S/N</th>
              <th width="15%">Attribute</th>
              <th width="20%">Options</th>
              <th class="text-center">Actions</th>
            </tr>
          </thead>

          <tbody>
            <tr v-for="(attribute, index) in attributes" :key="index">
              <td>{{index + 1 }}</td>
              <td>{{attribute.attribute}}</td>
              <td>
                <span
                  class="badge badge-primary"
                  v-for="(option, idx) in attribute.options"
                  :key="'attribute'+idx"
                >{{option.option}}</span>
              </td>
              <td class="text-center">
                <div class="edit-btn-wrap">
                  <div class="edit-btn">
                    <a
                      title="edit"
                      href="#"
                      data-toggle="modal"
                      data-target="#edit-attribute"
                      @click="editAttribute(index)"
                    >
                      <img src="/admin_assets/images/edit_icon.png">
                    </a>
                  </div>

                  <div class="edit-btn">
                    <a href="#" title="delete" @click="deleteAttribute(index)">
                      <img src="/admin_assets/images/delete_icon.png">
                    </a>
                  </div>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
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
                <button
                  v-if="index === 0"
                  class="btn btn-sm btn-primary"
                  type="button"
                  @click.stop="addRow(false)"
                >+</button>
                <button
                  v-else
                  class="btn btn-sm btn-danger"
                  type="button"
                  @click.stop="remRow(index)"
                >-</button>
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
    <div class="modal fade" id="edit-attribute" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title">Edit Attribute</h4>
          </div>
          <form @submit.prevent="updateAttribute">
            <div class="modal-body">
              <div class="form-group">
                <input
                  type="text"
                  class="form-control"
                  placeholder="Attribute Name"
                  required
                  v-model="edit_attribute.attribute"
                >
              </div>
              <div class="h5">Attribute Options</div>

              <div class="form-group" v-for="(row, index) in rowCountEdit">
                <input
                  type="text"
                  class="form-control with-button"
                  :placeholder="'Option '+(index + 1)"
                  required
                  v-model="edit_attribute.options[index].option"
                >
                <button
                  v-if="index === 0"
                  class="btn btn-sm btn-primary"
                  type="button"
                  @click.stop="addRow(true)"
                >+</button>
                <button
                  v-else
                  class="btn btn-sm btn-danger"
                  type="button"
                  @click.stop="remRow(index, true)"
                >-</button>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">
                <i class="fa fa-spinner fa-spin" v-show="loading"></i> Update
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
  props: ["productAttributes"],
  data: () => ({
    attribute: {
      option: []
    },
    loading: false,
    rowCount: [1],
    rowCountEdit: [],
    attributes: [],
    edit_attribute: {}
  }),
  created() {
    this.attributes = JSON.parse(this.productAttributes);
  },
  methods: {
    addAttribute() {
      this.loading = true;
      axios.post(`/admin/product-attributes`, this.attribute).then(response => {
        this.loading = false;
        this.attribute.option = [];
        this.attribute.name = "";
        this.attributes = response.data;
        $(".close").click();
      });
    },
    addRow(edit = false) {
      if (!edit) {
        this.rowCount.push(1);
        return;
      }
      this.rowCountEdit.push(1);
    },
    remRow(index, edit = false) {
      if (!edit) {
        this.rowCount.splice(index, 1);
        this.attribute.option.splice(index, 1);
        return;
      }
      this.edit_attribute.options.splice(index, 1);
      this.rowCountEdit.splice(index, 1);
    },
    editAttribute(index) {
      this.edit_attribute = this.attributes[index];
      this.edit_attribute.options.forEach(x => {
        this.rowCountEdit.push(1);
      });
    },
    updateAttribute() {
      this.loading = true;
      axios
        .patch(
          `/admin/product-attributes/${this.edit_attribute.id}`,
          this.edit_attribute
        )
        .then(response => {
          this.loading = false;
          console.log(response.data);
          this.edit_attribute = [];
          this.attributes = response.data;
          $('.close').click();
        });
    },
    deleteAttribute(index) {
        if(confirm('Are you sure?')) {
            axios.delete(`/admin/product-attributes/${this.attributes[index].id`).then(response => {
                this.attributes.splice()
            })
        }
    }
  }
};
</script>

<style lang="scss" scoped>
.with-button {
  display: inline-block;
  width: 94%;
}
.badge {
  margin-right: 2px;
}
</style>


