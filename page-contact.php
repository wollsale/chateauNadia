<?php /* Template Name: Contact */

get_header() ?>
<!-- INTRODUCTION -->
<?php
$title = get_the_title();
$image = get_the_post_thumbnail($post->ID, 'full');
?>
<?php if ($title) : ?>
    <div class="hero" data-sal="fade" data-sal-duration="1000" data-delay="1000">
        <div class="container">
            <h1 class="title"><?php echo $title; ?></h1>
            <?php if ($image) : ?>
                <div class="banner">
                    <?php echo $image; ?>
                </div>
            <?php else : ?>
                <div class="banner placeholder"></div>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>
</header>

<main>
    <div class="container flex form__wrapper">

        <?php

        function test_input($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $lastName_error = $firstName_error = $email_error = $phone_error = "";
        $firstName = $lastName = $email = $phone = $message = $success = "";

        if ($_POST['submit_contact']) {
            if (empty($_POST["contact-first-name"])) {
                $firstName_error = pll__('form-error-firstName-missing');
            } else {
                $firstName = test_input($_POST["contact-first-name"]);
                if (!preg_match("/^[a-zA-Z ]*$/", $firstName)) {
                    $firstName_error = pll__('form-error-firstName-unmatch');
                }
            }

            if (empty($_POST["contact-last-name"])) {
                $lastName_error = pll__('form-error-lastName-missing');
            } else {
                $lastName = test_input($_POST["contact-last-name"]);
                if (!preg_match("/^[a-zA-Z ]*$/", $lastName)) {
                    $lastName_error = pll__('form-error-lastName-unmatch');
                }
            }

            if (empty($_POST["phone"])) {
                $phone_error = pll__('form-error-phone-missing');
            } else {
                $phone = test_input($_POST["phone"]);
                if (!preg_match("/^(\d[\s-]?)?[\(\[\s-]{0,2}?\d{3}[\)\]\s-]{0,2}?\d{3}[\s-]?\d{4}$/i", $phone)) {
                    $phone_error = pll__('form-error-phone-unmatch');
                }
            }

            // email validation
            if (empty($_POST["email"])) {
                $email_error = pll__('form-error-email-missing');
            } else {
                $email = test_input($_POST["email"]);
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $email_error = pll__('form-error-email-unmatch');
                }
            }

            if (empty($_POST["message"])) {
                $message_error = pll__('form-error-message-missing');
            } else {
                $message = test_input($_POST["message"]);
            }


            $name = $firstName . ' ' . $lastName;
            $body .= "<h3>Vous avez un nouveau message!</h3>";
            $body .= "<br/><h3>Informations :</h3><br/><strong>Nom : </strong>$name\r\n<br/><strong>Email : </strong>$email\r\n<br/><strong>Téléphone : </strong>$phone";
            $body .= "\r\n\r\n";
            $body .= "<br/><br/><h3>Message :</h3><br/>$message";

            $to = get_field('contact_address');
            $subject = "Nouveau message de votre site web";
            $headers = array('Content-Type: text/html; charset=UTF-8;Reply-To: {$name} <{$email}>');

            $honeyPot = $_POST['newsletter'];

            //if all the errors are empty, only then send the message
            if ($firstName_error == '' and $lastName_error == '' and $email_error == '' and $phone_error == '' and $message_error == '') {
                $message_body = '';
                unset($_POST['submit_contact']);
                foreach ($_POST as $key => $value) {
                    $message_body .= "$key: $value\n";
                }

                if (!$honeyPot) {
                    $firstName = $lastName = $email = $phone = $message = "";
                    $success = true;
                    wp_mail($to, $subject, $body, $headers);
                } else {
                    return;
                }
            }
        } else if ($_POST['submit_job']) {
            $to = get_field('job_address');

            // first-name validation
            if (empty($_POST["contact-first-name"])) {
                $firstName_error = pll__('form-error-firstName-missing');
            } else {
                $firstName = test_input($_POST["contact-first-name"]);
                if (!preg_match("/^[a-zA-Z ]*$/", $firstName)) {
                    $firstName_error = pll__('form-error-firstName-unmatch');
                }
            }

            // last-name validation
            if (empty($_POST["contact-last-name"])) {
                $lastName_error = pll__('form-error-lastName-missing');
            } else {
                $lastName = test_input($_POST["contact-last-name"]);
                if (!preg_match("/^[a-zA-Z ]*$/", $lastName)) {
                    $lastName_error = pll__('form-error-lastName-unmatch');
                }
            }

            // phone validation
            if (empty($_POST["phone"])) {
                $phone_error = pll__('form-error-phone-missing');
            } else {
                $phone = test_input($_POST["phone"]);
                if (!preg_match("/^(\d[\s-]?)?[\(\[\s-]{0,2}?\d{3}[\)\]\s-]{0,2}?\d{3}[\s-]?\d{4}$/i", $phone)) {
                    $phone_error = pll__('form-error-phone-unmatch');
                }
            }

            // email validation
            if (empty($_POST["email"])) {
                $email_error = pll__('form-error-email-missing');
            } else {
                $email = test_input($_POST["email"]);
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $email_error = pll__('form-error-email-unmatch');
                }
            }

            // message validation
            if (empty($_POST["message"])) {
                $message_error = pll__('form-error-message-missing');
            } else {
                $message = test_input($_POST["message"]);
            }

            $name = $firstName . ' ' . $lastName;

            $body .= "<h3>Vous avez un nouveau message!</h3>";
            $body .= "<br/><h3>Informations :</h3><br/><strong>Nom : </strong>$name\r\n<br/><strong>Email : </strong>$email\r\n<br/><strong>Téléphone : </strong>$phone";
            $body .= "\r\n\r\n";
            $body .= "<br/><br/><h3>Message :</h3><br/>$message";

            // $attachment = $_FILES['file']['tmp_name'];
            $attachments = $_FILES['file']['tmp_name'];

            $subject = "Nouveau message de votre site web";
            $headers = array('Content-Type: text/html; charset=UTF-8;Reply-To: {$name} <{$email}>');
            $honeyPot = $_POST['newsletter'];

            //if all the errors are empty, only then send the message
            if ($firstName_error == '' and $lastName_error == '' and $email_error == '' and $phone_error == '' and $message_error == '') {
                $message_body = '';
                unset($_POST['submit_job']);
                foreach ($_POST as $key => $value) {
                    $message_body .= "$key: $value\n";
                }
                if (!$honeyPot) {
                    $firstName = $lastName = $email = $phone = $message = "";
                    $success = true;
                    wp_mail($to, $subject, $body, $headers, $attachments);
                } else {
                    return;
                }
            }
        }

        ?>

        <div class="form__triggers">
            <a href="#" class="form__trigger form--is-active" data-form="1"><?php pll_e('form-1-name') ?></a>
            <a href="#" class="form__trigger" data-form="2"><?php pll_e('form-2-name') ?></a>
        </div>

        <div class="forms">
            <?php if ($success) : ?>
                <div class="success modal">
                    <button class="modal__close">&times;</button>
                    <h2><?php pll_e('success-message') ?></h2>
                    <a href="<?= get_home_url(); ?>" class="button"><?php pll_e('success-button') ?></a>
                </div>
                <div class="overlay"></div>
            <?php endif; ?>
            <form action="" method="POST" class="form form--is-active" data-form="1">
                <div class="form__item">
                    <input type="text" name="contact-first-name" placeholder="<?php pll_e('firstName-placeholder') ?>" value="<?= $firstName; ?>" />
                    <label for="contact-first-name"><?php pll_e('firstName-label') ?></label>
                    <?php if ($firstName_error) : ?>
                        <span class="error"><?= $firstName_error; ?></span>
                    <?php endif; ?>
                </div>
                <div class="form__item">
                    <input type="text" name="contact-last-name" placeholder="<?php pll_e('lastName-placeholder') ?>" value="<?= $lastName; ?>" />
                    <label for="contact-last-name"><?php pll_e('lastName-label') ?></label>
                    <?php if ($lastName_error) : ?>
                        <span class="error"><?= $lastName_error; ?></span>
                    <?php endif; ?>
                </div>
                <div class="form__item">
                    <input type="text" name="phone" placeholder="<?php pll_e('phone-placeholder') ?>" value="<?= $phone; ?>" />
                    <label for="phone"><?php pll_e('phone-label') ?></label>
                    <?php if ($phone_error) : ?>
                        <span class="error"><?= $phone_error; ?></span>
                    <?php endif; ?>
                </div>
                <div class="form__item">
                    <input type="text" name="email" placeholder="<?php pll_e('email-placeholder') ?>" value="<?= $email; ?>" />
                    <label for="email"><?php pll_e('email-label') ?></label>
                    <?php if ($email_error) : ?>
                        <span class="error"><?= $email_error; ?></span>
                    <?php endif; ?>
                </div>
                <div class="form__item form__message">
                    <textarea name="message" placeholder="<?php pll_e('message-placeholder') ?>"><?= $message; ?></textarea>
                    <label for="message"><?php pll_e('message-label') ?></label>
                    <?php if ($message_error) : ?>
                        <span class="error"><?= $message_error; ?></span>
                    <?php endif; ?>
                </div>
                <div class="form__action">
                    <input type="submit" class="button" name="submit_contact" value="<?php pll_e('form-button') ?>" />
                </div>
                <div class="form__item trick">
                    <input type="checkbox" name="newsletter" />
                    <label for="contact-first-name">Newsletter</label>
                </div>
            </form>

            <form action="" method="POST" class="form" data-form="2" enctype="multipart/form-data">
                <div class="form__item">
                    <input type="text" name="contact-first-name" placeholder="<?php pll_e('firstName-placeholder') ?>" value="<?= $firstName; ?>" />
                    <label for="contact-first-name"><?php pll_e('firstName-label') ?></label>
                    <?php if ($firstName_error) : ?>
                        <span class="error"><?= $firstName_error; ?></span>
                    <?php endif; ?>
                </div>
                <div class="form__item">
                    <input type="text" name="contact-last-name" placeholder="<?php pll_e('lastName-placeholder') ?>" value="<?= $lastName; ?>" />
                    <label for="contact-last-name"><?php pll_e('lastName-label') ?></label>
                    <?php if ($lastName_error) : ?>
                        <span class="error"><?= $lastName_error; ?></span>
                    <?php endif; ?>
                </div>
                <div class="form__item">
                    <input type="text" name="phone" placeholder="<?php pll_e('phone-placeholder') ?>" value="<?= $phone; ?>" />
                    <label for="phone"><?php pll_e('phone-label') ?></label>
                    <?php if ($phone_error) : ?>
                        <span class="error"><?= $phone_error; ?></span>
                    <?php endif; ?>
                </div>
                <div class="form__item">
                    <input type="text" name="email" placeholder="<?php pll_e('email-placeholder') ?>" value="<?= $email; ?>" />
                    <label for="email"><?php pll_e('email-label') ?></label>
                    <?php if ($email_error) : ?>
                        <span class="error"><?= $email_error; ?></span>
                    <?php endif; ?>
                </div>
                <div class="form__item form__message">
                    <textarea name="message" placeholder="<?php pll_e('message-placeholder') ?>"><?= $message; ?></textarea>
                    <label for="message"><?php pll_e('message-label') ?></label>
                    <?php if ($message_error) : ?>
                        <span class="error"><?= $message_error; ?></span>
                    <?php endif; ?>
                </div>
                <div class="form__item form__file">
                    <input type="file" id="file" name="file[]" accept=".doc, .docx, .jpeg, .jpg, .odt, .pdf, .png, .ppt, .pptx, .rtf, .txt, .xls, .xlsx, .zip" data-multiple-caption="{count} <?php pll_e('file-selected') ?>" multiple>
                    <label for="file"><?php pll_e('file-label') ?></label>
                </div>
                <div class="form__action">
                    <input type="submit" class="button" name="submit_job" value="<?php pll_e('form-button') ?>" />
                </div>
                <div class="form__item trick">
                    <input type="checkbox" name="newsletter" />
                    <label for="contact-first-name">Newsletter</label>
                </div>
            </form>
        </div>
    </div>

</main>

<?php get_footer() ?>