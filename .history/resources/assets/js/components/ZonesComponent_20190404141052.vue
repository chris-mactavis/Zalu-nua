<template>
  <div>
    <div class="row">
      <div class="col-md-12">
        <div class="white-box">
          <div class="row">
            <div class="col-md-10"></div>

            <div class="col-md-2">
              <div class="btn-wrap">
                <div class="top-btn">
                  <button
                    data-target="#add-zone"
                    data-toggle="modal"
                    class="btn btn-primary"
                  >Add Zone</button>
                </div>
              </div>
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
              <th width="10%">S/N</th>
              <th width="15%">Zone</th>
              <th width="20%">Rate(Naira)</th>
              <th width="40%">Cities/Countries</th>
              <th class="text-center">Actions</th>
            </tr>
          </thead>

          <tbody>
            <tr v-for="(zone, index) in zones" :key="index">
              <td>{{index+1}}</td>
              <td>{{zone}}</td>
              <td>{{zone.rate}}</td>
              <td class="well">Ogun, Osun, Lagos, Anambra</td>
              <td class="text-center">
                <div class="edit-btn-wrap">
                  <div class="edit-btn">
                    <a
                      title="edit"
                      href="#"
                      data-toggle="modal"
                      data-target="#edit-zone"
                      @click="editZone(index)"
                    >
                      <img src="/admin_assets/images/edit_icon.png">
                    </a>
                  </div>

                  <div class="edit-btn">
                    <a href="#" title="delete" @click="deleteZone(index)">
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
                <input
                  type="text"
                  class="form-control"
                  placeholder="Zone Name"
                  required
                  v-model="zone.zone"
                >
              </div>
              <div class="form-group">
                <input
                  type="number"
                  class="form-control"
                  placeholder="Rate(Naira)"
                  required
                  v-model="zone.rate"
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

    <div class="modal fade" id="edit-zone" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title">Edit Shipping Zone</h4>
          </div>
          <form @submit.prevent="updateZone">
            <div class="modal-body">
              <div class="form-group">
                <input
                  type="text"
                  class="form-control"
                  placeholder="Zone Name"
                  required
                  v-model="edit_zone.zone"
                >
              </div>
              <div class="form-group">
                <input
                  type="number"
                  class="form-control"
                  placeholder="Rate(Naira)"
                  required
                  v-model="edit_zone.rate"
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
  props: ["allZones"],
  data: () => ({
    loading: false,
    zone: {},
    zones: [],
    edit_zone: {}
  }),
  created() {
    this.zones = JSON.parse(this.allZones);
  },
  methods: {
    addZone() {
      this.loading = true;
      axios.post(`/admin/shipping-zones`, this.zone).then(response => {
        this.loading = false;
        this.zones.unshift(response.data);
        this.zone = {};
        $(".close").click();
      });
    },

    editZone(index) {
        this.edit_zone = this.zones[index];
    },

    updateZone() {
        this.loading = true;
        axios.patch(`/admin/shipping-zones/${this.edit_zone.id}`, this.edit_zone).then(response => {
            this.loading = false;
            this.edit_zone = {};
            $('.close').click();
        })
    },

    deleteZone(index) {
      if (confirm("Are you sure you want to delete this zone?")) {
        axios
          .delete(`/admin/shipping-zones/${this.zones[index].id}`)
          .then(response => {
            this.zones.splice(index, 1);
          });
      }
    }
  }
};
</script>
