    <main role="main" class="container">
        <div class="row mt-3">
            <div class="col-md-12">
                <form name="frm_add">
                    <div class="row">
                        <fieldset class="form-group col-md-6">
                          <label for="content_title">content_title</label>
                          <input type="text" class="form-control" name="content_title" id="content_title" placeholder="">
                        </fieldset>
                        <fieldset class="form-group col-md-6">
                          <label for="content_note">content_note</label>
                          <input type="text" class="form-control" name="content_note" id="content_note" placeholder="">
                        </fieldset>
                        <fieldset class="form-group col-md-6">
                          <label for="content_type_id">content_type_id</label>
                          <input type="text" class="form-control" name="content_type_id" id="content_type_id" placeholder="">
                        </fieldset>
                        <fieldset class="form-group col-md-6">
                          <label for="is_gallery">is_gallery</label>
                          <input type="text" class="form-control" name="is_gallery" id="is_gallery" placeholder="">
                        </fieldset>     <fieldset class="form-group col-md-6">
                            <label for="is_publish">is_publish</label><br>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" name="is_publish[]" value="0">
                              <label class="form-check-label" >ไม่เผยแพร่</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" name="is_publish[]" value="1">
                              <label class="form-check-label" >เผยแพร่</label>
                            </div>
                        </fieldset>
                    </div>
                    <div class="text-center">
                        <button type="button" class="btn btn-primary btn-save" onclick="save()">SAVE</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
