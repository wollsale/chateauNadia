<?php /* Template Name: Sous-Page */

get_header() ?>
<!-- INTRODUCTION -->
<?php
$title = get_the_title();
$image = get_the_post_thumbnail($post->ID, 'full');
?>
<?php if ($title) : ?>
    <div class="hero">
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

        if ($_POST['submit_contact']) {
            // $to = get_option('admin_email');
            $to = "wollsale@gmail.com";

            // MAIL
            $name = $_POST['contact-first-name'] . ' ' . $_POST['contact-last-name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $message = $_POST['message'];

            $body .= "<h3>Vous avez un nouveau message!</h3>";
            $body .= "<br/><br/><strong>Nom : </strong>$name\r\n<br/><strong>Email : </strong>$email\r\n<br/><strong>Téléphone : </strong>$phone";
            $body .= "\r\n\r\n";
            $body .= "<br/><br/><strong>Message : </strong><br/>$message";

            $subject = "Chateau Nadia : Nouveau message de $name";
            $attachment = $_FILES['file']['tmp_name'];
            $headers = array('Content-Type: text/html; charset=UTF-8;Reply-To: {$name} <{$email}>');


            wp_mail($to, $subject, $body, $headers, $attachment);
        }

        ?>
        <div class="form__triggers">
            <a href="#" class="form__trigger form--is-active" data-form="1">Nous joindre</a>
            <a href="#" class="form__trigger" data-form="2">Rejoindre l'équipe</a>
        </div>

        <div class="forms">
            <form action="" method="POST" class="form form--is-active" data-form="1" enctype="multipart/form-data">
                <div class="form__item">
                    <input type="text" name="contact-first-name" placeholder="Jane Doe" />
                    <label for="contact-first-name">Votre prénom</label>
                </div>
                <div class="form__item">
                    <input type="text" name="contact-last-name" placeholder="John Doe" />
                    <label for="contact-last-name">Votre nom de famille</label>
                </div>
                <div class="form__item">
                    <input type="text" name="phone" placeholder="1234567890" />
                    <label for="phone"># de téléphone</label>
                </div>
                <div class="form__item">
                    <input type="text" name="email" placeholder="your@email.com" />
                    <label for="email">Votre adresse courriel</label>
                </div>
                <div class="form__item form__message">
                    <textarea name="message" placeholder="Votre message..."></textarea>
                    <label for="message">Votre message</label>
                </div>
                <div class="form__item form__message">
                    <input type="file" id="file" name="file" accept=".doc, .docx, .gif, .html, .jpeg, .jpg, .odt, .pdf, .png, .ppt, .pptx, .rtf, .tiff, .txt, .xls, .xlsx, .zip">
                    <label for="file">Votre CV</label>
                </div>
                <div class="form__action">
                    <input type="submit" class="button" name="submit_contact" value="Envoyer" />
                </div>
            </form>

            <form action="" method="POST" class="form" data-form="2">
                <div class="form__item">
                    <input type="text" name="contact-first-name" placeholder="Jane Doe" />
                    <label for="contact-first-name">Votre prénom</label>
                </div>
                <div class="form__item">
                    <input type="text" name="contact-last-name" placeholder="John Doe" />
                    <label for="contact-last-name">Votre nom de famille</label>
                </div>
                <div class="form__item">
                    <input type="text" name="phone" placeholder="1234567890" />
                    <label for="phone"># de téléphone</label>
                </div>
                <div class="form__item">
                    <input type="text" name="email" placeholder="your@email.com" />
                    <label for="email">Votre adresse courriel</label>
                </div>
                <div class="form__item form__message">
                    <textarea name="message" placeholder="Votre message..."></textarea>
                    <label for="message">Votre message</label>
                </div>
                <div class="form__action">
                    <input type="submit" class="button" name="submit_contact" value="Envoyer" />
                </div>
            </form>
        </div>
    </div>

</main>

<?php get_footer() ?>