
<div class="main_content">
    <!-- Mani section header and breadcrumb -->
    <div class="mainSection-title">
      <div class="row">
        <div class="col-12">
          <div
            class="d-flex justify-content-between align-items-center flex-wrap gr-15"
          >
            <div class="d-flex flex-column">
              <h4><?php echo e(get_phrase('All Users')); ?></h4>
            </div>
            <div class="export-btn-area">
              <a href="<?php echo e(route('admin.user.add')); ?>" class="export_btn" data-bs-toggle="tooltip" data-bs-placement="top"
              data-bs-custom-class="custom-tooltip"
              data-bs-title="<?php echo e(get_phrase('Create user')); ?>"><?php echo e(get_phrase('Create a new user')); ?></a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Start Admin area -->
    <div class="row">
      <div class="col-12">
        <div class="eSection-wrap-2">
          <!-- Filter area -->
          
          <div class="table-responsive">
            <table class="table eTable w-100" id="server_side_users_data">
              <thead>
                <tr>
                  <th>#</th>
                  <th><?php echo e(get_phrase('Photo')); ?></th>
                  <th><?php echo e(get_phrase('Name')); ?></th>
                  <th><?php echo e(get_phrase('Email')); ?></th>
                  <th><?php echo e(get_phrase('Status')); ?></th>
                  <th class="text-center"><?php echo e(get_phrase('Actions')); ?></th>
                </tr>
              </thead>
              <tbody></tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
<script>
  $(document).ready(function () {
     var table = $('#server_side_users_data').DataTable({
      responsive: true,
      "processing": true,
      "serverSide": true,
      "ajax":{
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
        },
        "url": "<?php echo e(route('admin.server_side_users_data')); ?>",
        "dataType": "json",
        "type": "POST"
      },
      "columns": [
        { "data": "key" },
        { "data": "photo" },
        { "data": "name" },
        { "data": "email" },
        { "data": "status" },
        { "data": "action" }
      ]   
    });
   });

  // $(function () {
  //   var table = $('#server_side_users_data').DataTable({
  //       processing: true,
  //       serverSide: true,
  //       ajax: "<?php echo e(route('admin.server_side_users_data')); ?>",
  //       columns: [
  //           {data: 'id', name: 'id'},
  //           {data: 'name', name: 'name'},
  //           {data: 'email', name: 'email'},
  //           {data: 'email', name: 'email'},
  //           {data: 'email', name: 'email'},
  //           {data: 'action', name: 'action', orderable: false, searchable: false},
  //       ]
  //   });
  // });

  function refreshServersideTable(tableId){
    $('#'+tableId).DataTable().ajax.reload();
  }
</script><?php /**PATH /home3/kigbvjze/linkdin.webcomdemo.ir/resources/views/backend/admin/users/list.blade.php ENDPATH**/ ?>