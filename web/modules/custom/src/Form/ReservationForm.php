<?php

namespace Drupal\reservation_form\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class ReservationForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'reservation_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['first_name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Prénom'),
      '#required' => TRUE,
    ];
    $form['last_name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Nom'),
      '#required' => TRUE,
    ];
    $form['email'] = [
      '#type' => 'email',
      '#title' => $this->t('Email'),
      '#required' => TRUE,
    ];
    $form['start_date'] = [
      '#type' => 'datetime',
      '#title' => $this->t('Date de début'),
      '#required' => TRUE,
    ];
    $form['end_date'] = [
      '#type' => 'datetime',
      '#title' => $this->t('Date de fin'),
      '#required' => TRUE,
    ];
    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Réserver'),
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Créer une nouvelle réservation en tant que node
    $node = \Drupal\node\Entity\Node::create([
      'type' => 'reservation', // Le type de contenu réservation
      'title' => $form_state->getValue('first_name') . ' ' . $form_state->getValue('last_name'),
      'field_email' => $form_state->getValue('email'),
      'field_start_date' => $form_state->getValue('start_date'),
      'field_end_date' => $form_state->getValue('end_date'),
      'status' => 1,
    ]);
    $node->save();

    // Message de confirmation
    \Drupal::messenger()->addMessage($this->t('Votre réservation a été enregistrée.'));
  }
}
