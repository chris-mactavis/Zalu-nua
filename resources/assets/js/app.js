require('./bootstrap');

var numeral = require("numeral");

window.Vue = require('vue');

Vue.component('shipping-zones', require('./components/ShippingZones.vue'));
Vue.component('shipping-zones-secondary', require('./components/ShippingZonesSecondary.vue'));
Vue.component('zones-component', require('./components/ZonesComponent.vue'));
Vue.component('product-attributes', require('./components/ProductAttributes.vue'));
Vue.component('coupons-component', require('./components/Coupons.vue'));
Vue.component('coupon-types', require('./components/CouponTypes.vue'));

Vue.filter("formatNumber", function (value) {
    return numeral(value).format("0,0");
})

const app = new Vue({
    el: '#app'
});

var numeral = require('numeral');

$(document).ready(function () {
    if (window.location.pathname === '/register') {

        let $country = $('#reg-country');
        let $state = $('#reg-state');
        let $stateAlt = $('#reg-state-alt');
        let $city = $('#reg-city');
        let $cityAlt = $('#reg-city-alt');
        $country.on('change', function () {

            if ($country.val() === 'Nigeria') {
                $state.show();
                $('#reg-state-alt').remove();
                $city.show();
                $('#reg-city-alt').remove();
            } else {
                $state.removeAttr('required');
                $state.hide();
                $('#state-container').append(`<input type="text" name="state_id_alt" class="form-control" id="reg-state-alt" placeholder="State" required>`)
                $city.removeAttr('required');
                $city.hide();
                $('#city-container').append(`<input type="text" name="city_alt" class="form-control" placeholder="City" id="reg-city-alt" required>`)
            }
        })

        $state.on('change', function () {
            axios.get(`/get-city/${$state.val()}`).then(response => {
                $city.empty();
                let data = response.data;
                $city.append(`<option value="">Select City</option>`)
                data.map(x => {
                    var $option = $('<option>');
                    if (x.city) {
                        $option.val(x.city.city).text(x.city.city);
                        $city.append($option);
                    }
                })
            })
        })

        axios.get(`/get-city/${$state.val()}`).then(response => {
            let data = response.data;
            $city.append(`<option value="">Select City</option>`)
            data.map(x => {
                var $option = $('<option>');
                if (x.city) {
                    $option.val(x.city.id).text(x.city.city);
                    $city.append($option);
                }
            })
        })
    }
    $('.select2').select2();
    $('#primary-address').click();
    let product_attributes = $('#hidden_product_attributes').val();
    if (product_attributes) {
        let attributes = JSON.parse(product_attributes);
        attributes.forEach(attribute => {
            $(`#${attribute}`).attr('checked', true)
        })
    }

})

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
        $('#state-group input').hide();
        $('#state-group select').show();
        $('#city-group').hide();
        let data = {};
        data.couponCode = $('#coupon').val();
        if (data.couponCode) {
            axios.post(`/coupons/verify`, data).then(response => {
                let coupon = response.data;
                if (!coupon) return;
                let discount = $('#discountfee').val();
                console.log(discount)
                $('#state-group').show();
                $('#shipping-fee span').text(0);
                $('#total-fee span').text(numeral(total).format('0,0.00'));
                $('#ttalfee').val(total)
                $('#tshipfee').val('')
            })
        } else {

            $('#state-group').show();
            $('#shipping-fee span').text(0);
            $('#total-fee span').text(numeral(total).format('0,0.00'));
            $('#ttalfee').val(total)
            $('#tshipfee').val('')
        }
    } else {
        let $stateGroup = $('#state-group');
        $('#state-group select').hide();
        $stateGroup.append(`<input class="form-control" name="state">`)
        $('#city-group').show();
        $stateGroup.show();
        $('#lga-group').hide();
        axios.get(`/shipping-cost/${country_id}/country`).then(response => {
            let shipping_fee = response.data
            $('#shipping-fee span').text(numeral(shipping_fee).format('0,0.00'));
            $('#total-fee span').text(numeral(total).format('0,0.00'));
            $('#ttalfee').val(total)
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
            if (x.city) {
                $option.val(x.city.id).text(x.city.city);
                $select.append($option);
            }
        })
    })
});

let total = parseFloat($('#display-total').val());
$('#lga-group select').on('change', function () {

    let data = {};
    data.couponCode = $('#coupon').val();
    if (data.couponCode) {
        axios.post(`/coupons/verify`, data).then(response => {
            let coupon = response.data;
            if (!coupon) return;

            if (coupon.coupon_type_id != 1) {
                let city_id = $(this).val();
                axios.get(`/shipping-cost/${city_id}`).then(response => {
                    let shipping_fee = response.data
                    $('#shipping-fee span').text(numeral(shipping_fee).format('0,0.00'));
                    // $('#total-fee span').text(numeral(total + shipping_fee).format('0,0.00'));
                    // $('#ttalfee').val(total + shipping_fee)
                    $('#tshipfee').val(shipping_fee)

                })
            } else {
                $('#shipping-fee span').text(0);
                $('#tshipfee').val(0)
            }
        })

    } else {
        let city_id = $(this).val();
        axios.get(`/shipping-cost/${city_id}`).then(response => {
            let shipping_fee = response.data
            $('#shipping-fee span').text(numeral(shipping_fee).format('0,0.00'));
            // $('#total-fee span').text(numeral(total + shipping_fee).format('0,0.00'));
            // $('#ttalfee').val(total + shipping_fee)
            $('#tshipfee').val(shipping_fee)

        })
    }


    // let city_id = $(this).val();
    // axios.get(`/shipping-cost/${city_id}`).then(response => {
    //     let shipping_fee = response.data
    //     $('#shipping-fee span').text(numeral(shipping_fee).format('0,0.00'));
    //     // $('#total-fee span').text(numeral(total + shipping_fee).format('0,0.00'));
    //     $('#ttalfee').val(total + shipping_fee)
    //     $('#tshipfee').val(shipping_fee)

    // })
})

$('#primary-address').on('click', function () {
    let city = $('#userinfocity').val();

    let data = {};
    data.couponCode = $('#coupon').val();
    if (data.couponCode) {
        axios.post(`/coupons/verify`, data).then(response => {
            let coupon = response.data;
            if (!coupon) {
                axios.get(`/shipping-cost/${city}`).then(response => {
                    let shipping_fee = response.data
                    $('#shipping-fee span').text(numeral(shipping_fee).format('0,0.00'));
                    $('#total-fee span').text(numeral(total).format('0,0.00'));
                    $('#ttalfee').val(total)
                    $('#tshipfee').val(shipping_fee)

                })
            } else {

            }

            // if (coupon.coupon_type_id != 1) {
            //     let city_id = $(this).val();
            //     axios.get(`/shipping-cost/${city_id}`).then(response => {
            //         let shipping_fee = response.data
            //         $('#shipping-fee span').text(numeral(shipping_fee).format('0,0.00'));
            //         // $('#total-fee span').text(numeral(total + shipping_fee).format('0,0.00'));
            //         // $('#ttalfee').val(total + shipping_fee)
            //         $('#tshipfee').val(shipping_fee)

            //     })
            // } else {
            //     $('#shipping-fee span').text(0);
            //     $('#tshipfee').val(0)
            // }
        })

    } else {
        axios.get(`/shipping-cost/${city}`).then(response => {
            let shipping_fee = response.data
            $('#shipping-fee span').text(numeral(shipping_fee).format('0,0.00'));
            $('#total-fee span').text(numeral(total).format('0,0.00'));
            $('#ttalfee').val(total)
            $('#tshipfee').val(shipping_fee)

        })
    }

})

//////////////////////////////////
// Coupon
$('#coupon-error').hide();
let prevShippingFee = $('#shipping-fee-previous').val();

$('#coupon').on('keyup', function () {
    $('#coupon-error').hide();
    let data = {};
    data.couponCode = $(this).val();
    $('#discount span').text(0);
    if (data.couponCode) {
        axios.post(`/coupons/verify`, data).then(response => {
            $discount = $('#discount span');
            let discountfee = parseFloat($discount.text());
            let shipping_fee = 0;
            let coupon = response.data;
            if (!coupon) {
                $('#coupon-error').text('Invalid coupon!');
                $('#coupon-error').show();
                $('#shipping-fee span').text(parseFloat(prevShippingFee));
                $('#tshipfee').val(parseFloat(prevShippingFee))
                return;
            }
            if (coupon.min_amount > total) {
                $('#coupon-error').text(`Coupon Not Applied. Minimum order value is ₦${coupon.min_amount}`);
                $('#coupon-error').show();
                return;
            }

            if (coupon.coupon_type_id == 1) {
                //  Free Shipping
                $('#shipping-fee span').text(0);
                // $('#total-fee span').text(numeral(total).format('0,0.00'));
                $('#ttalfee').val(total)
                $('#tshipfee').val(0)
            } else if (coupon.coupon_type_id == 2) {
                //  Percentage Discounts
                shipping_fee = parseFloat(prevShippingFee);
                discountfee = total * coupon.percent_discount / 100;
                $('#shipping-fee span').text(numeral(shipping_fee).format('0,0.00'));
                // $('#total-fee span').text(numeral(total - discountfee).format('0,0.00'));
                $discount.text(numeral(discountfee).format('0,0.00'))
                $('#discountfee').val(discountfee);
                $('#ttalfee').val(total)
                $('#tshipfee').val(shipping_fee)
            } else if (coupon.coupon_type_id == 3) {
                //  Amount Discounts
                shipping_fee = parseFloat(prevShippingFee);
                discountfee = coupon.amount_discount;
                $('#shipping-fee span').text(numeral(shipping_fee).format('0,0.00'));
                // $('#total-fee span').text(numeral(total - discountfee).format('0,0.00'));
                $discount.text(numeral(discountfee).format('0,0.00'))
                $('#discountfee').val(discountfee);
                $('#ttalfee').val(total)
                $('#tshipfee').val(shipping_fee)
            }
            console.log(response.data);
        })
    } else {
        $('#discountfee').val(0)
    }
})

//  Cart Quantity
let $quantity_input = $('.cart_qty_input')
$quantity_input.keypress(function (evt) {
    evt.preventDefault();
})

//  Mobile Nav
let $header = $('#main-header');
let open = false;
$('.nav_trigger').on('click', function (e) {
    e.preventDefault();
    let navClass = !open ? 'nav-open' : '';
    $header.removeClass('nav-open');
    $header.addClass(navClass);
    open = !open;
})


let parent = $('a[href="' + location.pathname + '"]').parent('li');
parent.addClass('active');