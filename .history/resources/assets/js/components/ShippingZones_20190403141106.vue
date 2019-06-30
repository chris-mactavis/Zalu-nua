<template>
    <div class="white-box">

        <div class="row">
            <div class="col-md-12">
                <h4>Nigeria</h4>
                <h5>States</h5>
                <div class="col-md-3 zone-box">
                    <div class="zone" v-for="(state, inc) in states">
                        <input type="checkbox" name="zone{{ $inc }}" id="zone{{ $inc }}">
                        <label :for="zone{{ $inc }}">{{ state.state_name }}</label>
                    </div>
                </div>

                <div class="col-md-3 ship-to">
                    <span>Please select states to ship to ship to </span> <br>
                    <button class="btn btn-sm btn-primary">&rarr;</button>
                    
                </div>
                
                <div class="col-md-3 zone-box">
                    
                </div>
                
            </div>
        </div>
        <div class="row">
            <div class="col-3 select-all">
                    <button id="selectAll" class="btn btn-primary select-all">Select All</button>
            </div>
            <div class="col-3 other-buttons">
                <button id="add-to-zone" class="btn btn-primary add-to-zone">Add to Zone</button>
                    <button id="deleteAll" class="btn btn-primary delete-all">Delete</button>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    props: ['states'],
    data: () => ({

    }),
    created() {

    },
    methods: {

    }
}
</script>
