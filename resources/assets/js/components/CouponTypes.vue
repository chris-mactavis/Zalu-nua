<template>
  <div class="col-md-12">
    <div class="white-box">
      <div class="row">
        <div class="col-md-9"></div>

        <div class="col-md-3">
          <div class="btn-wrap">
            <div class="top-btn">
              <a
                href="#"
                data-toggle="modal"
                data-target="#add-coupon-type"
                class="btn btn-primary"
              >Add Coupon Type</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="white-box">
      <div class="table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Coupon Type</th>
              <th class="text-right">Actions</th>
            </tr>
          </thead>

          <tbody>
            <tr v-for="(couponType, index) in couponTypes" :key="index">
              <td>{{couponType.type}}</td>
              <td class="text-center">
                <div class="edit-btn-wrap">
                  <a
                    href="#"
                    title="edit"
                    @click="edit(index)"
                    data-toggle="modal"
                    data-target="#edit-coupon-type"
                  >
                    <i class="fa fa-edit"></i> edit
                  </a>
                  <a href="#" title="delete" @click="deleteCouponType(index)">
                    <i class="fa fa-trash"></i> delete
                  </a>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <div class="modal fade" id="add-coupon-type" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title">Add Coupon Type</h4>
          </div>
          <form @submit.prevent="create">
            <div class="modal-body">
              <div class="form-group">
                <input
                  type="text"
                  class="form-control"
                  placeholder="Coupon Type"
                  required
                  v-model="couponType.type"
                >
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

    <div class="modal fade" id="edit-coupon-type" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title">Update Coupon Type</h4>
          </div>
          <form @submit.prevent="update">
            <div class="modal-body">
              <div class="form-group">
                <input
                  type="text"
                  class="form-control"
                  placeholder="Coupon Type"
                  required
                  v-model="editCouponType.type"
                >
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
  props: ["data"],
  data: () => ({
    loading: false,
    couponTypes: [],
    couponType: {},
    editCouponType: {}
  }),
  created() {
    this.couponTypes = JSON.parse(this.data);
  },
  methods: {
    create() {
      this.loading = true;
      axios.post(`/admin/coupon-types`, this.couponType).then(response => {
        this.loading = false;
        this.couponTypes.push(response.data);
        this.couponType = {};
        $(".close").click();
      });
    },
    edit(index) {
      this.editCouponType = this.couponTypes[index];
    },
    update() {
      this.loading = true;
      axios
        .patch(
          `/admin/coupon-types/${this.editCouponType.id}`,
          this.editCouponType
        )
        .then(response => {
          this.loading = false;
          this.editCouponType = {};
          $(".close").click();
        });
    },
    deleteCouponType(index) {
      if (confirm("Delete Coupon Type?")) {
        axios
          .delete(`/admin/coupon-types/${this.couponTypes[index].id}`)
          .then(response => {
            this.couponTypes.splice(index, 1);
          });
      }
    }
  }
};
</script>
