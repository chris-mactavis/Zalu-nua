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

var numeral = require('numeral');

$(document).ready(function () {
    $('.select2').select2();
})

// $('#prod-attributes').hide();
// $('#product_type').on('change', function () {
//     if ($(this).val() === 'variable') {
//         $('#prod-attributes').show();
//     }
// })


$('#gal1 .gal img').on('click', function () {
    let variants = $(this).data('variants');
    $('#attributes .badge').text(variants);
    console.log($(this).data('variant_id'))
    $('#product_variant').val($(this).data('variant_id'))
})

$('#state-group').hide();
$('#lga-group').hide();
$('#country-group select').on('change', function () {
    let country_id = $(this).val();
    if (country_id === '161') {
        $('#state-group').show();
        $('#shipping-fee span').text(0);
        $('#total-fee span').text(numeral(total).format('0,0.00'));
        $('#ttalfee').val(total)
        $('#tshipfee').val('')
    } else {
        $('#state-group').hide();
        $('#state-group').hide();
        axios.get(`/shipping-cost/${country_id}/country`).then(response => {
            let shipping_fee = response.data
            $('#shipping-fee span').text(numeral(shipping_fee).format('0,0.00'));
            $('#total-fee span').text(numeral(total + shipping_fee).format('0,0.00'));
            $('#ttalfee').val(total + shipping_fee)
            $('#tshipfee').val(shipping_fee)
        })
    }
});

$('#state-group select').on('change', function () {
    let state_id = $(this).val()
    let $select = $('#lga-group select')
    $select.text('')
    axios.get(`/get-city/${state_id}`).then(response => {
        let data = response.data;
        $('#lga-group').show();
        $select.append(`<option value="">Select LGA</option>`)
        data.map(x => {
            var $option = $('<option>');
            $option.val(x.city.id).text(x.city.city);
            $select.append($option);
        })
    })
});

let total = parseFloat($('#display-total').val());
$('#lga-group select').on('change', function () {
    let city_id = $(this).val();
    axios.get(`/shipping-cost/${city_id}`).then(response => {
        let shipping_fee = response.data
        $('#shipping-fee span').text(numeral(shipping_fee).format('0,0.00'));
        $('#total-fee span').text(numeral(total + shipping_fee).format('0,0.00'));
        $('#ttalfee').val(total + shipping_fee)
        $('#tshipfee').val(shipping_fee)

    })
})




// $('#add-attribute-btn').on('click', function (evt) {
//     evt.preventDefault();

//     let product_attributes = JSON.parse($('#variabless').val());

//     let iterate = parseInt($('#iterate').val());

//     $single_attribute = `<div id="single-attribute">
//               <span class="product-attribute-count">${iterate + 1}</span>.
//               <hr>
//               <div class="form-group">
//                 <label for="product_attributes">Product Attributes</label>

//                 <select name="product_attributes_${(iterate + 1)}[]" multiple required class="form-control input-lg" id="attribute-select-${(iterate + 1)}">

//                 </select>
//               </div>

//               <div class="form-group">
//                 <label for="var_image">Image</label>
//                 <input type="file" name="var_image_${(iterate + 1)}[]" class="form-control input-lg" required />
//               </div>
//             </div>`
//     $('#insert-here').append($single_attribute);
//     product_attributes.forEach(x => {
//         $('#attribute-select-'+(iterate + 1)).append(`<option value="${x.id}">${x.option}</option>`)
//     })
//     $('#iterate').val(++iterate);
// })