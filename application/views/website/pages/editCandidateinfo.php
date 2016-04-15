<div class="product-big-title-area"
     style="background: url(<?php echo base_url("includes/website/img/crossword.png") ?>) repeat scroll 0 0 #1ABC9C">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>Update form for candidates</h2>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="single-product-area">

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-content-right">
                    <?php
                    $message = $this->session->userdata('message');
                    if ($message) {

                        echo "<div class='alert alert-success alert-dismissable'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                             $message
                          </div>";
                        $this->session->unset_userdata('message');
                    }
                    ?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-md-offset-3 registration">
                <h3>Update information!!</h3>

                <form name="defaultForm" class="form-horizontal" id="defaultForm"
                      action="<?php echo site_url('WebAction/updateCandidate') ?>" method="post">

                    <div class="form-group">
                        <label for="inputEmail3">Name</label>

                        <input type="text" class="form-control nameC" id="inputEmail3" name="name"
                               value="<?php echo $candidate['candidate_name'] ?>">

                    </div>

                    <div class="form-group">
                        <label for="inputEmail3">Age</label>

                        <input type="number" class="form-control" name="age"
                               value="<?php echo $candidate['candidate_age'] ?>">

                    </div>

                    <div class="form-group">
                        <label for="inputEmail3">Gender</label>

                        <select class="form-control" name="gender">
                            <option value="">Select</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>

                        </select>

                    </div>
                    <div class="form-group">
                        <label for="inputEmail3">Phone Number</label>

                        <input type="text" class="form-control" id="inputEmail3" name="phoneNumber"
                               value="<?php echo $candidate['candidate_phoneNo'] ?>">

                    </div>

                    <div class="form-group">
                        <label for="inputEmail3">Email</label>

                        <input type="email" class="form-control" id="inputEmail3" name="email"
                               value="<?php echo $candidate['candidate_email'] ?>">

                    </div>
                    <div class="form-group">
                        <label for="inputPassword3">New Password</label>

                        <input type="password" class="form-control" id="inputPassword3" name="password">

                    </div>
                    <div class="form-group">
                        <label for="inputPassword3">Confirm Password</label>

                        <input type="password" class="form-control" id="inputPassword3" name="confirmPassword">

                    </div>

                    <div class="form-group">
                        <label for="inputEmail3">Constituency/Category</label>

                        <select class="form-control" name="category">
                            <option value="">Select</option>
                            <?php foreach ($category as $cat): ?>
                                <option value="<?php echo $cat['cat_id'] ?>"><?php echo $cat['cat_name'] ?></option>
                            <?php endforeach; ?>

                        </select>

                    </div>

                    <div class="form-group">
                        <label for="inputEmail3">Qualification</label>

                        <input type="text" class="form-control" id="" name="qualification"
                               value="<?php echo $candidate['candidate_qualifaction'] ?>">

                    </div>

                    <div class="form-group">
                        <label for="inputEmail3">Number of Legal Case pending</label>

                        <input type="number" class="form-control" name="nlcp"
                               value="<?php echo $candidate['candidate_noCase'] ?>">

                    </div>

                    <div class="form-group">
                        <label for="inputEmail3">Aadhar card number</label>

                        <input type="number" class="form-control" name="acNumber"
                               value="<?php echo $candidate['candidate_acNumber'] ?>">
                        <input type="hidden" name="candidate_id" value="<?php echo $candidate['candidate_id'] ?>">

                    </div>


                    <div class="form-group">

                        <button type="submit" class="btn btn-default btn-block">Update</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">

    document.forms['defaultForm'].elements['gender'].value = "<?php echo $candidate['candidate_gender'];?>";
    document.forms['defaultForm'].elements['category'].value = "<?php echo $candidate['candidate_category'];?>";

    $(document).ready(function () {
        // Generate a simple captcha


        $('#defaultForm').formValidation({
            message: 'This value is not valid',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                name: {

                    validators: {
                        notEmpty: {
                            message: 'The name is required and can\'t be empty'
                        }
                    }
                },
                age: {

                    validators: {
                        notEmpty: {
                            message: 'The age is required and can\'t be empty'
                        }
                    }
                },
                gender: {

                    validators: {
                        notEmpty: {
                            message: 'The gender is required and can\'t be empty'
                        }
                    }
                },
                phoneNumber: {
                    validators: {
                        notEmpty: {
                            message: 'The phone number is required and can\'t be empty'
                        }
                    }
                },

                email: {
                    validators: {
                        notEmpty: {
                            message: 'The email address  is required and can\'t be empty'
                        }
                    }
                },

                password: {
                    validators: {
                        notEmpty: {
                            message: 'The password is required and can\'t be empty'
                        }
                    }
                },
                confirmPassword: {
                    validators: {
                        notEmpty: {
                            message: 'The confirm password is required and can\'t be empty'
                        },
                        identical: {
                            field: 'password',
                            message: 'The password and its confirm are not the same'
                        }
                    }
                },
                category: {
                    validators: {
                        notEmpty: {
                            message: 'The category is required and can\'t be empty'
                        }
                    }
                },
                qualification: {
                    validators: {
                        notEmpty: {
                            message: 'The qualification is required and can\'t be empty'
                        }
                    }
                },


                nlcp: {
                    validators: {
                        notEmpty: {
                            message: 'The number of legal case pending, is required and can\'t be empty'
                        }
                    }
                },
                acNumber: {
                    validators: {
                        notEmpty: {
                            message: 'The aadhar card number is required and can\'t be empty'
                        }
                    }
                }


            }
        });
    });
</script>