
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

Vue.filter("formatNumber", function(value) {
    return numeral(value).format("0,0");
})

const app = new Vue({
    el: '#app'
});

$('#add-attribute-btn').hide();
$('#product_type').on('change', function() {
    if($(this).val() === 'variable') {
        $('#add-attribute-btn').show();
    }
})

$('#add-attribute-submit').on('click', function() {
    let var_image = $('#var_image');
    let attribute_select = $('#attribute-select');
    console.log(var_image.val())
})
