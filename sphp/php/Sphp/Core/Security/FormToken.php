<?php

/**
 * FormToken.php (UTF-8)
 * Copyright (c) 2017 Sami Holck <sami.holck@gmail.com>
 */

namespace Sphp\Core\Security;

/**
 * Description of FormToken
 *
 * @author  Sami Holck <sami.holck@gmail.com>
 * @since   2017-03-16
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPLv3
 * @filesource
 */
class FormToken {

  function generateFormToken($form) {

    // generate a token from an unique value
    $token = md5(uniqid(microtime(), true));

    // Write the generated token to the session variable to check it against the hidden field when the form is sent
    $_SESSION[$form . '_token'] = $token;

    return $token;
  }

  function verifyFormToken($form) {

    // check if a session is started and a token is transmitted, if not return an error
    if (!isset($_SESSION[$form . '_token'])) {
      return false;
    }

    // check if the form is sent with token in it
    if (!isset($_POST['token'])) {
      return false;
    }

    // compare the tokens against each other if they are still the same
    if ($_SESSION[$form . '_token'] !== $_POST['token']) {
      return false;
    }

    return true;
  }

}
