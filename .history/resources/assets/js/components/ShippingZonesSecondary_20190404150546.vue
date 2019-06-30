<template>
  <div class="white-box">
    <div class="row">
      <div class="col-md-12">
        <h4>Other Countries</h4>
        <h5>Contries</h5>
        <div class="col-sm-4">
          <div class="zone-box">
            <div class="zone" v-for="(country, inc) in allCountries">
              <input
                type="checkbox"
                :name="'zone'+inc"
                v-model="selectedCountries"
                :id="'zoneCountry'+inc"
                :value="country.country_name"
                class="zone-selector-country"
              >
              <label :for="'zone'+inc">
                {{ country.country_name }}
                <!-- <span
                  class="badge badge-success"
                  v-if="state.zone"
                >{{state.zone.zone.zone}}</span>-->
              </label>
            </div>
          </div>
          <button
            id="selectAll"
            class="btn btn-sm btn-primary select-all"
            @click="selectAll"
          >Select All</button>
          <button
            id="selectAll"
            class="btn btn-sm btn-primary deselect-all"
            @click="deselect"
          >Deselect All</button>
        </div>

        <div class="col-sm-2 ship-to">
          <span>Please select countries to ship to</span>
          <br>
          <button class="btn btn-sm btn-primary" @click="moveToChosen">&rarr;</button>
        </div>

        <div class="col-sm-4">
          <div class="zone-box">
            <div class="zone" v-for="(country, inc) in markAsSelected">
              <input
                type="checkbox"
                :name="'selectedZoneCountry'+inc"
                :id="'selectedZoneCountry'+inc"
                v-model="markSelectedCountries"
                :value="country.country_name"
                class="zone-selector-country-2"
                :country="country.country_name"
              >
              <label :for="'selectedZoneCountry'+inc">{{ country.country_name }}</label>
            </div>
          </div>
          <button
            id="add-to-zone"
            class="btn btn-sm btn-primary add-to-zone"
            data-toggle="modal"
            data-target="#add-state-to-zone"
            :disabled="markSelectedStates.length < 1"
          >Add to Zone</button>
          <button
            id="select-all"
            class="btn btn-sm btn-primary sel-all"
            @click="selectAllItems"
          >Select All</button>
          <button
            id="deleteAll"
            @click="deleteSelected"
            class="btn btn-sm btn-primary delete-all"
          >Delete</button>
        </div>
      </div>
    </div>

    <!-- <div class="modal fade" id="add-state-to-zone" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title">Add States to Zone</h4>
          </div>
          <form @submit.prevent="addToZone">
            <div class="modal-body">
              <div class="form-group">
                <select v-model="selected_zone.zone" id class="form-control">
                  <option value>Select Zone</option>
                  <option :value="zone.id" v-for="(zone, index) in zones" :key="index">{{zone.zone}}</option>
                </select>
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
    </div>-->
  </div>
</template>

<script>
export default {
  props: ["countries"],
  data: () => ({
    allCountries: [],
    loading: false,
    selectedCountries: [],
    markAsSelected: []
  }),
  created() {
    this.allCountries = this.countries;
  },
  methods: {
    selectAll() {
      Array.from(
        document.getElementsByClassName("zone-selector-country")
      ).forEach(x => (x.checked = true));

      this.selectedCountries = this.allCountries.map(x => {
        let rObj = {};
        rObj.country_name = x.country_name;
        rObj.country_id = x.id;
        return rObj;
      });
    },
    deselect() {
      Array.from(
        document.getElementsByClassName("zone-selector-country")
      ).forEach(x => (x.checked = false));

      this.selectedCountries = [];
    },
    moveToChosen() {}
  }
};
</script>
