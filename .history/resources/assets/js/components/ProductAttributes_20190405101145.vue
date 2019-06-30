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
    attributes: [],
    editAttribute: {}
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
    addRow() {
      this.rowCount.push(1);
    },
    remRow(index) {
      this.rowCount.splice(index, 1);
      this.attribute.option.splice(index, 1);
    },
    editAttribute(index) {
        this.edit_attribute = this.attributes[index];
    },
    updateAttribute() {

    },
    deleteAttribute(index) {}
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


