<form action="<?php echo $action; ?>" method="post">
    <!--
  <input type="hidden" name="pay_to_email"          value="<?php echo $pay_to_email; ?>" />
  <input type="hidden" name="platform"              value="<?php echo $platform; ?>" />
  <input type="hidden" name="recipient_description" value="<?php echo $description; ?>" />
  <input type="hidden" name="transaction_id"        value="<?php echo $transaction_id; ?>" />
  <input type="hidden" name="return_url"            value="<?php echo $return_url; ?>" />
  <input type="hidden" name="cancel_url"            value="<?php echo $cancel_url; ?>" />
  <input type="hidden" name="status_url"            value="<?php echo $status_url; ?>" />
  <input type="hidden" name="language"              value="<?php echo $language; ?>" />
  <input type="hidden" name="logo_url"              value="<?php echo $logo; ?>" />
  
  <input type="hidden" name="pay_from_email"        value="<?php echo $pay_from_email; ?>" />
  <input type="hidden" name="firstname"             value="<?php echo $firstname; ?>" />
  <input type="hidden" name="lastname"              value="<?php echo $lastname; ?>" />
  <input type="hidden" name="address"               value="<?php echo $address; ?>" />
  <input type="hidden" name="address2"              value="<?php echo $address2; ?>" />
  <input type="hidden" name="phone_number"          value="<?php echo $phone_number; ?>" />
  <input type="hidden" name="postal_code"           value="<?php echo $postal_code; ?>" />
  <input type="hidden" name="city"                  value="<?php echo $city; ?>" />
  <input type="hidden" name="state"                 value="<?php echo $state; ?>" />
  <input type="hidden" name="country"               value="<?php echo $country; ?>" />
  <input type="hidden" name="amount"                value="<?php echo $amount; ?>" />
  <input type="hidden" name="currency"              value="<?php echo $currency; ?>" />
  
  <input type="hidden" name="detail1_text"          value="<?php echo $detail1_text; ?>" />
  <input type="hidden" name="merchant_fields"       value="order_id" />
  
  <input type="hidden" name="order_id"              value="<?php echo $order_id; ?>" />
  -->
  
  <input type="hidden" name="Version"       value="<?php echo $Version; ?>" />
  <input type="hidden" name="redirect"      value="<?php echo $redirect; ?>" />
  <input type="hidden" name="MerchantID"    value="<?php echo $MerchantID; ?>" />
  <input type="hidden" name="TerminalID"    value="<?php echo $TerminalID; ?>" />
  <input type="hidden" name="TotalAmount"   value="<?php echo $TotalAmount; ?>" />
  <input type="hidden" name="Currency"      value="<?php echo $Currency; ?>" />
  <input type="hidden" name="locale"        value="<?php echo $locale; ?>" />
  <input type="hidden" name="SD"            value="<?php echo $SD; ?>" />
  <input type="hidden" name="OrderID"       value="<?php echo $OrderID; ?>" />
  <input type="hidden" name="PurchaseTime"  value="<?php echo $PurchaseTime; ?>" />
  <input type="hidden" name="PurchaseDesc"  value="<?php echo $PurchaseDesc; ?>" />
  <input type="hidden" name="Signature"     value="<?php echo $Signature; ?>" />
  
  
  
  <div class="buttons">
    <div class="pull-right">
      <input type="submit" value="<?php echo $button_confirm; ?>" class="btn btn-primary" />
    </div>
  </div>
</form>
