<div class="modal" id="modal_option">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><i class="fa fa-list-ul" aria-hidden="true"></i> INPUT OPTION</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
              <button type="button" class="btn btn-primary btn-add-option mb-1">
                  <i class="fa fa-plus-square"></i>
              </button>
              <form id="frm_addOption">
                  <input type="hidden" name="column_name" id="column_name" value="">
                  <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="bg-info">
                                <th>Title</th>
                                <th style="max-width: 200px !important;">Value attr</th>
                            </tr>
                        </thead>
                        <tbody id="tb_option">
                            <tr>
                                <td><input class="form-control" type="text" name="title" id="title"/></td>
                                <td><input class="form-control" type="text" name="value" id="value"/></td>
                            </tr>
                        </tbody>
                    </table>
                  </div>
              </form>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="add-option">ADD</button>
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
