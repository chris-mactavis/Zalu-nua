<template>
  <div class="white-box">
    <div class="row">
      <div class="col-md-12">
        <button data-toggle="modal" data-target="#add-attribute" class="btn btn-primary btn-sm">Add Product Attribute</button>
      </div>
    </div>


    <div class="modal fade" id="add-attribute" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title">Add Attribute</h4>
          </div>
          <form @submit.prevent="addAttribute">
            <div class="modal-body">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Attribute Name" required v-model="attribute.name">
              </div>
              <div class="h5">Attribute Options</div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Options" required v-model="attribute.name">
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
    data: () => ({
        attribute: {}
    })
}
</script>

