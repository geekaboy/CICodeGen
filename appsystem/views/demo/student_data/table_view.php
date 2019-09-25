<div class="row justify-content-center mt-5">
    <?php echo $this->pagination->create_links(); ?>
</div>
<div class="table-responsive">
    <table class="table table-hover table-bordered table-condensed">
        <thead>
            <tr class="bg-info">
                <th width="20">#</th>
                <th>id</th>
                <th>std_id</th>
                <th>citizen_id</th>
                <th>prefix</th>
                <th>fullname</th>
                <th>gender</th>
                <th>maj_name</th>
                <th>lev_name_th</th>
                <th>date_graduated</th>
                <th>year_graduated</th>
                <th>degree_num</th>
                <th>fac_name</th>
                <th>mobile_number</th>
                <th>email</th>
                <th>email_status</th>
                <th>work_status</th>
                <th>count_survey</th>
                <th>is_answer</th>

            </tr>
        </thead>
        <tbody>
            <?php
            $i_row = $start;
            if (count($student_data_list) == 0) {
                echo '<tr><td colspan="18" class="text-center"><h4 class="text-info">*** Data not found ***</h4></td></tr>';
            }
            foreach ($student_data_list as $key => $student_data) {
                $i_row++;
                ?>
                <tr>
                    <td><?php echo $i_row; ?>. </td>
                    <td><?php echo $student_data->id; ?></td>
                    <td><?php echo $student_data->std_id; ?></td>
                    <td><?php echo $student_data->citizen_id; ?></td>
                    <td><?php echo $student_data->prefix; ?></td>
                    <td><?php echo $student_data->fullname; ?></td>
                    <td><?php echo $student_data->gender; ?></td>
                    <td><?php echo $student_data->maj_name; ?></td>
                    <td><?php echo $student_data->lev_name_th; ?></td>
                    <td><?php echo $student_data->date_graduated; ?></td>
                    <td><?php echo $student_data->year_graduated; ?></td>
                    <td><?php echo $student_data->degree_num; ?></td>
                    <td><?php echo $student_data->fac_name; ?></td>
                    <td><?php echo $student_data->mobile_number; ?></td>
                    <td><?php echo $student_data->email; ?></td>
                    <td><?php echo $student_data->email_status; ?></td>
                    <td><?php echo $student_data->work_status; ?></td>
                    <td><?php echo $student_data->count_survey; ?></td>
                    <td><?php echo $student_data->is_answer; ?></td>

                    <td class="text-center">
                      <div class="btn-group" role="group">
                        <a class="btn btn-warning" href="<?php echo site_url('student_data/edit_view?id='.$student_data->id);?>">
                          <i class="fa fa-edit"></i> EDIT
                        </a>
                        <button type="button" class="btn btn-danger" data-id="<?php echo $student_data->id; ?>" onclick="del(this)">
                          <i class="fa fa-trash-o"></i> DELETE
                        </button>
                      </div>
                    </td>
                </tr>
            <?php
            }
            ?>

        </tbody>
    </table>
</div>

<div class="row justify-content-center mt-5">
    <?php echo $this->pagination->create_links(); ?>
</div>

<script>
    $(document).ready(function() {
        $('.page-link > a').click(function(e) {
            e.preventDefault();
            var url = site_url + "student_data/get_list?" +
                'page=' + $(this).data('ci-pagination-page') +
                '&search_text=' + $('#search_text').val();
            $('#div_table').load(url, function(response, status, request) {
                $('body').scrollTop(0);
            });

        });
    }); //end ready
</script>
