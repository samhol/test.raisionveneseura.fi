<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
echo 'a'
?>
<form data-abide>
  <div class="name-field">
    <label>Your name <small>required</small>
      <input type="text" required pattern="[a-zA-Z]+">
    </label>
    <small class="error">Name is required and must be a string.</small>
  </div>
  <div class="email-field">
    <label>Email <small>required</small>
      <input type="email" required>
    </label>
    <small class="error">An email address is required.</small>
  </div>
  <button type="submit">Submit</button>
</form>