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
              :id="'selectedZone'+inc"              v-model="markSelectedStates"
              :value="state"
              class="zone-selector-2"
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
        <button id="add-to-zone" class="btn btn-primary add-to-zone">Add to Zone</button>
        <button id="deleteAll" @click="deleteSelected" class="btn btn-primary delete-all">Delete</button>
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
    },

    selectAll() {
      Array.from(document.getElementsByClassName("zone-selector")).forEach(
        x => (x.checked = true)
      );

      this.selectedStates = this.states.map(x => {
          let rObj = {};
          rObj.state_name = x.state_name;
          return rObj;
      })
    },

    deselect() {
        Array.from(document.getElementsByClassName("zone-selector")).forEach(
        x => (x.checked = false)
      );

      this.selectedStates = []
    },

    deleteSelected() {
        console.log(Array.from(document.getElementsByClassName("zone-selector-2")).filter(
        x => x.checked === true
      ))
    }
  }
};
</script>
