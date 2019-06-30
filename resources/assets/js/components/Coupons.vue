<template>
  <div class="col-md-12">
    <div class="row">
      <div class="col-md-12">
        <div class="white-box">
          <div class="row">
            <div class="col-md-10"></div>

            <div class="col-md-2">
              <div class="btn-wrap">
                <div class="top-btn">
                  <a
                    href="#"
                    data-toggle="modal"
                    data-target="#add-coupon"
                    class="btn btn-primary"
                  >Add Coupon</a>
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
                  <th>Coupon Code</th>
                  <th>Type</th>
                  <th>Discount</th>
                  <th>Min. Order Amount</th>
                  <th>Start Date</th>
                  <th>Expiry Date</th>
                  <th class="text-right">Actions</th>
                </tr>
              </thead>

              <tbody>
                <tr v-for="(coupon, index) in coupons" :key="`coupons.${index}`">
                  <td>{{coupon.code}}</td>
                  <td>{{coupon.type.type}}</td>
                  <td v-if="coupon.coupon_type_id == 1">Free Shipping</td>
                  <td v-else-if="coupon.coupon_type_id == 2">{{coupon.percent_discount}}%</td>
                  <td v-else>₦{{coupon.amount_discount}}</td>
                  <td>₦{{coupon.min_amount}}</td>
                  <td>{{coupon.start_date}}</td>
                  <td>{{coupon.end_date}}</td>

                  <td class="text-center">
                    <div class="edit-btn-wrap">
                      <a
                        href="#"
                        data-toggle="modal"
                        data-target="#edit-coupon"
                        title="edit"
                        @click="edit(index)"
                      >
                        <i class="fa fa-edit"></i> edit
                      </a>
                      |
                      <a
                        href="#"
                        title="delete"
                        @click="deleteCoupon(index)"
                      >
                        <i class="fa fa-trash"></i> delete
                      </a>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="add-coupon" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title">Add Coupon</h4>
          </div>
          <form @submit.prevent="create">
            <div class="modal-body">
              <div class="form-group">
                <label for>Coupon Code</label>
                <input
                  type="text"
                  class="form-control"
                  placeholder="Coupon Code"
                  required
                  v-model="coupon.code"
                >
              </div>
              <div class="form-group">
                <label for>Coupon Type</label>
                <select v-model="coupon.coupon_type_id" required class="form-control">
                  <option value>Select a coupon type</option>
                  <option
                    v-for="(couponType, index) in couponTypes"
                    :key="index"
                    :value="couponType.id"
                  >{{couponType.type}}</option>
                </select>
              </div>
              <div class="form-group" v-if="coupon.coupon_type_id == 2">
                <label for>Percent Discount</label>
                <input
                  type="number"
                  class="form-control"
                  placeholder="Percentage Discount"
                  required
                  v-model="coupon.percent_discount"
                >
              </div>
              <div class="form-group" v-if="coupon.coupon_type_id == 3">
                <label for>Amount Discount</label>
                <input
                  type="number"
                  class="form-control"
                  placeholder="Amount Discount"
                  required
                  v-model="coupon.amount_discount"
                >
              </div>
              <div class="form-group">
                <label for>Start Date</label>
                <input
                  type="date"
                  class="form-control"
                  placeholder="Start Date"
                  required
                  v-model="coupon.start_date"
                >
              </div>
              <div class="form-group">
                <label for>End Date</label>
                <input
                  type="date"
                  class="form-control"
                  placeholder="End Date"
                  required
                  v-model="coupon.end_date"
                >
              </div>
              <div class="form-group">
                <label for>Minimum Order Amount</label>
                <input
                  type="number"
                  class="form-control"
                  placeholder="Minimum Order Amount"
                  required
                  v-model="coupon.min_amount"
                >
              </div>
              <div class="alert alert-danger" v-if="error">{{error}}</div>
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

    <div class="modal fade" id="edit-coupon" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title">Edit Coupon</h4>
          </div>
          <form @submit.prevent="update">
            <div class="modal-body">
              <div class="form-group">
                <label for>Coupon Code</label>
                <input
                  type="text"
                  class="form-control"
                  placeholder="Coupon Code"
                  required
                  v-model="editCoupon.code"
                >
              </div>
              <div class="form-group">
                <label for>Coupon Type</label>
                <select v-model="editCoupon.coupon_type_id" required class="form-control">
                  <option value>Select a coupon type</option>
                  <option
                    v-for="(couponType, index) in couponTypes"
                    :key="index"
                    :value="couponType.id"
                  >{{couponType.type}}</option>
                </select>
              </div>
              <div class="form-group" v-if="editCoupon.coupon_type_id == 2">
                <label for>Percent Discount</label>
                <input
                  type="number"
                  class="form-control"
                  placeholder="Percentage Discount"
                  required
                  v-model="editCoupon.percent_discount"
                >
              </div>
              <div class="form-group" v-if="editCoupon.coupon_type_id == 3">
                <label for>Amount Discount</label>
                <input
                  type="number"
                  class="form-control"
                  placeholder="Amount Discount"
                  required
                  v-model="editCoupon.amount_discount"
                >
              </div>
              <div class="form-group">
                <label for>Start Date</label>
                <input
                  type="date"
                  class="form-control"
                  placeholder="Start Date"
                  required
                  v-model="editCoupon.start_date"
                >
              </div>
              <div class="form-group">
                <label for>End Date</label>
                <input
                  type="date"
                  class="form-control"
                  placeholder="End Date"
                  required
                  v-model="editCoupon.end_date"
                >
              </div>
              <div class="form-group">
                <label for>Minimum Order Amount</label>
                <input
                  type="number"
                  class="form-control"
                  placeholder="Minimum Order Amount"
                  required
                  v-model="editCoupon.min_amount"
                >
              </div>
              <div class="alert alert-danger" v-if="error">{{error}}</div>
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
  props: ["data", "dataCouponTypes"],
  data: () => ({
    loading: false,
    coupons: [],
    coupon: {
      coupon_type_id: "",
      min_amount: 0
    },
    editCoupon: {},
    couponTypes: [],
    error: ""
  }),
  created() {
    this.coupons = JSON.parse(this.data);
    this.couponTypes = JSON.parse(this.dataCouponTypes);
  },
  methods: {
    create() {
      this.loading = true;
      this.error = "";
      axios
        .post(`/admin/coupons`, this.coupon)
        .then(response => {
          this.loading = false;
          console.log(response.data);
          this.coupons.unshift(response.data);
          this.coupon = {}
          this.coupon.coupon_type_id = "";
          this.coupon.min_amount = 0;
          $(".close").click();
        })
        .catch(error => {
          this.loading = false;
          this.error = error.response.data;
        });
    },
    edit(index) {
      this.editCoupon = this.coupons[index];
    },
    update() {
      this.loading = true;
      axios
        .post(`/admin/coupons/update/${this.editCoupon.id}`, this.editCoupon)
        .then(response => {
          this.loading = false;
          console.log(response.data);
          let index = this.coupons.findIndex(x => this.editCoupon.id === x.id);
          this.coupons[index] = response.data;
          this.coupon.editCoupon = {};
          $(".close").click();
        });
    },
    deleteCoupon(index) {
      if (confirm("Delete Coupon?")) {
        axios
          .delete(`/admin/coupons/${this.coupons[index].id}`)
          .then(response => {
            this.coupons.splice(index, 1);
          });
      }
    }
  }
};
</script>

