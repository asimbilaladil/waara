<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Dashboard
                <small >Control panel</small>
            </h1>

            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">

            <!-- Main row -->
            <div class="row">
                <div class="col-md-12">

                    <?php
                    $message = $this->session->userdata('sucess_message');
                    if ($message) {

                        echo "<div class='alert alert-success alert-dismissable'>
                                                             <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                                                              <h4>	<i class='icon fa fa-check'></i> Alert!</h4>
                                                                   $message
                                                            </div>";
                        $this->session->unset_userdata('sucess_message');
                    }
                    $message = $this->session->userdata('error_message');
                    if ($message) {

                        echo "<div class='alert alert-danger alert-dismissable'>
                                                             <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                                                              <h4>	<i class='icon fa fa-check'></i> Alert!</h4>
                                                                   $message
                                                            </div>";
                        $this->session->unset_userdata('error_message');
                    }
                    ?>

                    <div class="box box-success ">
                        <div class="box-header">
                            <h3 class="box-title">All Admin Information</h3>
                            <a href="<?php echo site_url('Admin/newAdmin') ?>" class="btn btn-success pull-right">Add New Admin</a>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>ID No.</th>
                                    <th>Admin Name</th>
                                    <th>Admin eMail</th>

                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach($admins as $admin):?>
                                <tr>
                                    <td><?= $admin['admin_id'];?></td>
                                    <td><?= $admin['admin_name'];?></td>
                                    <td><?= $admin['admin_email'];?></td>

                                    <td>
                                        <a href="<?php echo site_url('Admin/admin_edit/'.$admin['admin_id'])?>" class="btn btn-primary">Edit</a>
                                        <a href="<?php echo site_url('Admin/admin_delete/'.$admin['admin_id'])?>" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                                <?php endforeach;?>
                                </tbody>
                            </table>
                        </div><!-- /.box-body -->
                        <div class="box-footer no-padding">

                        </div>
                    </div><!-- /. box -->
                </div>

            </div><!-- /.row (main row) -->

        </section><!-- /.content -->
    </div>
</div>