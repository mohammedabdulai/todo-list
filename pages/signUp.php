<?php
use utility\htmlTags;
class signUp extends utility\page
{
    protected $page;
    public function buildPage($content = '')
    {
        return $this->page .= $content . '<br>';
    }
}
$newPage = new signUp();

$header = '<div class="container"><h1>Create Acccount</h1></div>';
$loginLink = '<div class="container">
               <h3><a href="index.php?page=accounts&action=login">Have an account? Login</a></h3>
          </div>';

$signUpForm ='<div class="container">

    <form class="well form-horizontal" action="index.php?page=accounts&action=register" method="post"  id="contact_form">
        <fieldset>

            <!-- Form Name -->
            <legend>
                Please enter your information<br>
                <!-- Warning message -->
                '.$data.'
            </legend>

            <!-- Text input-->

            <div class="form-group">
                <label class="col-md-4 control-label">First Name</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input  name="fname" placeholder="First Name" class="form-control"  type="text" required>
                    </div>
                </div>
            </div>

            <!-- Text input-->

            <div class="form-group">
                <label class="col-md-4 control-label" >Last Name</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input name="lname" placeholder="Last Name" class="form-control"  type="text" required>
                    </div>
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label">E-Mail</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                        <input name="username" placeholder="E-Mail Address" class="form-control"  type="email" required>
                    </div>
                </div>
            </div>


            <!-- Text input-->

            <div class="form-group">
                <label class="col-md-4 control-label">Phone #</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                        <input name="phone" placeholder="(845)555-1212" class="form-control" type="tel">
                    </div>
                </div>
            </div>

            <!-- Text input-->

            <div class="form-group">
                <label class="col-md-4 control-label">Birthday</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                        <input name="birthday" placeholder="12/18/2017" class="form-control" type="date">
                    </div>
                </div>
            </div>

            <!-- radio checks -->
            <div class="form-group">
                <label class="col-md-4 control-label">Gender</label>
                <div class="col-md-4">
                    <div class="radio">
                        <label>
                            <input type="radio" name="gender" value="male" /> Male
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="gender" value="female" /> Female
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">Password</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input  name="password" placeholder="Enter letters and numbers(6 - 8 long)" class="form-control"  type="password"required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">Confirm Password</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input  name="confirmPwd" placeholder="Must match password above" class="form-control"  type="password" required>
                    </div>
                </div>
            </div>

            <!-- Button -->
            <div class="form-group">
                <label class="col-md-4 control-label"></label>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary" >Submit <span class="glyphicon glyphicon-send"></span></button>
                </div>
            </div>

        </fieldset>
    </form>
</div>';

$formScript = '<script>
    $(document).ready(function() {
        $(\'#contact_form\').bootstrapValidator({
            // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
            feedbackIcons: {
                valid: \'glyphicon glyphicon-ok\',
                invalid: \'glyphicon glyphicon-remove\',
                validating: \'glyphicon glyphicon-refresh\'
            },
            fields: {
                first_name: {
                    validators: {
                        stringLength: {
                            min: 2,
                        },
                        notEmpty: {
                            message: \'Please supply your first name\'
                        }
                    }
                },
                last_name: {
                    validators: {
                        stringLength: {
                            min: 2,
                        },
                        notEmpty: {
                            message: \'Please supply your last name\'
                        }
                    }
                },
                email: {
                    validators: {
                        notEmpty: {
                            message: \'Please supply your email address\'
                        },
                        emailAddress: {
                            message: \'Please supply a valid email address\'
                        }
                    }
                },
                phone: {
                    validators: {
                        notEmpty: {
                            message: \'Please supply your phone number\'
                        },
                        phone: {
                            country: \'US\',
                            message: \'Please supply a vaild phone number with area code\'
                        }
                    }
                },
                birthday: {
                    validators: {
                        stringLength: {
                            min: 8,
                        },
                        notEmpty: {
                            message: \'Please supply your date of birth\'
                        }
                    }
                }
            }
        })
            .on(\'success.form.bv\', function(e) {
                $(\'#success_message\').slideDown({ opacity: "show"}, "slow") // Do something ...
                $(\'#contact_form\').data(\'bootstrapValidator\').resetForm();

                // Prevent form submission
                e.preventDefault();

                // Get the form instance
                var $form = $(e.target);

                // Get the BootstrapValidator instance
                var bv = $form.data(\'bootstrapValidator\');

                // Use Ajax to submit form data
                $.post($form.attr(\'action\'), $form.serialize(), function(result) {
                    console.log(result);
                }, \'json\');
            });
    });

</script>';

$newPage->buildPage($header);
$newPage->buildPage($formScript);
$newPage->buildPage($signUpForm);
$newPage->buildPage($loginLink);
$newPage->setHtml($newPage->buildPage());
?>