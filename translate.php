<?php

/* FOOTER */
add_action('init', function () {
    /* FOOTER */
    pll_register_string('Château Nadia', 'ChateauNadia', 'Footer', false);
    pll_register_string('Nos heures', 'Hours', 'Footer', false);
    pll_register_string('Copyright', 'Copyright', 'Footer', false);
    pll_register_string('MadeBy', 'MadeBy', 'Footer', false);
    pll_register_string('Lundi au Mercredi', 'Lundi au Mercredi', 'Footer', false);
    pll_register_string('Jeudi au Vendredi', 'Jeudi au Vendredi', 'Footer', false);
    pll_register_string('Samedi', 'Samedi', 'Footer', false);
    pll_register_string('Dimanche', 'Dimanche', 'Footer', false);

    /* SLIDER */
    pll_register_string('Précédent', 'Previous', 'Slider', false);
    pll_register_string('Suivant', 'Next', 'Slider', false);

    /* INSTAGRAM */
    pll_register_string('Suivez-nous', 'Suivez-nous', 'Instagram', false);
    pll_register_string('Sur instagram', 'Sur instagram', 'Instagram', false);

    /* HEADER CTA */
    pll_register_string('Prendre rendez-vous', 'Prendre rendez-vous', 'Topbar', false);

    /* FORM */
    pll_register_string('Fomulaire 1', 'form-1-name', 'Formulaire', false);
    pll_register_string('Formulaire 2', 'form-2-name', 'Formulaire', false);
    /* errors */
    pll_register_string('Erreur : Prénom', 'form-error-firstName-missing', 'Formulaire', false);
    pll_register_string('Erreur : Prénom Unmatch', 'form-error-firstName-unmatch', 'Formulaire', false);

    pll_register_string('Erreur : Nom', 'form-error-lastName-missing', 'Formulaire', false);
    pll_register_string('Erreur : Nom Unmatch', 'form-error-lastName-unmatch', 'Formulaire', false);

    pll_register_string('Erreur : Téléphone', 'form-error-phone-missing', 'Formulaire', false);
    pll_register_string('Erreur : Téléphone Unmatch', 'form-error-phone-unmatch', 'Formulaire', false);

    pll_register_string('Erreur : Email', 'form-error-email-missing', 'Formulaire', false);
    pll_register_string('Erreur : Email Unmatch', 'form-error-email-unmatch', 'Formulaire', false);

    pll_register_string('Erreur : Message', 'form-error-message-missing', 'Formulaire', false);
    pll_register_string('Erreur : Message Unmatch', 'form-error-message-unmatch', 'Formulaire', false);

    /* success */
    pll_register_string('Message envoyé', 'success-message', 'Formulaire', false);
    pll_register_string('Retour à l`accueil', 'success-button', 'Formulaire', false);
    /* placeholders */
    pll_register_string('Jane', 'firstName-placeholder', 'Formulaire', false);
    pll_register_string('Doe', 'lastName-placeholder', 'Formulaire', false);
    pll_register_string('Email', 'email-placeholder', 'Formulaire', false);
    pll_register_string('Phone', 'phone-placeholder', 'Formulaire', false);
    pll_register_string('Message', 'message-placeholder', 'Formulaire', false);
    /* labels */
    pll_register_string('Prénom', 'firstName-label', 'Formulaire', false);
    pll_register_string('Nom', 'lastName-label', 'Formulaire', false);
    pll_register_string('Email', 'email-label', 'Formulaire', false);
    pll_register_string('Phone', 'phone-label', 'Formulaire', false);
    pll_register_string('Message', 'message-label', 'Formulaire', false);
    pll_register_string('Fichiers', 'file-label', 'Formulaire', false);
    /* button */
    pll_register_string('Envoyer', 'form-button', 'Formulaire', false);
});
