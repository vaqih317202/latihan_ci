<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<?php 
echo form_open('userr'); ?>
 
<p>
        <label for="firstname">firstname <span class="required">*</span></label>
        <?php echo form_error('firstname'); ?>
        <br /><input id="firstname" type="text" name="firstname" maxlength="20" value="<?php echo set_value('firstname'); ?>"  />
</p>
<p>
        <label for="lastname">lastname <span class="required">*</span></label>
        <?php echo form_error('lastname'); ?>
        <br /><input id="lastname" type="text" name="lastname" maxlength="80" value="<?php echo set_value('lastname'); ?>"  />
</p>
<p>
        <label for="email">email <span class="required">*</span></label>
        <?php echo form_error('email'); ?>
        <br /><input id="email" type="text" name="email" maxlength="100" value="<?php echo set_value('email'); ?>"  />
</p>
<p>
        <label for="password">password <span class="required">*</span></label>
        <?php echo form_error('password'); ?>
        <br /><input id="password" type="password" name="password"  value="<?php echo set_value('password'); ?>"  />
</p>
<p>
        <?php echo form_submit( 'submit', 'Simpan'); ?>
</p>
<?php echo form_close(); ?>