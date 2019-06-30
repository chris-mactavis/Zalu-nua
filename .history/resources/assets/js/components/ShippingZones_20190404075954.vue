<template>
  <div class="white-box">
    <div class="row">
      <div class="col-md-12">
        <h4>Nigeria</h4>
        <h5>States</h5>
        <div class="col-md-3 zone-box">
          <div class="zone" v-for="(state, inc) in states">
            <input
              type="checkbox"
              :name="'zone'+inc"
              v-model="selectedStates"
              :id="'zone'+inc"
              :value="state"
              class="zone-selector"
            >
            <label :for="'zone'+inc">{{ state.state_name }}</label>
          </div>
        </div>

        <div class="col-md-3 ship-to">
          <span>Please select states to ship to ship to</span>
          <br>
          <button class="btn btn-sm btn-primary" @click="moveToChosen">&rarr;</button>
        </div>

        <div class="col-md-3 zone-box">
          <div class="zone" v-for="(state, inc) in markAsSelected">
            <input
              type="checkbox"
              :name="'selectedZone'+inc"
              :id="'selectedZone'+inc"
              v-model="markSelectedStates"
              :value="state.state_name"
              class="zone-selector-2"
              :state="state.state_name"
            >
            <label :for="'selectedZone'+inc">{{ state.state_name }}</label>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-3 select-all">
        <button id="selectAll" class="btn btn-primary select-all" @click="selectAll">Select All</button>
        <button id="selectAll" class="btn btn-primary deselect-all" @click="deselect">Deselect All</button>
      </div>
      <div class="col-3 other-buttons">
        <button
          id="add-to-zone"
          class="btn btn-primary add-to-zone"
          data-toggle="modal"
          data-target="#add-to-zone"
        >Add to Zone</button>
        <button id="select-all" class="btn btn-primary sel-all" @click="selectAllItems">Select All</button>
        <button id="deleteAll" @click="deleteSelected" class="btn btn-primary delete-all">Delete</button>
      </div>
    </div>

    <div class="modal fade" id="add-to-zone" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title">Add States to Zone</h4>
          </div>
          <form @submit.prevent="addZone">
            <div class="modal-body">
              
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
  </div>
</template>

<script>
export default {
  props: ["states"],
  data: () => ({
    selectedStates: [],
    markSelectedStates: [],
    markAsSelected: [],
    markSelected: []
  }),
  created() {},
  methods: {
    moveToChosen() {
      this.markAsSelected = this.selectedStates;
      Array.from(document.getElementsByClassName("zone-selector")).forEach(
        x => (x.checked = false)
      );
      //   this.markAsSelected = []
    },

    selectAll() {
      Array.from(document.getElementsByClassName("zone-selector")).forEach(
        x => (x.checked = true)
      );

      this.selectedStates = this.states.map(x => {
        let rObj = {};
        rObj.state_name = x.state_name;
        return rObj;
      });
    },

    selectAllItems() {
      Array.from(document.getElementsByClassName("zone-selector-2")).forEach(
        x => (x.checked = true)
      );

      this.markSelectedStates = this.states.map(x => {
        let rObj = {};
        rObj = x.state_name;
        return rObj;
      });
    },

    deselect() {
      Array.from(document.getElementsByClassName("zone-selector")).forEach(
        x => (x.checked = false)
      );

      this.selectedStates = [];
    },

    deleteSelected() {
      Array.from(document.getElementsByClassName("zone-selector-2")).forEach(
        x => {
          if (x.checked) {
            let state = x.getAttribute("state");
            this.markSelectedStates = this.markSelectedStates.filter(
              x => x != state
            );
            x.parentElement.remove();
          }
        }
      );
    }
  }
};
</script>
