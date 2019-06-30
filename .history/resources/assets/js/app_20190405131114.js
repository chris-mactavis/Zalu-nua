/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

var numeral = require("numeral");

window.Vue = require('vue');

Vue.component('shipping-zones', require('./components/ShippingZones.vue'));
Vue.component('shipping-zones-secondary', require('./components/ShippingZonesSecondary.vue'));
Vue.component('zones-component', require('./components/ZonesComponent.vue'));
Vue.component('product-attributes', require('./components/ProductAttributes.vue'));

Vue.filter("formatNumber", function (value) {
    return numeral(value).format("0,0");
})

const app = new Vue({
    el: '#app'
});

$('#add-attribute-btn').hide();
$('#product_type').on('change', function () {
    if ($(this).val() === 'variable') {
        $('#add-attribute-btn').show();
    }
})

$single_attribute = `<div id="single-attribute">
              <div id="product-attribute-count">1.</div>
              <hr>
              <div class="form-group">
                <label for="product_attributes">Product Attributes</label>
                
                <select name="product_attributes" multiple required class="form-control input-lg" id="attribute-select">
                  @foreach ($product_options as $option)
                  <option value="{{$option->id}}">{{$option->option}}</option>
                  @endforeach
                </select>
              </div>
  
              <div class="form-group">
                <label for="var_image">Image</label>
                <input type="file" name="var_image" class="form-control input-lg" required />
              </div>
            </div>`

$('#add-attribute-btn').on('click', function(evt) {
    evt.preventDefault();
    $('#insert0')
})