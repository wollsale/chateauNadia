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

        if ($_POST['submit']) {
            $mailto = get_option('admin_email');

            // MAIL
            $name = $_POST['contact-first-name'] . ' ' . $_POST['contact-last-name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $message = $_POST['message'];


            $formcontent .= "Vous avez un nouveau message!";
            $formcontent .= "\n\n$name\r\n$email\r\n$phone";
            $formcontent .= "\r\n\r\n";
            $formcontent .= $message;


            $recipient = "wollsale@gmail.com";
            $subject = "Chateau Nadia : Nouveau message de $name";
            $mailheader = "From: $email \r\n";
            mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
            echo "test\r\n\r\n";
        } ?>


        <div class="form__triggers">
            <a href="#" class="form__trigger form--is-active" data-form="1">Form #1</a>
            <a href="#" class="form__trigger" data-form="2">Form #2</a>
        </div>

        <div class="forms">
            <form action="" method="POST" class="form form--is-active" data-form="1">
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
                    <input type="submit" class="button" name="submit" value="Envoyer" />
                </div>
            </form>

            <form action="" method="POST" class="form" data-form="2">
                <div class="form__item">
                    <label for="contact-first-name">Votre prénom 2</label>
                    <input type="text" name="contact-first-name" />
                </div>
                <div class="form__item">
                    <label for="contact-last-name">Votre nom de famille</label>
                    <input type="text" name="contact-last-name" />
                </div>
                <div class="form__item">
                    <label for="phone"># de téléphone</label>
                    <input type="text" name="phone" />
                </div>
                <div class="form__item">
                    <label for="email">Votre adresse courriel</label>
                    <input type="text" name="email" />
                </div>
                <div class="form__item form__message">
                    <label for="message">Votre message</label>
                    <textarea name="message"></textarea>
                </div>
                <div class="form__action">
                    <input type="submit" class="button" name="submit" value="Envoyer" />
                </div>
            </form>
        </div>
    </div>

</main>

<?php get_footer() ?>