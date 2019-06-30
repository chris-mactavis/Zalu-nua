<template>
  <div>
    <div class="row">
      <div class="col-md-12">
        <div class="white-box">
          <div class="row">
            <div class="col-md-6"></div>

            <div class="col-md-6">
              <div class="btn-wrap">
                <div class="top-btn">
                  <button
                    data-target="#add-zone"
                    data-toggle="modal"
                    class="btn btn-primary"
                  >Add Zone</button>
                  <a href="/admin/shipping-zones/manage" class="btn btn-primary">Manage Zones</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="add-zone" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title">Add Shipping Zone</h4>
          </div>
          <form @submit.prevent="addZone">
            <div class="modal-body">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Zone Name" required v-model="zone.zone">
              </div>
              <div class="form-group">
                <input type="number" class="form-control" placeholder="Rate(Naira)" required v-model="zone.rate">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">
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
        loading: false,
        zone: {}
    }),
    methods: {
        addZone() {
            axios.post(`/admin/shipping-zones`, this.)
        }
    }
}
</script>
