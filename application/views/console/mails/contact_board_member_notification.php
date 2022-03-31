Hi <?php echo $toName; ?>,<br/>
New Enquiry has been submitted against you on the NBSCHA Website.
<br/>
<p>
Type : <?php echo $type; ?><br/>
Name : <?php echo $name; ?><br/>
Email : <?php echo $email; ?><br/>
<?php if($phone!=''){ ?>
Phone : <?php echo $phone; ?><br/>
<?php } ?>
Subject : <?php echo $subject; ?><br/>
Message : <?php echo $message; ?><br/>
</p>
<br/>
<br/>
Thanks<br/>
Administrator